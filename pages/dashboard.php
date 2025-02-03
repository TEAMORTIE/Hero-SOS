<?php
include("../php/session.php");


if ($_SESSION['role'] !== 'admin') {
    // Redirigez l'utilisateur
    header('Location: ../index.php');
    exit();
}

if($_SESSION["verification"] == "0"){
    header("Location: ../index.php");
    exit();
}
$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error){
    die('Erreur : ' .$conn->connect_error);
    
}

$prenom = $_SESSION['prenom'];
$sql_users = 'SELECT COUNT(*) AS nombre_users FROM user';
$result_users = $conn->query($sql_users);
$sql_hero = 'SELECT COUNT(*) AS nombre_hero FROM user WHERE role = "hero"';
$result_hero = $conn->query($sql_hero);
$sql_vilan = 'SELECT COUNT(*) AS nombre_vilan FROM vilain';
$result_vilan = $conn->query($sql_vilan);
$sql_incident = 'SELECT COUNT(*) AS nombre_incident FROM incident';
$result_incident = $conn->query($sql_incident);
$sql_incident_reussi = 'SELECT COUNT(*) AS nombre_incident_reussi FROM incident WHERE status = "resolu"';
$result_incident_reussi = $conn->query($sql_incident_reussi);
$sql_incident_rate = 'SELECT COUNT(*) AS nombre_incident_rate FROM incident WHERE status = "rate"';
$result_incident_rate = $conn->query($sql_incident_rate);
$conn->close(); 

