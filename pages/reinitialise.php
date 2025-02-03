<?php
include("../php/session.php");

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$message = '';
$email = $_SESSION['email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mot_de_passe = $_POST['mot_de_passe'];
    
    // Vérification que le mot de passe est bien renseigné
    if (empty($mot_de_passe)) {
        $message = "Veuillez entrer un mot de passe.";
    } elseif (strlen($mot_de_passe) < 6) {
        // Vérification de la longueur minimale du mot de passe
        $message = "Le mot de passe doit contenir au moins 6 caractères.";
    } else {
        // Hachage du mot de passe
        $mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

        $sql = "UPDATE user SET mot_de_passe = :mot_de_passe WHERE email = :email";
        $stmt = $pdo->prepare($sql);  

        // Bind les paramètres
        $stmt->bindParam(':mot_de_passe', $mot_de_passe_hache);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
        header('Location: compte_mis_a_jour.html');
        exit();
      
        } else {
            $message = "Erreur lors de la mise à jour du mot de passe.";
        }
    }
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Agbalumo&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../styles/mailing.css" />
    <title>Réinitialisation du mot de passe</title>
    <style>
      h1{
        color: white;
      }
    </style>
  </head>
  <body>
    <header>
      <div class="logo">
        <img src="../images/Logo-super-hero.png" alt="Logo du site" />
      </div>
    </header>
    <main>
      <section class="hero-section">
        <div class="espace"></div>
        <h1>Réinitialisation du mot de passe</h1>

        <!-- Affichage du message d'erreur ou de succès -->
        <?php if (!empty($message)): ?>
          <p style="color: red; text-align: center;"><?php echo $message; ?></p>
        <?php endif; ?>

        <form style="text-align: center;  " action="reinitialise.php" method="POST">
          <p style="text-align: center;">Entrez votre nouveau mot de passe</p>
          <input style="text-align: center;color: black" type="password" name="mot_de_passe" placeholder="Mot de passe" required>
          <button style="text-align: center;" type="submit">Confirmer</button>
        </form>
      </section>
    </main>
  </body>
</html>
