<?php
include("../php/session.php");

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

$user_id = $_SESSION['user_id'] ?? null;

$message = "";

$sql = "SELECT * FROM user WHERE id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    $message = "Utilisateur non trouvé.";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numero_portable = $_POST['numero_portable'];
    $rue = $_POST['rue'];
    $complement_adresse = $_POST['complement_adresse'];
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];   
    $pays = $_POST['pays'];


    if (empty($email) || empty($rue) || empty($code_postal) || empty($ville) || empty($pays) || empty($numero_portable) || empty($nom) || empty($prenom)) {
        $message = "Remplissez tous les champs requis.";
    } else {
        // Mettre à jour les informations dans la base de données
        $sql = "UPDATE user SET email = :email, prenom = :prenom, nom = :nom, rue = :rue, complement_adresse = :complement_adresse, 
                code_postal = :code_postal, ville = :ville, pays = :pays, numero_portable = :numero_portable 
                WHERE id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':rue', $rue);
        $stmt->bindParam(':complement_adresse', $complement_adresse);
        $stmt->bindParam(':code_postal', $code_postal);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':pays', $pays);
        $stmt->bindParam(':numero_portable', $numero_portable);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            header("Location: ../pages/compte_mis_a_jour.html");
            exit();
        } else {
            $message = "Erreur lors de la mise à jour du profil. Veuillez réessayer.";
        }
    }
}
echo $message;
$pdo = null; // Fermer la connexion
?>