<?php
    
    $id = $_GET['id'];
    include("localhost.php");
    
    $sql = "delete from sanpham where id='$id'";
    $result = $conn->query($sql);
    if($result){
      
      header('location:sanpham.php');}
?>