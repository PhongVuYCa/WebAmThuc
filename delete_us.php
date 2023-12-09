<?php
    session_start();
    $id = $_GET['id'];
    print_r($_SESSION['cart1']);
    unset($_SESSION['cart1'][$id]);
    header("location:basket_us.php");
?>
