<?php
include("../php/session.php");

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $code_saisi = $_POST['code_saisi'];

    if ($code_saisi == $_SESSION['code_confirmation']) {

        $email = $_SESSION['email'];
        unset($_SESSION['code_confirmation']);  
        
        header("Location: reinitialise.php");  
        exit();
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="../images/favicon-avengers.png" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../styles/confirm.css" />
    <title>Verification changement mot de passe - Hero SOS</title>
</head>
<body>
    <form method="POST" action="form_code.php">
        <div class="flex">
            <div class="block">
                <p class="messages"> 
                    <?php
                    if (!empty($message)) {
                        echo $message;
                    }
                    ?>
                </p>

                <div class="input__container">
                    <div class="shadow__input"></div>
                    <button class="input__button__shadow">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000" width="50px" height="50px">
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
