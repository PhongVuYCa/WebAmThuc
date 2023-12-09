
<meta charset="utf-8" />
<div class="giohang">
    
<?php


$_SESSION['sum1']=0;

    if(isset($_SESSION['cart1']) && $_SESSION['cart1'] != null){?>
        <div class="orders_us">
        <a href="order_us.php"><button>Đặt hàng</button></a>
    </div><?php
        echo "<form action='updatesp.php' method='post'>";
        echo "<table border='1' width='100%'>";
        echo "<caption>Thông tin giỏ hàng:</caption>";
        echo "<tr>";
        echo "<td>Hình ảnh</td>";
        echo "<td>Tên sản phẩm</td>";
        echo "<td>Số lượng</td>";
        echo "<td>Giá</td>";
        echo "<td>Thành tiền </td>";
        echo "<td>Xóa</td>";
        echo "<tr>";
        foreach ($_SESSION['cart1'] as $list){
           echo "<tr>";
           echo "<td><center>".'<img src='.$list['thumbnail'].' width="100" height="70">'."</center></td>";
           echo "<td>".$list['titlesp']."</td>";
           echo "<td><center><input type='number' value='".$list['qty']."' name='qty[".$list['id']."]' min='1' max='".$list['soluong']."'/></center></td>";
           echo "<td>".$list['price']." đ</td>";
           echo "<td>".($list['qty']*$list['price'])." đ</td>";
           echo "<td><a href ='delete_us.php?id=".$list['id']."'>Xóa</a></td>";
           echo "</tr>";
           $sum=$list['qty']*$list['price'];
           $_SESSION['sum1']+=$sum;


        }

        echo "</table>";?>
        <div class="sum">
            <?php
                echo  "Tổng tiền: ".$_SESSION['sum1']."đ";
            ?>
        </div>
        <?php
        echo    "<p align='right' width='600'>
             <input type='submit' value='Update' name='update' />
             </p>
             ";
        echo "</form>";
        ?></div>
        
            <?php

    }
    else {
        ?>
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
            where username = '$name'";
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
</div>
   <?php }?>
