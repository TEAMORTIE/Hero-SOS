<?php

include("session.php"); 

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

    
    $stmt = $pdo->prepare("SELECT * FROM incident WHERE id = :incident");
    $stmt->bindParam(':incident', $incident, PDO::PARAM_INT); 
    $stmt->execute();
    $user_incident = $stmt->fetch(PDO::FETCH_ASSOC);

    

    $stmt = $pdo->prepare("SELECT email FROM user WHERE id = :user_incident");
    $stmt->bindParam(':user_incident', $user_incident['user_id'], PDO::PARAM_INT); 
    $stmt->execute();
    $email_user = $stmt->fetch(PDO::FETCH_ASSOC); 

    if ($sql->fetch(PDO::FETCH_ASSOC)) {
        throw new Exception("Le héros est déjà en intervention.");
    } else {
        $sql = $pdo->prepare('UPDATE incident SET status = ?, hero_id = ? WHERE id = ?');
        $sql->execute([$status, $hero_id, $incident]);
        $mail = new PHPMailer(true);
        
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bultekevin07@gmail.com';
            $mail->Password = 'avbg xefs iapp ghrb'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;
            $mail->setFrom('bultekevin07@gmail.com', 'HERO SOS');
            $mail->addAddress($email_user['email']); 
            $mail->isHTML(true);
            $mail->Subject = 'Incident pris en charge ';
            $mail->Body = "<h1> un hero a pris votre incident</h1><p>Un héros est en action sur votre incident, vous recevrez un mail a la fin de l'intervention</p>";
            $mail->AltBody = "Incident en cours";

            $mail->send();
                    header('location: ../pages/espace-perso.php?id=3');

        } catch (Exception $e) {
            $message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }
    }

} catch (PDOException $e) {
    echo "Erreur de base de données : " . $e->getMessage();
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}
?>
