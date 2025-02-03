<?php
include("../php/session.php");


if (!isset($_SESSION["user_id"])) {
    header('Location: connexion.php');
    exit();
}
if($_SESSION["verification"] == "1"){
    header("Location: ../index.php");
    exit();
}
$servername = 'localhost:3306';  
$username = 'wega3918_admin';
$password = 'keke0703';
$dbname = 'wega3918_hero_sos';

// Connexion à la base de données avec MySQLi
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code_saisi = $_POST['code_saisi'];

    // Vérifier si le code saisi correspond au code stocké en session
    if ($code_saisi == $_SESSION['code_confirmation']) {
        // Vous pouvez maintenant effectuer des actions supplémentaires
        // comme marquer l'utilisateur comme "confirmé" dans la base de données.
        
        // Récupérer l'email de la session
        $email = $_SESSION['email'];

        // Requête de mise à jour pour marquer l'utilisateur comme vérifié
        $query = "UPDATE user SET verification = 1, date_verification = NOW() WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email); // "s" indique que l'email est de type chaîne (string)
        
        if ($stmt->execute()) {
            // Si l'exécution est réussie, vider les données de session
            unset($_SESSION['email']);
            unset($_SESSION['code_confirmation']);
                
                header("Location: ajout_profil.php");
                exit();
        } else {
            $message = "Erreur lors de la mise à jour de l'utilisateur.";
        }
        
        $stmt->close();
    } else {
        $message = "Code de confirmation incorrect. Veuillez réessayer.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
        <link rel="icon" href="../images/favicon-avengers.png" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../styles/confirm.css" />
    <link rel="icon" href="favicon-avengers.png" />
    <script type="text/javascript" src="" defer></script>
    <title>Confirmation Compte - Hero SOS</title>
</head>
<body>
    <form method="post" action="">
        <div class="flex">
          <div class="block">
          <p class="messages"> 
            <?php
            if (!empty($message)) {
                echo $message;
            }
            ?></p>
<div class="input__container">
  
            
  <div class="shadow__input"></div>
  <button class="input__button__shadow">
    <svg
  xmlns="http://www.w3.org/2000/svg"
  viewBox="0 0 24 24"
  fill="#000000"
  width="50px"
  height="50px"
>
  <path d="M0 0h24v24H0z" fill="none"></path>
  <path d="M10 17l5-5-5-5v10z"></path>
</svg>

  </button>
  <input
    type="text"
    name="code_saisi"
    class="input__search"
    placeholder="Entrer le code"
    required
  />
</div>
</div>

        </div>
    </form>
</body>
</html>
