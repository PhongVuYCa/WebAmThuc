<?php
   session_start();
   //session_destroy();
   if($_GET["idsp"]){
      include("localhost.php");
      $idsp=$_GET["idsp"];
      $sql = "SELECT * FROM sanpham where id=$idsp";
      $result = $conn->query($sql);
      $row = mysqli_fetch_assoc($result);
      $sl=$row['soluong'];
      if($sl>0){
      if(!isset($_SESSION['cart']) || $_SESSION['cart'] == null){
         $_SESSION['cart'][$idsp] = $row;
         $_SESSION['cart'][$idsp]['qty']=1;
      }else{
         if(array_key_exists($idsp,$_SESSION['cart'])){
            $_SESSION['cart'][$idsp]['qty']+=1;
         }
         else{
            $_SESSION['cart'][$idsp] = $row;
            $_SESSION['cart'][$idsp]['qty']=1;
         }
      }
   }
   }header("location:ingredient.php");
?>
