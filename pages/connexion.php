<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../php/session.php");

if (isset($_SESSION["user_id"])) {
    header('Location: ../index.php');
    exit();
}
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mot_de_passe = $_POST['mot_de_passe'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Adresse e-mail invalide.";
    } else {
        try {
            $stmt = $pdo->prepare("SELECT * FROM user WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($mot_de_passe, $user['mot_de_passe'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $user['email'];


                
    $mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bultekevin07@gmail.com'; // Remplacez par votre email
    $mail->Password = 'avbg xefs iapp ghrb';   // Remplacez par votre clé d'application
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('bultekevin07@gmail.com', 'HERO SOS');
    $mail->addAddress($email); 

        $mail->isHTML(true);
        $mail->Subject = 'NOUVELLE CONNEXION';
        $mail->Body = "<h1>EH </h1><p>Une nouvelle connexion à votre compte</p><p>ATTENTION ! nous avons détecté une nouvelle connexion à votre compte HERO SOS. Si ce n'est pas vous, merci de modifier votre mot de passe.</p>";
        $mail->AltBody = "Nouvelle connexion à votre compte HERO SOS. Si ce n'est pas vous, changez votre mot de passe.";

        $mail->send();
    } catch (Exception $e) {
        $message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
                header("Location: ../index.php");
                exit();
            } else {
                $message = "E-mail ou mot de passe incorrect.";
            }
        } catch (PDOException $e) {
            $message = "Erreur lors de la vérification des informations : " . $e->getMessage();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
   <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../styles/connexion.css" />
    <link rel="icon" href="../images/favicon-avengers.png" />
    <script type="text/javascript" src="" defer></script>
    <!-- sombre - clair -->

    <title>Connexion - Hero SOS</title>
  </head>
  <body>

    <a class="retour" href="../index.php">
<button class="button" >
  <div class="button-box">
    <span class="button-elem">
      <svg viewBox="0 0 46 40" xmlns="http://www.w3.org/2000/svg">
        <path
          d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
        ></path>
      </svg>
    </span>
    <span class="button-elem">
      <svg viewBox="0 0 46 40">
        <path
          d="M46 20.038c0-.7-.3-1.5-.8-2.1l-16-17c-1.1-1-3.2-1.4-4.4-.3-1.2 1.1-1.2 3.3 0 4.4l11.3 11.9H3c-1.7 0-3 1.3-3 3s1.3 3 3 3h33.1l-11.3 11.9c-1 1-1.2 3.3 0 4.4 1.2 1.1 3.3.8 4.4-.3l16-17c.5-.5.8-1.1.8-1.9z"
        ></path>
      </svg>
    </span>
  </div>
</button>
</a>
   <div class="tout-wrapper">
    
      <div class="wrapper">

        <form action="connexion.php" method="POST">
          <h1 class="connexion">Connexion</h1>

          <div class="input-box">
            <input type="text" placeholder="Email" name="email" required />
            <i class="bx bxs-user"></i>
          </div>

          <div class="input-box">
            <input type="password" placeholder="Mot de passe" name="mot_de_passe" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="remenber-forgot">
            <a class="decalage" href="mot_de_passe_oublie.php">Mot de passe oublié</a>
          </div>

          <button type="submit" class="btn" name="submit">Se connecter</button>

          <div class="register-link">
            <div class="message">
              <?php if (!empty($message)) echo "<p>$message</p>"; ?>
            </div>
            <p>
              Pas de compte ? <a href="inscription.php">S'enregistrer</a>
            </p>
          </div>
        </form>
      </div>
    </div>

    <!-- JS NavBar -->

    <script>
      const burgerMenuButton = document.querySelector(".burger-menu-button");
      const burgerMenuButtonIcon = document.querySelector(
        ".burger-menu-button i"
      );
      const burgerMenu = document.querySelector(".burger-menu");

      burgerMenuButton.onclick = function () {
        burgerMenu.classList.toggle("open");
        const isOpen = burgerMenu.classList.contains("open");
        burgerMenuButtonIcon.classList = isOpen
          ? "fa-solid fa-xmark"
          : "fa-solid fa-bars";
      };
    </script>

    <!-- Fin JS NavBar -->
  </body>
</html>
