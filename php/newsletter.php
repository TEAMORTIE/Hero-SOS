<?php 
include("session.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Inclure l'autoloader de Composer

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die('Erreur : ' .$conn->connect_error);
    
}

if (!$conn->set_charset("utf8mb4")) {
    die("Erreur lors du réglage de l'encodage : " . $conn->error);
}
    $email = $_POST["email"];
    $non = $_POST["deinscription"];

if ($non == "1") {

    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("i", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $newsletter = $user['newsletter'];
    $inscription = 0;



    $stmt = $conn->prepare("UPDATE user SET newsletter = ? WHERE email = ?");
    $stmt->bind_param("is", $inscription, $email);
    $stmt->execute();

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
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Desabonnement Newsletter';
        $mail->Body = "<h1>Vous êtes Désabonnement de la newsletter</h1>
<p>Vous venez de vous Désabonnement de la newsletter vous ne recevrais plus d'information pratique de notre part</p>
<p>Cordialement Heros SOS</p>
";
        $mail->AltBody = "Désabonnement";

        $mail->send();

        header("Location: ../pages/inscription_newsletter.html");


    } catch (Exception $e) {
        $message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }




} else {



    $stmt = $conn->prepare("SELECT * FROM user WHERE email = ?");
    $stmt->bind_param("i", $email);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $newsletter = $user['newsletter'];
    $inscription = 1;



    $stmt = $conn->prepare("UPDATE user SET newsletter = ? WHERE email = ?");
    $stmt->bind_param("is", $inscription, $email);
    $stmt->execute();

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
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Inscription Newsletter';
        $mail->Body = "<h1>Vous êtes inscrit a la newsletter</h1>
<p>Merci pour votre inscription a la newsletter</p>
<p>Vous allez maintenant recevoir des mails pour chaque offre, mise a jour, évenements</p>

<p>Cordialement Heros SOS</p>
";
        $mail->AltBody = ">Merci pour votre inscription a la newsletter";

        $mail->send();

        header("Location: ../pages/inscription_newsletter.html");


    } catch (Exception $e) {
        $message = "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}

?>