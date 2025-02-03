<?php

include("../php/session.php");
include("../php/header.php");

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Les Super-Vilans - Heros SOS</title>
    <link rel="stylesheet" href="../styles/vilan.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" href="../images/favicon-avengers.png" />
   
  </head>
  <body>
    

    <div class="section1">
      <div class="danger-level">
        <p>Niveau de dangerosité : Élevé</p>
        <div class="pictos">
          <div class="picto high"></div>
          <div class="picto high"></div>
          <div class="picto high"></div>
        </div>
      </div>
      <div class="section2">
        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/Thanosfond.png" class="cover-image"loading="lazy" />
            </div>
            <img
              src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/4fe006ef-2ed2-48d6-a5b4-362d5fd1a399/de684mu-e5342895-4aad-45f3-8a46-edac6734e1dd.png/v1/fill/w_1280,h_454/thanos_logo___render_by_alonik_de684mu-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NDU0IiwicGF0aCI6IlwvZlwvNGZlMDA2ZWYtMmVkMi00OGQ2LWE1YjQtMzYyZDVmZDFhMzk5XC9kZTY4NG11LWU1MzQyODk1LTRhYWQtNDVmMy04YTQ2LWVkYWM2NzM0ZTFkZC5wbmciLCJ3aWR0aCI6Ijw9MTI4MCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.xxs6zgPmRnyHCvl3V9iYJYceJHA3_AFEoM2gQCainsg"
              class="title"
            />
            <img
              src="https://i.pinimg.com/originals/00/ca/33/00ca3355d5ac000e79ab80a6d29d02cf.png"
              class="character"
            />
          </div>
        </a>

        <a
          href="https://www.mythrillfiction.com/force-mage"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/loki.png" class="cover-image"loading="lazy" />
            </div>
            <img
              src="https://upload.wikimedia.org/wikipedia/fr/9/91/Logo_serie_loki_2021.png"
              class="title"loading="lazy"
            />
            <img src="../images/loki2.png" class="character taille2"loading="lazy" />
          </div>
        </a>
        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/hela.jpg" class="cover-image"loading="lazy" />
            </div>
            <img src="../images/helas_logo.png" class="title left"loading="lazy" />
            <img src="../images/helac.png" class="character loki left"loading="lazy" />
          </div>
        </a>

        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/magneto.jpg" class="cover-image"loading="lazy" />
            </div>
            <img
              src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/02b60eed-d9c8-4b8e-b826-3ed0694bcf26/deujzav-f49ae78a-9e5b-45de-b29b-21bc769d6393.png/v1/fill/w_1186,h_597/magneto_logo_by_lyriumrogue_deujzav-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NTk3IiwicGF0aCI6IlwvZlwvMDJiNjBlZWQtZDljOC00YjhlLWI4MjYtM2VkMDY5NGJjZjI2XC9kZXVqemF2LWY0OWFlNzhhLTllNWItNDVkZS1iMjliLTIxYmM3NjlkNjM5My5wbmciLCJ3aWR0aCI6Ijw9MTE4NiJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.03GhbB_qkLu0vg8wouEUiQJLfAyk5oN1F3-eh5NLWtg"
              class="title"loading="lazy"
            />
            <img
              src="https://www.pngplay.com/wp-content/uploads/9/Magneto-PNG-Background.png"
              class="character taille"loading="lazy"
            />
          </div>
        </a>
      </div>
    </div>

    <div class="section1">
      <div class="danger-level">
        <p>Niveau de dangerosité : Moyen</p>
        <div class="pictos">
          <div class="picto medium"></div>
          <div class="picto medium"></div>
          <div class="picto high inactive"></div>
        </div>
      </div>
      <div class="section2">
        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/soldat.jpg" class="cover-image" loading="lazy"/>
            </div>
            <img
              src="https://lh5.googleusercontent.com/proxy/LVP1UIfNejou9mWzfImdQerCNaGPk0jb4Ws5O2puuASQOjGKIVohpE2I9feSYGdglMUDQbMRfvkzQkoJDXxwMpoZhDHo687vrJqiLud2k1cNR-OM5WKZdd9E19sMUMU0LQ"
              class="title"loading="lazy"
            />
            <img src="../images/soldat.png" class="character"loading="lazy" />
          </div>
        </a>

        <a
          href="https://www.mythrillfiction.com/force-mage"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/kang.png" class="cover-image"loading="lazy" />
            </div>
            <img src="../images/kangtitre.png" class="title kang" loading="lazy"/>
            <img src="../images/kangpng.png" class="character taille3"loading="lazy" />
          </div>
        </a>
        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/killmonger.jpg" class="cover-image" loading="lazy"/>
            </div>
            <img
              style="width: 200%; margin-top: 200px !important"
              src="../images/killmonger_logo.png"
              class="title" loading="lazy"
            />
            <img
              style="left: 0"
              src="../images/killmonger.png"
              class="character" loading="lazy"
            />
          </div>
        </a>

        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/venom.jpg" class="cover-image" loading="lazy"/>
            </div>
            <img src="../images/venomtitre.png" class="title" loading="lazy"/>
            <img
              style="left: -50px"
              src="../images/venom.png"
              class="character taille"
              loading="lazy"
            />
          </div>
        </a>
      </div>
    </div>

    <div class="section1">
      <div class="danger-level">
        <p>Niveau de dangerosité : faible</p>
        <div class="pictos">
          <div class="picto low"></div>
          <div class="picto medium inactive"></div>
          <div class="picto high inactive"></div>
        </div>
      </div>
      <div class="section2">
        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/octopus.jpg" class="cover-image" loading="lazy"/>
            </div>
            <img src="../images/octpuslogo.png" class="title" loading="lazy"/>
            <img style="left: 0" src="../images/octopus.png" class="character" loading="lazy"/>
          </div>
        </a>

        <a
          href="https://www.mythrillfiction.com/force-mage"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/ultron.jpg" class="cover-image" loading="lazy"/>
            </div>
            <img src="../images/ultrontitre.png" class="title" loading="lazy"/>
            <img style="left: 0" src="../images/ultron.png" class="character" loading="lazy"/>
          </div>
        </a>
        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/wanda.jpg" class="cover-image" loading="lazy"/>
            </div>
            <img src="../images/wandatitre.png" class="title" loading="lazy"/>
            <img
              src="../images/wanda.png"
              class="character" loading="lazy"
            />
          </div>
        </a>

        <a
          href="https://www.mythrillfiction.com/the-dark-rider"
          alt="Mythrill"
          target="_blank"
        >
          <div class="card">
            <div class="wrapper">
              <img src="../images/gost.jpg" class="cover-image" loading="lazy"/>
            </div>
            <img src="../images/ghostridertitre.png" class="title" loading="lazy"/>
            <img src="../images/ghost.png" class="character taille" loading="lazy"/>
          </div>
        </a>
      </div>
    </div> <?php include ("../php/footer.php") ?>

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
    <script>
      // script.js

      // Sélectionne le popup et le bouton de fermeture
      const popup = document.getElementById("popup");
      const closePopupBtn = document.getElementById("close-popup");

      // Affiche le popup à l'ouverture de la page
      window.addEventListener("load", () => {
        popup.classList.add("show"); // Ajoute la classe "show" pour afficher le popup
      });

      // Ferme le popup quand on clique sur la croix
      closePopupBtn.addEventListener("click", () => {
        popup.classList.remove("show"); // Enlève la classe "show" pour cacher le popup
      });
    </script>
  </body>
</html>
