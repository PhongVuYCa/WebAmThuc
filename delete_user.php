<?php
    
    $id = addslashes($_GET['id']);
    include("localhost.php");
    
    $sql = "delete from users where id='$id'";
    $result = $conn->query($sql);
    if($result){
      
      header('location:user.php');}
?>