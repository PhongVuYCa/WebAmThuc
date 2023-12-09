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
      if(!isset($_SESSION['cart1']) || $_SESSION['cart1'] == null){
         $_SESSION['cart1'][$idsp] = $row;
         $_SESSION['cart1'][$idsp]['qty']=1;
      }else{
         if(array_key_exists($idsp,$_SESSION['cart1'])){
            $_SESSION['cart1'][$idsp]['qty']+=1;
         }
         else{
            $_SESSION['cart1'][$idsp] = $row;
            $_SESSION['cart1'][$idsp]['qty']=1;
         }
      }
   }
   
   }header("location:ingredient_us.php");
?>
