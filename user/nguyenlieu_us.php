<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title> web  </title>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
    session_start();
?>
<?php 
        include("header1.php");
?>
 <div class="row">
 <?php 
        include("menu.php");
?>
<aside>
<div class="product">
<?php
    $idsp = $_GET['idsp'];
    echo "<pre>";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";

    // tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);
    // kiểm kết nối
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM sanpham where id = ".$idsp;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  
            ?>
            <div class="huongdan">
            <?php

                echo  '<img src='.$row['thumbnail'].' width="493" height="400">'."<br><h3>".$row["titlesp"]."<br>"."Giá: ".$row["price"]."đ"."<br>"."Sô lượng hiện có: "
                .$row["soluong"]."</h3>"."<br><p>".$row["contentsp"]."</p>";
            ?>
            </div>
            <?php
        }
        // echo '</table>';
    } else {
    echo "0 results";
    }
    $conn->close();
    ?>
</div>
</aside>
</div>
<?php 
   include("footer.php");
?>
</body>
</html>