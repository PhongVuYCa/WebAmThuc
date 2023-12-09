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
            <form class="tkdt2" action="searchdttt.php" method="post">
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
    <caption>Doanh thu theo tháng</caption>
    <tr>
        <td>STT</td>
        <td>Hình ảnh</td>
        <td>Tên nguyên liệu</td>
        <td>Giá</td>
        <td>số lượng đã bán</td>
        <td>Thành tiền</td>
    </tr>

<?php
    include("localhost.php");
    $ngayht = date("Y-m-d H:i:s");
    $sql = "SELECT sanpham.id,thumbnail, titlesp,price,sum(doanhthu.soluong) as soluongban ,sum(thanhtien) as tongtien from sanpham  join doanhthu on doanhthu.idsp=sanpham.id where doanhthu.tinhtrang='Đã giao' and month(ngaygiao)=month('$ngayht') and year(ngaygiao)=year('$ngayht')  group by sanpham.id,thumbnail, titlesp,price";
    $result = $conn->query($sql);
    $stt=1;
    $tong=0;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {  

            
        // echo  '<tr>';
        echo  ' <tr><td>'.($stt++).'</td>
                    <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                    <td>'.$row["titlesp"].'</td>
                    <td>'.$row["price"].'</td>
                    <td>'.$row["soluongban"].'</td>
                    <td>'.$row["tongtien"].'</td>
                    </tr>';
            $tong=$tong+$row["tongtien"];
            ?>
            </div>
            <?php
        }
        ?>
        <tr><td colspan="5">TỔNG</td><td><?php echo $tong;?></td></tr>
        <?php
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