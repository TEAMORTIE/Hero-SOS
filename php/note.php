<?php 
include("session.php");

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Erreur : ' .$conn->connect_error);
}

if (isset($_POST['reputation']) && isset($_POST['hero'])) {
    $value = $_POST['reputation'];  
    $superhero = $_POST['hero'];          

    $stmt2 = $conn->prepare("SELECT * FROM hero WHERE id = ?");
    $stmt2->bind_param("i", $superhero); 
    $stmt2->execute();

    $result = $stmt2->get_result();
    $hero = $result->fetch_assoc();

    $avis = $hero["avis"];
    $nouveau_avis = $avis + 1;

    $ancienne_value = $hero['reputation'];
    $nouvelle_value = $ancienne_value + $value;

    $stmt = $conn->prepare("UPDATE hero SET reputation = ?, avis = ?  WHERE id = ?");
    $stmt->bind_param("iii", $nouvelle_value, $nouveau_avis, $superhero); 
    $stmt->execute();

    header("Location: ../pages/avis_poste.php");
   
    $stmt->close();
    $conn->close();
}
?>
