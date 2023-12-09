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
    $title = addslashes($_POST['t1']);
    $thumbnail = addslashes($_POST['t2']);
    $namedm = addslashes($_POST['t3']);
    $ingredient = addslashes($_POST['t4']);
    $content = addslashes($_POST['t5']);
    $created_at = date("Y-m-d H:i:s");
    $updated_at = date("Y-m-d H:i:s");
    include("localhost.php");
    echo $namedm;
    $sql = "select * from danhmuc where namedm='$namedm'";
    $result=mysqli_query($conn,$sql);
    $row = $result->fetch_assoc();
    $iddm= addslashes($row['id']);
    echo $iddm;
    $add = "insert into thongtin(title,thumbnail,id_danhmuc,ingredient,content,created_at,updated_at) values ('$title','$thumbnail','$iddm','$ingredient',' $content','$created_at','$updated_at')";
    $resultadd=mysqli_query($conn,$add);
   if ($resultadd){
      echo '<script language="javascript">alert("Thêm thành công!"); window.location="thongtin.php";</script>';
   }

   else
        echo '<script language="javascript">alert("Thêm thất bại!"); window.location="addtt.php?idhd=id";</script>';
            
   $conn->close();
?>
    </aside>
</div>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>