<?php
ob_start();  
include("../php/session.php");
include("../php/header.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 
if (!isset($_SESSION['user_id'])) {
    header("Location: inscrivez_vous.html");
    exit();
}
if ($_SESSION['verification'] == 0) {
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
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$sqlhero = "SELECT email FROM hero";
$stmthero = $pdo->query($sqlhero);
$heros = $stmthero->fetchAll(PDO::FETCH_ASSOC);


$sqlVilains = "SELECT id, nom FROM vilain";
$stmtVilains = $pdo->query($sqlVilains);
$vilains = $stmtVilains->fetchAll(PDO::FETCH_ASSOC);

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lieu = trim($_POST['lieu']);
    $type = trim($_POST['type']);
    $vilain = trim($_POST['vilain']);
    $priorite = $_POST['priorite'];
    $description = trim($_POST['description']);

    // Validation des données
    if (empty($lieu) || empty($type) || empty($priorite) || empty($description)) {
        $message = "Remplissez tous les champs requis";
    } else {

        // Vérification du vilain dans la base de données
        if (!empty($vilain)) {
            $sql2 = "SELECT id FROM vilain WHERE nom = :vilain";
            $stmt2 = $pdo->prepare($sql2);
            $stmt2->execute(['vilain' => $vilain]);
            $vilain_id = $stmt2->fetchColumn();  
            
            if ($vilain_id === false) {
                $vilain_id = null;  // ou vide, selon vos préférences
            }
        }

        $sql = "INSERT INTO incident (lieu, type, vilain, priorite, description, user_id, vilain_id, prenom) 
                VALUES (:lieu, :type, :vilain, :priorite, :description, :user_id, :vilain_id, :prenom)";
        $stmt = $pdo->prepare($sql);

        if (
            $stmt->execute([
                'lieu' => $lieu,
                'type' => $type,
                'vilain' => $vilain,
                'priorite' => $priorite,
                'description' => $description,
                'user_id' => $_SESSION['user_id'],
                'vilain_id' => $vilain_id,  // Si vilain non trouvé, $vilain_id sera null
                'prenom' => $_SESSION['prenom']
            ])
        ) {
               foreach ($heros as $hero):
$mail = new PHPMailer(true);
try { 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true; $mail->Username = 'bultekevin07@gmail.com';
// Remplacez par votre email 
$mail->Password = 'avbg xefs iapp ghrb';
// Remplacez par votre clé d'application 
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

$mail->setFrom('bultekevin07@gmail.com', 'HERO SOS');
$mail->addAddress($hero['email']); 

$mail->isHTML(true);
$mail->Subject = 'Réponse a votre demande Pour devenir super héro';
$mail->Body = "<h1>Bonjour ,</h1><p>Votre demande a été accepté</p><p>Désormais vous faites partie de la communauté des supers-heros vous pouvez à présent intervenir sur les incidents.</p>";
$mail->AltBody = "Votre demande a été accepté ,Désormais vous faites partie de la communauté des supers-heros vous pouvez à présent intervenir sur les incidents.";

$mail->send();
} catch (Exception $e) {
$message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
}
                               endforeach;

            header("Location: ../index.php");  // Redirection vers la page d'accueil après insertion
            exit();
        } else {
            $message = "Erreur lors de la déclaration de l'incident.";
        }
    }
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../images/favicon-avengers.png" />
    <link rel="stylesheet" href="../styles/incident.css">
    <title>Déclarer un incident</title>
</head>
<body>
    <a href="/">
    <button class="button-retour">
        <div class="button-box">
            <span class="button-elem">
                <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                </svg>
            </span>
        </div>
    </button>
</a>
    <section class="formulaire">
        <div class="container">
            <!-- Affichage du message -->
            <?php if (!empty($message)): ?>
                <div class="message">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <!-- Formulaire -->
            <form id="form" action="incident.php" method="POST" >
                <div class="form_container">
                    <h3>Déclarez un incident</h3>
                    <div class="input_container">
                        <div class="input_bloc">
                            <div class="input_box">
                                <input type="text" id="lieu" name="lieu" placeholder="Lieu" required>
                            </div>
                            <div class="input_box">
    <p>Type d'incident</p>
    <select id="incident" name="type">
        <option value="">Sélectionnez un type d'incident</option>
        <option value="Vol à main armée">Vol à main armée</option>
        <option value="Agression en cours">Agression en cours</option>
        <option value="Incendie criminel">Incendie criminel</option>
        <option value="Prise d'otages">Prise d'otages</option>
        <option value="Attaque terroriste">Attaque terroriste</option>
        <option value="Poursuite de criminels">Poursuite de criminels</option>
        <option value="Évasion de prison">Évasion de prison</option>
        <option value="Explosion suspecte">Explosion suspecte</option>
        <option value="Cyberattaque">Cyberattaque</option>
        <option value="Catastrophe naturelle">Catastrophe naturelle</option>
    </select>
</div>

                            

                        </div>
                        <div class="input_bloc">
                            <div class="input_box">
                                <p>Vilan Détécté</p>
                                <select id="vilain" name="vilain">
                                    <option value="">Sélectionnez un vilain</option>
                                    <?php foreach ($vilains as $vilain): ?>
                                        <option value="<?php echo htmlspecialchars($vilain['nom']); ?>">
                                            <?php echo htmlspecialchars($vilain['nom']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="input_box">
                                <p>Niveau de danger :</p>
                                <select id="priorite" name="priorite" required>
                                    <option value="bas">Bas</option>
                                    <option value="normal">Moyen</option>
                                    <option value="haut">Haut</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="text_area">
                        <textarea placeholder="Description" id="description" name="description" required></textarea>
                    </div>
                    <div class="button">
                        <input type="submit" value="Envoyer" name="formulaire-incident">
                    </div>
                </div>
            </form>
        </div>
    </section>
    
</body>
</html>
