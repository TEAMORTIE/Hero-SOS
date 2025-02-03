<?php   
include("../php/session.php");
include("../php/header.php");

// Connexion avec PDO
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
} 

// Vérification et récupération des données du héros
$vilainData = null;
if (isset($_GET['vilain'])) {
    $vilain = $_GET['vilain'];

    if (!is_numeric($vilain)) {
        die("ID invalide !");
    }

    $sql = "SELECT * FROM vilain WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$vilain]);

    $vilainData = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$vilainData) {
        die("Aucun mechant trouvé.");
    }
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo  $vilainData['pseudo']  ?></title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../styles/presentation_hero.css" />

  </head>
  <body
    class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover"
    style="
      background-color : black;
    "
  >
  
    <div
      class="max-w-4xl flex items-center justify-center h-auto lg:h-screen flex-wrap mx-auto my-32 lg:my-0"
    >
      <!--Main Col-->
      <div
        id="profile"
        class="w-full lg:w-3/5 rounded-lg lg:rounded-l-lg lg:rounded-r-none shadow-2xl bg-white opacity-75 mx-6 lg:mx-0"
      >
        <div class="p-4 md:p-12 text-center lg:text-left">
          <!-- Image for mobile view-->
          <div
            class="block lg:hidden rounded-full shadow-xl mx-auto -mt-16 h-48 w-48 bg-cover bg-center"
            style="
              background-image: url('<?php echo $vilain['image']; ?>');
            "
          ></div>

          <h1 class="text-3xl font-bold pt-8 lg:pt-0"><?php echo  $vilainData['pseudo']  ?></h1>
          <div
            class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"
          ></div>
          <div class="flex contenue">
          <div>
          <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
            <span> Nom </span> : <?php echo  $vilainData['nom']  ?>
          </p>

          



          <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
            <span> vue a  </span> : <?php  echo $vilainData['lieu'] ?>  
          </p>

          <p
            class="pt-4 text-base font-bold flex justify-center lg:justify-start"
          >
         <span>  Specialite</span> : <?php if (!empty($vilainData['specialite'])) {
           echo ($vilainData['reputation'] / $vilainData['avis']);
         }else{
          echo "0";
         } ?>
          </p>
          </div>
          <div class="contenue2" >
          <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
        <span>  prénom</span>  : <?php  echo $vilainData['prenom'] ?>
          </p>
          <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
         <span>  Vilain capturer </span>: <?php  echo $vilainData['liberte'] ?> Interventions
          </p>
            <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
          <span> Citoyens Sauvés</span> : <?php  echo $vilainData['citizens_saved'] ?> Citoyens
          </p></div>
        </div>
        <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
        <span>  Biographie</span>  : <?php  echo $vilainData['bio'] ?>
          </p>
          <div class="pt-12 pb-8">
            
            <form action="../php/note.php" method="POST">
              <p>Note: <span id="rangeValue">5</span> sur 10</p>
              
              <input type="range" id="myRange" name="reputation" min="0" max="10" value="5"> 
               <input type="hidden" name="vilain" id="" value="<?php echo $vilainData['id'] ?>">

              <input type="submit" value="Envoyer">
              </form>
          </div>

          <div
            class="mt-6 pb-16 lg:pb-0 w-4/5 lg:w-full mx-auto flex flex-wrap items-center justify-between"
          >
           
            </a>
          </div>

          <!-- Use https://simpleicons.org/ to find the svg for your preferred product -->
        </div>
      </div>

      <!--Img Col-->
      <div
     class="w-full lg:w-2/5 hauteur">
        <!-- Big profile image for side bar (desktop) -->
        <img 
      style="height: 500px;
    object-fit: cover;"
          src="<?php echo $user['image'] ?>"
          class="rounded-none lg:rounded-lg shadow-2xl hidden lg:block"
        />
        <!-- Image from: http://unsplash.com/photos/MP0IUfwrn0A -->
      </div>

      <!-- Pin to top right corner -->
     
    </div>
<?php   include("../php/footer.php");
?><script>
  // Récupérer l'élément range et l'élément d'affichage
  var rangeInput = document.getElementById("myRange");
  var rangeValue = document.getElementById("rangeValue");

  // Mettre à jour la valeur affichée quand le range change
  rangeInput.oninput = function() {
    rangeValue.textContent = rangeInput.value;
  }

  // Optionnel: envoyer la valeur à un serveur via fetch ou AJAX
  function sendToDatabase() {
    var value = rangeInput.value;
    fetch('save_value.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: 'rangeValue=' + value
    });
  }
  
  // Appel de la fonction pour envoyer la valeur à la base de données
  rangeInput.addEventListener('change', sendToDatabase);
</script>
    <script src="https://unpkg.com/popper.js@1/dist/umd/popper.min.js"></script>
    <script src="https://unpkg.com/tippy.js@4"></script>
    <script>
  const fileInput = document.getElementById('file-input');
  const form = document.getElementById('file-form');

  fileInput.addEventListener('change', () => {
    if (fileInput.files.length > 0) {
      form.submit(); 
    }
  });
</script>
    
  </body>
</html>
