<?php 
include("../php/session.php");
include("../php/header.php");

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../styles/videotec.css">

    <title>Video-Tec</title>
</head>
<body>
<main>

    <?php
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
?>

    <?php if ($id === 1): ?>

        <form action="../php/traitement_videotec.php" method="POST" enctype="multipart/form-data">
    <p class="ajt_film">Ajouter un film</p>

    <label for="title">Titre du film :</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="hero">Héros :</label>
    <select id="hero" name="hero" required>
        <option value="spider">Spider-Man</option>
        <option value="batman">Batman</option>
        <option value="superman">Superman</option>
        <option value="ironman">Iron Man</option>
    </select>

    <div class="espace_form"></div>

    <label for="release_year">Année de sortie :</label>
    <input type="number" id="release_year" name="release_year" required>

    <div class="espace_form"></div>

    <label for="image">Affiche du film :</label>
    <input type="file" id="image" name="image" accept="image/*" required>

    <div class="espace_form"></div>

    <button class="ajouter_film" type="submit">Ajouter le film</button>
</form>

    <?php else: ?>
        <div class="container-button">
            <a href="videotec.php?id=1" ><button class="ajouter"> Ajouter </button></a>
            <button class="supprimer" > Supprimer </button>
        </div>
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-10 col-md-12 col-lg-3 mb-4">
                        <div class="card">
                            <img src="../images/captain-video.jpg" class="card-img-top" alt="Exemple d'image">
                            <div class="card-body">
                                <p class="card-text">
                                    Les aventures de Captain
                                </p>
                                <a href="#" class="btn btn-primary d-flex align-items-center">
                                    Voir plus
                                    <span class="material-symbols-outlined ms-2">arrow_right_alt</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-12 col-lg-3 mb-4">
                        <div class="card">
                            <img src="../images/captain-hulk.jpg" class="card-img-top" alt="Exemple d'image">
                            <div class="card-body">
                                <p class="card-text">
                                    Captain et Hulk
                                </p>
                                <a href="#" class="btn btn-primary d-flex align-items-center">
                                    Voir plus
                                    <span class="material-symbols-outlined ms-2">arrow_right_alt</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-12 col-lg-3 mb-4">
                        <div class="card">
                            <img src="../images/avengers.jpg" class="card-img-top" alt="Exemple d'image">
                            <div class="card-body">
                                <p class="card-text">
                                    Captain et les Avengers
                                </p>
                                <a href="#" class="btn btn-primary d-flex align-items-center">
                                    Voir plus
                                    <span class="material-symbols-outlined ms-2">arrow_right_alt</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
