<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <title>Page d'annotation</title>

  <!-- Bootstrap core CSS -->
  <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
  <!-- Custom styles for this template -->
  <link href="stylesheetPageAnnotation.css" rel="stylesheet" />
</head>

<body>
  <?php
  try {
    // on se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
  } catch (Exception $e) {
    // en cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
  }
  $tweets = $bdd->query('SELECT * FROM tweet');
  $pourcentage = array('25%', '50%', '75%', '100%');
  $registre = array('familier', 'courant', 'soutenu', 'poubelle');
  $descripteur_niveau = array('syntaxique', 'discursif', 'lexical', 'morpho_lexical', 'morphologique', 'phonetique');
  $descripteur = array('1', '2', '3');
  $signal = array('1', '2', '3');
  while ($donnees = $tweets->fetch()){
    echo "<div class='container'>
    <form  action='recuperer_donnees.php' method='post'>
    <div class='left-div'><p>" . $donnees['tweet'] . "</p> </div>
    <div class='right-div'>
    "
  ?>
  <?php
    echo "<div>$registre[0]";
    foreach ($pourcentage as $p) {
      echo "<button class='b1' name=$registre[0] type='button' value=$registre[0]$p>$p</button>";
    }
    echo "</div><br>";
    echo "<div>$registre[1]";
    foreach ($pourcentage as $p) {
      echo "<button class='b2' name=$registre[1] type='button' value=$registre[1]$p>$p</button>";
    }
    echo "</div><br>";
    echo "<div>$registre[2]";
    foreach ($pourcentage as $p) {
      echo "<button class='b3' name=$registre[2] type='button' value=$registre[2]$p>$p</button>";
    }
    echo "</div><br>";
    echo "<div>$registre[3]";
    foreach ($pourcentage as $p) {
      echo "<button class='b4' name=$registre[3] type='button' value=$registre[3]$p>$p</button>";
    }
    echo "<select name='choix_descripteur'>";
    foreach ($descripteur as $des) {
      echo "<option class='choix' value=$des>$des</option>";
    }
    echo "</select>";
    echo "</div><br></div>";

    echo "<select name='signal'>";
    foreach ($signal as $s) {
      echo "<option class='choix' value=$s>$s</option>";
    }
    echo "</select>";
    echo "<button type='submit'>
      Submit
    </button></form>
 </div>";
  }


  ?>
</body>

</html>