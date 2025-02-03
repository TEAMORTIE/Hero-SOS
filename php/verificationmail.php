<?php
include("../php/session.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Inclure l'autoloader de Composer

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
$message = "";



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    if (empty($email))  {
        $message = "Remplissez tous les champs requis";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "L'email n'est pas valide.";
    }else {
        $sql_check_email = "SELECT * FROM user WHERE email = :email";
        $stmt_check_email = $pdo->prepare($sql_check_email);
        $stmt_check_email->execute(['email' => $email]);

        if ($stmt_check_email->rowCount() > 0) {
            
      
           
                $code_confirmation = random_int(100000, 999999);
                $_SESSION['email'] = $email;
                $_SESSION['code_confirmation'] = $code_confirmation;
                $mail = new PHPMailer(true);

                try {
                   
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'bultekevin07@gmail.com'; 
                    $mail->Password = 'avbg xefs iapp ghrb';   
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = 465;

                    $mail->setFrom('tonemail@gmail.com', 'HERO SOS');
                    $mail->addAddress($email, "$prenom $nom");

                    $mail->isHTML(true);
                    $mail->Subject = 'Votre code de changement de mot de passe HERO SOS';
                    $mail->Body    = "
                        <h1>VOUS ESSAYER DE CHANGER DE MOT DE PASSE</h1>
                        <p>Voici votre code de confirmation :</p>
                        <h2 style='color:blue;'>$code_confirmation</h2>
                        <p>Veuillez entrer ce code dans l'application pour confirmer la demande de changement de mot de passe</p>
                    ";
                    $mail->AltBody = "Voici votre code de confirmation : $code_confirmation";

                    $mail->send();
                    header("Location: ../pages/form_code.php");

                    exit();
                } catch (Exception $e) {
                    $message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
                }
            } 
        }  } 

?>



