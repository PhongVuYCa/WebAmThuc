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
    <div class ="tkdt">
    <ul class=tkdt1>
        <li>
        <li><a href="DoanhTTT.php"><button class="choxacnhan">Doanh thu theo tháng</button></a></li>
        <li><a href="KHtiemnang.php"><button class="dangvanchuyen">Khách hàng tiềm năng</button></a></li>
        <li><a href="bieudo.php"><button class="dangvanchuyen">Biểu đồ</button></a></li>
            <form class="tkdt2" action="searchkhtn.php" method="post">
                <li><select name="thang">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                    <option>11</option>
                    <option>12</option>
                </select></li> &emsp;
                <li><select name ="nam">
                    <option>2022</option>
                    <option>2023</option>
                </select></li> &emsp;
                <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
            </form>
        </li>
    </ul>
</div>
    <div class="doanhthu">
<table>
    <caption>Khách hàng tiềm năng</caption>
    <tr>
        <td>STT</td>
        <td>Họ tên khác hàng</td>
        <td>Số Điện thoại</td>
        <td>Email</td>
        <td>Dịa chỉ</td>
        <td>Tổng tiền</td>
    </tr>

<?php
    include("localhost.php");
    $ngayht = date("Y-m-d H:i:s");
    $sql = "SELECT TenKH, phone, email,diachi,sum(thanhtien) as tongtien from doanhthu where doanhthu.tinhtrang='Đã giao'  group by TenKH, phone, email,diachi order by tongtien desc LIMIT 20";
    $result = $conn->query($sql);
    $stt=1;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {  

            
        // echo  '<tr>';
        echo  ' <tr><td>'.($stt++).'</td>
                    <td>'.$row["TenKH"].'</td>
                    <td>'.$row["phone"].'</td>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["diachi"].'</td>
                    <td>'.$row["tongtien"].'</td>
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
    include("footer.php");
?>
</body>
</html>