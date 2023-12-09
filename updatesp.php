<?php
   session_start();
   $_SESSION['cart1'];
   if(isset ($_POST['update'])){
      foreach($_POST['qty'] as $key=>$val){
         if($val <= 0){
            unset($_SESSION['cart1'][$key]);
         }
         else{
            $_SESSION['cart1'][$key]['qty'] = $val;
         }
      }
   }
   header("location:basket_us.php");
?>