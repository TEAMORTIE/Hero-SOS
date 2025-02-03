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

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$message = "";

// Vérification de l'ID du héros
if (!isset($_POST['hero']) || !is_numeric($_POST['hero'])) {
    die("ID du héros invalide.");
}

$hero_id =  $_POST['hero'];

$sql = "SELECT * FROM hero WHERE id = :hero_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':hero_id', $hero_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("Héros non trouvé.");
}

// Vérification de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $upload_dir = '../images/pdp/';
    $max_size = 2 * 1024 * 1024; // 2 Mo

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $image_type = mime_content_type($image_tmp_name);
        $image_size = $_FILES['image']['size'];

        if (!in_array($image_type, $allowed_types)) {
            $message = "Le fichier doit être une image (JPG, PNG ou GIF).";
        } elseif ($image_size > $max_size) {
            $message = "Le fichier ne doit pas dépasser 2 Mo.";
        } else {
            // Générer un nom unique
            $unique_id = uniqid();
            $image_path = $upload_dir . $unique_id . '_' . $image_name;

            // Déplacer l'image uploadée
            if (move_uploaded_file($image_tmp_name, $image_path)) {
                // Mise à jour de l'image dans la base de données
                $sql = "UPDATE hero SET fond = :fond WHERE id = :hero_id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':fond', $image_path, PDO::PARAM_STR);
                $stmt->bindParam(':hero_id', $hero_id, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    header("Location: ../pages/presentation_hero.php?hero=$hero_id");
                    exit();
                } else {
                    $message = "Erreur lors de la mise à jour du profil.";
                }
            } else {
                $message = "Erreur lors du téléchargement de l'image.";
            }
        }
    } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
        $message = "Erreur lors de l'upload : " . $_FILES['image']['error'];
    }
}

$pdo = null; // Fermer la connexion
?>
