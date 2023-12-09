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
    $id = addslashes($_POST['id']);
    $titlesp = addslashes($_POST['t1']);
    $thumbnail = addslashes($_POST['t2']);
    $price = addslashes($_POST['t3']);
    $sl = addslashes($_POST['t4']);
    $contentsp = addslashes($_POST['t5']);
    $updated_at = date("Y-m-d H:i:s");
    include("localhost.php");
    $sql = "update sanpham set 
            titlesp='$titlesp', 
            thumbnail='$thumbnail',
            soluong='$sl', 
            price='$price',
            updated_at='$updated_at',
            contentsp='$contentsp' 
            where id='$id'";
   $result=mysqli_query($conn,$sql);
   if ($result){
      echo '<script language="javascript">alert("Chỉnh sửa thành công!"); window.location="sanpham.php";</script>';
   }

   else
        echo '<script language="javascript">alert("Chỉnh sửa thất bại!"); window.location="guidesp_ad.php?idhd=id";</script>';
            
   $conn->close();
?>
    </aside>
</div>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>