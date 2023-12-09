<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>web</title>
<link rel="stylesheet" href="style.css"/> 
</head>
<body >
<?php 
    include("header_ad.php");echo "<br>";
?>
<div class="row">

    <?php 
        include("menu_ad.php");
    ?>
    <aside >
<?php
    $titlesp = addslashes($_POST['t1']);
    $thumbnail = addslashes($_POST['t2']);
    $price = addslashes($_POST['t3']);
    $sl = addslashes($_POST['t4']);
    $contentsp = addslashes($_POST['t5']);
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
    include("localhost.php");
    $add = "insert into sanpham(titlesp,thumbnail,id_danhmuc,price,soluong,contentsp,created_at,updated_at) values ('$titlesp','$thumbnail','15','$price','$sl',' $contentsp','$created_at','$updated_at')";
    $resultadd=mysqli_query($conn,$add);
   if ($resultadd){
      echo '<script language="javascript">alert("Thêm thành công!"); window.location="sanpham.php";</script>';
   }

   else
        echo '<script language="javascript">alert("Thêm thất bại!"); window.location="addsp.php?idhd=id";</script>';
            
   $conn->close();
?>
    </aside>
</div>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>