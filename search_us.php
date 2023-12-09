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
            <?php
                
                include("localhost.php");
                if(isset($_POST['tk1']) && !empty($_POST['tk1'])){
                $tk = addslashes($_POST['tk1']);
                $sql = "SELECT sanpham.id,thumbnail, titlesp,namedm,price,soluong,sanpham.updated_at 
                        from sanpham join danhmuc on danhmuc.id=sanpham.id_danhmuc 
                        WHERE titlesp like '%$tk%' or namedm like '%$tk%'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) { 
                        ?>
                        <div class=monan>
                        <?php
            
                    // echo  '<tr>';
                        echo  '<img src='.$row['thumbnail'].' width="493" height="250">'.
                                "<a href='nguyenlieu_us.php?idsp=".$row["id"]."'>".
                                "<h3>".$row["titlesp"]."</a><br>"."<a href='insert.php?idsp=".$row["id"]."'>Mua ngay</a>"."</h3>"."<br>";
                        //echo  '</tr>';
                        ?>
                        </div>
                        <?php
                    }

                } 
                $sql1 = "SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail,thongtin.updated_at 
                        FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc 
                        where title like '%$tk%' or namedm like '%$tk%'";
                $result1 = $conn->query($sql1);
                if ($result1->num_rows > 0) {
                    while($row = $result1->fetch_assoc()) {  
                        ?>
                        <div class=monan>
                        <?php
                        echo  '<img src='.$row['thumbnail'].' width="493" height="250">'."<h3>".$row["namedm"]."</h3>"."<a href='guide.php?idhd=".$row["id"]."'>"."<h3>".$row["title"]."</a>"."</h3>"."<br>";
                        
                        ?>
                        </div>
                    <?php
                    } 
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