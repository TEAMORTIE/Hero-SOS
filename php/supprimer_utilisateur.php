<?php
// Connexion à la base de données

$servername = 'localhost:3306';  
$username = 'wega3918_admin';
$password = 'keke0703';
$dbname = 'wega3918_hero_sos';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si un ID est passé dans l'URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];

        // Commencer une transaction
        $pdo->beginTransaction();

        // Supprimer les incidents associés à l'utilisateur
        $stmt = $pdo->prepare("DELETE FROM incident WHERE user_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Supprimer d'abord les héros associés à l'utilisateur
        $stmt = $pdo->prepare("DELETE FROM hero WHERE user_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Puis supprimer l'utilisateur
        $stmt = $pdo->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Commit de la transaction
        $pdo->commit();

        // Redirection après suppression
        header("Location: ../pages/dashboard.php?page=2"); // Remplacez par la page de la liste
        exit();
    } else {
        echo "ID invalide.";
    }
} catch (PDOException $e) {
    // Annuler la transaction en cas d'erreur
    $pdo->rollBack();
    echo "Erreur : " . $e->getMessage();
}
?>
