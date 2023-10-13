<?php
session_start();
if(isset($_SESSION['username'])){ ?>
    <?php
    include "init.php";
?>


<?php
    include "include/templates/footer.php";
?>
<?php } else{
    header('location:login.php');
}
?>

