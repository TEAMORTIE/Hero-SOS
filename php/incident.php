<?php
// Connexion à la base de données
$servername = 'localhost:3306';
$username = 'wega3918_admin';
$password = 'keke0703';
$dbname = 'wega3918_hero_sos';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET ["id"];
    $incident = $_GET["incident"];

    if ($id == 1) {
            
                // Récupérer les informations de l'utilisateur
                $sql = $pdo->prepare('UPDATE incident SET status = ? WHERE id = ?');
                $sql->execute(['resolu', $incident]);
                header("Location: ../pages/dashboard.php?page=6");
                exit();
        } elseif ($id == 2) {
        
                $sql = $pdo->prepare('UPDATE incident SET status = ? WHERE id = ?');
                $sql->execute(['rate', $incident]);
                header("Location: ../pages/dashboard.php?page=6");
                exit();
        }

} catch (PDOException $e) {
    // En cas d'erreur, afficher un message
    echo "Erreur : " . $e->getMessage();
}
