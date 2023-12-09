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
    <div class="giohang">
    <div class="ctdonhang">
    <div class ="tkdh">
    <ul class=tkdh1>
        <li><a href="choxacnhan.php"><button class="choxacnhan">Chờ xác nhận</button></a></li>
        <li><a href="dangvanchuyen.php"><button class="dangvanchuyen">Đang vận chuyển</button></a></li>
        <li><a href="dagiao.php"><button class="dagiao">Đã giao</button></a></li>
        <li><a href="dahuy.php"><button class="dahuy">Đã hủy</button></a></li>
           
    </ul>
</div>
<table>
    <br><br><br><caption>Thông tin đơn hàng</caption>
    <tr>
        <td>STT</td>
        <td>Hình ảnh</td>
        <td>Tên sản phẩm</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Tình trạng</td>
        <td>Tổng giá</td>
    </tr>
<?php
    include("localhost.php");
    $name = $_SESSION['username'];
    $sql = "SELECT thumbnail,titlesp,price,qty,tonggia,tinhtrang from chitietdonhang
            join sanpham on sanpham.id= chitietdonhang.idsp
            join donhang on donhang.id=chitietdonhang.iddh
            join users on users.id=donhang.iduser
            where username = '$name' and donhang.tinhtrang='Đã giao'";
    $result = $conn->query($sql);
    $stt=1;
    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  
        // echo  '<tr>';
            echo  ' <tr><td>'.($stt++).'</td>
            <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                        <td>'.$row["titlesp"].'</td>
                        <td>'.$row["price"].'</td>
                        <td>'.$row["qty"].'</td>
                        <td>'.$row["tinhtrang"].'</td>
                        <td>'.$row["tonggia"].'</td></tr>';
            ?>
            </div>
            <?php
        }
        // echo '</table>';
    } 

    $conn->close();
    ?>
</table>
    </aside>
</div>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>