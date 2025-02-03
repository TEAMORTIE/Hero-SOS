<?php
include("session.php"); 

$servername = 'localhost:3306';
$username = 'wega3918_admin';
$password = 'keke0703';
$dbname = 'wega3918_hero_sos';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_GET["incident"]) && is_numeric($_GET["incident"])) {
        $incident = $_GET["incident"];
    } else {
        throw new Exception("Identifiant d'incident invalide.");
    }

    if (!isset($hero_id)) {
        throw new Exception("Le héros n'est pas défini.");
    }
    
    $status = 'en_cours';

    $sql = $pdo->prepare('SELECT * FROM incident WHERE hero_id = ? AND status = ?');
    $sql->execute([$hero_id, $status]);

    if ($sql->fetch(PDO::FETCH_ASSOC)) {
        throw new Exception("Le héros est déjà en intervention.");
    } else {
        $sql = $pdo->prepare('UPDATE incident SET status = ?, hero_id = ? WHERE id = ?');
        $sql->execute([$status, $hero_id, $incident]);
        header('location: ../pages/.php');
    }

} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
