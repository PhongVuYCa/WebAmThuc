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
    include("header1.php");
?>
<div class="row">

    <?php 
        include("menu.php");
    ?>
    <aside >

    <div class="information">
<table>
    <caption>Thông tin cá nhân</caption>

<?php
    include("localhost.php");
    $user = $_SESSION['username'];
    $sql = "SELECT * from users where username='$user'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
    $_SESSION['iduser']=$row['id'];
    ?>
    <tr>
        <td>Tên đăng nhập</td>
        <td><?php echo $row["username"] ;?></td>
    </tr>
    <tr>
        <td>Họ và tên</td>
        <td><?php echo $row["fullname"] ;?></td>
    </tr>
    <tr>
        <td>Số điện thoại</td>
        <td><?php echo $row["phone"] ;?></td>
    </tr>
    <tr>
        <td>email</td>
        <td><?php echo $row["email"] ;?></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><?php echo $row["address"] ;?></td>
</tr>

</table><a href="updateuser.php"><button>Chỉnh sửa</button></a>
</div>

</aside>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>