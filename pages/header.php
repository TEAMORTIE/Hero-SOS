<?php

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <script src="https://cdn.tailwindcss.com"></script>

    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="icon" href="../images/favicon-avengers.png" />
    <link rel="stylesheet" href="../styles/header.css" />
    
    <link 
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
/>

  </head>
  <body>
    <div class="navbar">
      <a href="../index.php">
        <img class="logo1" src="../images/Logo-super-hero.png" alt="" />
      </a>
      <ul class="links">
        <li><a href="../index.php">Accueil</a></li>
        <li><a id="openPopup" href="#">Les Supers</a></li>
        <li><a href="incident.php">Déclarer un incident</a></li>
        <li><a href="comment_ca_marche.php">Comment ca marche ?</a></li>
      </ul>
      <div class="buttons">
        <?php
if (isset($_SESSION['user_id'])) {


    ?>

    

<ul>
     <li class="dropdown ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
              <div class="flex-shrink-0 w-10 h-10 relative">
                <div class=" rounded-full focus:outline-none focus:ring"
                style="margin-left: -2em;width: 4em; height:4em;">
                  <img
                    class="ppheader  rounded-full"
                    src=" <?php echo $_SESSION['image'] ?>"
                    alt="photo de profil"
                  />
                  <div
                    class="top-0 left-7 absolute w-3 h-3 bg-lime-400 border-2 border-white rounded-full animate-ping"
                  ></div>
                  <div
                    class="top-0 left-7 absolute w-3 h-3 bg-lime-500 border-2 border-white rounded-full"
                  ></div>
                </div>
              </div>
              <div class="p-2 md:block text-left">
                <h2 class="text-2xl font-semibold text-white"><?php echo $prenom;?></h2>
                <p class="text-xl text-white"><?php if ($_SESSION['role'] == 'utilisateur'){
                  echo 'citoyen';
                }else{
                  echo $_SESSION["role"]; } ?></p>
              </div>
            </button>
            <ul
              class="dropdown-menu shadow-md bg-white text-black shadow-black/5 z-30 hidden py-1.5 rounded-md border border-gray-100 w-full max-w-[140px]"
            >
              <li>
                <a 
                  href="profil.php"
                  class=" menu_profil flex items-center text-[13px] py-1.5 px-4 text-black hover:text-[#f84525] hover:bg-gray-50"
                  >Profil</a
                >
              </li>
              <?php if($_SESSION['role'] == 'admin') { ?>
              <li>
                <a 
                  href="dashboard.php"
                  class=" menu_profil flex items-center text-[13px] py-1.5 px-4 text-black hover:text-[#f84525] hover:bg-gray-50"
                  >Dashboard</a
                >
              </li>
              <?php } ?>
              <li>
                <form method="POST" action="../php/logout.php">
                  <a
                    role="menuitem"
                    class="menu_profil flex items-center text-[13px] py-1.5 px-4 text-black hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
                    onclick="event.preventDefault();
                                    this.closest('form').submit();"
                  >
                    Déconnecter
                  </a>
                </form>
              </li>
            </ul>
          </li>
</ul>



<?php
}
else {
?>
<a href="inscription.php" class="action-button pro">S'enregistrer</a>

          <a href="connexion.php" class="action-button co">Se connecter</a>
     
<?php
}
?>
      </div>
      <div class="burger-menu-button">
        <i class="fa-solid fa-bars" style="font-family: 'Font Awesome 6 Free'!important; font-weight: 900;"></i>
      </div>
    </div>
    <div class="burger-menu">
      <ul class="links">
        <li><a href="../index.php">Accueil</a></li>
        <li><a id="openPopup" href="#">Les Supers</a></li>
        <li><a href="incident.php">Déclarer un incident</a></li>
        <li><a href="comment_ca_marche.php">Comment ca marche ?</a></li>

        <div class="divider"></div>
        <div class="buttons-burger-menu">
          <?php
