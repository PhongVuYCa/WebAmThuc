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
            
            $idtk = $_GET['idtk'];
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

            if($idtk!="m1" && $idtk!="m2" && $idtk!="m3"){
                $sql = "SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc where danhmuc.id= ".$idtk;
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
            }
            if($idtk=="m1"){
                $sql1="SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc where danhmuc.id=1 or danhmuc.id=2 or danhmuc.id=3 or danhmuc.id=4 ";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) {  
    
                        ?>
                        <div class=monan>
                        <?php
                        echo  '<img src='.$row['thumbnail'].' width="493" height="250">'."<h3>".$row["namedm"]."</h3>"."<a href='guide_us.php?idhd=".$row["id"]."'>"."<h3>".$row["title"]."</a>"."</h3>"."<br>";
                        
                        ?>
                        </div>
                        <?php
                    }
                }
            }
            if($idtk=="m2"){
                $sql2="SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc where danhmuc.id=5 or danhmuc.id=6 or danhmuc.id=7";
                $result2 = $conn->query($sql2);
                if ($result2->num_rows > 0) {
                    while($row = $result2->fetch_assoc()) {  
    
                        ?>
                        <div class=monan>
                        <?php
    
                        echo  '<img src='.$row['thumbnail'].' width="493" height="250">'."<h3>".$row["namedm"]."</h3>"."<a href='guide_us.php?idhd=".$row["id"]."'>"."<h3>".$row["title"]."</a>"."</h3>"."<br>";
                        
                        ?>
                        </div>
                        <?php
                    }
                }
            }
            if($idtk=="m3"){
                $sql3="SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc where danhmuc.id=8 or danhmuc.id=9 or danhmuc.id=10 or danhmuc.id=11 or danhmuc.id=12 or danhmuc.id=13 or danhmuc.id=14 or danhmuc.id=16";
                $result3 = $conn->query($sql3);
                if ($result3->num_rows > 0) {
                    while($row = $result3->fetch_assoc()) {  
    
                        ?>
                        <div class=monan>
                        <?php
                        echo  '<img src='.$row['thumbnail'].' width="493" height="250">'."<h3>".$row["namedm"]."</h3>"."<a href='guide_us.php?idhd=".$row["id"]."'>"."<h3>".$row["title"]."</a>"."</h3>"."<br>";
                        
                        ?>
                        </div>
                        <?php
                    }
                }
                    
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