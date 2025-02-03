<?php
include 'php/session.php';
include 'php/headerindex.php';

?><!DOCTYPE html>
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
    <!-- NavBar -->
    <div class="navbar">
      <a href="">
        <img class="logo1" src="../images/Logo-super-hero.png" alt="" />
      </a>
      <ul class="links">
        <li><a href="index.html">Accueil</a></li>
        <li><a href="declarer-un-incident">Déclarer un incident</a></li>
        <li><a href="comment-ca-marche">Comment ca marche ?</a></li>
      </ul>
      <div class="buttons">
        <a href="S'enregistrer.html" class="action-button pro">S'enregistrer</a>
        <a href="Se-connecter.html" class="action-button">Se connecter</a>
      </div>
      <div class="burger-menu-button">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>
    <div class="burger-menu">
      <ul class="links">
        <li><a href="index.html">Accueil</a></li>
        <li><a href="#">Déclarer un incident</a></li>
        <li><a href="#">Comment ca marche ?</a></li>
        <li>
          <input
            class="barre-recherche2"
            type="text"
            placeholder="Recherche"
            required
          />
        </li>
        <div class="divider"></div>
        <div class="buttons-burger-menu">
          <a href="Se-connecter.html" class="action-button pro"
            >S'enregistrer</a
          >
          <a href="S'enregistrer.html" class="action-button">Se connecter</a>
        </div>
      </ul>
    </div>

    <!-- Fin NavBar -->

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
          <button class="button">
            <p>Découvrez nos Heros</p>
          </button>
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
    <div class="your-slider">
      <!--        0eme film     -->
      <div>
        <p class="Text-presentation">Loki</p>
        <img
          class="Taille-image"
          src="https://mythicalcreatures.info/media/Norse-god-loki-2-1200x675.jpg"
          alt="Film 1"
        />
        <a href=""
          ><button class="boutton-back btn btn-secondary btn-hover">
            En savoir plus
          </button></a
        >
      </div>
      <!--        1er film     -->
      <div>
        <p class="Text-presentation">Thanos</p>
        <img
          class="Taille-image"
          src="https://media.gqmagazine.fr/photos/5e183bb99e475600085b06e9/master/pass/thanos-bebe-marvel.jpg"
          alt="Film 1"
        /><a href=""
          ><button class="boutton-back btn btn-secondary btn-hover">
            En savoir plus
          </button></a
        >
        <!-- <audio autoplay controls src="panther-rose.mp3"></audio> -->
      </div>
      <!--        2eme film     -->
      <div>
        <p class="Text-presentation">Scarlet Witch</p>
        <img
          class="Taille-image"
          src="https://static.wikia.nocookie.net/marvelstudios/images/8/8b/Scarlet_Witchn.webp/revision/latest?cb=20220608131607&path-prefix=fr"
          alt="Film 3"
        /><a href=""
          ><button class="boutton-back btn btn-secondary btn-hover">
            En savoir plus
          </button></a
        >
      </div>
      <!--        3eme film     -->
      <div>
        <p class="Text-presentation">Killmonger</p>
        <img
          class="Taille-image"
          src="https://www.serieously.com/app/uploads/2022/11/killmonger-2.jpg"
          alt="Film 4"
        /><a href=""
          ><button class="boutton-back btn btn-secondary btn-hover">
            En savoir plus
          </button></a
        >
        <!-- <audio autoplay controls src="La-grande-evasion.mp3"></audio> -->
      </div>
      <!--        4eme film     -->
      <div>
        <p class="Text-presentation">Hela</p>
        <img
          class="Taille-image"
          src="https://images.rtl.fr/~c/770v513/rtl/www/1319785-hela-la-deesse-de-la-mort-est-incarnee-par-cate-blanchett-dans-thor-ragnarok.jpg"
          alt="Film 5"
        /><a href=""
          ><button class="boutton-back btn btn-secondary btn-hover">
            En savoir plus
          </button></a
        >
      </div>
      <!--        5eme film     -->
      <div>
        <p class="Text-presentation">Ultron</p>
        <img
          class="Taille-image"
          src="https://preview.redd.it/r5d1f6eo003d1.jpeg?width=640&crop=smart&auto=webp&s=47d09228ae427eab8f29877bed4babfad35d82b9"
          alt="Film 6"
        /><a href=""
          ><button class="boutton-back btn btn-secondary btn-hover">
            En savoir plus
          </button></a
        >
      </div>
    </div>

    <!-- Fin Mode sombre clair -->

    <div class="scroll-container h-screen overflow-y-auto overflow-x-hidden">
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

    <!--  -->
    <section class="pt-16 pb-7 bg-gray-900">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div
          class="flex flex-col sm:flex-row items-center justify-between pb-14 border-b border-gray-500 gap-8"
        >
          <a href="#" class="">
            <img
              class="image-logo-footer"
              src="../images/Logo-super-hero.png"
            />
            <path
              d="M82.61 31C81.8665 31 81.1519 30.8851 80.4662 30.6554C79.7888 30.4256 79.1774 30.0933 78.6322 29.6585C78.0869 29.2318 77.6408 28.7149 77.2939 28.1077L80.0449 26.7538C80.301 27.2379 80.6603 27.5949 81.123 27.8246C81.5939 28.0626 82.0937 28.1815 82.6224 28.1815C83.242 28.1815 83.7955 28.0708 84.2829 27.8492C84.7704 27.6359 85.1462 27.3159 85.4106 26.8892C85.6832 26.4708 85.8113 25.9456 85.7948 25.3138V21.5354H86.1665V11.4308H88.7812V25.3631C88.7812 25.6995 88.7647 26.0195 88.7317 26.3231C88.7069 26.6349 88.6614 26.9385 88.5953 27.2338C88.3971 28.0954 88.017 28.801 87.4553 29.3508C86.8935 29.9087 86.1954 30.3231 85.361 30.5938C84.5349 30.8646 83.6179 31 82.61 31ZM82.3498 25.0923C81.1188 25.0923 80.0449 24.7846 79.1279 24.1692C78.2109 23.5538 77.5004 22.7169 76.9965 21.6585C76.4925 20.6 76.2405 19.4062 76.2405 18.0769C76.2405 16.7313 76.4925 15.5333 76.9965 14.4831C77.5087 13.4246 78.2315 12.5918 79.165 11.9846C80.0986 11.3692 81.1973 11.0615 82.4613 11.0615C83.7336 11.0615 84.7993 11.3692 85.6584 11.9846C86.5259 12.5918 87.1827 13.4246 87.6288 14.4831C88.0749 15.5415 88.2979 16.7395 88.2979 18.0769C88.2979 19.3979 88.0749 20.5918 87.6288 21.6585C87.1827 22.7169 86.5176 23.5538 85.6337 24.1692C84.7497 24.7846 83.6551 25.0923 82.3498 25.0923ZM82.8083 22.4338C83.6096 22.4338 84.254 22.2533 84.7414 21.8923C85.2371 21.5231 85.5965 21.0103 85.8195 20.3538C86.0509 19.6974 86.1665 18.9385 86.1665 18.0769C86.1665 17.2072 86.0509 16.4482 85.8195 15.8C85.5965 15.1436 85.2454 14.6349 84.7662 14.2738C84.2871 13.9046 83.6675 13.72 82.9074 13.72C82.1061 13.72 81.4452 13.9169 80.9247 14.3108C80.4042 14.6964 80.0201 15.2215 79.7723 15.8862C79.5244 16.5426 79.4005 17.2728 79.4005 18.0769C79.4005 18.8892 79.5203 19.6277 79.7599 20.2923C80.0077 20.9487 80.3836 21.4697 80.8875 21.8554C81.3915 22.241 82.0317 22.4338 82.8083 22.4338Z"
              fill="white"
            />
            <path
              d="M98.0928 25.0923C96.738 25.0923 95.5483 24.801 94.5239 24.2185C93.4995 23.6359 92.6982 22.8277 92.1199 21.7938C91.5499 20.76 91.2648 19.5703 91.2648 18.2246C91.2648 16.7723 91.5457 15.5128 92.1075 14.4462C92.6693 13.3713 93.45 12.5385 94.4496 11.9477C95.4492 11.3569 96.6058 11.0615 97.9193 11.0615C99.3072 11.0615 100.484 11.3856 101.451 12.0338C102.426 12.6738 103.149 13.5805 103.62 14.7538C104.091 15.9272 104.268 17.3097 104.152 18.9015H101.191V17.8185C101.183 16.3744 100.926 15.32 100.423 14.6554C99.9186 13.9908 99.1255 13.6585 98.0433 13.6585C96.8206 13.6585 95.9118 14.0359 95.317 14.7908C94.7222 15.5374 94.4248 16.6328 94.4248 18.0769C94.4248 19.4226 94.7222 20.4646 95.317 21.2031C95.9118 21.9415 96.7793 22.3108 97.9193 22.3108C98.6546 22.3108 99.2866 22.1508 99.8153 21.8308C100.352 21.5026 100.765 21.0308 101.055 20.4154L104.004 21.3015C103.492 22.4995 102.699 23.4308 101.625 24.0954C100.559 24.76 99.3816 25.0923 98.0928 25.0923ZM93.483 18.9015V16.6615H102.69V18.9015H93.483Z"
              fill="white"
            />
            <path
              d="M112.035 25.0923C110.804 25.0923 109.73 24.7846 108.813 24.1692C107.896 23.5538 107.186 22.7169 106.682 21.6585C106.178 20.6 105.926 19.4062 105.926 18.0769C105.926 16.7313 106.178 15.5333 106.682 14.4831C107.194 13.4246 107.917 12.5918 108.851 11.9846C109.784 11.3692 110.883 11.0615 112.147 11.0615C113.419 11.0615 114.485 11.3692 115.344 11.9846C116.211 12.5918 116.868 13.4246 117.314 14.4831C117.76 15.5415 117.983 16.7395 117.983 18.0769C117.983 19.3979 117.76 20.5918 117.314 21.6585C116.868 22.7169 116.203 23.5538 115.319 24.1692C114.435 24.7846 113.341 25.0923 112.035 25.0923ZM112.494 22.4338C113.295 22.4338 113.94 22.2533 114.427 21.8923C114.923 21.5231 115.282 21.0103 115.505 20.3538C115.736 19.6974 115.852 18.9385 115.852 18.0769C115.852 17.2072 115.736 16.4482 115.505 15.8C115.282 15.1436 114.931 14.6349 114.452 14.2738C113.973 13.9046 113.353 13.72 112.593 13.72C111.792 13.72 111.131 13.9169 110.61 14.3108C110.09 14.6964 109.706 15.2215 109.458 15.8862C109.21 16.5426 109.086 17.2728 109.086 18.0769C109.086 18.8892 109.206 19.6277 109.445 20.2923C109.693 20.9487 110.069 21.4697 110.573 21.8554C111.077 22.241 111.717 22.4338 112.494 22.4338ZM115.852 24.7231V15.3938H115.48V7H118.492V24.7231H115.852Z"
              fill="white"
            />
            <path
              d="M127.629 25.0923C126.291 25.0923 125.122 24.7928 124.122 24.1938C123.123 23.5949 122.346 22.7703 121.792 21.72C121.247 20.6615 120.975 19.4472 120.975 18.0769C120.975 16.6821 121.255 15.4595 121.817 14.4092C122.379 13.359 123.16 12.5385 124.159 11.9477C125.159 11.3569 126.316 11.0615 127.629 11.0615C128.976 11.0615 130.149 11.361 131.148 11.96C132.148 12.559 132.925 13.3877 133.478 14.4462C134.032 15.4964 134.308 16.7067 134.308 18.0769C134.308 19.4554 134.027 20.6738 133.466 21.7323C132.912 22.7826 132.136 23.6072 131.136 24.2062C130.136 24.7969 128.967 25.0923 127.629 25.0923ZM127.629 22.3108C128.819 22.3108 129.703 21.9169 130.281 21.1292C130.859 20.3415 131.148 19.3241 131.148 18.0769C131.148 16.7887 130.855 15.7631 130.269 15C129.682 14.2287 128.802 13.8431 127.629 13.8431C126.828 13.8431 126.167 14.0236 125.646 14.3846C125.134 14.7374 124.754 15.2338 124.506 15.8738C124.258 16.5056 124.135 17.24 124.135 18.0769C124.135 19.3651 124.428 20.3949 125.014 21.1662C125.609 21.9292 126.481 22.3108 127.629 22.3108Z"
              fill="white"
            />
            <path
              d="M146.048 24.7231V18.3231C146.048 17.9046 146.019 17.441 145.961 16.9323C145.903 16.4236 145.767 15.9354 145.552 15.4677C145.345 14.9918 145.031 14.6021 144.61 14.2985C144.197 13.9949 143.635 13.8431 142.925 13.8431C142.545 13.8431 142.169 13.9046 141.797 14.0277C141.425 14.1508 141.087 14.3641 140.781 14.6677C140.484 14.9631 140.244 15.3733 140.062 15.8985C139.881 16.4154 139.79 17.08 139.79 17.8923L138.018 17.1415C138.018 16.0092 138.237 14.9836 138.674 14.0646C139.121 13.1456 139.773 12.4154 140.632 11.8738C141.492 11.3241 142.549 11.0492 143.805 11.0492C144.796 11.0492 145.614 11.2133 146.258 11.5415C146.903 11.8697 147.415 12.2882 147.795 12.7969C148.175 13.3056 148.456 13.8472 148.638 14.4215C148.819 14.9959 148.935 15.5415 148.985 16.0585C149.042 16.5672 149.071 16.9815 149.071 17.3015V24.7231H146.048ZM136.766 24.7231V11.4308H139.43V15.5538H139.79V24.7231H136.766Z"
              fill="white"
            />
            <path
              d="M157.924 25.0923C156.569 25.0923 155.379 24.801 154.355 24.2185C153.33 23.6359 152.529 22.8277 151.951 21.7938C151.381 20.76 151.096 19.5703 151.096 18.2246C151.096 16.7723 151.377 15.5128 151.938 14.4462C152.5 13.3713 153.281 12.5385 154.281 11.9477C155.28 11.3569 156.437 11.0615 157.75 11.0615C159.138 11.0615 160.315 11.3856 161.282 12.0338C162.257 12.6738 162.98 13.5805 163.451 14.7538C163.921 15.9272 164.099 17.3097 163.983 18.9015H161.022V17.8185C161.014 16.3744 160.757 15.32 160.253 14.6554C159.75 13.9908 158.956 13.6585 157.874 13.6585C156.652 13.6585 155.743 14.0359 155.148 14.7908C154.553 15.5374 154.256 16.6328 154.256 18.0769C154.256 19.4226 154.553 20.4646 155.148 21.2031C155.743 21.9415 156.61 22.3108 157.75 22.3108C158.486 22.3108 159.118 22.1508 159.646 21.8308C160.183 21.5026 160.596 21.0308 160.885 20.4154L163.835 21.3015C163.323 22.4995 162.529 23.4308 161.455 24.0954C160.39 24.76 159.213 25.0923 157.924 25.0923ZM153.314 18.9015V16.6615H162.521V18.9015H153.314Z"
              fill="white"
            />
            <path
              d="M25.3903 11.8941C26.0298 12.5063 26.046 13.5149 25.4265 14.1468L19.6358 20.054C19.0163 20.686 17.9958 20.702 17.3563 20.0898C16.7168 19.4776 16.7006 18.469 17.3201 17.8371L23.1108 11.9299C23.7302 11.2979 24.7508 11.2819 25.3903 11.8941Z"
              fill="#63C7B2"
            />
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M0.988281 4.54673C0.988281 2.03564 3.04813 0 5.58908 0H22.4007V0.00124069C29.8076 0.0998525 35.7812 6.06429 35.7812 13.4075C35.7812 20.8123 29.707 26.8151 22.2142 26.8151C19.5426 26.8151 17.0513 26.0519 14.9515 24.7342L7.53745 31.9057C5.09813 34.2652 0.988281 32.5573 0.988281 29.1841V4.54673ZM12.4395 22.7055C10.0912 20.295 8.64721 17.0179 8.64721 13.4075C8.64721 12.5277 9.36896 11.8144 10.2593 11.8144C11.1496 11.8144 11.8714 12.5277 11.8714 13.4075C11.8714 19.0526 16.502 23.6288 22.2142 23.6288C27.9264 23.6288 32.557 19.0526 32.557 13.4075C32.557 7.76248 27.9264 3.18626 22.2142 3.18626H5.58908C4.82878 3.18626 4.21243 3.79536 4.21243 4.54673V29.1841C4.21243 29.7351 4.88376 30.014 5.28221 29.6286L12.4395 22.7055Z"
              fill="#63C7B2"
            />
          </a>

          <div class="flex items-center gap-4">
            <a
              href="javascript:;"
              class="p-3 rounded-full bg-white text-gray-700 group transition-all duration-500 hover:bg-amber-500 hover:text-white focus-within:outline-0 focus-within:bg-amber-500 focus-within:text-white"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
              >
                <path
                  d="M13.077 10.7339L13.4445 8.43347H11.1808V6.93821C11.1808 6.30919 11.4968 5.69455 12.5074 5.69455H13.5511V3.73561C12.9433 3.64013 12.3292 3.58847 11.7136 3.58105C9.8505 3.58105 8.63412 4.68453 8.63412 6.67941V8.43347H6.56885V10.7339H8.63412V16.298H11.1808V10.7339H13.077Z"
                  fill="currentColor"
                />
              </svg>
            </a>
            <a
              href="javascript:;"
              class="p-3 rounded-full bg-white text-gray-900 group transition-all duration-500 hover:bg-amber-500 hover:text-white focus-within:outline-0 focus-within:bg-amber-500 focus-within:text-white"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
              >
                <path
                  d="M7.7117 9.93956C7.7117 8.66117 8.76298 7.62456 10.0601 7.62456C11.3573 7.62456 12.4092 8.66117 12.4092 9.93956C12.4092 11.218 11.3573 12.2546 10.0601 12.2546C8.76298 12.2546 7.7117 11.218 7.7117 9.93956ZM6.44187 9.93956C6.44187 11.909 8.06177 13.5055 10.0601 13.5055C12.0585 13.5055 13.6784 11.909 13.6784 9.93956C13.6784 7.97012 12.0585 6.37367 10.0601 6.37367C8.06177 6.37367 6.44187 7.97012 6.44187 9.93956ZM12.9761 6.23228C12.976 6.3971 13.0256 6.55824 13.1184 6.69532C13.2113 6.83239 13.3433 6.93926 13.4978 7.00239C13.6523 7.06552 13.8223 7.08209 13.9863 7.05C14.1503 7.01791 14.301 6.93861 14.4193 6.82211C14.5377 6.70561 14.6182 6.55716 14.6509 6.39552C14.6836 6.23388 14.667 6.06632 14.603 5.91402C14.5391 5.76173 14.4307 5.63153 14.2917 5.53991C14.1527 5.44829 13.9892 5.39935 13.822 5.39928H13.8217C13.5975 5.39939 13.3825 5.48717 13.224 5.64336C13.0654 5.79954 12.9763 6.01136 12.9761 6.23228V6.23228ZM7.21337 15.5922C6.52637 15.5613 6.15296 15.4486 5.90481 15.3533C5.57583 15.2271 5.3411 15.0767 5.0943 14.8338C4.8475 14.591 4.69474 14.3598 4.56722 14.0356C4.47049 13.7912 4.35605 13.4231 4.32482 12.746C4.29066 12.014 4.28384 11.7941 4.28384 9.93962C4.28384 8.08512 4.29123 7.86584 4.32482 7.13323C4.35611 6.45617 4.47139 6.08878 4.56722 5.84362C4.6953 5.51939 4.84784 5.28806 5.0943 5.04484C5.34076 4.80162 5.57526 4.65106 5.90481 4.5254C6.15285 4.43006 6.52637 4.31728 7.21337 4.28651C7.95613 4.25284 8.17925 4.24612 10.0601 4.24612C11.9411 4.24612 12.1644 4.25339 12.9078 4.28651C13.5948 4.31734 13.9676 4.43095 14.2163 4.5254C14.5453 4.65106 14.7801 4.80195 15.0268 5.04484C15.2736 5.28773 15.4258 5.51939 15.5539 5.84362C15.6507 6.08806 15.7651 6.45617 15.7963 7.13323C15.8305 7.86584 15.8373 8.08512 15.8373 9.93962C15.8373 11.7941 15.8305 12.0134 15.7963 12.746C15.765 13.4231 15.65 13.7911 15.5539 14.0356C15.4258 14.3598 15.2733 14.5912 15.0268 14.8338C14.7804 15.0765 14.5453 15.2271 14.2163 15.3533C13.9683 15.4486 13.5948 15.5614 12.9078 15.5922C12.165 15.6258 11.9419 15.6326 10.0601 15.6326C8.1784 15.6326 7.9559 15.6258 7.21337 15.5922V15.5922ZM7.15503 3.03717C6.40489 3.07084 5.8923 3.18806 5.44465 3.35973C4.98105 3.53701 4.58859 3.77484 4.19641 4.16073C3.80423 4.54662 3.56352 4.93401 3.38364 5.39089C3.20945 5.83234 3.09051 6.33723 3.05635 7.07651C3.02162 7.81695 3.01367 8.05367 3.01367 9.93956C3.01367 11.8255 3.02162 12.0622 3.05635 12.8026C3.09051 13.542 3.20945 14.0468 3.38364 14.4882C3.56352 14.9448 3.80429 15.3327 4.19641 15.7184C4.58853 16.1041 4.98105 16.3416 5.44465 16.5194C5.89314 16.6911 6.40489 16.8083 7.15503 16.842C7.90675 16.8756 8.14655 16.884 10.0601 16.884C11.9737 16.884 12.2139 16.8762 12.9653 16.842C13.7155 16.8083 14.2277 16.6911 14.6756 16.5194C15.139 16.3416 15.5317 16.1043 15.9239 15.7184C16.3161 15.3325 16.5563 14.9448 16.7367 14.4882C16.9108 14.0468 17.0304 13.5419 17.064 12.8026C17.0981 12.0616 17.1061 11.8255 17.1061 9.93956C17.1061 8.05367 17.0981 7.81695 17.064 7.07651C17.0298 6.33717 16.9108 5.83206 16.7367 5.39089C16.5563 4.93428 16.3154 4.54723 15.9239 4.16073C15.5323 3.77423 15.139 3.53701 14.6762 3.35973C14.2277 3.18806 13.7154 3.07028 12.9658 3.03717C12.2145 3.00351 11.9743 2.99512 10.0607 2.99512C8.14712 2.99512 7.90675 3.00295 7.15503 3.03717Z"
                  fill="currentColor"
                />
              </svg>
            </a>
            <a
              href="javascript:;"
              class="p-3 rounded-full bg-white text-gray-700 group transition-all duration-500 hover:bg-amber-500 hover:text-white focus-within:outline-0 focus-within:bg-amber-500 focus-within:text-white"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
              >
                <path
                  d="M11.3214 8.93666L16.4919 3.05566H15.2667L10.7772 8.16205L7.19141 3.05566H3.05566L8.47803 10.7774L3.05566 16.9446H4.28097L9.022 11.552L12.8088 16.9446H16.9446L11.3211 8.93666H11.3214ZM9.64322 10.8455L9.09382 10.0765L4.72246 3.95821H6.60445L10.1322 8.8959L10.6816 9.66481L15.2672 16.083H13.3852L9.64322 10.8458V10.8455Z"
                  fill="currentColor"
                />
              </svg>
            </a>
            <a
              href="javascript:;"
              class="p-3 rounded-full bg-white text-gray-700 group transition-all duration-500 hover:bg-amber-500 hover:text-white focus-within:outline-0 focus-within:bg-amber-500 focus-within:text-white"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="20"
                height="20"
                viewBox="0 0 20 20"
                fill="none"
              >
                <path
                  fill-rule="evenodd"
                  clip-rule="evenodd"
                  d="M15.9326 5.13919C16.5664 5.31036 17.0646 5.80978 17.233 6.44286C17.5394 7.59178 17.5394 9.99044 17.5394 9.99044C17.5394 9.99044 17.5394 12.3891 17.233 13.538C17.0623 14.1734 16.5641 14.6729 15.9326 14.8417C14.7866 15.1489 10.1886 15.1489 10.1886 15.1489C10.1886 15.1489 5.59296 15.1489 4.44462 14.8417C3.81082 14.6705 3.31266 14.1711 3.14427 13.538C2.83789 12.3891 2.83789 9.99044 2.83789 9.99044C2.83789 9.99044 2.83789 7.59178 3.14427 6.44286C3.315 5.80744 3.81316 5.30801 4.44462 5.13919C5.59296 4.83203 10.1886 4.83203 10.1886 4.83203C10.1886 4.83203 14.7866 4.83203 15.9326 5.13919ZM12.539 9.99044L8.71982 12.2015V7.77936L12.539 9.99044Z"
                  fill="currentColor"
                />
              </svg>
            </a>
          </div>
        </div>
        <div
          class="py-14 flex flex-col lg:flex-row justify-between gap-8 border-b border-gray-500"
        >
          <div
            class="w-full max-lg:mx-auto flex flex-col sm:flex-row max-lg:items-center max-lg:justify-between gap-6 md:gap-12 lg:gap-24"
          >
            <div class="">
              <h6
                class="text-lg font-medium text-white mb-7 max-lg:text-center"
              >
                Pagedone
              </h6>
              <ul class="flex flex-col max-lg:items-center gap-6">
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal max-lg:text-center text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Accueil</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal max-lg:text-center text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                  >
                    Déclarer un incident</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal max-lg:text-center text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Comment ca marche ?</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal max-lg:text-center text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Se connecter</a
                  >
                </li>
              </ul>
            </div>
            <div class="">
              <h6
                class="text-lg font-medium text-white mb-7 max-lg:text-center"
              >
                Youpi
              </h6>
              <ul class="flex flex-col gap-6 max-lg:items-center">
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Figma</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Docs</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Responsive Blocks</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Library</a
                  >
                </li>
              </ul>
            </div>
            <div class="">
              <h6
                class="text-lg font-medium text-white mb-7 max-lg:text-center"
              >
                Resources
              </h6>
              <ul class="flex flex-col gap-6 max-lg:items-center">
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >FAQs</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Mentions légales</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Documentation</a
                  >
                </li>
                <li>
                  <a
                    href="javascript:;"
                    class="text-base font-normal text-gray-400 whitespace-nowrap transition-all duration-300 hover:text-amber-400 focus-within:outline-0 focus-within:text-amber-400"
                    >Utilisateur Guide</a
                  >
                </li>
              </ul>
            </div>
          </div>
          <div class="w-full lg:max-w-md max-lg:mx-auto">
            <h6 class="text-lg font-medium text-white mb-7">Newsletter</h6>
            <div class="bg-gray-800 rounded-3xl p-5">
              <form action="#" class="flex flex-col gap-5">
                <div class="relative">
                  <label
                    class="flex items-center mb-2 text-gray-400 text-base font-medium"
                    >Email
                  </label>
                  <input
                    type="text"
                    id="default-search"
                    class="block w-full px-5 py-3 text-lg font-normal shadow-xs text-white bg-transparent border border-gray-400 rounded-full placeholder-gray-400 focus:outline-none leading-relaxed focus-within:border-gray-300"
                    placeholder="HeroSOS@gmail.com"
                    required=""
                  />
                </div>
                <div
                  class="flex flex-col min-[540px]:flex-row items-center justify-between gap-3"
                >
                  <div class="flex items-start black">
                    <input
                      id="checked-checkbox"
                      type="checkbox"
                      value=""
                      class="w-5 h-5 aspect-square appearance-none cursor-pointer border border-gray-600 bg-transparent rounded-md mr-2 hover:border-gray-400 hover:bg-gray-900 checked:bg-no-repeat checked:bg-center checked:border-gray-400 checked:bg-gray-800"
                      checked=""
                    />
                    <label
                      for="checked-checkbox"
                      class="text-sm font-normal cursor-pointer text-gray-400"
                    >
                      Vous etes d'accord pour la
                      <a href="javascript:;" class="text-amber-500">Politque</a>
                      et
                      <a href="javascript:;" class="text-amber-500"
                        >Condition</a
                      ></label
                    >
                  </div>
                  <input
                    type="submit"
                    value="Send"
                    class="text-white text-base font-semibold py-3 px-7 rounded-full cursor-pointer bg-amber-500 transition-all duration-500 hover:bg-white hover:text-gray-900"
                  />
                </div>
              </form>
            </div>
          </div>
        </div>
        <div
          class="flex flex-col-reverse sm:flex-row items-center justify-between gap-5 pt-7"
        >
          <span class="text-sm font-normal text-gray-400">
            <a href="#" class="">@Heros SOS</a> 2025, All rights reserved.
          </span>
          <div class="relative text-gray-500 focus-within:text-gray-900">
            <div
              class="absolute inset-y-0 right-6 flex items-center pl-3 pointer-events-none"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="22"
                height="22"
                viewBox="0 0 22 22"
                fill="none"
              >
                <path
                  d="M16.8192 5.15193L17.3925 4.59395L17.3836 4.58478L17.3743 4.5759L16.8192 5.15193ZM19.25 10.9796L20.0499 10.9904L20.0501 10.9776L20.0499 10.9648L19.25 10.9796ZM16.8481 16.8192L17.4061 17.3925L17.4152 17.3836L17.4241 17.3743L16.8481 16.8192ZM11.0204 19.25L11.0096 20.0499L11.0224 20.0501L11.0352 20.0499L11.0204 19.25ZM5.1808 16.8481L4.60752 17.4061L4.61645 17.4152L4.62566 17.4241L5.1808 16.8481ZM2.75 11.0204L1.95007 11.0096L1.9499 11.0224L1.95014 11.0352L2.75 11.0204ZM5.15193 5.1808L4.59395 4.60752L4.58478 4.61645L4.5759 4.62566L5.15193 5.1808ZM10.9796 2.75L10.9904 1.95007L10.9776 1.9499L10.9648 1.95014L10.9796 2.75ZM6.46726 3.90057L5.90927 3.32729L5.90927 3.32729L6.46726 3.90057ZM9.1444 2.78389L9.15917 3.58376L9.1444 2.78389ZM2.77481 9.18508L1.97488 9.17427L2.77481 9.18508ZM3.87823 6.50244L3.30219 5.9473L3.87823 6.50244ZM3.90057 15.5327L4.47385 14.9748L4.47385 14.9748L3.90057 15.5327ZM2.78389 12.8556L3.58376 12.8408L2.78389 12.8556ZM9.18508 19.2252L9.17427 20.0251L9.17427 20.0251L9.18508 19.2252ZM6.50244 18.1218L7.05759 17.5457L7.05759 17.5457L6.50244 18.1218ZM15.5327 18.0994L14.9748 17.5262L14.9748 17.5262L15.5327 18.0994ZM12.8556 19.2161L12.8704 20.016L12.8704 20.016L12.8556 19.2161ZM19.2252 12.8149L20.0251 12.8257L20.0251 12.8257L19.2252 12.8149ZM18.1218 15.4976L17.5457 14.9424L17.5457 14.9424L18.1218 15.4976ZM18.0994 6.46726L18.6727 5.90927L18.6727 5.90927L18.0994 6.46726ZM19.2161 9.1444L20.016 9.12963L20.016 9.12963L19.2161 9.1444ZM15.4976 3.87823L16.0527 3.30219L16.0527 3.30219L15.4976 3.87823ZM12.8149 2.77481L12.8257 1.97488L12.8149 2.77481ZM7.47127 8.25477C7.47127 8.69659 7.82944 9.05477 8.27127 9.05477C8.7131 9.05477 9.07127 8.69659 9.07127 8.25477H7.47127ZM10.4489 13.3571C10.4489 13.7989 10.807 14.1571 11.2489 14.1571C11.6907 14.1571 12.0489 13.7989 12.0489 13.3571H10.4489ZM10.9753 15.6237C10.5335 15.6237 10.1753 15.9819 10.1753 16.4237C10.1753 16.8656 10.5335 17.2237 10.9753 17.2237V15.6237ZM11.0246 17.2237C11.4664 17.2237 11.8246 16.8656 11.8246 16.4237C11.8246 15.9819 11.4664 15.6237 11.0246 15.6237V17.2237ZM14.9424 4.45426L16.2641 5.72797L17.3743 4.5759L16.0527 3.30219L14.9424 4.45426ZM16.2459 5.70992L17.5262 7.02524L18.6727 5.90927L17.3925 4.59395L16.2459 5.70992ZM18.4162 9.15917L18.4501 10.9944L20.0499 10.9648L20.016 9.12963L18.4162 9.15917ZM18.4501 10.9688L18.4253 12.8041L20.0251 12.8257L20.0499 10.9904L18.4501 10.9688ZM17.5457 14.9424L16.272 16.2641L17.4241 17.3743L18.6978 16.0527L17.5457 14.9424ZM16.2901 16.2459L14.9748 17.5262L16.0907 18.6727L17.4061 17.3925L16.2901 16.2459ZM12.8408 18.4162L11.0056 18.4501L11.0352 20.0499L12.8704 20.016L12.8408 18.4162ZM11.0312 18.4501L9.19589 18.4253L9.17427 20.0251L11.0096 20.0499L11.0312 18.4501ZM7.05759 17.5457L5.73595 16.272L4.62566 17.4241L5.9473 18.6978L7.05759 17.5457ZM5.75408 16.2901L4.47385 14.9748L3.32729 16.0907L4.60752 17.4061L5.75408 16.2901ZM3.58376 12.8408L3.54986 11.0056L1.95014 11.0352L1.98403 12.8704L3.58376 12.8408ZM3.54993 11.0312L3.57474 9.19589L1.97488 9.17427L1.95007 11.0096L3.54993 11.0312ZM4.45426 7.05759L5.72797 5.73595L4.5759 4.62566L3.30219 5.9473L4.45426 7.05759ZM5.70992 5.75408L7.02524 4.47385L5.90927 3.32729L4.59395 4.60752L5.70992 5.75408ZM9.15917 3.58376L10.9944 3.54986L10.9648 1.95014L9.12963 1.98403L9.15917 3.58376ZM10.9688 3.54993L12.8041 3.57474L12.8257 1.97488L10.9904 1.95007L10.9688 3.54993ZM7.02524 4.47385C7.62182 3.89319 7.77674 3.76056 7.95015 3.68823L7.3342 2.21154C6.814 2.42853 6.41685 2.83325 5.90927 3.32729L7.02524 4.47385ZM9.12963 1.98403C8.42143 1.99711 7.8544 1.99456 7.3342 2.21154L7.95015 3.68823C8.12355 3.6159 8.32681 3.59913 9.15917 3.58376L9.12963 1.98403ZM3.57474 9.19589C3.58599 8.36346 3.60176 8.16013 3.67323 7.98637L2.19351 7.37774C1.97911 7.899 1.98446 8.46601 1.97488 9.17427L3.57474 9.19589ZM3.30219 5.9473C2.81067 6.45732 2.40792 6.85647 2.19351 7.37774L3.67323 7.98637C3.7447 7.81261 3.87656 7.65703 4.45426 7.05759L3.30219 5.9473ZM4.47385 14.9748C3.89319 14.3782 3.76056 14.2233 3.68823 14.0499L2.21154 14.6658C2.42853 15.186 2.83325 15.5831 3.32729 16.0907L4.47385 14.9748ZM1.98403 12.8704C1.99711 13.5786 1.99456 14.1456 2.21154 14.6658L3.68823 14.0499C3.6159 13.8764 3.59913 13.6732 3.58376 12.8408L1.98403 12.8704ZM9.19589 18.4253C8.36346 18.414 8.16013 18.3982 7.98637 18.3268L7.37774 19.8065C7.899 20.0209 8.46601 20.0155 9.17427 20.0251L9.19589 18.4253ZM5.9473 18.6978C6.45732 19.1893 6.85647 19.5921 7.37774 19.8065L7.98637 18.3268C7.81261 18.2553 7.65703 18.1234 7.05759 17.5457L5.9473 18.6978ZM14.9748 17.5262C14.3782 18.1068 14.2233 18.2394 14.0499 18.3118L14.6658 19.7885C15.186 19.5715 15.5831 19.1668 16.0907 18.6727L14.9748 17.5262ZM12.8704 20.016C13.5786 20.0029 14.1456 20.0054 14.6658 19.7885L14.0499 18.3118C13.8764 18.3841 13.6732 18.4009 12.8408 18.4162L12.8704 20.016ZM18.4253 12.8041C18.414 13.6365 18.3982 13.8399 18.3268 14.0136L19.8065 14.6223C20.0209 14.101 20.0155 13.534 20.0251 12.8257L18.4253 12.8041ZM18.6978 16.0527C19.1893 15.5427 19.5921 15.1435 19.8065 14.6223L18.3268 14.0136C18.2553 14.1874 18.1234 14.343 17.5457 14.9424L18.6978 16.0527ZM17.5262 7.02524C18.1068 7.62182 18.2394 7.77674 18.3118 7.95015L19.7885 7.3342C19.5715 6.814 19.1668 6.41685 18.6727 5.90927L17.5262 7.02524ZM20.016 9.12963C20.0029 8.42143 20.0054 7.8544 19.7885 7.3342L18.3118 7.95015C18.3841 8.12355 18.4009 8.32681 18.4162 9.15917L20.016 9.12963ZM16.0527 3.30219C15.5427 2.81067 15.1435 2.40792 14.6223 2.19351L14.0136 3.67323C14.1874 3.7447 14.343 3.87656 14.9424 4.45426L16.0527 3.30219ZM12.8041 3.57474C13.6365 3.58599 13.8399 3.60176 14.0136 3.67323L14.6223 2.19351C14.101 1.97911 13.534 1.98446 12.8257 1.97488L12.8041 3.57474ZM9.07127 8.25477C9.07127 7.5843 9.31892 7.13758 9.64994 6.84876C9.99678 6.54614 10.4843 6.37635 11 6.37635C11.5156 6.37635 12.0031 6.54614 12.35 6.84876C12.681 7.13758 12.9286 7.5843 12.9286 8.25477H14.5286C14.5286 7.13963 14.0941 6.24714 13.4019 5.64315C12.7255 5.05296 11.8486 4.77635 11 4.77635C10.1513 4.77635 9.27445 5.05296 8.59803 5.64315C7.90579 6.24714 7.47127 7.13963 7.47127 8.25477H9.07127ZM12.9286 8.25477C12.9286 8.74708 12.8136 9.04092 12.6698 9.26294C12.5041 9.51866 12.2833 9.71487 11.9452 10.0281C11.629 10.3209 11.2348 10.6979 10.9354 11.2419C10.6292 11.7985 10.4489 12.4766 10.4489 13.3571H12.0489C12.0489 12.7074 12.1785 12.3016 12.3372 12.0132C12.5029 11.7122 12.7286 11.4833 13.0324 11.202C13.3141 10.941 13.7133 10.5949 14.0126 10.1329C14.3337 9.63724 14.5286 9.03802 14.5286 8.25477H12.9286ZM10.9753 17.2237H11.0246V15.6237H10.9753V17.2237Z"
                  fill="#6B7280"
                />
              </svg>
            </div>
            <button
              type="button"
              id="default-search"
              class="block w-full lg:min-w-[448px] pr-12 pl-6 py-3 text-base font-normal shadow-xs text-gray-50 bg-transparent border border-gray-700 rounded-full placeholder-gray-400 focus:outline-none leading-relaxed transition-all duration-500"
            >
              Une question ?
            </button>
          </div>
        </div>
      </div>
    </section>

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

    <!-- JS Mode sombre clair -->

    <script>
      let darkmode = localStorage.getItem("darkmode");
      const themeSwitch = document.getElementById("theme-switch");

      const enableDarkmode = () => {
        document.body.classList.add("darkmode");
        localStorage.setItem("darkmode", "active");
      };

      const disableDarkmode = () => {
        document.body.classList.remove("darkmode");
        localStorage.setItem("darkmode", null);
      };

      if (darkmode === "active") enableDarkmode();

      themeSwitch.addEventListener("click", () => {
        darkmode = localStorage.getItem("darkmode");
        darkmode !== "active" ? enableDarkmode() : disableDarkmode();
      });
    </script>

    <!-- Fin JS Mode sombre clair -->

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

