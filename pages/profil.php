<?php
include("../php/session.php");
include("../php/header.php");
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
if ( $_SESSION['verification'] == 0) {
    header("Location: ../index.php");
    exit();
} 
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" href="../images/favicon-avengers.png" />
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
      href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../styles/profil.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Orbitron:wght@400..900&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap");
    </style>
    <title>Votre profil - HERO SOS</title>
     <style>
    
  </style>
  </head>
  <body>
    <main>
      <section class="profil">
        <div class="menu-gauche">
          <div class="espace"></div>
          <ul>

          <!--pour les heros -->
            <?php if ($_SESSION["role"] == 'hero' || $_SESSION["role"] == 'admin'){ ?>
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
              <h2>VOTRE PROFIL</h2>
              <p class="petit">Gérer les informations de votre compte.</p>
              <img
                class="pp"
                src="<?php echo $_SESSION['image'] ?>"
                alt="Photo de profil"/> 
                
              <form  action="../php/modifier_image.php" method="POST" enctype="multipart/form-data" id="file-form">

               <label for="file-input" class="custom-file-label">Changer de photo</label>
               <input type="file" id="file-input" name="image" style="display: none;">
              </form>
              <p class="info">Information du compte</p>
                            <form action="../php/modifier_profil.php" method="POST">

              <div class="containerflex">
                <div class="carre">
                  <p class="label">pseudo</p>
                  <p>
                    <?php if($role = 'hero') {
                      echo $pseudo; 
                    }else{
                      echo $_SESSION['prenom'] ;
                    }  ?></p>   
                </div>
                <div class="carre">
                  <p class="label">mail</p>
                <input type="text" id="nom" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
                </div>
              </div>
                            <div class="containerflex">

              <div class="carre">
                  <p class="label">membre depuis :</p>
                  <p><?php $date  = date('d/m/Y', strtotime($_SESSION['create_time']));
 echo $date ?></p>
                </div>
                 <div class="carre">
                  <p class="label">date de naissance :</p>
<p> <?php $date2  = date('d/m/Y', strtotime($_SESSION['date']));
 echo $date2 ?></p>
                </div>
                <?php if ($role == 'hero') { ?>
         <div class="containerflex">
    <div class="carre" >
    <p class="label">Votre Biographie</p> 
    <textarea  placeholder="biographie" id="bio" name="bio" value="<?php echo $bio ?>"><?php echo $bio ?></textarea>
    </div>
                </div>
                <?php } ?>

                              </div>

              <p class="info">Informations personnelles</p>
              <p class="petit">
                Gérer votre nom et vos coordonnées. Ces informations
                personnelles sont privées et ne seront pas visibles par les
                autres utilisateurs.
              </p>
            <div class="containerflex">
                <div class="carre">
                <p class="label">Civilité</p>
                <p><?php echo htmlspecialchars($_SESSION['civilite']); ?></p> 
              </div>
            </div>

              <div class="containerflex">
                <div class="carre">
                <p class="label">Nom</p>
                <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($_SESSION['nom']); ?>">
              </div>

                <div class="carre">
                  <p class="label">prenom</p>
                  <input type="text" id="nom" name="prenom" value="<?php echo $_SESSION['prenom'] ?>">
                </div>
              </div>
                            <div class="containerflex">
                <div class="carre">
                  <p class="label">Numero téléphone</p>
                  <input type="text" id="prenom" name="numero_portable" value="<?php echo $_SESSION['numero_portable'] ?>">
                </div>
                <div class="carre">
                  <p class="label">verifié depuis</p>
                  <p> <?php $date3  = date('d/m/Y', strtotime($_SESSION['date_verification']));
 echo $date3 ?></p>
                </div>
              </div>

              <p class="info">Adresse</p>
              <div class="containerflex">
                <div class="carre">
                  <p class="label">Adresse (ligne 1)</p>
                <input type="text" id="nom" name="rue" value="<?php echo htmlspecialchars($_SESSION['rue']); ?>">
                </div>
                <div class="carre">
                  <p class="label">complement d'adresse</p>
                <input type="text" id="nom" name="complement" value="<?php echo htmlspecialchars($_SESSION['complement_adresse']); ?>">
                </div>
              </div>
              <div class="containerflex">
                <div class="carre">
                  <p class="label">ville</p>
                <input type="text" id="nom" name="ville" value="<?php echo htmlspecialchars($_SESSION['ville']); ?>">
                </div>
                <div class="carre code">
                  <p class="label">code postal</p>
                <input type="text" id="nom" name="code_postal" value="<?php echo htmlspecialchars($_SESSION['code_postal']); ?>">
                </div>

                <div class="carre code">
                  <p class="label">Pays</p>
                <input type="text" id="nom" name="pays" value="<?php echo htmlspecialchars($_SESSION['pays']); ?>">
                </div>
              </div>
              <div class="containerflex">
                <button type="submit" class="boutons">SAUVEGARDER LES CHANGEMENTS</button>

                </form> <?php if ($_SESSION["role"] == 'hero'){?>
                <a href="../php/demissione.php" class="boutons3">DÉMISSIONER</a>
              

              <?php }else{?>
                <a href="devenir_hero.php" class="boutons3">DEVENIR SUPER-HERO</a>
                <?php }?>

              </div>
              <?php if ($_SESSION['newsletter'] == 1){

                
                ?>
                <div class="w-full lg:max-w-md max-lg:mx-auto">
            <div class="bg-transparent carre rounded-3xl p-5">

              <form action="../php/newsletter.php" method="POST" class="flex flex-col gap-5 text-center">
                <div class="relative text-center">
                  <label
                    class="flex items-center mb-2 label "
                    >Newsletter
                  </label>
                  <input
                  class="text-center"
                    type="hidden"
                    name="deinscription"
                    value="1"
                    required
                  />
                   <input
                  class="text-center"
                    type="hidden"
                    name="email"
                    value="<?php echo $_SESSION['email'] ?>"
                    id="default-search"
                    placeholder="HeroSOS@gmail.com"
                    required
                  />
                </div>
                <div
                  class="flex flex-col min-[540px]:flex-row items-center justify-between "
                >
                  <input
                    type="submit"
                    value="Déinscrire"
                    class="text-white text-base font-semibold py-3 px-7 rounded-full cursor-pointer boutons3 transition-all duration-500 hover:bg-white hover:text-gray-900"
                  />
                </div>
              </form>
            </div>
          </div>



          
         <?php     }else{ ?>
          <div class="w-full lg:max-w-md max-lg:mx-auto">
            <div class="bg-transparent carre rounded-3xl p-5">

              <form action="../php/newsletter.php" method="POST" class="flex flex-col  text-center">
                
                  <label
                    class="flex items-center mb-2 label "
                    >Newsletter
                  </label>  
                  <input
                  class="text-center"
                    type="hidden"
                    name="email"
                    value="<?php echo $_SESSION['email'] ?>"
                    id="default-search"
                    placeholder="HeroSOS@gmail.com"
                    required
                  />
                <div
                  class="flex flex-col min-[540px]:flex-row items-center justify-between gap-3"
                >
                  <input
                    type="submit"
                    value="Envoyer"
                    class="text-white text-base font-semibold py-3 px-7 rounded-full cursor-pointer boutons3 transition-all duration-500 hover:bg-white hover:text-gray-900"
                  />
                </div>
              </form>
            </div>
          </div>
                   <?php     } ?>

            </div>
          </div>
        </div>
      </section>
    </main>
  <script>
  const fileInput = document.getElementById('file-input');
  const form = document.getElementById('file-form');


  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
      form.submit();
    }
  });
</script>
  </body>
</html>
