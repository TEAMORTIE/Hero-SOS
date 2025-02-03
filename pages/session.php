<?php 
session_start(); 

$servername = 'localhost:3306';  
$username = 'wega3918_admin';
$password = 'keke0703';
$dbname = 'wega3918_hero_sos';
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die('Erreur : ' .$conn->connect_error);
    
}

if (!$conn->set_charset("utf8mb4")) {
    die("Erreur lors du réglage de l'encodage : " . $conn->error);
}
if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $sql = "SELECT prenom, nom, date_de_naissance, email, create_time, date_verification, rue, code_postal, ville, pays, role, verification, image, complement_adresse, numero_portable FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($prenom, $nom, $date, $email, $create_time, $date_verification, $rue, $code_postal, $ville, $pays, $role, $verification, $image, $complement, $numero_portable);	
    $stmt->fetch();
    $stmt->close();

    $_SESSION["role"] = $role;
    $_SESSION["prenom"] = $prenom;
    $_SESSION["email"] = $email;
    $_SESSION["nom"] = $nom;
    $_SESSION["date"] = $date;
    $_SESSION["create_time"] = $create_time;
    $_SESSION["date_verification"] = $date_verification;
    $_SESSION["rue"] = $rue;
    $_SESSION["code_postal"] = $code_postal;
    $_SESSION["ville"] = $ville;
    $_SESSION["pays"] = $pays;
    $_SESSION["verification"] = $verification;
    $_SESSION["image"] = $image;
    $_SESSION["complement"] = $complement;
    $_SESSION["numero_portable"] = $numero_portable;
    if ($role == 'hero') {
    $sql = "SELECT id, pseudo, competence, bio, villains_capturer, reputation, total_interventions, citizens_saved, movies_count, incident FROM hero WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id);
    $stmt->execute();
    
    $stmt->bind_result($hero_id, $pseudo, $competence, $bio, $villains_capturer, $reputation, $total_interventions, $citizens_saved, $movies_count, $incident);
    
    $stmt->fetch();
    $stmt->close();
}


}
$conn->close(); ?>