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
    <div class="danhmuc">

<table>
<caption>Thông tin danh mục</caption>
    <tr>
        <td>ID danh mục</td>
        <td>Tên danh mục</td>
        <td>Ngày cập nhật</td>
        <td>Chỉnh sửa</td>
    </tr>
<?php
    
    include("localhost.php");

    $sql = "SELECT * from danhmuc";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
            echo  ' <tr><td>'.$row['id'].'</td>
                        <td>'.$row["namedm"].'</td>
                        <td>'.$row["updated_at"].'</td>
                        <td><a href="guide_ad1.php?idhd='.$row["id"].'"><button class="sua">Sửa</button></a>.</td>
                        </tr>';
            ?>
            </div>
            <?php
        }
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