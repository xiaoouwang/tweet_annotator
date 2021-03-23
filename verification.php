<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"/>
    <title>verification</title>
    <style>
        html, body {
            height: 100%;
        }

        a {
            color: white !important;
        }

        a:hover {
            color: white !important;
        }
    </style>
</head>

<body>
<?php
// set session
session_start();
// récupérer les données soumises par l'annotateur
$_SESSION["n_etudiant"] = $_POST['n_etu'];
$_SESSION["nom"] = $_POST['nom'];
$_SESSION["prenom"] = $_POST['prenom'];
$prenom = $_POST['prenom'];
$nom = $_POST['prenom'];
$n_etudiant = $_POST['n_etu'];
$mdp = $_POST['mdp'];
try {
    // on se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=dailyfre_projet;charset=utf8', 'dailyfre_xiaoouwang', 'Fred871113,');
    // $bdd = new PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', 'root');
} catch (Exception $e) {
    // en cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}

// verifier s'il existe un enregistrement correspondant
$bienvenue = $bdd->query("SELECT n_etudiant, nom, prenom, pass FROM info_annotateur WHERE n_etudiant = '$n_etudiant' and nom = '$nom' and prenom = '$prenom' and pass = '$mdp'") or die(print_r($bdd->errorInfo()));
if ($d = $bienvenue->fetch()) {
    header("Location: annotation.php");
} else {
    ?>

    <div class="container h-100 d-flex justify-content-center">

        <div class="jumbotron my-auto">
            <h1>Désolé, profil non trouvé. Veuillez les resaisir.</h1>
            <br>
            <!--            <h1 class="display-3">Désolé, dans notre groupe d'annotateurs selon vos saisies. Veuillez les resaisir.</h1>-->
            <button class='btn btn-lg btn-primary btn-block'><a href='index.php'>
                    Revenir à la page de connection</a></button>
        </div>
    </div>


    <?php
}
?>
$bienvenue->closeCursor();
?>
</body>

</html>