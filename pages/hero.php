<?php 
include("../php/session.php");
include('../php/header.php'); 
// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
    exit;
} 
?>
<?php

$query = "SELECT * FROM hero"; // Assure-toi que la table et les colonnes existent
$stmt = $pdo->prepare($query);
$stmt->execute();

// Récupérer tous les résultats
$hero = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nos Heros - Hero SOS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="../styles/hero.css" />
    <link rel="icon" href="../images/favicon-avengers.png" />

    <link
      href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700;900&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <section
      class="relative h-screen flex flex-col items-center justify-center text-center text-white"
    >
      <div
        class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden"
      >
        <video
          class="min-w-full min-h-full absolute object-cover"
          src="../images/marvel.mp4"
          type="video/mp4"
          autoplay
          muted
          loop
        ></video>
      </div>
      <div class="video-content space-y-2 z-10">
        <h1 class="text-6xl">Nos Héros du Quotidien</h1>
        <h3 class="text-3xl">Inspirer, transformer, et protéger des vies</h3>
      </div>
    </section>
    <section style="margin-top: 5em; margin-right: 2em; margin-left: 2em">
      <div
        class="flex justify-center sm:flex-col md:flex-col lg:flex-row xl:flex-row flex-col"
      >
        <div class="xl:w-1/2 lg:w-1/2 md:w-full sm:w-full">
          <img class="w-full" src="../images/hero/Q+SHIP+LAIDIIG.jpg" alt="" />
        </div>
        <div
          class="xl:w-1/2 lg:w-1/2 md:w-full sm:w-full xl:text-left lg:text-left md:text-center text-center"
          style="margin-left: 1em"
        >
          <h2 class="xl:text-5xl lg:text4xl md:text-3xl sm:text-2xl">
            <span>Les héros : gardiens de nos vies</span>
          </h2>
          <p class="xl:text-2xl lg:text-xl md:text-lg sm:text-md">
            Dans un monde où les défis et les dangers peuvent surgir à tout
            moment, nos héros se dressent en première ligne pour veiller sur
            nous. Ces gardiens de nos vies incarnent le courage, l'altruisme et
            le dévouement. Chaque geste qu'ils posent, chaque risque qu'ils
            prennent, est un rappel que la solidarité et la bienveillance sont
            des forces puissantes qui protègent et unissent nos communautés.
          </p>
        </div>
      </div>
    </section>

    <section style="margin-top: 5em; margin-right: 2em; margin-left: 2em">
      <div
        class="flex justify-center sm:flex-col md:flex-col lg:flex-row xl:flex-row flex-col"
      >
        <div
          class="xl:w-1/2 lg:w-1/2 md:w-full sm:w-full xl:text-right lg:text-right md:text-center text-center"
          style="margin-right: 1em"
        >
          <h2 class="xl:text-5xl lg:text4xl md:text-3xl sm:text-2xl">
            <span>Les sacrifices</span>
          </h2>
          <p class="xl:text-2xl lg:text-xl md:text-lg sm:text-md">
            Certains héros, dans leur quête de justice et de paix, ont offert
            leur vie pour changer le cours de l’histoire.Ces âmes courageuses
            ont choisi de se dresser face à l’injustice, souvent au prix de leur
            propre existence.. Leur sacrifice dépasse les frontières du temps et
            inspire des générations entières, rappelant que de grands progrès
            naissent souvent du courage et de l’abnégation. Ce sont leurs
            actions et leur mémoire qui continuent de guider le monde vers un
            avenir meilleur.
          </p>
        </div>
        <div class="xl:w-1/2 lg:w-1/2 md:w-full sm:w-full">
          <img class="w-full" src="../images/hero/legende.jpg" alt="" />
        </div>
      </div>
    </section>
    <section>
      <h2
        class="xl:text-5xl lg:text4xl md:text-3xl sm:text-2xl text-center"
        style="margin-top: 2em"
      >
        NOS HEROS :
      </h2>
      <div class="flex flex-wrap justify-center gap-4">
  <?php foreach ($hero as $heros): ?>
    <?php 
    $sql = "SELECT image FROM user WHERE id = ?"; 
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$heros['user_id']]);
    $user = $stmt->fetch(); 
    ?>
        <?php echo "<a class='w-full sm:w-1/2 md:w-1/3 p-2 text-center hauteur' href='presentation_hero.php?hero=" . htmlspecialchars($heros['id']) . "'>" ?>

    <div >
        <img class="w-full hauteur max-w-[150px] mx-auto rounded-lg" src="<?php echo $user['image']; ?>" alt="Image de <?php echo htmlspecialchars($heros['pseudo']); ?>" />
        <h3 class="text-white text-lg mt-2"><?php echo htmlspecialchars($heros['pseudo']); ?></h3>
    </div></a>
  <?php endforeach; ?>
</div>




    </section>
     <?php include ("../php/footer.php") ?>

  </body>
</html>
