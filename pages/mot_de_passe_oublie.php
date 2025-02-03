<?php 

include("../php/session.php");
include("../php/header.php");
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Lien page CSS-->
        <link rel="icon" href="../images/favicon-avengers.png" />

    <link
      rel="stylesheet"
      type="text/css"
      href="../styles/mot_de_passe_oublie.css"
    />
    <!-- Librairie police Marvel-->
    <link
      rel="stylesheet"
      type="text/css"
      href="//fonts.googleapis.com/css?family=Marvel"
    />
    <!--Librairie Tailwind CSS JS-->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Mot de passe oublié - HeroSOS</title>
  </head>
  <body>
    <section class="arriere_plan">
      <div class="font_noir">
        <div style="border-radius: 10%; border-color: black">
          <h3
            style="
              text-align: center;
              margin-bottom: 100px;
              margin-top: 75px;
              color: #ffffff;
              font-weight: bold;
              font-size: 3rem;
            "
            class="police_marvel"
          >
            Mot de passe oublié
          </h3>
          <label class="relative block">
            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
              <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20">
                <!-- ... -->
              </svg>
            </span>
            <h4
              style="
                font-family: Marvel;
                font-size: 20px;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                color: #ffffff;"
            >
              Un email vous sera envoyé afin de modifier votre mot de passe.
            </h4>
            <form action="../php/verificationmail.php" method="POST">
            <input
              class="placeholder:italic placeholder:text-slate-400 block bg-white w-80% border border-slate-300 rounded-md py-2 pl-5 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm"
              style="
                display: flex;
                width: 15rem;
                margin: auto;
                text-align: center;
              "
              placeholder="Inserer votre email"
              type="text"
              name="email"
            />
          </label>

          <button class="button-23" type="submit">Reinitialisation</button>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>
