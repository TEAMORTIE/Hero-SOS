<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 
$servername = 'localhost:3306';
$username = 'wega3918_admin';
$password = 'keke0703';
$dbname = 'wega3918_hero_sos';

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les paramètres GET
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $user_id = filter_input(INPUT_GET, 'user_id', FILTER_VALIDATE_INT);
    $demande_id = filter_input(INPUT_GET, 'demande_id', FILTER_VALIDATE_INT);

    if ($id && $user_id) {
        if ($id === 1) {
            $pdo->beginTransaction();
            try {
                // Récupérer les informations de l'utilisateur
                $sql = $pdo->prepare('SELECT * FROM demande WHERE user_id = ?');
                $sql->execute([$user_id]);
                $user = $sql->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    // Insérer dans la table hero
                    $sql2 = $pdo->prepare('INSERT INTO hero (user_id, pseudo, competence, prenom, nom) VALUES (?, ?, ?, ?, ?)');
                    $sql2->execute([$user_id, $user['pseudo'], $user['competence'], $user['prenom'], $user['nom']]);

                    // Mettre à jour le rôle de l'utilisateur
                    $sql3 = $pdo->prepare('UPDATE user SET role = ? WHERE id = ?');
                    $sql3->execute(['hero', $user_id]);

                    // Mettre à jour le statut dans la table demande
                    $sql4 = $pdo->prepare('UPDATE demande SET status = ? WHERE user_id = ?');
                    $sql4->execute(['accepter', $user_id]);

                    $pdo->commit();
      
$mail = new PHPMailer(true);
try { 
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true; $mail->Username = 'bultekevin07@gmail.com';
// Remplacez par votre email 
$mail->Password = 'avbg xefs iapp ghrb';
// Remplacez par votre clé d'application 
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

$mail->setFrom('bultekevin07@gmail.com', 'HERO SOS');
$mail->addAddress($user['email']); 

$mail->isHTML(true);
$mail->Subject = 'Réponse a votre demande Pour devenir super héro';
$mail->Body = "<h1>Bonjour ,</h1><p>Votre demande a été accepté</p><p>Désormais vous faites partie de la communauté des supers-heros vous pouvez à présent intervenir sur les incidents.</p>";
$mail->AltBody = "Votre demande a été accepté ,Désormais vous faites partie de la communauté des supers-heros vous pouvez à présent intervenir sur les incidents.";

$mail->send();
} catch (Exception $e) {
$message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
}


                    header("Location: ../pages/dashboard.php?page=5&status=success");
                    exit();
                } else {
                    throw new Exception("Utilisateur introuvable.");
                }
            } catch (Exception $e) {
                $pdo->rollBack();
                header("Location: ../pages/dashboard.php?page=5&error=" . urlencode($e->getMessage()));
                exit();
            }
        } elseif ($id === 2) {
            // Refuser la demande
            $sql = $pdo->prepare('UPDATE demande SET status = ? WHERE user_id = ?');
            $sql->execute(['refuser', $user_id]);
            header("Location: ../pages/dashboard.php?page=5&status=refused");
            exit();
        }
    }

    if ($id === 3 && $demande_id) {
        // Supprimer une demande spécifique
        $sql_delete = $pdo->prepare("DELETE FROM demande WHERE id = ?");
        $sql_delete->execute([$demande_id]);
        header("Location: ../pages/dashboard.php?page=5&status=deleted");
        exit();
    }else {
        echo "Paramètres manquants.";
    }

} catch (PDOException $e) {
    // En cas d'erreur, afficher un message
    echo "Erreur : " . $e->getMessage();
}
