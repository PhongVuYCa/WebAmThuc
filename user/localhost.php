<?php
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
?>