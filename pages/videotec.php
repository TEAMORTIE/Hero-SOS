<?php 
include("../php/session.php");
include("../php/header.php");


try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
$sql = "SELECT * FROM videotheque";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$films = $stmt->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM hero";
$stmt_hero = $pdo->prepare($sql);
$stmt_hero->execute();
$heros = $stmt_hero->fetchAll(PDO::FETCH_ASSOC);
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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
              <?php foreach ($heros as $hero): ?>
                <option value="<?php echo htmlspecialchars($hero['pseudo']); ?>">
                    <?php echo htmlspecialchars($hero['pseudo']); ?>
                </option>
             <?php endforeach; ?>
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
            <a href="videotec.php?id=1"><button class="ajouter"> Ajouter </button></a>
            <button class="supprimer"> Supprimer </button>
        </div>

        <div class="flex flex-wrap justify-center gap-4">
            <?php foreach ($films as $film): ?>
                    <div class="container-film">
                        <img class="photo-film" src="<?php echo htmlspecialchars($film['image']); ?>" alt="Affiche de <?php echo htmlspecialchars($film['titre']); ?>" />
                   <p><?php echo htmlspecialchars($film['titre']); ?></p>
                                      <p><?php echo htmlspecialchars($film['anne']); ?></p>

                    </div>

               
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
