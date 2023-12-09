<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng kí</title>
<link rel="stylesheet" href="style.css"/> 
</head>
<body >
<?php 
        include("header.php");echo "<br>";?>
<div class="row">

    <?php 
        include("menuin.php");
    ?>
<aside class="registration">
<div class="registration1">
<?php
    include("localhost.php");
    if (isset($_REQUEST['name'])&& isset($_REQUEST['fullname'])&&isset($_REQUEST['password'])&&isset($_REQUEST['phone'])&&isset($_REQUEST['email'])&&isset($_REQUEST['adress'])){
        $name = stripslashes($_REQUEST['name']);
        $name = mysqli_real_escape_string($conn,$name);
        $fullname = stripslashes($_REQUEST['fullname']);
        $fullname = mysqli_real_escape_string($conn,$fullname);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn,$password);
        $phone = stripslashes($_REQUEST['phone']);
        $phone = mysqli_real_escape_string($conn,$phone);
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($conn,$email);
        $adress = stripslashes($_REQUEST['adress']);
        $adress = mysqli_real_escape_string($conn,$adress);
        $created_at = date("Y-m-d H:i:s");
        $updated_at = date("Y-m-d H:i:s");
        $sql = "INSERT into `users` (username, fullname, password,phone, email,adress, created_at,updated_at) VALUES ('$name', '$fullname','".md5($password)."','$phone', '$email','$adress', '$created_at','$updated_at)')";
        $result = $conn->query($sql);

        if($result){
            echo '<script language="javascript">alert("Đăng ký thành công!"); window.location="login.php";</script>';

        }
    }else{
    
?>
<div class="formdk">
<h1>Đăng ký</h1>
<form name="registration" action="" method="post">
<input type="text" name="name" placeholder="Tên đăng nhập" required />
<input type="text" name="fullname" placeholder="Họ tên" required />
<input type="password" name="password" placeholder="Mật khẩu" required />
<input type="tel" name="phone" placeholder="số điện thoại" required />
<input type="email" name="email" placeholder="Email" required />
<input type="text" name="adress" placeholder="Địa chỉ" required />
<input type="submit" name="submit" value="Đăng ký" />
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
