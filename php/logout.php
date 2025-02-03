<?php
session_start(); // Démarrer la session

// Vérifiez si une session est active, puis détruisez-la
if (isset($_SESSION['user_id'])) {
    // Détruire toutes les variables de session
    session_unset();

    // Détruire la session
    session_destroy();
}

// Rediriger l'utilisateur vers la page de connexion ou d'accueil
header("Location: ../index.php"); // Remplacez par la page vers laquelle vous voulez rediriger
exit();
?>
