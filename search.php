<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title> web  </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <?php 
        include("header_ad.php");
    ?>
    <div class="row">
            <?php
                include("menu_ad.php");
            ?>
        <aside>
            <?php
                
                include("localhost.php");
                if(isset($_POST['tk1']) && !empty($_POST['tk1'])){
                    $tk = addslashes($_POST['tk1']);
                $sql = "SELECT sanpham.id,thumbnail, titlesp,namedm,price,soluong,sanpham.updated_at 
                        from sanpham join danhmuc on danhmuc.id=sanpham.id_danhmuc 
                        WHERE titlesp like '%$tk%' or namedm like '%$tk%'";
                $result = $conn->query($sql);
                $stt=1;
                if ($result->num_rows > 0) {
                    ?>
                     <div class="sanpham">
                    <table>
                        <caption>Thông tin sản phẩm</caption>
                        <tr>
                            <td>STT</td>
                            <td>Hình ảnh</td>
                            <td>Tên nguyên liệu</td>
                            <td>Danh mục</td>
                            <td>Giá</td>
                            <td>số lượng</td>
                            <td>Ngày cập nhật</td>
                            <td>Chỉnh sửa</td>
                            <td>Xóa</td>
                        </tr>
                    <?php
                    while($row = $result->fetch_assoc()) { 
                    
                    echo  ' <tr><td>'.($stt++).'</td>
                                <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                                <td>'.$row["titlesp"].'</td>
                                <td>'.$row["namedm"].'</td>
                                <td>'.$row["price"].'</td>
                                <td>'.$row["soluong"].'</td>
                                <td>'.$row["updated_at"].'</td>
                                <td><a href="guidesp_ad.php?idhd='.$row["id"].'"><button class="sua">Sửa</button></a>.</td>
                                <td><a href="delete_sp.php?id='.$row["id"].'"><button class="xoa">xóa</button></a>.</td>
                                </tr>';
                    }
                    ?>
                    </table>
                    </div>
                    <?php

                } 
                $sql1 = "SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail,thongtin.updated_at 
                        FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc 
                        where title like '%$tk%' or namedm like '%$tk%'";
                $result1 = $conn->query($sql1);
                $stt1=1;
                if ($result1->num_rows > 0) {
                // Load dữ liệu lên website
                    ?>
                    <div class="category_cs">
                    <table>
                        <caption>Thông tin món ăn</caption>
                        <tr>
                            <td>STT</td>
                            <td>Hình ảnh</td>
                            <td>Tên món ăn</td>
                            <td>Danh mục</td>
                            <td>Ngày cập nhật</td>
                            <td>Chỉnh sửa</td>
                            <td>Xóa</td>
                        </tr>
                    <?php
                    while($row = $result1->fetch_assoc()) {  
                        echo  ' <tr><td>'.($stt1++).'</td>
                                    <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                                    <td>'.$row["title"].'</td>
                                    <td>'.$row["namedm"].'</td>
                                    <td>'.$row["updated_at"].'</td>
                                    <td><a href="guide_ad.php?idhd='.$row["id"].'"><button class="sua">Sửa</button></a>.</td>
                                    <td><a href="delete_tt.php?id='.$row["id"].'"><button class="xoa">xóa</button></a>.</td>
                                    </tr>';
                    }
                    ?>
                    </table>
                    </div>
                    <?php
                } 
            }

            $conn->close();
            ?>
        </aside>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>