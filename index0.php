<!DOCTYPE>
<html>
<?php require 'db_config.php';
session_start(); ?>
<head>
    <title>Tweet Annotation</title>
    <link rel="stylesheet" href="style.css">
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
            crossorigin="anonymous"
    />
</head>
<body>
<div class="title d-flex justify-content-center">Tweet Annotation</div>
<?php
//    echo 'Session variables are' . $_SESSION['clicks'] . $_SESSION;
?>

<?php
// si clicks existe incremente la question id
if (isset($_POST['clicks']) || isset($_GET['start'])) {
    @$_SESSION['clicks'] += 1;
    $c = $_SESSION['clicks'];
    if (isset($_POST['userans'])) {
        $userselected = $_POST['userans'];
        $fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$c-1";
        $result2 = mysqli_query($con, $fetchqry2);
    }
} else {
    $_SESSION['clicks'] = 0;
}
?>
<div><br>
    <form><?php if ($_SESSION['clicks'] == 0) { ?>
            <div class="d-flex justify-content-center">
                <button class="button" name="start">
                    <span>Commencez l'annotation</span>
                </button>
            </div>
        <?php } ?>
    </form>
</div>
<form action="" method="post">
    <table><?php if (isset($c)) {
            $fetchqry = "SELECT * FROM `quiz` where id='$c'";
            $result = mysqli_query($con, $fetchqry);
            $num = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        ?>
        <tr>
            <td><h3><br><?php echo @$row['que']; ?></h3></td>
        </tr> <?php if ($_SESSION['clicks'] > 0 && $_SESSION['clicks'] < 6) { ?>
            <tr>
                <td><input required type="radio" name="userans"
                           value="<?php echo $row['option 1']; ?>">&nbsp;<?php echo $row['option 1']; ?><br>
            <tr>
                <td><input required type="radio" name="userans"
                           value="<?php echo $row['option 2']; ?>">&nbsp;<?php echo $row['option 2']; ?></td>
            </tr>
            <tr>
                <td><input required type="radio" name="userans"
                           value="<?php echo $row['option 3']; ?>">&nbsp;<?php echo $row['option 3']; ?></td>
            </tr>
            <tr>
                <td><input required type="radio" name="userans"
                           value="<?php echo $row['option 4']; ?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    <button class="button3" name="click">Next</button>
                </td>
            </tr> <?php }
        ?>
        <form>
            <?php if ($_SESSION['clicks'] > 5) {
                $qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
                $result3 = mysqli_query($con, $qry3);
                $storeArray = array();
                while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
                    if ($row3['ans'] == $row3['userans']) {
                        @$_SESSION['score'] += 1;
                    }
                }

                ?>


                <h2>Result</h2>
                <span>No. of Correct Answer:&nbsp;<?php echo $no = @$_SESSION['score'];
                    session_unset(); ?></span><br>
                <span>Your Score:&nbsp<?php echo $no * 2; ?></span>

            <?php } ?>
            <!-- <script type="text/javascript">
               function radioValidation(){
                   /* var useransj = document.getElementById('rd').value;
                   //document.cookie = "username = " + userans;
                   alert(useransj); */
                   var uans = document.getElementsByName('userans');
                   var tok;
                   for(var i = 0; i < uans.length; i++){
                       if(uans[i].checked){
                           tok = uans[i].value;
                           alert(tok);
                       }
                   }
               }
           </script> -->
            </div>
</body>
</html>