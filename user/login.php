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

<aside class="login">
<div class="login1">
<?PHP
    include("localhost.php");
        
    if (isset($_POST['username'])){
    
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
    $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
    $result = mysqli_query($conn,$query) or die(mysqli_error(exit));
    $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['username'] = $username;
            echo '<script language="javascript">alert("Đăng nhập thành công!"); window.location="home.php";</script>';
        }else{
            echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng!"); window.location="login.php";</script>';
            
        }
    }else{
?>
<div class="form">
<h1>Đăng nhập</h1>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Tên đăng nhập" required />
<input type="password" name="password" placeholder="Mật khẩu" required />
<input name="submit" type="submit" value="Đăng nhập" />&emsp;<a href="quenmk.php">Quên mật khẩu<a><br><br>
</form>
Bạn chưa có tài khoản? <p><a href='registration.php'>Đăng ký ngay</a></p><br/>

</div>
<?php } ?>
</div>
    </aside>
    <?php 
   include("footer.php");echo "<br>";
?>
</body>
</html>
