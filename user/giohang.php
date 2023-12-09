
<meta charset="utf-8" />
<div class="giohang">
<?php


$_SESSION['sum']=0;

    if(isset($_SESSION['cart']) && $_SESSION['cart'] != null){
        echo "<form action='update.php' method='post'>";
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
        foreach ($_SESSION['cart'] as $list){
           echo "<tr>";
           echo "<td><center>".'<img src='.$list['thumbnail'].' width="100" height="70">'."</center></td>";
           echo "<td>".$list['titlesp']."</td>";
           echo "<td><center><input type='number' value='".$list['qty']."' name='qty[".$list['id']."]' min='1' max='".$list['soluong']."'/></center></td>";
           echo "<td>".$list['price']." đ</td>";
           echo "<td>".($list['qty']*$list['price'])." đ</td>";
           echo "<td><a href ='delete.php?id=".$list['id']."'>Xóa</a></td>";
           echo "</tr>";
           $sum=$list['qty']*$list['price'];
           $_SESSION['sum']+=$sum;


        }

        echo "</table>";?>
        <div class="sum">
            <?php
                echo  "Tổng tiền: ".$_SESSION['sum']."đ";
            ?>
        </div>
        <?php
        echo    "<p align='right' width='600'>
             <input type='submit' value='Update' name='update' />
             </p>
             ";
        echo "</form>";
        ?></div>
        <div class="gh">
        <form action="order.php">
        <left>
        <table >
        <caption>Thông tin nhận hàng</caption>
        <tr><td>Họ tên:</td>
        <td><input type="text" name="t1" placeholder="Họ tên" required /><br></td>
        </tr>
        <tr><td>Số điện thoai:</td>
        <td><input type="tel" name="t2" placeholder="số điện thoại" required /><br></td>
        </tr>
        <tr><td>ĐỊa chỉ:</td>
        <td><input type="text" name="t3" placeholder="Địa chỉ" required /><br></td>
        </tr>
        <tr><td>email:</td>
        <td><input type="email" name="t4" placeholder="Email" required /></td>
        </tr>
        </table>
         </left>
        <right>
            <input type="submit" value="Đặt hàng">
        </right>
        </form>
        </div>
            <?php

    }
    if(isset($_SESSION['iddh']) && $_SESSION['cart'] == null){
        ?>
        <div class="danhmuc">

        <table>
        <caption>Thông tin đơn hàng</caption>
        <tr>
            <td>STT </td>
            <td>Hình ảnh</td>
            <td>Tên sản phẩm</td>
            <td>Giá</td>
            <td>Số luợng</td>
            <td>Tình trạng</td>
            <td>Tổng giá</td>
        </tr>
        <?php
        $iddh=$_SESSION['iddh'];
        include("localhost.php");
        $sql= "select titlesp,sanpham.price,ctorders.qty,thumbnail,ctorders.tonggia,orders.tong,orders.tinhtrang from orders 
                join ctorders on ctorders.iddh=orders.id
                join sanpham on sanpham.id=ctorders.idsp
                where orders.id=$iddh";

        $result = $conn->query($sql);
        $stt=1;
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
                echo  ' <tr><td>'.($stt++).'</td>
                            <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                            <td>'.$row["titlesp"].'</td>
                            <td>'.$row["price"].'</td>
                            <td>'.$row["qty"].'</td>
                            <td>'.$row["tinhtrang"].'</td>
                            <td>'.$row["tonggia"].'</td>
                            </tr>';
                
            }
        } 
        $sql1= "select titlesp,sanpham.price,ctorders.qty,thumbnail,ctorders.tonggia,orders.tong,orders.tinhtrang from orders 
                join ctorders on ctorders.iddh=orders.id
                join sanpham on sanpham.id=ctorders.idsp
                where orders.id=$iddh";
        $result1 = $conn->query($sql1);
        $row1 = $result1->fetch_assoc()
        ?>
        <tr> 
    </tr>
        </table>
        </div>
   <?php }?>
