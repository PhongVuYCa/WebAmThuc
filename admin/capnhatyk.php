<?php
    $id=$_GET['id'];
    include("localhost.php");
    $sql="select * from donggopykien where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row['tinhtrang']=="Chưa xử lý"){
        $sql1="update donggopykien set tinhtrang='Đã xử lý' where id=$id";
        $result1 = $conn->query($sql1);
        if($result1){
            header("location:contact.php");
        }
    }
    else {header("location:contact.php");}
?>