<!DOCTYPE html>
<html>
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
    session_start();
?>
<?php 
        include("header.php");
?>
 <div class="row">
 <?php 
        include("menuin.php");
    ?>
    <aside>
<div class="hd">
<?php
    $idhd = $_GET['idhd'];
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

    $sql = "SELECT * FROM thongtin where id = ".$idhd;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  
            ?>
            <div class="huongdan">
            <?php

            echo  '<img src='.$row['thumbnail'].' width="493" height="250">'."<h3>".$row["title"]."</h3>"."<b><i>"."<br>"."Nguyên liệu:"."</i></b>"."<br><p>".$row["ingredient"]."</p><br>"."<b><i>"."<br>"."Cách chế biến: "."</i></b>"."<br><p>".$row["content"]."</b><br>";
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