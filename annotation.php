<!DOCTYPE>
<html>
<?php require 'db_config.php';
session_start();
$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
?>
<head>
    <title>Tweet Annotation</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
            crossorigin="anonymous"
    />


</head>
<body>

<div class="title d-flex justify-content-center mb-1">Tweet Annotation</div>
<!--!change tweets here and set global variables-->
<?php
$colors = array("25%" => "btn btn-outline-secondary", "50%" => "btn btn-outline-info", "75%" => "btn btn-outline-success", "100%" => "btn btn-outline-primary");
$pourcentage = array('25%', '50%', '75%', '100%');
$registre = array('Familier', 'Courant', 'Soutenu', 'Poubelle');
$descripteur_niveau = array('syntaxique', 'discursif', 'lexical', 'morpho_lexical', 'morphologique', 'phonetique');
$descripteur_non_familier = array('1', '2');
$descripteur_familier = array('1', '2', '3');
//$signal = array('1', '2', '3');
$last_c = 0;
if (isset($_POST['click']) || isset($_GET['start'])) {
    $last_c = $_SESSION['clicks'];
    $_SESSION['clicks'] += 1;
    $id_question = $_SESSION['clicks'];
    if (isset($_POST['userans'])) {
        $userselected = $_POST['userans'];
        $update = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$id_question-1";
        $result_update = mysqli_query($con, $update);
    }
} else {
    $_SESSION['clicks'] = 0;
    $last_c = 0;
}
?>
<!--!end php-->

<!--! only if no tweets annotated show this screen-->
<div><br>
    <form>
        <?php if ($_SESSION['clicks'] == 0) { ?>
            <?php
            echo '<br>';
            echo '<h1 class = "d-flex justify-content-center" style="text-align: center">Bonjour ' . $prenom . ' ' . $nom . '.<br>Merci de votre participation.</h1>';
            echo '<br>';
            ?>
            <div class="d-flex justify-content-center">
                <button class="button" name="start">
                    <span>Commencez l'annotation</span>
                </button>
            </div>
        <?php } ?>
    </form>
</div>
<!--!end-->


<form action="" method="post">
    <!--! retrieve tweet here-->
    <?php
    $query_nb_questions = "SELECT COUNT(*) FROM tweet";
    $result_nb_questions = mysqli_query($con, $query_nb_questions);
    $nb_rows = mysqli_fetch_row($result_nb_questions);
    $remaining = $nb_rows[0] - $_SESSION["clicks"];
    if (isset($id_question)) {
        $fetchqry = "SELECT * FROM `tweet` where id_tweet ='$id_question '";
        //        $fetchqry = "SELECT * FROM `tweet` where id_tweet='$id_question '";
        $result = mysqli_query($con, $fetchqry);
        $num = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    ?>
    <!--    --><?php //echo $num; ?>
    <!--    !end php-->
    <!--    !start-->
    <?php if ($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < ($nb_rows[0] + 1)) { ?>
        <!--! show remaining tweets-->
        <div class="container text-center w-3 p-1 mb-0 mt-0">tweet numéro <p
                    class="text-primary d-inline"><?php echo $id_question; ?></p>, il reste <p
                    class="d-inline text-success"><?php
                echo $remaining;
                ?></p> tweets
        </div>

        <div class="container text-center border p-3 mb-0 w-50">
            <!--            !start-->
            <?php
            echo $row['tweet'] ?></div>
        <br>
        <!--            !end-->
        <!--        !start-->
        <?php
        foreach ($registre as $r) {
//            echo "<div class='container justify-content-center'>";
            echo '<div class="row justify-content-center mb-1 mt-0">';
            echo "<p class='border mb-1 mt-0'>$r</p>";
            echo '</div>';
            echo '<div class="btn-group-toggle row justify-content-center" data-toggle="buttons">';
            foreach ($pourcentage as $p) {
                echo "<label class=\"btn $colors[$p]\">";
                echo "<input type=\"radio\" name=\"$r\" value=\"$r$p\" id=\"$r$p\"> $p";
                echo "</label>";
//                echo "<button class='$colors[$p]' name=$r type='button' value=$r$p>$p</button>";
            }
            echo '</div>';

//            partie descripteur
            if ($r == "Familier") {
//                    3 descripteurs;
                echo '<div class="row justify-content-center mt-1 mb-0">';
                for ($i = 1; $i < 4; $i++) {
                    // code to repeat here
                    echo "<label for=\"'$r'\">descripteur $i&nbsp</label>";
                    echo "<select id=\"$r\">";
                    foreach ($descripteur_familier as $d) {
                        echo "<option class='choix' value=$d>$d</option>&n";
                    }
                    echo "</select>";
                }
                echo '</div>';;
            } else if ($r != "Poubelle") {
                echo '<div class="row justify-content-center mt-1 mb-0">';
                for ($i = 1; $i < 3; $i++) {
                    echo "<label class= \"m-1\" for=\"'$r'\">descripteur $i</label>";
                    echo "<select id=\"$r\">";
                    foreach ($descripteur_non_familier as $d) {
                        echo "<option class='choix' value=$d>$d</option>";
                    }
                    echo "</select>";
                }
                echo '</div>';
            }
//                echo "</div><br></div>";
//                echo "<select name='signal'>";
//                echo "</select>";
            echo "</div><br>";
        }
        ?>
        <!--        !end-->
        <div class="d-flex justify-content-center">
            <button class="btn btn-primary" name="click" type="submit">Next</button>
        </div>
    <?php }
    ?>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>