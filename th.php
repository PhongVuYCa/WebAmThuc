<?php
     session_start();
    include("localhost.php");
    $id=$_SESSION['idadmin'];
    $fullname = addslashes($_POST['t2']);
    $sex = addslashes($_POST['t3']);
    $phone = addslashes($_POST['t4']);
    $email = addslashes($_POST['t5']);
    $address = addslashes($_POST['t6']);
    $updated_at = date("Y-m-d H:i:s");
    $sql = "update admin set  
            fullname='$fullname', 
            sex = '$sex',
            email = '$email', 
            address='$address', 
            updated_at= '$updated_at' 
            where id= '$id'";
   $result=mysqli_query($conn,$sql);
   if ($result){
      echo '<script language="javascript">alert("Chỉnh sửa thành công!"); window.location="information.php";</script>';
   }

   else
        echo '<script language="javascript">alert("Chỉnh sửa thất bại!"); window.location="updateadmin.php?idhd=id";</script>';
            
   $conn->close();
?>