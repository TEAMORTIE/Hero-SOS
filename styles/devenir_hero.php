<?php
ob_start();  
include("../php/session.php");
include("../php/header.php");

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

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom']);
    $prenom = trim($_POST['prenom']);
    $pseudo = trim($_POST['pseudo']);
    $competence = trim($_POST['competence']);

    // Validation des données
    if (empty($prenom) || empty($nom) || empty($pseudo) || empty($competence)) {
        $message = "Remplissez tous les champs requis";
    } else {
        }

        $sql = "INSERT INTO demande (user_id, prenom, nom, pseudo, competence) 
                VALUES (:user_id, :prenom, :nom, :pseudo, :competence)";
        $stmt = $pdo->prepare($sql);

        if (
            $stmt->execute([
                'user_id' => $_SESSION['user_id'],
                'prenom'=> $prenom,
                'pseudo'=> $pseudo,
                'competence'=> $competence,
                'nom'=> $nom,
            ])
        ) {
            header("Location: confirmation-statut.html");  
            exit();
        } else {
            $message = "Erreur lors de la demande.";
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
    <title>Devenir Hero</title>
</head>
<body>
    <button class="button-retour">
        <div class="button-box">
            <span class="button-elem">
                <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"></path>
                </svg>
            </span>
        </div>
    </button>

    <section class="formulaire">
        <div class="container">
            <!-- Affichage du message -->
            <?php if (!empty($message)): ?>
                <div class="message">
                    <?php echo htmlspecialchars($message); ?>
                </div>
            <?php endif; ?>

            <!-- Formulaire -->
            <form id="form" action="devenir_hero.php" method="POST" >
                <div class="form_container">
                    <h3>Devenir Super-hero</h3>
                    <div class="input_container">
                        <div class="input_bloc">
                            <div class="input_box">
                                <input type="text" id="pseudo" name="pseudo" placeholder="pseudo" required>
                            </div>
                            <div class="input_box">
                                <input type="text" id="prenom" name="prenom" placeholder="prenom" required>
                            </div>
                        </div>
                        <div class="input_bloc">
                            <div class="input_box">
                                <input type="text" id="nom" name="nom" placeholder="nom">
                            </div>
                            <div class="input_box">
                                <input type="text" id="competence" name="competence" placeholder="competence">
                            </div>
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="Envoyer" name="formulaire-hero">
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>