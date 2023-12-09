<?php
    session_start();
    include("localhost.php");
    $username=$_SESSION['username'];
    $sum=$_SESSION['sum1'];
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
    $sql5= "select * from users where username = '$username' ";
    $result5=mysqli_query($conn,$sql5);
    $rows = $result5->fetch_assoc();
    $iduser= $rows['id'];
    $fullname=$rows['fullname'];
    $phone=$rows['phone'];
    $email=$rows['email'];
    $diachi=$rows['address'];
    $sql="insert into donhang(iduser,tong,tinhtrang,created_at,updated_at) values('$iduser','$sum','Chờ xác nhận','$created_at','$updated_at')";
    $result=mysqli_query($conn,$sql);
    foreach ($_SESSION['cart1'] as $list){
        $qty=addslashes($list['qty']);
        $idsp=addslashes($list['id']);
        $tonggia=addslashes($list['qty']*$list['price']);
        $sql4="select max(id) as idtk from donhang";
        $result4=mysqli_query($conn,$sql4);
        $row4 = $result4->fetch_assoc();
        $iddh= $row4['idtk'];

        $sql6= "select * from sanpham where id = '$idsp' ";
        $result6=mysqli_query($conn,$sql6);
        $rows1 = $result6->fetch_assoc();
        $gia= $rows1['price'];

        $sql1="insert into chitietdonhang(iddh,idsp,qty,tonggia,created_at,updated_at) 
                values('$iddh','$idsp','$qty','$tonggia','$created_at','$updated_at')";
        $result1=mysqli_query($conn,$sql1);

        $dt="insert into doanhthu(iddh,idsp,TenKH,phone,email,diachi,gia,soluong,thanhtien,tinhtrang,ngaygiao) values('$iddh','$idsp','$fullname','$phone','$email','$diachi','$gia','$qty','$tonggia','Chưa giao','$updated_at')";  
            $doanhthu=  $conn->query($dt);

        $sql3= "select *from sanpham where id=$idsp";
        $result3=mysqli_query($conn,$sql3);
        $row = $result3->fetch_assoc();
        $soluong=$row['soluong'];
        $soluongcon=addslashes($soluong-$qty);
        $sql2 = "update sanpham set 
                soluong='$soluongcon', 
                updated_at='$updated_at' 
                where id=$idsp";
        $result2=mysqli_query($conn,$sql2);
        
        if($result2){
            unset($_SESSION['cart1'][$idsp]);
        }
        }


    header("location:basket_us.php");
?>