<?php
include("session.php");
// Connexion à la base de données
$servername = 'localhost:3306';
$username = 'wega3918_admin';
$password = 'keke0703';
$dbname = 'wega3918_hero_sos';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET["id"];
    $incident = $_GET["incident"];

    if ($id == 1) {

        $sql = $pdo->prepare('UPDATE incident SET status = ? WHERE id = ?');
        $sql->execute(['resolu', $incident]);

        $sql = $pdo->prepare('SELECT * FROM hero WHERE id = ?');
        $sql->execute([$hero_id]);
        $hero = $sql->fetch();
        if ($hero) {
            $capturer = $hero['vilain_capturer'];
            $total = $hero['total_interventions'];
            $mis_ajour = $capturer + 1;
            $mis_ajour_total = $total + 1;

            $sql = $pdo->prepare('UPDATE hero SET vilain_capturer = ?, total_interventions =? WHERE id = ?');
            $sql->execute([$mis_ajour, $mis_ajour_total, $hero_id]);
        }

        header("Location: ../pages/espace-perso.php?id=1");
        exit();
    } elseif ($id == 2) {
        $sql = $pdo->prepare('UPDATE incident SET status = ? WHERE id = ?');
        $sql->execute(['rate', $incident]);

        header("Location: ../pages/espace-perso.php?id=1");
        exit();
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
