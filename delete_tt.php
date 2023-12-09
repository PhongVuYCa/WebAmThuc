<?php
    
    $id = $_GET['id'];
    include("localhost.php");
    
    $sql = "delete from thongtin where id='$id'";
    $result = $conn->query($sql);
    if($result){
      
      header('location:thongtin.php');}
?>