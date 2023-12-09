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
    include("header_ad.php");
?>
<div class="row">

    <?php 
        include("menu_ad.php");
    ?>
    <aside >

    <div class="information">
<table>
    <caption>Thông tin cá nhân</caption>

<?php
    include("localhost.php");
    $admin= $_SESSION['adminname'];
    $sql = "SELECT * from admin where adminname='$admin'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc(); 
    $_SESSION['idadmin']=$row['id'];
    ?>
    <tr>
        <td>Tên đăng nhập</td>
        <td><?php echo $row["adminname"] ;?></td>
    </tr>
    <tr>
        <td>Họ và tên</td>
        <td><?php echo $row["fullname"] ;?></td>
    </tr>
    <tr>
        <td>Giới tính</td>
        <td><?php echo $row["sex"] ;?></td>
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

</table><a href="updateadmin.php"><button>Chỉnh sửa</button></a>
</div>

</aside>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>