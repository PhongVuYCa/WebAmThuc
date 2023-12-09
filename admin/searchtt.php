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
<div class ="tksp">
    <ul class=tksp1>
        <li>
            <li><a href="addtt.php"><button class="add">ADD</button></a></li>
            <form class="tksp2" action="searchtt.php" method="post">
                <li><input type="text" name="tk1" placeholder="Tìm kiếm thông tin" ></li> &emsp;
                <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
            </form>
        </li>
    </ul>
</div>
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
    include("localhost.php");
    $tk = addslashes($_POST['tk1']);
    $sql = "SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail,thongtin.updated_at 
            FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc 
            where title like '%$tk%' or namedm like '%$tk%'";
    $result = $conn->query($sql);
    $stt=1;
    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  
        // echo  '<tr>';
            echo  ' <tr><td>'.($stt++).'</td>
                        <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                        <td>'.$row["title"].'</td>
                        <td>'.$row["namedm"].'</td>
                        <td>'.$row["updated_at"].'</td>
                        <td><a href="guide_ad.php?idhd='.$row["id"].'"><button class="sua">Sửa</button></a></td>
                        <td>';?><a href="delete_tt.php?id=<?php echo $row["id"];?>" onclick="return confirm('Bạn có chắc muốn xóa thông tin món ăn này không?');">
                        <button class="xoa">Xóa</button></a><?php echo '</td>
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