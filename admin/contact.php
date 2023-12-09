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
    <?php 
        include("header_ad.php");
     ?>

<div class="row">

<?php 
    include("menu_ad.php");
?>
<aside >
<div class ="tkyk">
    <ul class=tkyk1>
        <li>
        <li><a href="ykien_cxl.php"><button class="">Chưa xử lý</button></a></li>
        <li><a href="ykien_dxl.php"><button class="">Đã xử lý</button></a></li>
            <form class="tkdh2" action="searchyk.php" method="post">
                <li><input type="text" name="tk1" placeholder="Tìm kiếm khách hàng" ></li> &emsp;
                <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
            </form>
        </li>
    </ul>
</div>
<div class="lienhe">
<table>
    <caption>Danh sách đóng góp ý kiến</caption>
    <tr>
        <td>STT</td>
        <td>Chủ đề</td>
        <td>Nội dung</td>
        <td>email nhận phản hồi</td>
        <td>Tình trạng</td>
        <td>update</td>
    </tr>
<?php
     include("localhost.php");
     $sql = "SELECT * from donggopykien";
    $result = $conn->query($sql);
    $stt=1;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {  
        // echo  '<tr>';
            echo  ' <tr><td>'.($stt++).'</td>
                        <td>'.$row["chude"].'</td>
                        <td>'.$row["noidung"].'</td>
                        <td>'.$row["email"].'</td>
                        <td>'.$row["tinhtrang"].'</td>';
                        if($row["tinhtrang"]=="Chưa xử lý"){
                            echo '<td><a href="capnhatyk.php?id='.$row["id"].'"><button class="sua">Đã xử lý</button></a></td></tr>';
                        }
                        if($row["tinhtrang"]=="Đã xử lý"){
                            echo '<td>Xong</td></tr>';
                        }
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
        include("footer.php");
    ?>
</html>