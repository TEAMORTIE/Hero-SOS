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
    $upload_dir = '../images/pdp/';
    $max_size = 2 * 1024 * 1024;

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

        // Mettre à jour les informations dans la base de données
        $sql = "UPDATE user SET image = :image 
                WHERE id = :user_id";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':image', $image_path);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../pages/profil.php");
            exit();
        } else {
            $message = "Erreur lors de la mise à jour du profil. Veuillez réessayer.";
        }
    }


$pdo = null; // Fermer la connexion
?>
