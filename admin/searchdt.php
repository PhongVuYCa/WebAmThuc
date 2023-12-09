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
        <li><a href="DoanhTTT.php"><button class="choxacnhan">Doanh thu theo tháng</button></a></li>
        <li><a href="KHtiemnang.php"><button class="dangvanchuyen">Khách hàng tiềm năng</button></a></li>
        <li><a href="bieudo.php"><button class="dangvanchuyen">Biểu đồ</button></a></li>
            <form class="tkdh2" action="searchdt.php" method="post">
                <li><input type="text" name="tk1" placeholder="Tìm kiếm thông tin" ></li> &emsp;
                <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
            </form>
        </li>
    </ul>
</div>
    <div class="doanhthu">
<table>
    <caption>Doanh thu</caption>
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
    $tk = addslashes($_POST['tk1']);
    $sql = "SELECT sanpham.id,thumbnail, titlesp,price,sum(doanhthu.soluong) as soluongban,sum(thanhtien) as tongtien from sanpham join doanhthu on doanhthu.idsp=sanpham.id where doanhthu.tinhtrang='Đã giao' and sanpham.titlesp like '%$tk%' group by sanpham.id,thumbnail, titlesp,price";
    $result = $conn->query($sql);

    $stt=1;
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