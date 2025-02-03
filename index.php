<?php

include "php/session.php";
include "php/headerindex.php";
try {
  // Connexion à la base de données
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Préparation et exécution de la requête SQL
  $sql = $pdo->prepare('SELECT * FROM incident WHERE status = ? LIMIT 6');
  $sql->execute(['resolu']); // Paramètre pour le statut "résolu"

  // Récupération des résultats
  $incidents = $sql->fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
  // Log du message d'erreur si nécessaire (évite de l'afficher directement en production)
  die("Une erreur est survenue lors de la connexion à la base de données.");
}
 ?>

<!DOCTYPE html>
<html lang="fr">  
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles/style.css" />
    <link rel="icon" href="favicon-avengers.png" />
    <script type="text/javascript" src="" defer></script>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css"
    />

    <title>Hero SOS</title>
  </head>
  <body>

    <!-- Hero section -->
    <div class="banner">
      <div class="title">
        <svg
          class="svg-hero"
          width="320"
          height="320"
          viewBox="0 0 73 16"
          fill="none"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            class="svg-hero"
            d="M3.472 3.8V8.6L6.928 6.6V1.8L8.32 0.999999V12.2L6.928 13V8.2L3.472 10.2V15L2.08 15.8V4.6L3.472 3.8ZM6.928 8.2V13L5.536 12.2V7.4L6.928 8.2ZM8.32 0.999999L6.928 1.8L5.536 0.999999L6.928 0.199999L8.32 0.999999ZM6.928 1.8V6.6L5.536 5.8V0.999999L6.928 1.8ZM6.928 6.6L3.472 8.6L2.08 7.8L5.536 5.8L6.928 6.6ZM3.472 3.8L2.08 4.6L0.688 3.8L2.08 3L3.472 3.8ZM2.08 4.6V15.8L0.688 15V3.8L2.08 4.6ZM12.4876 6.36L15.2556 4.76C15.6183 4.54667 15.9383 4.52 16.2156 4.68C16.493 4.84 16.6316 5.13333 16.6316 5.56V7.96C16.6316 8.23733 16.5676 8.536 16.4396 8.856C16.3116 9.176 16.141 9.47467 15.9276 9.752C15.725 10.0187 15.501 10.2213 15.2556 10.36L13.8636 11.16C13.501 11.3733 13.181 11.4 12.9036 11.24C12.6263 11.08 12.4876 10.7867 12.4876 10.36V14.04L16.6316 11.64V13.24L12.4876 15.64C12.1143 15.8533 11.789 15.88 11.5116 15.72C11.2343 15.56 11.0956 15.2667 11.0956 14.84V8.76C11.0956 8.472 11.1596 8.17333 11.2876 7.864C11.4156 7.544 11.5863 7.25067 11.7996 6.984C12.013 6.70667 12.2423 6.49867 12.4876 6.36ZM15.2556 6.36L12.4876 7.96V10.36L15.2556 8.76V6.36ZM16.6316 11.64L12.4876 14.04L11.0956 13.24L15.2556 10.84L16.6316 11.64ZM15.2556 6.36V8.76L13.8636 7.96V5.56L15.2556 6.36ZM12.4876 10.36C12.4876 10.7867 12.6263 11.08 12.9036 11.24L11.5116 10.44C11.2343 10.28 11.0956 9.98667 11.0956 9.56L12.4876 10.36ZM15.2556 8.76L12.4876 10.36L11.0956 9.56L13.8636 7.96L15.2556 8.76ZM16.2156 4.68C15.9383 4.52 15.6183 4.54667 15.2556 4.76L12.4876 6.36C12.2423 6.49867 12.013 6.70667 11.7996 6.984C11.5863 7.25067 11.4156 7.544 11.2876 7.864C11.1596 8.17333 11.0956 8.472 11.0956 8.76V14.84C11.0956 15.2667 11.2343 15.56 11.5116 15.72L10.1196 14.92C9.84229 14.76 9.70363 14.4667 9.70363 14.04V7.96C9.70363 7.672 9.76763 7.37333 9.89563 7.064C10.0236 6.744 10.1943 6.45067 10.4076 6.184C10.621 5.90667 10.8503 5.69867 11.0956 5.56L13.8636 3.96C14.237 3.74667 14.5623 3.72 14.8396 3.88L16.2156 4.68ZM19.4081 7.8L20.8001 7V8.6L22.1761 7.8C22.1761 7.512 22.2401 7.21333 22.3681 6.904C22.4961 6.584 22.6668 6.29067 22.8801 6.024C23.0935 5.74667 23.3228 5.53867 23.5681 5.4L24.9441 4.6V6.2L23.5681 7C23.5681 7.27733 23.5041 7.576 23.3761 7.896C23.2481 8.216 23.0775 8.51467 22.8641 8.792C22.6508 9.05867 22.4215 9.26133 22.1761 9.4L20.8001 10.2V15L19.4081 15.8V7.8ZM19.4081 7.8V15.8L18.0161 15V7L19.4081 7.8ZM24.9441 4.6L23.5681 5.4C23.3228 5.53867 23.0935 5.74667 22.8801 6.024C22.6668 6.29067 22.4961 6.584 22.3681 6.904C22.2401 7.21333 22.1761 7.512 22.1761 7.8L20.8001 7C20.8001 6.712 20.8641 6.41333 20.9921 6.104C21.1201 5.784 21.2855 5.49067 21.4881 5.224C21.7015 4.94667 21.9308 4.73867 22.1761 4.6L23.5681 3.8L24.9441 4.6ZM22.1761 7.8L20.8001 8.6L19.4081 7.8L20.8001 7L22.1761 7.8ZM20.8001 7L19.4081 7.8L18.0161 7L19.4081 6.2L20.8001 7ZM28.4095 6.36L31.1775 4.76C31.5402 4.54667 31.8602 4.52 32.1375 4.68C32.4148 4.84 32.5535 5.13333 32.5535 5.56V11.64C32.5535 11.9173 32.4895 12.216 32.3615 12.536C32.2335 12.856 32.0628 13.1547 31.8495 13.432C31.6468 13.6987 31.4228 13.9013 31.1775 14.04L28.4095 15.64C28.0362 15.8533 27.7108 15.88 27.4335 15.72C27.1562 15.56 27.0175 15.2667 27.0175 14.84V8.76C27.0175 8.472 27.0815 8.17333 27.2095 7.864C27.3375 7.544 27.5082 7.25067 27.7215 6.984C27.9348 6.70667 28.1642 6.49867 28.4095 6.36ZM28.4095 14.04L31.1775 12.44V6.36L28.4095 7.96V14.04ZM31.1775 6.36V12.44L29.7855 11.64V5.56L31.1775 6.36ZM31.1775 12.44L28.4095 14.04L27.0175 13.24L29.7855 11.64L31.1775 12.44ZM32.1375 4.68C31.8602 4.52 31.5402 4.54667 31.1775 4.76L28.4095 6.36C28.1642 6.49867 27.9348 6.70667 27.7215 6.984C27.5082 7.25067 27.3375 7.544 27.2095 7.864C27.0815 8.17333 27.0175 8.472 27.0175 8.76V14.84C27.0175 15.2667 27.1562 15.56 27.4335 15.72L26.0415 14.92C25.7642 14.76 25.6255 14.4667 25.6255 14.04V7.96C25.6255 7.672 25.6895 7.37333 25.8175 7.064C25.9455 6.744 26.1162 6.45067 26.3295 6.184C26.5428 5.90667 26.7722 5.69867 27.0175 5.56L29.7855 3.96C30.1588 3.74667 30.4842 3.72 30.7615 3.88L32.1375 4.68ZM36.722 11.8C36.3487 12.0133 36.0233 12.04 35.746 11.88C35.4687 11.72 35.33 11.4267 35.33 11V9.4C35.33 9.112 35.394 8.81333 35.522 8.504C35.65 8.184 35.8207 7.89067 36.034 7.624C36.2473 7.34667 36.4767 7.13867 36.722 7L40.866 4.6V6.2L36.722 8.6V10.2L39.49 8.6C39.8527 8.38667 40.1727 8.36 40.45 8.52C40.7273 8.68 40.866 8.97333 40.866 9.4V11C40.866 11.2773 40.802 11.576 40.674 11.896C40.546 12.216 40.3753 12.5147 40.162 12.792C39.9593 13.0587 39.7353 13.2613 39.49 13.4L35.33 15.8V14.2L39.49 11.8V10.2L36.722 11.8ZM39.49 10.2V11.8L38.098 11V9.4L39.49 10.2ZM39.49 11.8L35.33 14.2L33.938 13.4L38.098 11L39.49 11.8ZM35.33 14.2V15.8L33.938 15V13.4L35.33 14.2ZM40.45 8.52C40.1727 8.36 39.8527 8.38667 39.49 8.6L36.722 10.2L35.33 9.4L38.098 7.8C38.4713 7.58667 38.7967 7.56 39.074 7.72L40.45 8.52ZM40.866 4.6L36.722 7C36.4767 7.13867 36.2473 7.34667 36.034 7.624C35.8207 7.89067 35.65 8.184 35.522 8.504C35.394 8.81333 35.33 9.112 35.33 9.4V11C35.33 11.4267 35.4687 11.72 35.746 11.88L34.354 11.08C34.0767 10.92 33.938 10.6267 33.938 10.2V8.6C33.938 8.312 34.002 8.01333 34.13 7.704C34.258 7.384 34.4287 7.09067 34.642 6.824C34.8553 6.54667 35.0847 6.33867 35.33 6.2L39.49 3.8L40.866 4.6ZM49.1908 10.2C48.8174 10.4133 48.4921 10.44 48.2148 10.28C47.9374 10.12 47.7988 9.82667 47.7988 9.4V5.56C47.7988 5.272 47.8628 4.97333 47.9908 4.664C48.1188 4.344 48.2894 4.05067 48.5028 3.784C48.7161 3.50667 48.9454 3.29867 49.1908 3.16L52.6468 1.16C53.0094 0.946666 53.3294 0.919999 53.6068 1.08C53.8948 1.24 54.0388 1.53333 54.0388 1.96V4.2L52.6468 5V2.76L49.1908 4.76V8.6L52.6468 6.6C53.0094 6.38667 53.3294 6.36 53.6068 6.52C53.8948 6.68 54.0388 6.97333 54.0388 7.4V11.24C54.0388 11.5173 53.9694 11.816 53.8308 12.136C53.7028 12.456 53.5321 12.7547 53.3188 13.032C53.1161 13.2987 52.8921 13.5013 52.6468 13.64L49.1908 15.64C48.8174 15.8533 48.4921 15.88 48.2148 15.72C47.9374 15.56 47.7988 15.2667 47.7988 14.84V13.24L49.1908 12.44V14.04L52.6468 12.04V8.2L49.1908 10.2ZM52.6468 8.2V12.04L51.2548 11.24V7.4L52.6468 8.2ZM52.6468 12.04L49.1908 14.04L47.7988 13.24L51.2548 11.24L52.6468 12.04ZM52.6468 2.76V5L51.2548 4.2V1.96L52.6468 2.76ZM49.1908 12.44L47.7988 13.24L46.4068 12.44L47.7988 11.64L49.1908 12.44ZM47.7988 13.24V14.84C47.7988 15.2667 47.9374 15.56 48.2148 15.72L46.8228 14.92C46.5454 14.76 46.4068 14.4667 46.4068 14.04V12.44L47.7988 13.24ZM53.6228 6.52C53.3348 6.36 53.0094 6.38667 52.6468 6.6L49.1908 8.6L47.7988 7.8L51.2548 5.8C51.6281 5.58667 51.9534 5.56 52.2308 5.72L53.6228 6.52ZM53.6228 1.08C53.3348 0.919999 53.0094 0.946666 52.6468 1.16L49.1908 3.16C48.9454 3.29867 48.7161 3.50667 48.5028 3.784C48.2894 4.05067 48.1188 4.344 47.9908 4.664C47.8628 4.97333 47.7988 5.272 47.7988 5.56V9.4C47.7988 9.82667 47.9374 10.12 48.2148 10.28L46.8228 9.48C46.5454 9.32 46.4068 9.02667 46.4068 8.6V4.76C46.4068 4.472 46.4708 4.17333 46.5988 3.864C46.7268 3.544 46.8974 3.25067 47.1108 2.984C47.3241 2.70667 47.5534 2.49867 47.7988 2.36L51.2548 0.36C51.6281 0.146666 51.9534 0.119999 52.2308 0.28L53.6228 1.08ZM58.2064 3.16L61.6624 1.16C62.025 0.946666 62.345 0.919999 62.6224 1.08C62.9104 1.24 63.0544 1.53333 63.0544 1.96V11.24C63.0544 11.5173 62.985 11.816 62.8464 12.136C62.7184 12.456 62.5477 12.7547 62.3344 13.032C62.1317 13.2987 61.9077 13.5013 61.6624 13.64L58.2064 15.64C57.833 15.8533 57.5077 15.88 57.2304 15.72C56.953 15.56 56.8144 15.2667 56.8144 14.84V5.56C56.8144 5.272 56.8784 4.97333 57.0064 4.664C57.1344 4.344 57.305 4.05067 57.5184 3.784C57.7317 3.50667 57.961 3.29867 58.2064 3.16ZM58.2064 14.04L61.6624 12.04V2.76L58.2064 4.76V14.04ZM61.6624 2.76V12.04L60.2704 11.24V1.96L61.6624 2.76ZM61.6624 12.04L58.2064 14.04L56.8144 13.24L60.2704 11.24L61.6624 12.04ZM62.6384 1.08C62.3504 0.919999 62.025 0.946666 61.6624 1.16L58.2064 3.16C57.961 3.29867 57.7317 3.50667 57.5184 3.784C57.305 4.05067 57.1344 4.344 57.0064 4.664C56.8784 4.97333 56.8144 5.272 56.8144 5.56V14.84C56.8144 15.2667 56.953 15.56 57.2304 15.72L55.8384 14.92C55.561 14.76 55.4224 14.4667 55.4224 14.04V4.76C55.4224 4.472 55.4864 4.17333 55.6144 3.864C55.7424 3.544 55.913 3.25067 56.1264 2.984C56.3397 2.70667 56.569 2.49867 56.8144 2.36L60.2704 0.36C60.6437 0.146666 60.969 0.119999 61.2464 0.28L62.6384 1.08ZM67.222 10.2C66.8487 10.4133 66.5233 10.44 66.246 10.28C65.9687 10.12 65.83 9.82667 65.83 9.4V5.56C65.83 5.272 65.894 4.97333 66.022 4.664C66.15 4.344 66.3207 4.05067 66.534 3.784C66.7473 3.50667 66.9767 3.29867 67.222 3.16L70.678 1.16C71.0407 0.946666 71.3607 0.919999 71.638 1.08C71.926 1.24 72.07 1.53333 72.07 1.96V4.2L70.678 5V2.76L67.222 4.76V8.6L70.678 6.6C71.0407 6.38667 71.3607 6.36 71.638 6.52C71.926 6.68 72.07 6.97333 72.07 7.4V11.24C72.07 11.5173 72.0007 11.816 71.862 12.136C71.734 12.456 71.5633 12.7547 71.35 13.032C71.1473 13.2987 70.9233 13.5013 70.678 13.64L67.222 15.64C66.8487 15.8533 66.5233 15.88 66.246 15.72C65.9687 15.56 65.83 15.2667 65.83 14.84V13.24L67.222 12.44V14.04L70.678 12.04V8.2L67.222 10.2ZM70.678 8.2V12.04L69.286 11.24V7.4L70.678 8.2ZM70.678 12.04L67.222 14.04L65.83 13.24L69.286 11.24L70.678 12.04ZM70.678 2.76V5L69.286 4.2V1.96L70.678 2.76ZM67.222 12.44L65.83 13.24L64.438 12.44L65.83 11.64L67.222 12.44ZM65.83 13.24V14.84C65.83 15.2667 65.9687 15.56 66.246 15.72L64.854 14.92C64.5767 14.76 64.438 14.4667 64.438 14.04V12.44L65.83 13.24ZM71.654 6.52C71.366 6.36 71.0407 6.38667 70.678 6.6L67.222 8.6L65.83 7.8L69.286 5.8C69.6593 5.58667 69.9847 5.56 70.262 5.72L71.654 6.52ZM71.654 1.08C71.366 0.919999 71.0407 0.946666 70.678 1.16L67.222 3.16C66.9767 3.29867 66.7473 3.50667 66.534 3.784C66.3207 4.05067 66.15 4.344 66.022 4.664C65.894 4.97333 65.83 5.272 65.83 5.56V9.4C65.83 9.82667 65.9687 10.12 66.246 10.28L64.854 9.48C64.5767 9.32 64.438 9.02667 64.438 8.6V4.76C64.438 4.472 64.502 4.17333 64.63 3.864C64.758 3.544 64.9287 3.25067 65.142 2.984C65.3553 2.70667 65.5847 2.49867 65.83 2.36L69.286 0.36C69.6593 0.146666 69.9847 0.119999 70.262 0.28L71.654 1.08Z"
            fill="white"
          />
        </svg>
      </div>
    </div>
    <div class="encadrement-card">
      <div class="card">
        <h1 class="titre-card">Héros en action :</h1>
        <p class="paragraphe-card">
          L'univers Marvel est un monde peuplé de héros et de vilains aux
          pouvoirs extraordinaires, qui luttent pour la justice ou cherchent à
          imposer leur volonté. Parmi les figures emblématiques de cet univers,
          on retrouve des personnages aux origines variées, mais chacun porte en
          lui une histoire unique.
        </p>
        <div class="boutton-a">
          <a href="pages/hero.php">
          <button class="button">
            <p>Découvrez nos Heros</p>
          </button>
          </a>
        </div>
      </div>
    </div>

    <!--  -->

    <div class="caroussel1">
      <div class="caroussel">
        <div class="wrap">
          <img class="image-caroussel" src="../images/spiderman.webp" />
          <img class="image-caroussel" src="../images/hawkeye.png" />
          <img class="image-caroussel" src="../images/venom.png" />
          <img class="image-caroussel" src="../images/iron-man.png" />
          <img
            class="image-caroussel"
            src="../images/black-widow-marvel-png-images-28-removebg-preview.png"
          />
          <img class="image-caroussel" src="../images/wolerine.png" />
          <img class="image-caroussel" src="../images/ghost.png" />
          <!-- Duplication des images -->
          <img class="image-caroussel" src="../images/spiderman.webp" />
          <img class="image-caroussel" src="../images/hawkeye.png" />
          <img class="image-caroussel" src="../images/venom.png" />
          <img class="image-caroussel" src="../images/iron-man.png" />
          <img
            class="image-caroussel"
            src="../images/black-widow-marvel-png-images-28-removebg-preview.png"
          />
          <img class="image-caroussel" src="../images/wolerine.png" />
          <img class="image-caroussel" src="../images/ghost.png" />
        </div>
      </div>
    </div>

    <!-- Titre Nouveautés -->
    <div class="titre-new">
      <h4 class="Titre-nouveautes">Derniers incidents traités et réussis :</h4>
    </div>
    <!-- Caroussel présentation des films -->
     
     <?php
      if (!empty($incidents)) {
        echo '<div class="your-slider">';
        foreach ($incidents as $incident) {
            echo '<div>';
            echo '<table class="table-auto border w-full">';
            echo '<thead>';
            echo '<tr><th class="px-4 border text-white py-2 text-center">Incident</th><th class="px-4 py-2 border text-white text-center">Vilan</th></tr>';
            echo '</thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td class="px-4 py-2 border text-white text-center text-2xl">' . htmlspecialchars($incident['type']) . '</td>';
            echo '<td class="px-4 py-2 border text-white text-center text-2xl">' . htmlspecialchars($incident['vilain']) . '</td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '<p class="text-center text-green-800 text-2xl" style="font-weight: bolder;"> ' . htmlspecialchars($incident['status']) . '</p>';
            echo '</div>';
        }
        echo '</div>';
    }
     ?>


    

    <!-- Fin Mode sombre clair -->

    <div class=" overflow-y-auto overflow-x-hidden">
      <!-- Section 1 -->
      <section
        class="scroll-section relative h-screen flex flex-col md:flex-row"
      >
        <!-- Left content -->
        <div
          class="w-full md:w-1/2 h-1/2 md:h-full relative overflow-hidden group shine-effect"
        >
          <img
            src="https://cdn2.unrealengine.com/marvel-rivals-best-heroes-characters-overview-guide-3840x2160-ac30ddeac81e.jpg"
            alt="Architectural detail"
            class="absolute inset-0 w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-r from-neutral-950/70 to-neutral-950/50 transition-opacity duration-500 group-hover:opacity-0"
          ></div>
        </div>
        <!-- Right content -->
        <div
          class="w-full md:w-1/2 h-1/2 md:h-full flex items-center justify-center p-8 bg-neutral-950"
        >
          <div class="max-w-lg float-animation">
            <span class="text-neutral-400 tracking-wider text-sm font-mono"
              >01 / VISION</span
            >
            <h2
              class="mt-4 text-5xl md:text-7xl font-bold leading-none bg-gradient-to-r from-white to-neutral-400 bg-clip-text text-transparent"
            >
              Comment ca marche ?
            </h2>
            <p class="mt-6 text-neutral-400 text-lg leading-relaxed">
              Bienvenue sur Hero SOS, votre destination numérique pour
              l'innovation et la performance ! Hero SOS est une plateforme en
              ligne conçue pour simplifier et optimiser votre expérience
              digitale. Que vous soyez un professionnel à la recherche de
              solutions technologiques avancées ou un particulier curieux de
              découvrir les dernières tendances.
            </p>
            <button
              class="super-classe mt-8 px-6 py-3 bg-white/10 hover:bg-white/20 rounded-full text-sm font-medium transition-all duration-300 hover:tracking-wider"
            >
              Découvrez notre site →
            </button>
          </div>
        </div>
      </section>

      <!-- Section 2 -->
      <section
        class="scroll-section relative h-screen flex flex-col md:flex-row"
      >
        <!-- Right content -->
        <div
          class="w-full md:w-1/2 h-1/2 md:h-full flex items-center justify-center p-8 bg-neutral-900"
        >
          <div class="max-w-lg float-animation">
            <span class="text-neutral-400 tracking-wider text-sm font-mono"
              >02 / VISION</span
            >
            <h2
              class="mt-4 text-5xl md:text-7xl font-bold leading-none bg-gradient-to-r from-white to-neutral-400 bg-clip-text text-transparent"
            >
              Déclarer un incident
            </h2>
            <p class="mt-6 text-neutral-400 text-lg leading-relaxed">
              Un soir, sur le pont de George Washington, Peter Parker, alias
              Spider-Man, se retrouve face au Green Goblin, Norman Osborn. Dans
              une lutte désespérée, Gwen Stacy, l'amour de sa vie, tombe dans le
              vide. La corde se brise, et dans un instant cruel, elle meurt.
            </p>
            <button
              class="super-classe mt-8 px-6 py-3 bg-white/10 hover:bg-white/20 rounded-full text-sm font-medium transition-all duration-300 hover:tracking-wider"
            >
              Déclarer un incident →
            </button>
          </div>
        </div>
        <!-- Left content -->
        <div
          class="w-full md:w-1/2 h-1/2 md:h-full relative overflow-hidden group shine-effect"
        >
          <img
            src="https://images.rtl.fr/~c/2000v2000/rtl/www/1615214-marvel-s-spider-man-2-disponible-le-20-octobre-2023.jpg"
            alt="Urban landscape"
            class="absolute inset-0 w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-l from-neutral-950/70 to-neutral-950/50 transition-opacity duration-500 group-hover:opacity-0"
          ></div>
        </div>
      </section>

      <!-- Section 3 -->
      <section
        class="scroll-section relative h-screen flex flex-col md:flex-row"
      >
        <!-- Left content -->
        <div
          class="w-full md:w-1/2 h-1/2 md:h-full relative overflow-hidden group shine-effect"
        >
          <img
            src="https://yt3.googleusercontent.com/P_qIGe_-Jt5V4JT_UtIuURsq9RBRDIZ88tvFJx1AzACWzsuRIrrOfb6jDH2OnoukFdS06AN5nQ=s900-c-k-c0x00ffffff-no-rj"
            alt="Minimalist interior"
            class="absolute inset-0 w-full h-full object-cover transition-all duration-1000 group-hover:scale-110 group-hover:rotate-1"
          />
          <div
            class="absolute inset-0 bg-gradient-to-r from-neutral-950/70 to-neutral-950/50 transition-opacity duration-500 group-hover:opacity-0"
          ></div>
        </div>
        <!-- Right content -->
        <div
          class="w-full md:w-1/2 h-1/2 md:h-full flex items-center justify-center p-8 bg-neutral-950"
        >
          <div class="max-w-lg float-animation">
            <span class="text-neutral-400 tracking-wider text-sm font-mono"
              >03 / VISION</span
            >
            <h2
              class="mt-4 text-5xl md:text-7xl font-bold leading-none bg-gradient-to-r from-white to-neutral-400 bg-clip-text text-transparent"
            >
              Videotheque
            </h2>
            <p class="mt-6 text-neutral-400 text-lg leading-relaxed">
              Bienvenue sur Heros SOS : Votre univers Marvel à portée de clic
              Plongez dans un monde où l'action, l'aventure et les super-héros
              prennent vie. Heros SOS est votre nouvelle plateforme de streaming
              dédiée exclusivement aux films et séries Marvel.
            </p>
            <button
              class="super-classe mt-8 px-6 py-3 bg-white/10 hover:bg-white/20 rounded-full text-sm font-medium transition-all duration-300 hover:tracking-wider"
            >
              Découvrir nos films →
            </button>
          </div>
        </div>
      </section>

      <!-- Navigation dots -->
      <div
        class="fixed right-8 top-1/2 -translate-y-1/2 flex flex-col gap-4 z-50"
      >
        <button
          onclick="scrollToSection(0)"
          class="w-3 h-3 rounded-full bg-white/20 hover:bg-white transition-colors hover:scale-150"
          title="Go to section 1"
        ></button>
        <button
          onclick="scrollToSection(1)"
          class="w-3 h-3 rounded-full bg-white/20 hover:bg-white transition-colors hover:scale-150"
          title="Go to section 2"
        ></button>
        <button
          onclick="scrollToSection(2)"
          class="w-3 h-3 rounded-full bg-white/20 hover:bg-white transition-colors hover:scale-150"
          title="Go to section 3"
        ></button>
      </div>
    </div>

    <?php include ("php/footerindex.php") ?>
    <script>
      const container = document.querySelector(".scroll-container");
      const sections = document.querySelectorAll(".scroll-section");
      const dots = document.querySelectorAll(".fixed.right-8 button");
      let isScrolling = false;

      function scrollToSection(index) {
        if (!isScrolling) {
          isScrolling = true;
          sections[index].scrollIntoView({ behavior: "smooth" });
          updateDots(index);
          setTimeout(() => {
            isScrolling = false;
          }, 1000);
        }
      }

      function updateDots(index) {
        dots.forEach((dot, i) => {
          dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${
            i === index
              ? "bg-white scale-150"
              : "bg-white/20 hover:bg-white hover:scale-150"
          }`;
        });
      }

      // Update dots on scroll
      container.addEventListener("scroll", () => {
        const index = Math.round(container.scrollTop / window.innerHeight);
        updateDots(index);
      });

      // Initialize first dot
      updateDots(0);
    </script>


    <!-- JS NavBar -->

    <script>
      const burgerMenuButton = document.querySelector(".burger-menu-button");
      const burgerMenuButtonIcon = document.querySelector(
        ".burger-menu-button i"
      );
      const burgerMenu = document.querySelector(".burger-menu");

      burgerMenuButton.onclick = function () {
        burgerMenu.classList.toggle("open");
        const isOpen = burgerMenu.classList.contains("open");
        burgerMenuButtonIcon.classList = isOpen
          ? "fa-solid fa-xmark"
          : "fa-solid fa-bars";
      };
    </script>

    <!-- Fin JS NavBar -->

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>

    <style>
      .slick-slide {
        margin: 0 15px;
      }
      .slick-center .slick-slide {
        
        background: cadetblue;
        transform: scale(1.1);
        transition: transform 0.3s ease;
      }
    </style>

    <!-- Script Slick -->
    <script>
      $(document).ready(function () {
        $(".your-slider").slick({
          centerMode: true,
          slidesToShow: 4,
          autoplay: true,
          autoplaySpeed: 800,
          arrows: false,
          focusOnSelect: true,
          responsive: [
            {
              breakpoint: 768, // Moins de 768px, 1 slide
              settings: {
                slidesToShow: 1,
                centerMode: true,
              },
            },
            {
              breakpoint: 480, // Moins de 480px, 1 slide
              settings: {
                slidesToShow: 1,
                centerMode: true,
              },
            },
          ],
        });
      });
    </script>
  </body>
</html>