try {
    // Connexion à la base de données avec PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prépareret  exécuter la requête SQL
    $query = "SELECT * FROM user"; 
    $stmt = $pdo->query($query);
    $query1 = "SELECT * FROM vilain"; 
    $stmt1 = $pdo->query($query1);
    $query2 = "SELECT * FROM incident order by id desc"; 
    $stmt2 = $pdo->query($query2);
    $query3= "SELECT * FROM demande order by id desc"; 
    $stmt3 = $pdo->query($query3);
    




} catch (PDOException $e) {
    // Gestion des erreurs
    echo "Erreur de connexion ou d'exécution de la requête : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="../images/favicon-avengers.png" />

    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link
      href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap"
      rel="stylesheet"
    />
    <link 
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../styles/dashboard.css" />

    <title>Dashboard Admin</title>
    
    <style>
      td {
        padding: 1em 0em ;
        border-bottom: 1px solid rgb(0, 0, 0);
      }
    </style>
  </head>
  <?php 
    $row_users = $result_users->fetch_assoc();
    $row_hero = $result_hero->fetch_assoc();
    $row_vilan = $result_vilan->fetch_assoc();
    $row_incident = $result_incident->fetch_assoc();
    $row_incident_reussi = $result_incident_reussi->fetch_assoc();
    $row_incident_rate = $result_incident_rate->fetch_assoc();


  ?>
  <body class="text-gray-800 font-inter">
    <!--sidenav -->
    <div
      class="fixed left-0 top-0 w-64 h-full bg-[#f8f4f3] p-4 z-50 sidebar-menu transition-transform"
    >
      <a href="../index.php" class="flex items-center pb-4 border-b border-b-gray-800">
        <h2 class="font-bold text-2xl">
          HEROS
          <span class="bg-[#f84525] text-white px-2 rounded-md">SOS</span>
        </h2>
      </a>
      <ul class="mt-4">
        <span class="text-gray-400 font-bold">SOS</span>
        <li class="mb-1 group">
          <a
            href="dashboard.php?page=1"
            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"
          >
            <i class="ri-settings-line mr-3 text-lg"></i>
            <span class="text-sm">Dashboard</span>
          </a>
        </li>
        
        <li class="mb-1 group">
          <a
            href=""
            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"
          >
            <i class="bx ri-film-line mr-3 text-lg"></i>
            <span class="text-sm">Films</span>
          </a>
        </li>
        <span class="text-gray-400 font-bold">RÔLES</span>
        <li class="mb-1 group">
          <a
            href="dashboard.php?page=2"
            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle"
          >
            <i class="bx bx-user mr-3 text-lg"></i>
            <span class="text-sm">Utilisateurs</span>
            <i
              class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"
            ></i>
          </a>
          <ul class="pl-7 mt-2 hidden group-[.selected]:block">
            <li class="mb-4">
              <a
                href="dashboard.php?page=2"
                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3"
                >Tous</a
              >
            </li>
            <li class="mb-4">
              <a
                href="dashboard.php?page=5"
                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3"
                >Demande
              </a>
            </li>
          </ul>
        </li>
        <li class="mb-1 group">
          <a
            href="dashboard.php?page=3"
            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100 sidebar-dropdown-toggle"
          >
            <i class="bx ri-user-star-fill mr-3 text-lg"></i>
            <span class="text-sm">Super</span>
            <i
              class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"
            ></i>
          </a>
          <ul class="pl-7 mt-2 hidden group-[.selected]:block">
            <li class="mb-4">
              <a
                href="dashboard.php?page=3"
                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3"
                >Super-Heros</a
              >
            </li>
            <li class="mb-4">
              <a
                href="dashboard.php?page=4"
                class="text-gray-900 text-sm flex items-center hover:text-[#f84525] before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3"
                >Super-Vilans</a
              >
            </li>
          </ul>
        </li>
        <li class="mb-1 group">
                  <span class="text-gray-400 font-bold">INCIDENT</span>

          <a
            href="dashboard.php?page=6"
            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"
          >
            <i class="bx ri-alert-line mr-3 text-lg"></i>
            <span class="text-sm">Incident</span>
          </a>
        </li>
        <li class="mb-1 group">
          <a
            href=""
            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"
          >
            <i class="bx ri-bar-chart-box-line mr-3 text-lg"></i>
            <span class="text-sm">Statistiques</span>
            
          </a>
        </li>
        <li class="mb-1 group">
          <a
            href="../index.php"
            class="flex font-semibold items-center py-2 px-4 text-gray-900 hover:bg-gray-950 hover:text-gray-100 rounded-md group-[.active]:bg-gray-800 group-[.active]:text-white group-[.selected]:bg-gray-950 group-[.selected]:text-gray-100"
          >
            <i class="bx ri-home-2-line mr-3 text-lg"></i>
            <span class="text-sm">Accueil</span>
            
          </a>
        </li>
      </ul>
    </div>
    <div
      class="fixed top-0 left-0 w-full h-full bg-black/50 z-40 md:hidden sidebar-overlay"
    ></div>
    <!-- end sidenav -->

    <main
      class="w-full bg-gray-400 md:w-[calc(100%-256px)] md:ml-64  min-h-screen transition-all main"
    >
      <!-- navbar -->
      <div
        class="py-2 px-6 bg-[#f8f4f3] flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30"
      >
        <button
          type="button"
          class="text-lg text-gray-900 font-semibold sidebar-toggle"
        >
          <i class="ri-menu-line"></i>
        </button>

        <ul class="ml-auto flex items-center">
          <li class="mr-1 dropdown">
            <button
              type="button"
              class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center hover:text-gray-600"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                class="hover:bg-gray-100 rounded-full"
                viewBox="0 0 24 24"
              >
                <path
                  d="M19.023 16.977a35.13 35.13 0 0 1-1.367-1.384c-.372-.378-.596-.653-.596-.653l-2.8-1.337A6.962 6.962 0 0 0 16 9c0-3.859-3.14-7-7-7S2 5.141 2 9s3.14 7 7 7c1.763 0 3.37-.66 4.603-1.739l1.337 2.8s.275.224.653.596c.387.363.896.854 1.384 1.367l1.358 1.392.604.646 2.121-2.121-.646-.604c-.379-.372-.885-.866-1.391-1.36zM9 14c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"
                ></path>
              </svg>
            </button>
            <div
              class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full rounded-md border border-gray-100"
            >
              <form action="" class="p-4 border-b border-b-gray-100">
                <div class="relative w-full">
                  <input
                    type="text"
                    class="py-2 pr-4 pl-10 bg-gray-50 w-full outline-none border border-gray-100 rounded-md text-sm focus:border-blue-500"
                    placeholder="recherche"
                  />
                  <i
                    class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-900"
                  ></i>
                </div>
              </form>
            </div>
          </li>
          <li class="dropdown">
            <button
              type="button"
              class="dropdown-toggle text-gray-400 mr-4 w-8 h-8 rounded flex items-center justify-center hover:text-gray-600"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                class="hover:bg-gray-100 rounded-full"
                viewBox="0 0 24 24"
              >
                <path
                  d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"
                ></path>
              </svg>
            </button>
            <div
              class="dropdown-menu shadow-md shadow-black/5 z-30 hidden max-w-xs w-full rounded-md border border-gray-100"
            >
              <div
                class="flex items-center px-4 pt-4 border-b border-b-gray-100 notification-tab"
              >
                <button
                  type="button"
                  data-tab="notification"
                  data-tab-page="notifications"
                  class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1 active"
                >
                  Notifications
                </button>
                <button
                  type="button"
                  data-tab="notification"
                  data-tab-page="messages"
                  class="text-gray-400 font-medium text-[13px] hover:text-gray-600 border-b-2 border-b-transparent mr-4 pb-1"
                >
                  Messages
                </button>
              </div>
              <div class="my-2">
                <ul
                  class="max-h-64 overflow-y-auto"
                  data-tab-for="notification"
                  data-page="notifications"
                >
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          New order
                        </div>
                        <div class="text-[11px] text-gray-400">from a user</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          New order
                        </div>
                        <div class="text-[11px] text-gray-400">from a user</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          New order
                        </div>
                        <div class="text-[11px] text-gray-400">from a user</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          New order
                        </div>
                        <div class="text-[11px] text-gray-400">from a user</div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          New order
                        </div>
                        <div class="text-[11px] text-gray-400">from a user</div>
                      </div>
                    </a>
                  </li>
                </ul>
                <ul
                  class="max-h-64 overflow-y-auto hidden"
                  data-tab-for="notification"
                  data-page="messages"
                >
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          <?php echo $prenom;?>
                        </div>
                        <div class="text-[11px] text-gray-400">
                          Hello there!
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          <?php echo $prenom;?>
                        </div>
                        <div class="text-[11px] text-gray-400">
                          Hello there!
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          <?php echo $prenom;?>
                        </div>
                        <div class="text-[11px] text-gray-400">
                          Hello there!
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          <?php echo $prenom;?>
                        </div>
                        <div class="text-[11px] text-gray-400">
                          Hello there!
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a
                      href="#"
                      class="py-2 px-4 flex items-center hover:bg-gray-50 group"
                    >
                      <img
                        src="https://placehold.co/32x32"
                        alt=""
                        class="w-8 h-8 rounded block object-cover align-middle"
                      />
                      <div class="ml-2">
                        <div
                          class="text-[13px] text-gray-600 font-medium truncate group-hover:text-blue-500"
                        >
                          <?php echo $prenom;?>
                        </div>
                        <div class="text-[11px] text-gray-400">
                          Hello there!
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </li>
          <button id="fullscreen-button">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              class="hover:bg-gray-100 rounded-full"
              viewBox="0 0 24 24"
            >
              <path
                d="M5 5h5V3H3v7h2zm5 14H5v-5H3v7h7zm11-5h-2v5h-5v2h7zm-2-4h2V3h-7v2h5z"
              ></path>
            </svg>
          </button>
          <script>
            const fullscreenButton =
              document.getElementById("fullscreen-button");

            fullscreenButton.addEventListener("click", toggleFullscreen);

            function toggleFullscreen() {
              if (document.fullscreenElement) {
                // If already in fullscreen, exit fullscreen
                document.exitFullscreen();
              } else {
                // If not in fullscreen, request fullscreen
                document.documentElement.requestFullscreen();
              }
            }
          </script>

          <li class="dropdown ml-3">
            <button type="button" class="dropdown-toggle flex items-center">
              <div class="flex-shrink-0 w-10 h-10 relative">
                <div class="p-1 rounded-full focus:outline-none focus:ring">
                  <img
                    class="w-8 h-8 rounded-full"
                    src="<?php echo $_SESSION["image"] ?>"
                    alt=""
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
                <h2 class="text-sm font-semibold text-gray-800">                           <?php echo $prenom;?>
</h2>
                <p class="text-xs text-gray-500">Administrator</p>
              </div>
            </button>
            <ul
              class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md border border-gray-100 w-full max-w-[140px]"
            >
              <li>
                <a
                  href="#"
                  class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50"
                  >Profil</a
                >
              </li>
              <li>
                <form method="POST" action="../php/logout.php">
                  <a
                    role="menuitem"
                    class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-[#f84525] hover:bg-gray-50 cursor-pointer"
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
      </div>
      <!-- end navbar -->

      <!-- Content -->
       <?php
       $page = isset($_GET['page']) ? $_GET['page'] : '1'; 

      if ( $page == '1') { ?>
      <div class="p-6 fond">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
          <div
            class="rounded-md border border-gray-100 p-6 shadow-md shadow-black/5"
          >
            <div class="flex justify-between mb-6">
              <div>
                <div class="flex items-center mb-1">
                  <div class="text-2xl font-semibold"><?php echo $row_users['nombre_users'] ?></div>
                </div>
                <div class="text-sm font-medium text-gray-400">
                  Utilisateurs
                </div>
              </div>
              <div class="dropdown">
                <button
                  type="button"
                  class="dropdown-toggle text-gray-400 hover:text-gray-600"
                >
                  <i class="ri-more-fill"></i>
                </button>
                <ul
                  class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md border border-gray-100 w-full max-w-[140px]"
                >
                  <li>
                    <a
                      href="#"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Profil</a
                    >
                  </li>
                  <li>
                    <a
                      href="../php/logout.php"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Déconnecter
                    </a>
                    
                  </li>
                </ul>
              </div>
            </div>

            <a
              href="dashboard.php?page=2"
              class="text-[#f84525] font-medium text-sm hover:text-red-800"
              >Voir plus</a
            >
          </div>
          <div
            class="rounded-md border border-gray-100 p-6 shadow-md shadow-black/5"
          >
            <div class="flex justify-between mb-4">
              <div>
                <div class="flex items-center mb-1">
                  <div class="text-2xl font-semibold"><?php echo $row_hero['nombre_hero'] ?></div>
                </div>
                <div class="text-sm font-medium text-gray-400">Super-Heros</div>
              </div>
              <div class="dropdown">
                <button
                  type="button"
                  class="dropdown-toggle text-gray-400 hover:text-gray-600"
                >
                  <i class="ri-more-fill"></i>
                </button>
                <ul
                  class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md border border-gray-100 w-full max-w-[140px]"
                >
                  <li>
                    <a
                      href="#"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Profil</a
                    >
                  </li>
                  <li>
                    <a
                      href="../php/logout.php"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Déconnecter</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <a
              href="dashboard.php?page=3"
              class="text-[#f84525] font-medium text-sm hover:text-red-800"
              >Voir plus</a
            >
          </div>
          <div
            class="rounded-md border border-gray-100 p-6 shadow-md shadow-black/5"
          >
            <div class="flex justify-between mb-6">
              <div>
                <div class="text-2xl font-semibold mb-1"><?php echo $row_vilan['nombre_vilan'] ?></div>
                <div class="text-sm font-medium text-gray-400">
                  Super-Vilans répertoriés
                </div>
              </div>
              <div class="dropdown">
                <button
                  type="button"
                  class="dropdown-toggle text-gray-400 hover:text-gray-600"
                >
                  <i class="ri-more-fill"></i>
                </button>
                <ul
                  class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md border border-gray-100 w-full max-w-[140px]"
                >
                  <li>
                    <a
                      href="#"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Profil</a
                    >
                  </li>
                  <li>
                    <a
                      href="../php/logout.php"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Déconnecter</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <a
              href="dashboard.php?page=4"
              class="text-[#f84525] font-medium text-sm hover:text-red-800"
              >Voir plus</a
            >
          </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
          <div
            class="p-6 relative flex flex-col min-w-0 mb-4 lg:mb-0 break-words dark:bg-gray-800 w-full shadow-lg rounded"
          >
            <div class="rounded-t mb-0 px-0 border-0">
              <div class="flex flex-wrap items-center px-4 py-2">
                <div class="relative w-full max-w-full flex-grow flex-1">
                  <h3
                    class="font-semibold text-base text-gray-900 dark:text-gray-50"
                  >
                    Demande de Super-Heros
                  </h3>
                </div>
              </div>
              <div class="block w-full overflow-x-auto">
                <table
                  class="items-center w-full bg-transparent border-collapse"
                >
                  <thead>
                    <tr>
                      <th
                        class="px-4 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                      >
                        Utilisateurs
                      </th>
                      <th
                        class="px-4 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                      >
                        Nom de hero
                      </th>
                      <th
                        class="px-4 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"
                      >
                        Competence
                      </th>
                      <th
                        class="px-4 dark:bg-gray-600 text-gray-500 dark:text-gray-100 align-middle border border-solid border-gray-200 dark:border-gray-500 py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left min-w-140-px"
                      >
                        Status
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="text-gray-700 dark:text-gray-100">
                      <?php
                $counter = 0; 


        while ($row_demande = $stmt3->fetch(PDO::FETCH_ASSOC)) {
         if ($counter >= 5) {
        break; 
    }

           
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row_demande['prenom']) . "". htmlspecialchars($row_demande['nom']) ."</td>";
        echo "<td>". htmlspecialchars($row_demande["pseudo"]) . "</td>";
        echo "<td>". htmlspecialchars($row_demande["competence"]) . "</td>";
        if ($row_demande["status"] == 'refuser') {
          echo "<td class='text-red-500'>". htmlspecialchars($row_demande["status"]) .   "</td>";
                        } elseif ($row_demande["status"] == 'accepter') {
                            echo "<td class='text-green-500'>" . htmlspecialchars($row_demande["status"]) . "</td>";
                        }else {
                            echo "<td class='text-yellow-500'>" . htmlspecialchars($row_demande["status"]) . "</td>";
                        }
    $counter++;


        echo "</tr>";
    } ?>
                     
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div
            class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md"
          >
            <div class="flex justify-between mb-4 items-start">
              <div class="font-medium">Incidents</div>
              <div class="dropdown">
                <button
                  type="button"
                  class="dropdown-toggle text-gray-400 hover:text-gray-600"
                >
                  <i class="ri-more-fill"></i>
                </button>
                <ul
                  class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md border border-gray-100 w-full max-w-[140px]"
                >
                  <li>
                    <a
                      href="#"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Profil</a
                    >
                  </li>
                  <li>
                    <a
                      href="../php/logout.php"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Déconnecter</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <div class="overflow-hidden">
              <table class="w-full min-w-[540px]">
                <thead>
                  <tr>
                    <th
                      class="text-center text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
                    >
                      Utilisateurs
                    </th>
                    <th
                      class="text-center text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-6 text-left"
                    >
                      Lieu
                    </th>
                    <th
                      class="text-center text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tr-md rounded-br-md"
                    >
                      Status
                    </th>
                    <th
                      class="text-center text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tr-md rounded-br-md"
                    >
                      Propriété
                    </th>
                    <th
                      class="text-center text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tr-md rounded-br-md"
                    >
                      Date du rapport
                    </th>
                  </tr>
                </thead>
                <?php
                $counter = 0;


        while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {
         if ($counter >= 5) {
        break; 
    }

           
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['lieu']) . "</td>";
        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
        echo "<td>" . htmlspecialchars($row['priorite']) . "</td>";
        echo "<td>" . htmlspecialchars($row['reported_at']) . "</td>";

    $counter++;


        echo "</tr>";
    } ?>
    <style>
      td {
        padding: 1em 0em ;
        text-align: center;
        border-bottom: 1px solid #e2e8f0;
      }
    </style>
    </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
          <div
            class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md lg:col-span-2"
          >
            <div class="flex justify-between mb-4 items-start">
              <div class="font-medium">Statistiques</div>
              <div class="dropdown">
                <button
                  type="button"
                  class="dropdown-toggle text-gray-400 hover:text-gray-600"
                >
                  <i class="ri-more-fill"></i>
                </button>
                <ul
                  class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md border border-gray-100 w-full max-w-[140px]"
                >
                  <li>
                    <a
                      href="#"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Profil</a
                    >
                  </li>
                  <li>
                    <a
                      href="../php/logout.php"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Déconnecter</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <div
              class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-4"
            >
              <div class="rounded-md border border-dashed border-gray-200 p-4">
                <div class="flex items-center mb-0.5">
                  <div class="text-xl font-semibold"><?php echo $row_incident['nombre_incident'] ?></div>
                </div>
                <span class="text-gray-400 text-sm">En cours</span>
              </div>
              <div class="rounded-md border border-dashed border-gray-200 p-4">
                <div class="flex items-center mb-0.5">
                  <div class="text-xl font-semibold"><?php echo $row_incident_reussi['nombre_incident_reussi'] ?></div>
                </div>
                <span class="text-gray-400 text-sm">Réussi</span>
              </div>
              <div class="rounded-md border border-dashed border-gray-200 p-4">
                <div class="flex items-center mb-0.5">
                  <div class="text-xl font-semibold"><?php echo $row_incident_rate['nombre_incident_rate'] ?></div>
                </div>
                <span class="text-gray-400 text-sm">Raté</span>
              </div>
            </div>
            <div>
              <canvas id="order-chart"></canvas>
            </div>
          </div>
          <div
            class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md"
          >
            <div class="flex justify-between mb-4 items-start">
              <div class="font-medium">Film</div>
              <div class="dropdown">
                <button
                  type="button"
                  class="dropdown-toggle text-gray-400 hover:text-gray-600"
                >
                  <i class="ri-more-fill"></i>
                </button>
                <ul
                  class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md border border-gray-100 w-full max-w-[140px]"
                >
                  <li>
                    <a
                      href="#"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Profil</a
                    >
                  </li>
                  <li>
                    <a
                      href="../php/logout.php"
                      class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                      >Déconnecter</a
                    >
                  </li>
                </ul>
              </div>
            </div>
            <div class="overflow-x-auto">
                              <table class="w-full min-w-[600px]">

              </table>
            </div>
          </div>
        </div>
      </div>
             <?php } elseif ($page == '2') { ?>

              <div class="p-6 bg-gray-400 ">

      <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
        <table class="w-full min-w-[460px]">
          <caption>Utilisateurs</caption>
          <tr> 
            <th                   class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>id</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Nom</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Prénom</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Mail</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Date de création</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Role</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Date de naissance</th>
<th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Vérification</th>
<th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Option</th>
          </tr>

          <?php

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['create_time']) . "</td>";
        echo "<td>" . htmlspecialchars($row['role']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date_de_naissance']) . "</td>";
        echo "<td>" . (htmlspecialchars($row['verification']) == 0 ? "non" : "oui") . "</td>";

        echo "<td>".'<a href="../php/supprimer_utilisateur.php?id='.  urlencode($row['id']) . '"><button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button></a>'. "</td>";


        echo "</tr>";
    } ?>
    
  
        </table>
        
      </div>

             <?php }elseif ($page == '3') { ?>

              <div class="p-6 bg-gray-400 ">

      <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
        <table class="w-full min-w-[460px]">
          <caption>Super Heros</caption>
          <tr> 
            <th                   class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>id</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Nom</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Prénom</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Mail</th>
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Date de création</th>
           
            <th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Date de naissance</th>
<th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Vérification</th>
<th                       class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md"
>Option</th>
          </tr>

          <?php


        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            if ($row['role'] == 'hero') {
              echo "<tr>";
              echo "<td>" . htmlspecialchars($row['id']) . "</td>";
              echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
              echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
              echo "<td>" . htmlspecialchars($row['email']) . "</td>";
              echo "<td>" . htmlspecialchars($row['create_time']) . "</td>";
              echo "<td>" . htmlspecialchars($row['date_de_naissance']) . "</td>";
              echo "<td>" . (htmlspecialchars($row['verification']) == 0 ? "non" : "oui") . "</td>";

              echo "<td>" . '<a href="../php/supprimer_utilisateur.php?id=' . urlencode($row['id']) . '"><button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button></a>' . "</td>";


              echo "</tr>";
            }
    } ?>
    
        </table>
        
      </div>

             <?php } elseif ($page == '4') { ?>

              <div class="p-6 bg-gray-400 ">

                 <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                  <table class="w-full min-w-[460px]">
                 <caption>Super Vilans</caption>
                 <tr> 
                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">id</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Nom</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Prénom</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Pseudo</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Spécialité</th>
           
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">lieu</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">En liberté ?</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Option</th>
          </tr>

          <?php


          while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row1['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row1['nom']) . "</td>";
            echo "<td>" . htmlspecialchars($row1['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($row1['pseudo']) . "</td>";
            echo "<td>" . htmlspecialchars($row1['Specialite']) . "</td>";
            echo "<td>" . htmlspecialchars($row1['lieu']) . "</td>";
            echo "<td>" . (htmlspecialchars($row1['liberte']) == 0 ? "non" : "oui") . "</td>";

            echo "<td>" . '<a href="../php/supprimer_utilisateur.php?id=' . urlencode($row['id']) . '"><button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button></a>' . "</td>";


            echo "</tr>";
          }
       
    ?>
    
        </table>
        
      </div>
       <?php }elseif ($page == '5') {  ?>

              <div class="p-6 bg-gray-400 ">

                 <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                  <table class="w-full min-w-[460px]">
                 <caption>Demandes rôles</caption>
                 <tr> 
                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">prenom</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Nom</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Pseudo demandé</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Compétence</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Status</th>
           
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Option</th>
          </tr>

          <?php


          while ($row_demande = $stmt3->fetch(PDO::FETCH_ASSOC)) {



            echo "<tr>";
            echo "<td>" . htmlspecialchars($row_demande['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($row_demande["nom"]) . "</td>";
            echo "<td>" . htmlspecialchars($row_demande["pseudo"]) . "</td>";
            echo "<td>" . htmlspecialchars($row_demande["competence"]) . "</td>";
            if ($row_demande["status"] == 'refuser') {
              echo "<td class='text-red-500'>" . htmlspecialchars($row_demande["status"]) . "</td>";
            } elseif ($row_demande["status"] == 'accepter') {
              echo "<td class='text-green-500'>" . htmlspecialchars($row_demande["status"]) . "</td>";
            } else {
              echo "<td class='text-yellow-500'>" . htmlspecialchars($row_demande["status"]) . "</td>";
            }
            if ($row_demande["status"] == "en attente") {
              echo "<td class='tds'>" .
                "<a href='#'>
        <button class='bg-blue-500 text-white px-4 py-2 rounded hover:bg-red-700' onclick='toggleMenu(event)'>
          Gérer
        </button>
      </a>
      <div class='menu' style='display: none;'>
        <a href='../php/demande.php?id=1&user_id=" . $row_demande['user_id'] . "'> 
          <button class='bg-green-500 text-white px-4 py-2 rounded mt-2 hover:bg-green-700'>
            Accepter
          </button>
        </a>
        <a href='../php/demande.php?id=2&user_id=" . $row_demande['user_id'] . "'> 
          <button class='bg-red-500 text-white px-4 py-2 rounded mt-2 hover:bg-red-700'>
            Refuser
          </button>
        </a>
      </div>" .
                "</td>";
            }else {
              echo "<td>  <a href='../php/demande.php?id=3&demande_id=" . $row_demande['id'] . "'> 
          <button class='bg-red-500 text-white px-4 py-2 rounded mt-2 hover:bg-red-700'>
            Archiver
          </button>
        </a> </td>";
            }
            echo "</tr>";
          }
;
          
     ?>
     <style>
  .menu {
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 10px;
    z-index: 10;
    display: none;
  }
  .tds {
    position: relative;
  }
</style>
    
        </table>
        
      </div>
       <?php }elseif ($page == '6') { ?>

              <div class="bg-gray-400 ">

                 <div class="border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md">
                  <table class="w-full min-w-[460px]">
                 <caption>Incidents</caption>
                 <tr> 
                <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Utilisateur</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Lieu</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Type</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">vilan</th>
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Date</th>
        
            <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Description</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Priorite</th>
                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">status</th>

                        <th class="text-[12px] uppercase tracking-wide font-medium text-gray-400 py-2 px-4 text-left rounded-tl-md rounded-bl-md">Option</th>

          </tr>

          <?php


          while ($row = $stmt2->fetch(PDO::FETCH_ASSOC)) {

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
            echo "<td>" . htmlspecialchars($row['lieu']) . "</td>";
            echo "<td>" . htmlspecialchars($row['type']) . "</td>";
            echo "<td>" . htmlspecialchars($row['vilan']) . "</td>";

            echo "<td>" . htmlspecialchars($row['reported_at']) . "</td>";
          
            echo "<td>". htmlspecialchars($row["description"]) . "</td>";
            echo "<td>" . htmlspecialchars($row['priorite']) . "</td>";
            if ($row["status"] == "en_cours") {

              echo "<td class='text-blue-500'>" . htmlspecialchars($row['status']) . "</td>";
            } elseif ($row["status"] == "resolu") {
              echo "<td class='text-green-500'>" . htmlspecialchars($row['status']) . "</td>";
            }elseif ($row["status"] == "rate") {
              echo "<td class='text-red-500'>" . htmlspecialchars($row['status']) . "</td>";
            }else{
              echo "<td>". htmlspecialchars($row["status"]) . "</td>";
            }
            echo "<td class='tds'>" .
                "<a href='#'>
        <button class='bg-blue-500 text-white px-4 py-2 rounded hover:bg-red-700' onclick='toggleMenu(event)'>
          Gérer
        </button>
      </a>
      <div class='menu' style='display: none;'>
        <a href='../php/incident.php?id=1&incident=" . $row['id'] . "'> 
          <button class='bg-green-500 text-white px-4 py-2 rounded mt-2 hover:bg-green-700'>
            reussi
          </button>
        </a>
        <a href='../php/incident.php?id=2&incident=" . $row['id'] . "'> 
          <button class='bg-red-500 text-white px-4 py-2 rounded mt-2 hover:bg-red-700'>
            raté
          </button>
        </a>
      </div>" .
                "</td>";  



            echo "</tr>";
          }
       }
       
    ?>
    
        </table>
        
      </div>
       

    </main>

    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      // start: Sidebar
      const sidebarToggle = document.querySelector(".sidebar-toggle");
      const sidebarOverlay = document.querySelector(".sidebar-overlay");
      const sidebarMenu = document.querySelector(".sidebar-menu");
      const main = document.querySelector(".main");
      sidebarToggle.addEventListener("click", function (e) {
        e.preventDefault();
        main.classList.toggle("active");
        sidebarOverlay.classList.toggle("hidden");
        sidebarMenu.classList.toggle("-translate-x-full");
      });
      sidebarOverlay.addEventListener("click", function (e) {
        e.preventDefault();
        main.classList.add("active");
        sidebarOverlay.classList.add("hidden");
        sidebarMenu.classList.add("-translate-x-full");
      });
      document
        .querySelectorAll(".sidebar-dropdown-toggle")
        .forEach(function (item) {
          item.addEventListener("click", function (e) {
            e.preventDefault();
            const parent = item.closest(".group");
            if (parent.classList.contains("selected")) {
              parent.classList.remove("selected");
            } else {
              document
                .querySelectorAll(".sidebar-dropdown-toggle")
                .forEach(function (i) {
                  i.closest(".group").classList.remove("selected");
                });
              parent.classList.add("selected");
            }
          });
        });

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


     
    </script>
      <script>
    const ctx = document.getElementById('order-chart').getContext('2d');

    const data = {
      labels: ['Incidents'], 
      datasets: [
        {
          label: 'En cours',
          data: [<?php echo $row_incident['nombre_incident'] ?>], 
          backgroundColor: 'blue',
        },
        {
          label: 'Réussis',
          data: [<?php echo $row_incident_reussi['nombre_incident_reussi'] ?>], 
          backgroundColor: 'green',
        },
        {
          label: 'Ratés',
          data: [<?php echo $row_incident_rate['nombre_incident_rate'] ?>],
          backgroundColor: 'red',
        },
      ],
    };

    const options = {
      responsive: true,
      plugins: {
        legend: {
          display: true,
          position: 'top',
        },
      },
      scales: {
        x: {
          beginAtZero: true,
        },
        y: {
          beginAtZero: true,
        },
      },
    };

    const orderChart = new Chart(ctx, {
      type: 'bar', // Graphique à barres
      data: data,
      options: options,
    });
  </script>
    <script>
  function toggleMenu(event) {
    const menu = event.target.closest('td').querySelector('.menu');
    menu.style.display = menu.style.display === 'none' ? 'block' : 'none';
  }
</script>
  </body>
</html>
