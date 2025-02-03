<?php

include("session.php");

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$upload_dir = '../images/film';
$max_size = 2 * 1024 * 1024; // 2 Mo
$allowed_types = ['image/jpeg', 'image/png', 'image/gif'];

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = !empty($_POST['title']) ? trim($_POST['title']) : null;
    $hero = !empty($_POST['hero']) ? trim($_POST['hero']) : null;
    $anne = !empty($_POST['release_year']) ? trim($_POST['release_year']) : null;
    $image_path = null;

    if (!$title || !$hero || !$anne) {
        die("Erreur : Tous les champs sont obligatoires.");
    }

    // Récupération de l'ID du héros
    $stmt2 = $pdo->prepare("SELECT id FROM hero WHERE pseudo = ?");
    $stmt2->bindParam(1, $hero, PDO::PARAM_STR);
    $stmt2->execute();
    $hero_id = $stmt2->fetchColumn();

    if (!$hero_id) {
        die("Erreur : Héros non trouvé dans la base de données.");
    }

    // Gestion de l'upload d'image
    if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = basename($_FILES['image']['name']);
        $image_type = mime_content_type($image_tmp_name);
        $image_size = $_FILES['image']['size'];

        if (!in_array($image_type, $allowed_types)) {
            die("Le fichier doit être une image (JPG, PNG ou GIF).");
        }

        if ($image_size > $max_size) {
            die("Le fichier ne doit pas dépasser 2 Mo.");
        }

        // Générer un nom de fichier unique
        $unique_id = uniqid();
        $image_path = $upload_dir . $unique_id . '_' . $image_name;

        if (!move_uploaded_file($image_tmp_name, $image_path)) {
            die("Erreur lors du téléchargement de l'image.");
        }
    } else {
        die("Erreur : Aucune image téléchargée.");
    }

    // Insertion dans la base de données
    try {
        $sql = "INSERT INTO videotheque (titre, hero_id, anne, image) VALUES (:title, :hero_id, :anne, :image)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':hero_id', $hero_id, PDO::PARAM_INT);
        $stmt->bindParam(':anne', $anne, PDO::PARAM_INT);
        $stmt->bindParam(':image', $image_path, PDO::PARAM_STR);

        if ($stmt->execute()) {
            header('Location: ../pages/videotec.php');
        } else {
            echo "Erreur lors de l'ajout du film.";
        }
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
}
?>
