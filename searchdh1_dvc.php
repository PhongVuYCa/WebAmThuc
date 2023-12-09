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
    <div class ="tkdh">
    <ul class=tkdh1>
        <li>
        <li><a href="choxacnhan1.php"><button class="choxacnhan">Chờ xác nhận</button></a></li>
        <li><a href="dangvanchuyen1.php"><button class="dangvanchuyen">Đang vận chuyển</button></a></li>
        <li><a href="dagiao1.php"><button class="dagiao">Đã giao</button></a></li>
        <li><a href="dahuy1.php"><button class="dahuy">Đã hủy</button></a></li>
            <form class="tkdh2" action="searchdh1_dvc.php" method="post">
                <li><input type="text" name="tk1" placeholder="Tìm kiếm khách hàng" ></li> &emsp;
                <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
            </form>
        </li>
    </ul>
</div>
    <div class="donhang1">
<table>
    <caption>Thông tin đơn hàng</caption>
    <tr>
        <td>STT</td>
        <td>Tên khách hàng</td>
        <td>Số điện thoại</td>
        <td>Địa chỉ</td>
        <td>Tổng Tiền</td>
        <td>Tình trạng</td>
        <td>Cập nhật</td>
        <td>Hủy đơn</td>
        <td>Xem chi tiết</td>
    </tr>
<?php
    include("localhost.php");
    $tk = addslashes($_POST['tk1']);
    $sql = "SELECT * from orders where tinhtrang='Đang vận chuyển' and namekh like '%$tk%'";
    $result = $conn->query($sql);
    $stt=1;
    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  
        // echo  '<tr>';
            echo  ' <tr><td>'.($stt++).'</td>
                        <td>'.$row["namekh"].'</td>
                        <td>'.$row["phone"].'</td>
                        <td>'.$row["address"].'</td>
                        <td>'.$row["tong"].'</td>
                        <td>'.$row["tinhtrang"].'</td>';
                        if($row["tinhtrang"]=="Chờ xác nhận"){
                            echo '<td><a href="capnhatdh1.php?id='.$row["id"].'"><button class="sua">Đang vận chuyển</button></a></td>';
                        }
                        else {
                        echo '<td><a href="capnhatdh1.php?id='.$row["id"].'"><button class="sua">Đã giao</button></a></td>';
                        }
            echo   '<td><a href="huyhd1.php?id='.$row["id"].'"><button class="huy">Hủy đơn</button></a></td>
                        <td><a href="chitietdh1.php?id='.$row["id"].'"><button class="chitiet">Chi tiết</button></a></td>
                        </tr>';
            ?>
            </div>
            <?php
        }
        // echo '</table>';
    } 

    $conn->close();
    ?>
</table>
</div>
</aside>
</div>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>