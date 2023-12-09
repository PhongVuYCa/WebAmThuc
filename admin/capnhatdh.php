<?php
    $id=$_GET['id'];
    include("localhost.php");
    $updated_at = date("Y-m-d H:i:s");
    $sql="select * from donhang where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if($row['tinhtrang']=="Chờ xác nhận"){
        $sql1="update donhang set tinhtrang='Đang vận chuyển', updated_at='$updated_at' where id=$id";
        $result1 = $conn->query($sql1);
        if($result1){
            header("location:donhang.php");
        }
    }
    if($row['tinhtrang']=="Đang vận chuyển"){
        $sql1="update donhang set tinhtrang='Đã giao', updated_at= '$updated_at' where id=$id";
        $result1 = $conn->query($sql1);
        $sql2="update doanhthu set tinhtrang='Đã giao', ngaygiao= '$updated_at' where iddh=$id";
        $result2 = $conn->query($sql2);
        if($result1 && $result2){
            header("location:donhang.php");
        }
    }
    else {header("location:donhang.php");}
?>