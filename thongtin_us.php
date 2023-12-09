<?php
    session_start();
?>
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
        include("header1.php");
?>
 <div class="row">
 <?php 
        include("menu.php");
    ?>
    <aside>
        <div class="product">
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

                $sql = "SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc";
                $result = $conn->query($sql);
            
                if ($result->num_rows > 0) {
                // Load dữ liệu lên website
            
                    // echo '<table>';
                    while($row = $result->fetch_assoc()) {  
            
                        ?>
                        <div class=monan>
                        <?php
            
                    // echo  '<tr>';
                        echo  '<img src='.$row['thumbnail'].' width="493" height="250">'."<h3>".$row["namedm"]."</h3>"."<a href='guide_us.php?idhd=".$row["id"]."'>"."<h3>".$row["title"]."</a>"."</h3>"."<br>";
                        //echo  '</tr>';
                        ?>
                        </div>
                        <?php
                    }
                    // echo '</table>';
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