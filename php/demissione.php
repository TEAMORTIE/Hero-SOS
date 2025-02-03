<?php
include("../php/session.php");

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$user_id = $_SESSION['user_id'] ?? null;

$message = "";

$sql = "SELECT * FROM user WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    $message = "Utilisateur non trouvé.";
}

    $role = 'utilisateur';
    $sql = 'DELETE FROM hero where user_id = :user_id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $sql = "UPDATE user SET role = :role WHERE id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':role', $role);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../pages/demission.html");
            exit();
        } else {
            $message = "Erreur lors de la mise à jour du profil. Veuillez réessayer.";
        }

$pdo = null;
?>