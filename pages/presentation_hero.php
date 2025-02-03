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
$heroData = null;
if (isset($_GET['hero'])) {
    $hero = $_GET['hero'];

    if (!is_numeric($hero)) {
        die("ID invalide !");
    }

    $sql = "SELECT * FROM hero WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hero]);

    $heroData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $sql2 = "SELECT * FROM user WHERE id = ?"; 
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute([$heroData['user_id']]);
    $user = $stmt2->fetch(); 
    if (!$heroData) {
        die("Aucun héros trouvé.");
    }
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo  $heroData['pseudo']  ?></title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../styles/presentation_hero.css" />

  </head>
  <body
    class="font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover"
    style="
      background-image: url('<?php echo $heroData['fond'] ?>');
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
              background-image: url('<?php echo $user['image']; ?>');
            "
          ></div>

          <h1 class="text-3xl font-bold pt-8 lg:pt-0"><?php echo  $heroData['pseudo']  ?></h1>
          <div
            class="mx-auto lg:mx-0 w-4/5 pt-3 border-b-2 border-green-500 opacity-25"
          ></div>
          <div class="flex contenue">
          <div>
          <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
            <span> Nom </span> : <?php echo  $heroData['nom']  ?>
          </p>

          



          <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
            <span> Compétence </span> : <?php  echo $heroData['competence'] ?>  
          </p>

          <p
            class="pt-4 text-base font-bold flex justify-center lg:justify-start"
          >
         <span>  Réputations</span> : <?php if (!empty($heroData['avis'])) {
           echo ($heroData['reputation'] / $heroData['avis']);
         }else{
          echo "0";
         } ?> / 10
          </p>
          </div>
          <div class="contenue2" >
          <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
        <span>  prénom</span>  : <?php  echo $heroData['prenom'] ?>
          </p>
          <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
         <span>  Interventions : </span>: <?php  echo $heroData['total_interventions'] ?> Interventions
          </p>
            <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
          <span> Citoyens Sauvés</span> : <?php  echo $heroData['citizens_saved'] ?> Citoyens
          </p></div>
        </div>
        <p
            class="pt-4 text-base font-bold flex  justify-center lg:justify-start"
          >
        <span>  Biographie</span>  : <?php  echo $heroData['bio'] ?>
          </p>
          <div class="pt-12 pb-8 text-right">
            
            <form action="../php/note.php" method="POST">
              <input type="hidden" name="hero" value="<?php echo $heroData['id'] ?>"> 

<div class="rating">
  <input type="radio" id="star-1" name="reputation" value="10">
  <label for="star-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
  <input type="radio" id="star-2" name="reputation" value="8">
  <label for="star-2">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
  <input type="radio" id="star-3" name="reputation" value="6">
  <label for="star-3">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
  <input type="radio" id="star-4" name="reputation" value="4">
  <label for="star-4">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
  <input type="radio" id="star-5" name="reputation" value="2">
  <label for="star-5">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path pathLength="360" d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"></path></svg>
  </label>
</div>

              <input  type="submit" value="Envoyer">
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
      <div>

      <?php if ($hero_id == $hero){ ?>
        
      <form  action="../php/fond.php" method="POST" enctype="multipart/form-data" id="file-form">
        <div class="changer">

               <label for="file-input" class="custom-file-label">Changer de fond</label>
             
               <input type="file" id="file-input" name="image" style="display: none;">
                </div>
               <input type="hidden" name="hero" id="" value="<?php echo $heroData['id'] ?>">
              
              </form>
              <?php
              } ?>
      </div>
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
