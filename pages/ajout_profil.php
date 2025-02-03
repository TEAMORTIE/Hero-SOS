<?php
include("../php/session.php");

if (!isset($_SESSION["user_id"])) {
    header('Location: connexion.php');
    exit(); 
}

if ($_SESSION["verification"] == "0") {
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

$user_id = $_SESSION['user_id'] ?? null;

$message = "";

// Récupérer les données actuelles de l'utilisateur
$sql = "SELECT * FROM user WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    $message = "Utilisateur non trouvé.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date_de_naissance = $_POST['date_de_naissance'];
    $rue = $_POST['rue'];
    $complement_adresse = $_POST['complement_adresse'] ?: null;
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $numero_portable = $_POST['numero_portable'];

    // Gestion de l'image
    $image_path = $user['image']; // Conserver l'ancienne image par défaut
    $upload_dir = '../images/pdp/';
    $max_size = 2 * 1024 * 1024; // 2 Mo

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']); // Nom du fichier d'origine
        $image_type = mime_content_type($image_tmp_name); // Type MIME
        $image_size = $_FILES['image']['size'];

        // Vérifier le type MIME
        if (!in_array($image_type, $allowed_types)) {
            $message = "Le fichier doit être une image (JPG, PNG ou GIF).";
        } 
        // Vérifier la taille du fichier
        elseif ($image_size > $max_size) {
            $message = "Le fichier ne doit pas dépasser 2 Mo.";
        } 
        else {
            // Générer un nom unique pour le fichier
            $unique_id = uniqid();
            $image_path = $upload_dir . $unique_id . '_' . $image_name;

            // Déplacer le fichier uploadé dans le dossier cible
            if (move_uploaded_file($image_tmp_name, $image_path)) {
                $message = "L'image a été téléchargée avec succès.";
            } else {
                $message = "Erreur lors du téléchargement de l'image.";
            }
        }
    } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $message = "Erreur lors de l'upload : " . $_FILES['image']['error'];
    }

    // Vérifier si tous les champs sont remplis
    if (empty($date_de_naissance) || empty($rue) || empty($code_postal) || empty($ville) || empty($pays) || empty($numero_portable)) {
        $message = "Remplissez tous les champs requis.";
    } else {
        // Mettre à jour les informations dans la base de données
        $sql = "UPDATE user SET date_de_naissance = :date_de_naissance, rue = :rue, complement_adresse = :complement_adresse, 
                code_postal = :code_postal, ville = :ville, pays = :pays, numero_portable = :numero_portable, image = :image 
                WHERE id = :user_id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':date_de_naissance', $date_de_naissance);
        $stmt->bindParam(':rue', $rue);
        $stmt->bindParam(':complement_adresse', $complement_adresse);
        $stmt->bindParam(':code_postal', $code_postal);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':pays', $pays);
        $stmt->bindParam(':numero_portable', $numero_portable);
        $stmt->bindParam(':image', $image_path);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: compte_creer.html");
            exit();
        } else {
            $message = "Erreur lors de la mise à jour du profil. Veuillez réessayer.";
        }
    }
}

$pdo = null; // Fermer la connexion
?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/ajout_profil.css" />
    <link rel="icon" href="favicon-avengers.png" />
    <title>Ajouté votre profil - Hero SOS</title>
    <!-- Inclure le CSS de Flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<!-- Inclure le JS de Flatpickr -->
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  </head>
  <body>
    <div class="tout-wrapper">  
      <div class="wrapper">
        <form action="ajout_profil.php" method="POST" enctype="multipart/form-data">
          <h1 class="connexion">Créer votre profil</h1>

          <div class="photo-decalage">
            <input name="image" type="file" id="file-input" onchange="previewImage(event)" style="display: none;">
            <img style="cursor: pointer;" class="photo-profil" id="profile-img" src="<?= $user['image'] ?? '../images/profil.png' ?>" onclick="document.getElementById('file-input').click();" />
          </div>

          <div class="input-box">
  <input type="text" placeholder="Date de naissance" name="date_de_naissance" id="datePicker"/>
  <i class="bx bxs-user"></i>   
</div>
          <div class="input-box">
            <input type="text" placeholder="Adresse *" name="rue" value="<?= htmlspecialchars($user['rue']) ?>" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Complément adresse" name="complement_adresse" value="<?= htmlspecialchars($user['complement_adresse']) ?>" />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Code postal *" name="code_postal" value="<?= htmlspecialchars($user['code_postal']) ?>" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Ville *" name="ville" value="<?= htmlspecialchars($user['ville']) ?>" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Pays *" name="pays" value="<?= htmlspecialchars($user['pays']) ?>" required />
            <i class="bx bxs-lock-alt"></i>
          </div>

          <div class="input-box">
            <input type="text" placeholder="Numéro portable *" name="numero_portable" value="<?= htmlspecialchars($user['numero_portable']) ?>" required />
            <i class="bx bxs-lock-alt"></i>
          </div>
          <div>
            <p class="champs-obligatoires">* Champs obligatoires</p>
          </div>

          <button type="submit" class="btn">Confirmer</button>
        </form>

        <?php if ($message): ?>
          <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
      </div>
    </div>
    
    <script>
      function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
          document.getElementById('profile-img').src = e.target.result;
        }

        if (file) {
          reader.readAsDataURL(file);
        }
      }
    </script>
    <script>
  flatpickr("#datePicker", {
    dateFormat: "Y-m-d",  // Format de la date
    locale: "fr",  // Langue
  });
</script>
  </body>
</html>
