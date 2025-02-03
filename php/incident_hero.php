<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include("session.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; 
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
    $stmt = $pdo->prepare("SELECT * FROM incident WHERE id = :incident");
    $stmt->bindParam(':incident', $incident, PDO::PARAM_INT); 
    $stmt->execute();
    $user_incident = $stmt->fetch(PDO::FETCH_ASSOC);

    

    $stmt = $pdo->prepare("SELECT email FROM user WHERE id = :user_incident");
    $stmt->bindParam(':user_incident', $user_incident['user_id'], PDO::PARAM_INT); 
    $stmt->execute();
    $email_user = $stmt->fetch(PDO::FETCH_ASSOC); 

     $sql = $pdo->prepare('SELECT * FROM hero WHERE id = ?');
        $sql->execute([$hero_id]);
        $hero = $sql->fetch();
        if ($hero) {
            
        
        $intervention_total = $hero['total_interventions'] + 1;

            $sql = $pdo->prepare('UPDATE hero SET  total_interventions =? WHERE id = ?');
            $sql->execute([$intervention_total, $hero_id]);

        }
    if ($id == 1) {
        $sql = $pdo->prepare('SELECT * FROM incident WHERE id = ?');
        $sql->execute([$incident]);
        $type = $sql->fetch(PDO::FETCH_ASSOC);
        $priorite = $type['priorite'];
        $sauve = 0;
        $sauvegrave = 0;    

if ($type['type'] == 'Vol à main armée') {
    if ($priorite == 'haut') {
        $sauve = random_int(1, 3);
        $sauvegrave = $sauve / random_int(1, 2);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(0, 2);
        $sauvegrave = $sauve / random_int(1, 3);
    } else {
        $sauve = random_int(0, 1);
        $sauvegrave = $sauve / random_int(2, 5);
    }
} elseif ($type['type'] == 'Agression en cours') {
    if ($priorite == 'haut') {
        $sauve = random_int(10, 20);
        $sauvegrave = $sauve / random_int(1, 3);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(5, 15);
        $sauvegrave = $sauve / random_int(2, 4);
    } else {
        $sauve = random_int(2, 10);
        $sauvegrave = $sauve / random_int(3, 5);
    }
} elseif ($type['type'] == 'Incendie criminel') {
    if ($priorite == 'haut') {
        $sauve = random_int(50, 200);
        $sauvegrave = $sauve / random_int(1, 3);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(20, 100);
        $sauvegrave = $sauve / random_int(2, 5);
    } else {
        $sauve = random_int(5, 50);
        $sauvegrave = $sauve / random_int(3, 6);
    }
} elseif ($type['type'] == 'Prise d\'otages') {
    if ($priorite == 'haut') {
        $sauve = random_int(30, 100);
        $sauvegrave = $sauve / random_int(1, 3);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(10, 50);
        $sauvegrave = $sauve / random_int(2, 4);
    } else {
        $sauve = random_int(5, 30);
        $sauvegrave = $sauve / random_int(3, 6);
    }
} elseif ($type['type'] == 'Attaque terroriste') {
    if ($priorite == 'haut') {
        $sauve = random_int(80, 500);
        $sauvegrave = $sauve / random_int(1, 2);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(50, 200);
        $sauvegrave = $sauve / random_int(2, 4);
    } else {
        $sauve = random_int(10, 100);
        $sauvegrave = $sauve / random_int(3, 6);
    }
} elseif ($type['type'] == 'Poursuite de criminels') {
    if ($priorite == 'haut') {
        $sauve = random_int(10, 50);
        $sauvegrave = $sauve / random_int(2, 4);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(5, 20);
        $sauvegrave = $sauve / random_int(3, 5);
    } else {
        $sauve = random_int(0, 10);
        $sauvegrave = $sauve / random_int(4, 7);
    }
} elseif ($type['type'] == 'Évasion de prison') {
    if ($priorite == 'haut') {
        $sauve = random_int(5, 15);
        $sauvegrave = $sauve / random_int(3, 5);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(2, 10);
        $sauvegrave = $sauve / random_int(4, 6);
    } else {
        $sauve = random_int(0, 5);
        $sauvegrave = $sauve / random_int(5, 8);
    }
} elseif ($type['type'] == 'Explosion suspecte') {
    if ($priorite == 'haut') {
        $sauve = random_int(50, 500);
        $sauvegrave = $sauve / random_int(1, 3);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(30, 200);
        $sauvegrave = $sauve / random_int(2, 5);
    } else {
        $sauve = random_int(10, 100);
        $sauvegrave = $sauve / random_int(3, 6);
    }
} elseif ($type['type'] == 'Cyberattaque') {
    if ($priorite == 'haut') {
        $sauve = random_int(50, 300);
        $sauvegrave = $sauve / random_int(2, 5);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(20, 100);
        $sauvegrave = $sauve / random_int(3, 6);
    } else {
        $sauve = random_int(5, 50);
        $sauvegrave = $sauve / random_int(4, 8);
    }
} elseif ($type['type'] == 'Catastrophe naturelle') {
    if ($priorite == 'haut') {
        $sauve = random_int(500, 1000);
        $sauvegrave = $sauve / random_int(1, 2);
    } elseif ($priorite == 'normal') {
        $sauve = random_int(100, 500);
        $sauvegrave = $sauve / random_int(2, 4);
    } else {
        $sauve = random_int(50, 200);
        $sauvegrave = $sauve / random_int(3, 6);
    }
}
   $aleatoire = random_int(0,1);
        if ($aleatoire == 0) {

            $capturer = $hero['villains_capturer'] + 1;

        }


        $citizen_sauver = $sauvegrave + $hero['citizens_saved'];

        $sql = $pdo->prepare('UPDATE incident SET status = ? WHERE id = ?');
        $sql->execute(['resolu', $incident]);

        
        $sql = $pdo->prepare('UPDATE hero SET  villains_capturer =?, citizens_saved = ? WHERE id = ?');
        $sql->execute([$capturer, $citizen_sauver, $hero_id]);
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
            $mail->Subject = 'Votre incident a était réglé';
            $mail->Body = "<h1>votre incident a était reglé</h1><p>Un héros à réglé votre interventions</p>
            <p> Notez le </p>
            <button><a href='https://kevin-bulte.fr/pages/presentation_hero.php?hero=$hero_id'>Notez</a></button>";
            $mail->AltBody = "Incident en cours";

            $mail->send();

        } catch (Exception $e) {
            $message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }

        header("Location: ../pages/espace-perso.php?id=1");
        exit();
    } elseif ($id == 2) {
        $sql = $pdo->prepare('UPDATE incident SET status = ? WHERE id = ?');
        $sql->execute(['rate', $incident]);
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
            $mail->Subject = 'Votre incident a était réglé';
            $mail->Body = "<h1>Interventions échoué</h1><p>Votre incident n'a pas était réglé, le héros a échouer</p>
            <p> Notez le </p>
            <button><a href='https://kevin-bulte.fr/pages/presentation_hero.php?hero=$hero_id'>Notez</a></button>";
            $mail->AltBody = "Incident en cours";

            $mail->send();
                    header('location: ../pages/espace-perso.php?id=3');

        } catch (Exception $e) {
            $message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
        }

        header("Location: ../pages/espace-perso.php?id=1");
        exit();
    }

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}
