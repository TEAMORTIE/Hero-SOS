<?php 
include("../php/session.php");
include("../php/header.php"); 
?>



<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      type="text/css"
      href="/styles/comment_ca_marche.css"
    />
    <!-- Librairie police Marvel-->
    <link
      rel="stylesheet"
      type="text/css"
      href="//fonts.googleapis.com/css?family=Marvel"
    />
    <!--Librairie/Javascript Tailwind CSS JS-->
    <script src="https://cdn.tailwindcss.com"></script>
    <!--Librairie/Javascript AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!--Lien Favicons-->
    <link rel="icon" href="images/xfavicon-avengers.png" />
    <title>Comment_ça_marche ?</title>
  </head>
  <body>
    <section class="arriere_plan">
      <div class="font_noir" style="padding-top: 5rem; padding-bottom: 2rem">
        <div>
          <h3 class="titre">Comment ça marche ?</h3>
        </div>

        <div class="carte_sv">
          <h4 class="theme">À quoi sert Hero SOS ?</h4>

          <div>
            <h4 class="police_Marvel">
              Hero SOS est une plateforme simple et rapide pour signaler des
              incidents ou des problèmes dans votre quartier. Que ce soit un
              accident, un problème de sécurité, ou tout autre type de danger,
              notre site vous permet de transmettre l'information aux
              intervenants compétents.
            </h4>

            <br />

            <h4 class="police_Marvel">
              Une fois votre signalement effectué, il est pris en charge par des
              professionnels ou des services adaptés qui interviendront
              rapidement pour résoudre la situation.
            </h4>

            <br />
          </div>
        </div>
        <br />

        <div class="carte_sv">
          <h4 class="theme">Comment utiliser Hero SOS ?</h4>

          <div data-aos="fade-down">
            <h4 class="police_Marvel">
              Connectez-vous ou créez un compte en quelques clics. Décrivez le
              problème en remplissant un formulaire simple. Ajoutez une
              localisation précise pour aider les intervenants. Suivez
              l'évolution de votre signalement directement depuis votre tableau
              de bord.
            </h4>
            <br />
            <h4 class="police_Marvel">
              Grâce à une interface claire et intuitive, vous pouvez rester
              informé à chaque étape jusqu'à la résolution complète de
              l'incident. Pourquoi choisir Hero SOS ? Nous simplifions la
              communication entre les citoyens et les services d'intervention.
              Notre objectif est de rendre les quartiers plus sûrs et
              d'améliorer le bien-être collectif. Chaque signalement contribue à
              bâtir une communauté plus vigilante et solidaire. Avec Hero SOS,
              vous n'êtes jamais seul face aux problèmes. Ensemble, nous pouvons
              faire la différence.
            </h4>
          </div>
        </div>

        <br />

        <div class="carte_sv">
          <h4 class="theme">Pourquoi choisir Hero SOS ?</h4>

          <div data-aos="fade-down">
            <h4 class="police_Marvel">
              Nous simplifions la communication entre les citoyens et les
              services d'intervention. Notre objectif est de rendre les
              quartiers plus sûrs et d'améliorer le bien-être collectif. Chaque
              signalement contribue à bâtir une communauté plus vigilante et
              solidaire.
            </h4>
          </div>
        </div>
        <h4 class="phrase">
          Avec Hero SOS, vous n'êtes jamais seul face aux problèmes. Ensemble,
          nous pouvons faire la différence.
        </h4>
      </div>
    </section>
     <?php include ("../php/footer.php") ?>

<!-- Javascript AOS CSS-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
  </body>
</html>
