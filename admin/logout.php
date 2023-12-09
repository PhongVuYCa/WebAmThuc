<?php
session_start();
if(isset($_SESSION["adminname"])!= null)
{
    unset($_SESSION["adminname"]);
    unset($_SESSION["idadmin"]);
    header("location:index.php");
}
?>
