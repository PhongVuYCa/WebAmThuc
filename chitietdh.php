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

    <div class="ctdonhang">
<table>
    <caption>Thông tin chi tiết đơn hàng</caption>
    <tr>
        <td>STT</td>
        <td>Hình ảnh</td>
        <td>Tên sản phẩm</td>
        <td>Giá</td>
        <td>Số lượng</td>
        <td>Tổng giá</td>
    </tr>
<?php
    include("localhost.php");
    $id=$_GET['id'];
    $sql = "SELECT thumbnail,titlesp,price,qty,tonggia from chitietdonhang
            join sanpham on sanpham.id= chitietdonhang.idsp
            where chitietdonhang.iddh=$id";
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
</div>
</aside>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>