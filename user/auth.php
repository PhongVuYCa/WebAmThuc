<?php
session_start();
if(!isset($_SESSION["username"])){
echo '<a target="t4" href ="t4.php"><br>';
exit();
}
?>
