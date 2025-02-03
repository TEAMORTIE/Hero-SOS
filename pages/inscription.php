<?php
include("../php/session.php");
if (isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Inclure l'autoloader de Composer

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
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $email = trim($_POST['email']);
    $mot_de_passe = $_POST['mot_de_passe'];
    $mot_de_passe2 = $_POST['mot_de_passe2'];
    $civilite = $_POST['civilite'];

    // Validation des données
    if (empty($email) || empty($mot_de_passe) || empty($prenom) || empty($nom) || empty($civilite))  {
        $message = "Remplissez tous les champs requis";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "L'email n'est pas valide.";
    } elseif ($mot_de_passe !== $mot_de_passe2) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {
        // Vérification de l'existence de l'email
        $sql_check_email = "SELECT id FROM user WHERE email = :email";
        $stmt_check_email = $pdo->prepare($sql_check_email);
        $stmt_check_email->execute(['email' => $email]);

        if ($stmt_check_email->rowCount() > 0) {
            $message = "Cet email est déjà utilisé. Veuillez en choisir un autre.";
        } else {
            // Hachage du mot de passe
            $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

            // Insertion de l'utilisateur
            $sql = "INSERT INTO user (email, mot_de_passe, prenom, nom, civilite) 
                    VALUES (:email, :mot_de_passe, :prenom, :nom, :civilite)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([
                'email' => $email,
                'mot_de_passe' => $hashed_password,
                'prenom' => $prenom,
                'nom' => $nom,
                'civilite' => $civilite
            ])) {
                $code_confirmation = random_int(100000, 999999);
                $_SESSION['email'] = $email;
                $_SESSION['user_id'] = $pdo->lastInsertId();

                $_SESSION['code_confirmation'] = $code_confirmation;
                $mail = new PHPMailer(true);

                try {
                    // Configuration du serveur SMTP
                   
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'bultekevin07@gmail.com'; 
    $mail->Password = 'avbg xefs iapp ghrb';   
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

                    // Destinataire
                    $mail->setFrom('tonemail@gmail.com', 'HERO SOS');
                    $mail->addAddress($email, "$prenom $nom");

                    // Contenu du mail
                    $mail->isHTML(true);
                    $mail->Subject = 'Votre code de confirmation HERO SOS';
                    $mail->Body    = "
                        <h1>Bienvenue chez HERO SOS !</h1>
                        <p>Voici votre code de confirmation :</p>
                        <h2 style='color:blue;'>$code_confirmation</h2>
                        <p>Veuillez entrer ce code dans l'application pour confirmer votre adresse e-mail.</p>
                    ";
                    $mail->AltBody = "Voici votre code de confirmation : $code_confirmation";

                    $mail->send();

                    header("Location: confirmation.php");
                    exit();
                } catch (Exception $e) {
                    $message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
                }
            } else {
                $message = "Une erreur est survenue lors de l'inscription.";
            }
        }
    }
}

?>




<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
   
    <link rel="stylesheet" href="../styles/inscription.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="../images/favicon-avengers.png" />
    <script type="text/javascript" src="" defer></script>
    

    <title>Inscription - Hero SOS</title>
   
  </head> 
  <body>
    <!-- From Uiverse.io by xopc333 --> 
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
 

</button></a>
    
    <div class="tout-wrapper">
      <div class="wrapper">
        <form action="inscription.php" method="POST">
          <h1 class="connexion">Créer un compte</h1>

          <div class="input-box">
            <p>Choisissez votre civilité :</p>
            <select class="custom-select" name="civilite">
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
             <option value="non défini">Autre</option>

            </select>
          </div>


          <div class="input-box">
            <input type="text" name="nom" placeholder="Nom" required />
            <i class="bx bxs-user"></i>
          </div>

          <div class="input-box">
            <input type="text" name="prenom" placeholder="Prenom" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="input-box">
            <input type="text" name="email" placeholder="Email" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="input-box">
            <input type="password" name="mot_de_passe" placeholder="Mot de passe" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="input-box">
            <input
            name="mot_de_passe2"
              type="password"
              placeholder="Confirmation mot de passe "
              required
            />
            <i class="bx bxs-lock-alt"></i>
          </div>
          <p class="messages">

          <?php
          if( !empty($message)) {
            echo $message;
          }
?>
</p>
          <input type="submit" class="btn" value="s'inscrire" id="">

          <div class="register-link">
            <p>Deja un compte ? <a href="connexion.php">Se connecter</a></p>
          </div>
        </form>
      </div>
    </div>
    <script>
      let darkmode = localStorage.getItem("darkmode");
      const themeSwitch = document.getElementById("theme-switch");

      const enableDarkmode = () => {
        document.body.classList.add("darkmode");
        localStorage.setItem("darkmode", "active");
      };

      const disableDarkmode = () => {
        document.body.classList.remove("darkmode");
        localStorage.setItem("darkmode", null);
      };

      if (darkmode === "active") enableDarkmode();

      themeSwitch.addEventListener("click", () => {
        darkmode = localStorage.getItem("darkmode");
        darkmode !== "active" ? enableDarkmode() : disableDarkmode();
      });
    </script>


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
