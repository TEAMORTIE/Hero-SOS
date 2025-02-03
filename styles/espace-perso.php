<?php 
include("../php/session.php");
include("../php/header.php");

if (!isset($_SESSION["user_id"])) {
    header('Location: inscrivez_vous.html');
    exit();
}

if($_SESSION["verification"] == "0"){
    header("Location: ../index.php");
    exit();
}

$servername = 'localhost:3306';
$username = 'wega3918_admin';
$password = 'keke0703';
$dbname = 'wega3918_hero_sos';
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //incident en attente de heros
  if ($role == 'hero') {
    $query2 = "SELECT * FROM incident where status = 'reporte'";
    $stmt2 = $pdo->query($query2);

    //incident pris en charge 
    $query = "SELECT * FROM incident where hero_id = $hero_id AND status = 'en_cours'";
    $stmt = $pdo->query($query);

    // incidents  historique
    $query3 = "SELECT * FROM incident where hero_id = $hero_id";
    $stmt3 = $pdo->query($query3);

    $stmt5 = $pdo->prepare("SELECT COUNT(*) as total FROM incident WHERE hero_id = :hero_id");
    $stmt5->bindParam(':hero_id', $hero_id, PDO::PARAM_INT);
    $stmt5->execute();
    $totalIncidents = $stmt5->fetch(PDO::FETCH_ASSOC)['total'];

    $stmt6 = $pdo->prepare("SELECT type, COUNT(*) as count FROM incident WHERE hero_id = :hero_id GROUP BY type");
    $stmt6->bindParam(':hero_id', $hero_id, PDO::PARAM_INT);
    $stmt6->execute();
    $incidents = $stmt6->fetchAll(PDO::FETCH_ASSOC);
  }
    //tout les incidents
    $query4 = "SELECT * FROM incident ORDER BY status ASC, priorite ASC; "; 
    $stmt4 = $pdo->query($query4);
    
} catch (PDOException $e) {
    echo "Erreur de connexion ou d'exécution de la requête : " . $e->getMessage();
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="../images/favicon-avengers.png" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../styles/profil.css">
    <title>Espace professionel - Hero SOS</title>
    
</head>
<body>

<main>

        <?php
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        if ($id === 0): ?>
      <section class="profil">
        <div class="menu-gauche">
          <div class="espace"></div>
          <ul>

          <!--pour les heros -->
            <?php if($_SESSION["role"] == 'hero' || $_SESSION["role"] == 'admin') { ?>
            <li><a href="espace-perso.php?id=0"><i class="bx bx-briefcase-alt"></a></i>
              <a class="responsive" href="espace-perso.php?id=0"
                >Espace Pro</a
              >
            </li>
            <div class="espace"></div>
            <li><a href="espace-perso.php?id=1"><i class="bx bx-error-alt"></i></a>
              <a class="responsive" href="espace-perso.php?id=1"
                >Historique Incidents</a
              >
            </li>
                        <div class="espace"></div>

            <?php } ?>
 <!--pour tout le monde -->
<li>   <a href="espace-perso.php?id=3"> <i class="bx bx-briefcase-alt"></i></a>
              <a class="responsive" href="espace-perso.php?id=3"
                >Incidents Déclarés</a
              >
            </li>

            <div class="espace"></div>
            <li><a href="espace-perso.php?id=2"><i class="bx bx-chart"></i></a>
              <a class="responsive" href="espace-perso.php?id=2">
                Statistiques</a
              >
              
            </li>
            <div class="ligne"></div>
            <div class="espace"></div>
            <li><a href="profil.php"><i class="bx bx-user"></i></a>
              <a class="responsive" href="profil.php">Mon profil</a>
            </li>
            <div class="espace"></div>
            <li><a href="../php/logout."><i class="bx bx-log-out"></i></a>
              <a class="responsive" href="../php/logout.php"
                >Déconnexion</a
              >
            </li>
          </ul>
        </div>
        <div class="detail-profil">
                  <div class="containerflex">

          <div class="haut">
            <div>
              <h2>Bonjour <?php if (!empty($pseudo)) {
                echo $pseudo;
              } else {
                echo $prenom;
              }
                  ?></h2>
              <p class="petit">A ce jour vous avez,</p>
              <div style="justify-content: center; margin-top:0!important" class="haut">
              <div class="containerflex">
                <div class="gros_carre">
                    <p class="label">Interventions sur des incident </p>
                    <p class="resultat" ><?php echo $total_interventions ?></p>
                </div>
                <div class="gros_carre">
                    <p class="label">Super-vilans mis en prison </p>
                    <p class="resultat"><?php echo $villains_capturer ?></p>
                </div>
                
                <div class="gros_carre">
                    <p class="label">Réputations par les citoyens</p>
                    <p class="resultat" ><?php echo $reputation ?></p>
                </div>
                
                <div class="gros_carre">
                    <p class="label">films en tant qu'acteur</p>
                    <p class="resultat" ><?php echo $movies_count ?></p>
                </div>
              </div>
              
          </div>
          <div>
              <h2> Votre Interventions</h2> 
                </div>
                            </div>
        </div>
                <table style="padding-top : 2em;">
                    <tr>
                        <th>Type</th>
                        <th>Lieu</th>
                        <th>Super-vilans</th>
                        <th>Priorité</th>
                        <th>Date</th>
                        <th>Action</th>
                        <th>Action</th>
                    </tr>
                         <?php


                         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {




                           echo "<tr>";
                           echo "<td>" . htmlspecialchars($row['type']) . "</td>";
                           echo "<td>" . htmlspecialchars($row['lieu']) . "</td>";
                           echo "<td>" . htmlspecialchars($row['vilain']) . "</td>";
                           if ($row["priorite"] == "haut") {
                           echo "<td> 
                                                                                 <div class='flex justify-center'>
                                                                                 <div class='flex justify-center'>

                           <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div>   </div>                                                                               <div class='flex justify-center'>

                  
                  <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div> </div>
                                                                                                   <div class='flex justify-center'>

                  
                  <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div> </div> </div>
                           </td>";
                           
                          }elseif($row['priorite'] =="bas"){
                            echo "<td> 
                            <div class='flex justify-center'>
                                                                                                             <div class='flex justify-center'>

                           <div
                    class='moyen w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='moyen w-3 h-3 border-2 border-white rounded-full'
                  ></div></div>
                                                                                                   <div class='flex justify-center'>

                  <div
                    class='moyen w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='moyen w-3 h-3 border-2 border-white rounded-full'
                  ></div></div>
                         </div>  </td>";

                           }else{
                          echo "<td> 
                                                      <div class='flex justify-center'>

                           <div
                    class='bas w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='bas w-3 h-3 border-2 border-white rounded-full'
                  ></div>
                         </div>    </td>";
                           }

                           echo "<td>" . htmlspecialchars($row['reported_at']) . "</td>";
                           echo "<td class='bg-blue-600'>". "<a style='
                          color: rgb(255, 255, 255);  
                          font-weight: 1000;
                          text-decoration: none;
                          ' href='../php/incident_hero.php?id=1&incident=". htmlspecialchars($row['id']) ."'>Réussi</a>" . "</td>";
echo "<td class='bg-red-600'>". "<a style='
                          color: rgb(255, 255, 255);  
                          font-weight: 1000;
                          text-decoration: none;
                         ' href='../php/incident_hero.php?id=2&incident=". htmlspecialchars($row['id']) ."'>Échoué</a>" . "</td>";





                           echo "</tr>";
                         }
   ?> 

            </div>
            <table style="width : 40%;">
        <tr>
            <th>Type d'incident</th>
            <th>Nombre</th>
            <th>Pourcentage</th>
        </tr>
        <?php foreach ($incidents as $incident): ?>
            <tr>
                <td><?= htmlspecialchars($incident['type']) ?></td>
                <td><?= $incident['count'] ?></td>
                <td><?= round(($incident['count'] / $totalIncidents) * 100, 2) ?>%</td>
            </tr>
        <?php endforeach; ?>
    </table>
          

    </div>
        </div>

      </section>

        <?php endif; ?>

        <?php
        if ($id === 1): ?>
        
      <section class="profil">
        <div class="menu-gauche">
          <div class="espace"></div>
          <ul>

          <!--pour les heros -->
            <?php if($_SESSION["role"] == 'hero' || $_SESSION["role"] == 'admin') { ?>
            <li><a href="espace-perso.php?id=0"><i class="bx bx-briefcase-alt"></a></i>
              <a class="responsive" href="espace-perso.php?id=0"
                >Espace Pro</a
              >
            </li>
            <div class="espace"></div>
            <li><a href="espace-perso.php?id=1"><i class="bx bx-error-alt"></i></a>
              <a class="responsive" href="espace-perso.php?id=1"
                >Historique Incidents</a
              >
            </li>
                        <div class="espace"></div>

            <?php } ?>
 <!--pour tout le monde -->
<li>   <a href="espace-perso.php?id=3"> <i class="bx bx-briefcase-alt"></i></a>
              <a class="responsive" href="espace-perso.php?id=3"
                >Incidents Déclarés</a
              >
            </li>

            <div class="espace"></div>
            <li><a href="espace-perso.php?id=2"><i class="bx bx-chart"></i></a>
              <a class="responsive" href="espace-perso.php?id=2">
                Statistiques</a
              >
            </li>
            <div class="ligne"></div>
            <div class="espace"></div>
            <li><a href="profil.php"><i class="bx bx-user"></i></a>
              <a class="responsive" href="profil.php">Mon profil</a>
            </li>
            <div class="espace"></div>
            <li><a href="../php/logout."><i class="bx bx-log-out"></i></a>
              <a class="responsive" href="../php/logout.php"
                >Déconnexion</a
              >
            </li>
          </ul>
        </div>
        <div class="detail-profil">
          <div class="containerflex">
          <div class="haut">
            <div>
              <h2>HISTORIQUE INCIDENTS</h2>
              <p class="petit">Votre historique d'incident réglé</p>
             

            
          </div>
        </div>
        <table>
                    <tr>
                        <th>Type</th>
                        <th>Lieu</th>
                        <th>Super-vilans</th>
                        <th class="despawn2">Priorité</th>
                        <th class="despawn">Description</th>
                        <th>reporté le </th>                        
                        <th>status</th>

                    </tr>
                    <?php


                         while ($all_incident = $stmt3->fetch(PDO::FETCH_ASSOC)) {




                           echo "<tr>";
                           echo "<td>" . htmlspecialchars($all_incident['type']) . "</td>";
                           echo "<td>" . htmlspecialchars($all_incident['lieu']) . "</td>";
                           echo "<td>" . htmlspecialchars($all_incident['vilain']) . "</td>";
                           if ($all_incident["priorite"] == "haut") {
                           echo "<td class='despawn2'> 
                                                                                 <div class='flex justify-center'>
                                                                                 <div class='flex justify-center'>

                           <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div>   </div>                                                                               <div class='flex justify-center'>

                  
                  <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div> </div>
                                                                                                   <div class='flex justify-center'>

                  
                  <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div> </div> </div>
                           </td>";
                           
                          }elseif($all_incident['priorite'] =="bas"){
                            echo "<td class='despawn2'> 
                            <div class='flex justify-center'>
                                                                                                             <div class='flex justify-center'>

                           <div
                    class='moyen w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='moyen w-3 h-3 border-2 border-white rounded-full'
                  ></div></div>
                                                                                                   <div class='flex justify-center'>

                  <div
                    class='moyen w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='moyen w-3 h-3 border-2 border-white rounded-full'
                  ></div></div>
                         </div>  </td>";

                           }else{
                          echo "<td class='despawn2'> 
                                                      <div class='flex justify-center'>

                           <div
                    class='bas w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='bas w-3 h-3 border-2 border-white rounded-full'
                  ></div>
                         </div>    </td>";
                           }
                     
                           echo "<td class='despawn'>" . htmlspecialchars($all_incident['description']) . "</td>";

                           echo "<td>" . htmlspecialchars($all_incident['reported_at']) . "</td>";
                            if ($all_incident["status"] == 'resolu') {
                        echo "<td style='color:green; '>" . htmlspecialchars($all_incident['status']) . "</td>";
                      } else if ($all_incident["status"] == "rate") {
                        echo "<td style='color:red; '>" . htmlspecialchars($all_incident['status']) . "</td>";
                      } else {
                        echo "<td style='color:blue; '>" . htmlspecialchars($all_incident['status']) . "</td>";
                      }
                      if ($all_incident["status"] == 'reporte') {
                        echo "<td>" . "<a style='
                          color: rgb(255, 255, 255);  
                          font-weight: 1000;
                          background-color: rgb(14, 14, 146);
                          text-decoration: none;
                          padding: 1em;' href='../php/incident_go.php?incident=" . htmlspecialchars($all_incident['id']) . "'>GO</a>" . "</td>";


                      }
                           echo "</tr>";
                         }
   ?> 

              </div>

                </div>
                </table>
            </section>
                <?php endif; ?>
    <?php

    if ($id === 2): ?>
    
      <section class="profil">
       <div class="menu-gauche">
          <div class="espace"></div>
          <ul>

          <!--pour les heros -->
            <?php if ($_SESSION["role"] == 'hero' || $_SESSION["role"] == 'admin') { ?>
            <li><a href="espace-perso.php?id=0"><i class="bx bx-briefcase-alt"></a></i>
              <a class="responsive" href="espace-perso.php?id=0"
                >Espace Pro</a
              >
            </li>
            <div class="espace"></div>
            <li><a href="espace-perso.php?id=1"><i class="bx bx-error-alt"></i></a>
              <a class="responsive" href="espace-perso.php?id=1"
                >Historique Incidents</a
              >
            </li>
                        <div class="espace"></div>

            <?php } ?>
 <!--pour tout le monde -->
<li>   <a href="espace-perso.php?id=3"> <i class="bx bx-briefcase-alt"></i></a>
              <a class="responsive" href="espace-perso.php?id=3"
                >Incidents Déclarés</a
              >
            </li>

            <div class="espace"></div>
            <li><a href="espace-perso.php?id=2"><i class="bx bx-chart"></i></a>
              <a class="responsive" href="espace-perso.php?id=2">
                Statistiques</a
              >
            </li>
            <div class="ligne"></div>
            <div class="espace"></div>
            <li><a href="profil.php"><i class="bx bx-user"></i></a>
              <a class="responsive" href="profil.php">Mon profil</a>
            </li>
            <div class="espace"></div>
            <li><a href="../php/logout."><i class="bx bx-log-out"></i></a>
              <a class="responsive" href="../php/logout.php"
                >Déconnexion</a
              >
            </li>
          </ul>
        </div>
        <div class="detail-profil">
          <div class="haut">
            <div>
              <h2>VOS STATISTIQUES</h2>
              <p class="petit">Observé vos Statistiques</p>
              
            </div>
            
          </div>
              <table>
        <tr>
            <th>Type d'incident</th>
            <th>Nombre</th>
            <th>Pourcentage</th>
        </tr>
        <?php foreach ($incidents as $incident): ?>
            <tr>
                <td><?= htmlspecialchars($incident['type']) ?></td>
                <td><?= $incident['count'] ?></td>
                <td><?= round(($incident['count'] / $totalIncidents) * 100, 2) ?>%</td>
            </tr>
        <?php endforeach; ?>
    </table>
        </div>
      </section>

        <?php endif; ?>
        <?php

    if ($id === 3): ?>
    
      <section class="profil">
        <div class="menu-gauche">
          <div class="espace"></div>
          <ul>

          <!--pour les heros -->
            <?php if ($_SESSION["role"] == 'hero' || $_SESSION["role"] == 'admin') { ?>
            <li><a href="espace-perso.php?id=0"><i class="bx bx-briefcase-alt"></a></i>
              <a class="responsive" href="espace-perso.php?id=0"
                >Espace Pro</a
              >
            </li>
            <div class="espace"></div>
            <li><a href="espace-perso.php?id=1"><i class="bx bx-error-alt"></i></a>
              <a class="responsive" href="espace-perso.php?id=1"
                >Historique Incidents</a
              >
            </li>
                        <div class="espace"></div>

            <?php } ?>
 <!--pour tout le monde -->
<li>   <a href="espace-perso.php?id=3"> <i class="bx bx-briefcase-alt"></i></a>
              <a class="responsive" href="espace-perso.php?id=3"
                >Incidents Déclarés</a
              >
            </li>

            <div class="espace"></div>
            <li><a href="espace-perso.php?id=2"><i class="bx bx-chart"></i></a>
              <a class="responsive" href="espace-perso.php?id=2">
                Statistiques</a
              >
            </li>
            <div class="ligne"></div>
            <div class="espace"></div>
            <li><a href="profil.php"><i class="bx bx-user"></i></a>
              <a class="responsive" href="profil.php">Mon profil</a>
            </li>
            <div class="espace"></div>
            <li><a href="../php/logout."><i class="bx bx-log-out"></i></a>
              <a class="responsive" href="../php/logout.php"
                >Déconnexion</a
              >
            </li>
          </ul>
        </div>              <div class="containerflex">

        <div class="detail-profil">
          <div class="haut">
            <div>
              <h2>INCIDENTS DECLARER</h2>
              <p class="petit">Tout les incidents</p>
                

          </div>
          
        </div>  <table>
                    <tr>
                        <th>Type</th>
                        <th>Lieu</th>
                        <th>Super-vilans</th>
                        <th>Priorité</th>
                        <th class="despawn" >Description</th>  
                        <th class=" despawn2">Date</th>
                        <th>Status</th>
                    </tr>
                    <?php


                         while ($incident = $stmt4->fetch(PDO::FETCH_ASSOC)) {




                           echo "<tr>";
                           echo "<td>" . htmlspecialchars($incident['type']) . "</td>";
                           echo "<td>" . htmlspecialchars($incident['lieu']) . "</td>";
                           echo "<td>" . htmlspecialchars($incident['vilain']) . "</td>";
                           if ($incident["priorite"] == "haut") {
                           echo "<td> 
                                                                                 <div class='flex justify-center'>
                                                                                 <div class='flex justify-center'>

                           <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div>   </div>                                                                               <div class='flex justify-center'>

                  
                  <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div> </div>
                                                                                                   <div class='flex justify-center'>

                  
                  <div
                    class='haut2 w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='haut2 w-3 h-3  border-2 border-white rounded-full'
                  ></div> </div> </div>
                           </td>";
                           
                          }elseif($incident['priorite'] =="bas"){
                            echo "<td> 
                            <div class='flex justify-center'>
                                                                                                             <div class='flex justify-center'>

                           <div
                    class='moyen w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='moyen w-3 h-3 border-2 border-white rounded-full'
                  ></div></div>
                                                                                                   <div class='flex justify-center'>

                  <div
                    class='moyen w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='moyen w-3 h-3 border-2 border-white rounded-full'
                  ></div></div>
                         </div>  </td>";

                           }else{
                          echo "<td> 
                                                      <div class='flex justify-center'>

                           <div
                    class='bas w-3 h-3 absolute border-2 border-white rounded-full animate-ping'
                  ></div>
                  <div
                    class='bas w-3 h-3 border-2 border-white rounded-full'
                  ></div>
                         </div>    </td>";
                           }
       
                           echo "<td class='despawn'>" . htmlspecialchars($incident['description']) . "</td>";

                           echo "<td class='despawn2'>" . htmlspecialchars($incident['reported_at']) . "</td>";
                            if ($incident["status"] == 'resolu') {
                        echo "<td style='color:green; '>" . htmlspecialchars($incident['status']) . "</td>";
                      } else if ($incident["status"] == "rate") {
                        echo "<td style='color:red; '>" . htmlspecialchars($incident['status']) . "</td>";
                      } else {
                        echo "<td style='color:blue; '>" . htmlspecialchars($incident['status']) . "</td>";
                      }
                      if ($role == "hero") {
                        if ($incident["status"] == 'reporte') {
                          echo "<td>" . "<a style='
                          color: rgb(255, 255, 255);  
                          font-weight: 1000;
                          background-color: rgb(14, 14, 146);
                          text-decoration: none;
                          padding: 1em;' href='../php/incident_go.php?incident=" . htmlspecialchars($incident['id']) . "'>GO</a>" . "</td>";


                        }
                      }
                           echo "</tr>";
                         }
   ?> </table>          </div>
        </div>           

      </section>

        <?php endif; ?>

</main>

<footer></footer>

<!-- Script -->
<script>
    const burgerMenuButton = document.querySelector(".burger-menu-button");
    const burgerMenuButtonIcon = document.querySelector(".burger-menu-button i");
    const burgerMenu = document.querySelector(".burger-menu");

    burgerMenuButton.onclick = function () {
        burgerMenu.classList.toggle("open");
        const isOpen = burgerMenu.classList.contains("open");
        burgerMenuButtonIcon.classList = isOpen
            ? "fa-solid fa-xmark"
            : "fa-solid fa-bars";
    };
</script>
</body>
</html>

