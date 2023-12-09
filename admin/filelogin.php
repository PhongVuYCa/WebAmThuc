
<div class="login1">
<?PHP
    include("localhost.php");
        
    if (isset($_POST['adminname'])){
    
    $adminname = stripslashes($_REQUEST['adminname']);
    $adminname = mysqli_real_escape_string($conn,$adminname);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);
        $query = "SELECT * FROM `admin` WHERE adminname='$adminname' and password='".md5($password)."'";
    $result = mysqli_query($conn,$query) or die(mysqli_error(exit));
    $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['adminname'] = $adminname;
            echo '<script language="javascript">alert("Đăng nhập thành công!"); window.location="admin.php";</script>';
            
        }else{
            echo '<script language="javascript">alert("Tên đăng nhập hoặc mật khẩu không đúng!"); window.location="index.php";</script>';
            
        }
    }else{
?>
<div class="form">
<h1>Đăng nhập</h1>
<form action="" method="post" name="login">
<input type="text" name="adminname" placeholder="Tên đăng nhập" required />
<input type="password" name="password" placeholder="Mật khẩu" required />
<input name="submit" type="submit" value="Đăng nhập" />&emsp;<a href="quenmk.php">Quên mật khẩu<a>
</form>
</div>
<?php } ?>
</div>