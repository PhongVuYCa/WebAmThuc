<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>web</title>
<link rel="stylesheet" href="style1.css"/> 
</head>
<body >
<?php 
        include("header.php");?>
<div class="row">
<article>
    <img src="img/OIP.jpg" width=192px height="450px">
</article>
<aside class="login">
<div class="login1">
<?PHP
    include("localhost.php");
        
    if (isset($_POST['pass']) && $_POST['pass']==$_POST['pass1']){
        $idthaydoimk = addslashes($_SESSION['thaydoimk']);
        $pass = stripslashes($_REQUEST['pass']);
        $pass = mysqli_real_escape_string($conn,$pass);
        $query = "update `admin` set password = '".md5($pass)."' where id = '$idthaydoimk'";
        $result = mysqli_query($conn,$query);
        echo $pass;
        if($result){
            echo '<script language="javascript">alert("Thay đổi mật khẩu thành công!"); window.location="index.php";</script>';
        }else{
            echo '<script language="javascript">alert("không thay đổi được password!"); window.location="xuly.php";</script>';
            
        }
    }else{
?>
<div class="form">
<h1>Quên mật khẩu</h1>
<form action="" method="post" name="login">
<input type="password" name="pass" placeholder="Nhập mật khẩu mới" required />
<input type="password" name="pass1" placeholder="Nhập lại mật khẩu mới" required />
<input name="submit" type="submit" value="Tiếp tục" />
</form>

</div>
<?php } ?>
</div>
</aside>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>
