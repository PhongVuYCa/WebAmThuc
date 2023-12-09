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
    $title = addslashes($_POST['t1']);
    $thumbnail = addslashes($_POST['t2']);
    $ingredient = addslashes($_POST['t3']);
    $content = addslashes($_POST['t4']);
    $updated_at = date("Y-m-d H:i:s");
    include("localhost.php");
    $sql = "update thongtin set 
            title='$title', 
            thumbnail='$thumbnail',
            ingredient='$ingredient', 
            updated_at='$updated_at',
            content='$content' 
            where id='$id'";
   $result=mysqli_query($conn,$sql);
   if ($result){
      echo '<script language="javascript">alert("Chỉnh sửa thành công!"); window.location="thongtin.php";</script>';
   }

   else
        echo '<script language="javascript">alert("Chỉnh sửa thất bại!"); window.location="guide_ad.php?idhd=id";</script>';
            
   $conn->close();
?>
    </aside>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>