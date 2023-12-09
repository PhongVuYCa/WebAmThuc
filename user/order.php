<?php
    session_start();
    include("localhost.php");
    if($_REQUEST['t1']!=null && $_REQUEST['t2']!=null && $_REQUEST['t3']!=null && $_REQUEST['t4']!=null)
    {
        $name=$_REQUEST['t1'];
        $phone=$_REQUEST['t2'];
        $address=$_REQUEST['t3'];
        $email=$_REQUEST['t4'];
        $sum=$_SESSION['sum'];
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        $_SESSION['t1']=$_REQUEST['t1'];
        $_SESSION['t2']=$_REQUEST['t2'];
        $_SESSION['t3']=$_REQUEST['t3'];
        $_SESSION['t4']=$_REQUEST['t4'];
        $_SESSION['thanhtien']=$_SESSION['sum'];
        $sql="insert into orders(namekh,phone,email,address,tong,tinhtrang,created_at,updated_at) values('$name','$phone','$email','$address','$sum','Chờ xác nhận','$created_at','$updated_at')";
        $result=mysqli_query($conn,$sql);
        foreach ($_SESSION['cart'] as $list){
            $qty=addslashes($list['qty']);
            $idsp=addslashes($list['id']);
            $tonggia=addslashes($list['qty']*$list['price']);
            $sql4="select max(id) as idtk from orders";
            $result4=mysqli_query($conn,$sql4);
            $row4 = $result4->fetch_assoc();
            $iddh= $row4['idtk'];
            $_SESSION['iddh']=$row4['idtk'];

            $sql6= "select * from sanpham where id = '$idsp' ";
            $result6=mysqli_query($conn,$sql6);
            $rows1 = $result6->fetch_assoc();
            $gia= $rows1['price'];

            $sql1="insert into ctorders(iddh,idsp,qty,tonggia,created_at,updated_at) 
                    values('$iddh','$idsp','$qty','$tonggia','$created_at','$updated_at')";
            $result1=mysqli_query($conn,$sql1);

            $dt="insert into doanhthu(iddh,idsp,TenKH,phone,email,diachi,gia,soluong,thanhtien,tinhtrang,ngaygiao) values('$iddh','$idsp','$name','$phone','$email','$address','$gia','$qty','$tonggia','Chưa giao','$updated_at')";  
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
                unset($_SESSION['cart'][$idsp]);
            }
         }
    }

    header("location:basket.php");
?>