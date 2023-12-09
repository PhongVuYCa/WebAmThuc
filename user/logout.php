<?php
session_start();
if(isset($_SESSION["username"])!= null)
{
    unset($_SESSION["username"]);
    unset($_SESSION["iduser"]);
    header("location:index.php");
}
?>