if (isset($_SESSION['user_id'])) {


    ?>

    
<a href="profil.php" class="action-button pro">Profil</a>

          <a href="../php/logout.php" class="action-button co">Déconnexion
          </a>



<?php
}
else {
?>
<a href="inscription.php" class="action-button pro">S'enregistrer</a>

          <a href="connexion.php" class="action-button co">Se connecter</a>
     
<?php
}
if (isset($_SESSION['role'])=='admin') {
?>     

<a href="dashboard.php" class="action-button pro">DASHBOARD</a>
<?php
}
?>
        </div>
      </ul>
    </div>
    

    <!-- Arrière-plan semi-transparent -->
    <div class="overlay" id="overlay"></div>

    <!-- Contenu du popup -->
    <div class="popup" id="popup">
      <div class="flex1" style="
  display: flex;
  justify-content: center;">
        <!-- From Uiverse.io by dylanharriscameron -->
          <a href="vilan.php">
        <div class="card1">
          
          <div class="bg"><img src="../images/ultron.jpg" alt="" /></div>
          <div class="blob"></div>
        </div>
        </a>
        <!-- From Uiverse.io by dylanharriscameron -->
         <a href="hero.php">
        <div class="card1">
          <div class="bg"><img src="../images/hero/captain.jpg" alt="" /></div>
          <div class="blob2"></div>
        </div>
        </a>
      </div>
  <button class="close-btn" id="closePopup">fermer</button>
    </div>
    
    
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      // Références des éléments
      const openPopupButton = document.getElementById("openPopup");
      const closePopupButton = document.getElementById("closePopup");
      const popup = document.getElementById("popup");
      const overlay = document.getElementById("overlay");

      // Afficher le popup
      openPopupButton.addEventListener("click", () => {
        popup.style.display = "block";
        overlay.style.display = "block";
        popup.scrollIntoView();
      });

      // Fermer le popup
      closePopupButton.addEventListener("click", () => {
        popup.style.display = "none";
        overlay.style.display = "none";
      });

      // Fermer le popup en cliquant sur l'arrière-plan
      overlay.addEventListener("click", () => {
        popup.style.display = "none";
        overlay.style.display = "none";
      });
    </script>
     <script>
      // start: Popper
      const popperInstance = {};
      document.querySelectorAll(".dropdown").forEach(function (item, index) {
        const popperId = "popper-" + index;
        const toggle = item.querySelector(".dropdown-toggle");
        const menu = item.querySelector(".dropdown-menu");
        menu.dataset.popperId = popperId;
        popperInstance[popperId] = Popper.createPopper(toggle, menu, {
          modifiers: [
            {
              name: "offset",
              options: {
                offset: [0, 8],
              },
            },
            {
              name: "preventOverflow",
              options: {
                padding: 24,
              },
            },
          ],
          placement: "bottom-end",
        });
      });
      document.addEventListener("click", function (e) {
        const toggle = e.target.closest(".dropdown-toggle");
        const menu = e.target.closest(".dropdown-menu");
        if (toggle) {
          const menuEl = toggle
            .closest(".dropdown")
            .querySelector(".dropdown-menu");
          const popperId = menuEl.dataset.popperId;
          if (menuEl.classList.contains("hidden")) {
            hideDropdown();
            menuEl.classList.remove("hidden");
            showPopper(popperId);
          } else {
            menuEl.classList.add("hidden");
            hidePopper(popperId);
          }
        } else if (!menu) {
          hideDropdown();
        }
      });

      function hideDropdown() {
        document.querySelectorAll(".dropdown-menu").forEach(function (item) {
          item.classList.add("hidden");
        });
      }
      function showPopper(popperId) {
        popperInstance[popperId].setOptions(function (options) {
          return {
            ...options,
            modifiers: [
              ...options.modifiers,
              { name: "eventListeners", enabled: true },
            ],
          };
        });
        popperInstance[popperId].update();
      }
      function hidePopper(popperId) {
        popperInstance[popperId].setOptions(function (options) {
          return {
            ...options,
            modifiers: [
              ...options.modifiers,
              { name: "eventListeners", enabled: false },
            ],
          };
        });
      }
      // end: Popper</script>
</body>
    </html>