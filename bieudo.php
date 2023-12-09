<?php 
?>
<?php
    session_start();
    include("localhost.php");
    $sql="select  year(ngaygiao) as nam,sum(thanhtien) as tongtien  from doanhthu where tinhtrang='Đã giao' group by nam";
    $result = $conn->query($sql);
    $chart_data = '';
    while($row = $result->fetch_assoc()) { 

        $chart_data .= "{  nam:".$row["nam"].", Tổng:".$row["tongtien"]."}, ";
     }
     $chart_data = substr($chart_data, 0, -2);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>web</title>
<link rel="stylesheet" href="style.css"/> 
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body >
<?php 
    include("header_ad.php");
?>
<div class="row">

    <?php 
        include("menu_ad.php");
    ?>

<aside>
<div class ="tkdt">
    <ul class=tkdt1>
        <li><a href="DoanhTTT.php"><button class="choxacnhan">Doanh thu theo tháng</button></a></li>
        <li><a href="KHtiemnang.php"><button class="dangvanchuyen">Khách hàng tiềm năng</button></a></li>
        <li><a href="bieudo.php"><button class="dangvanchuyen">Biểu đồ</button></a></li>
        <form class="tkdt2" action="searchbd.php" method="post">
                <li><select name ="nam">
                    <option>2022</option>
                    <option>2023</option>
                </select></li> &emsp;
                <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
        </form>
    </ul>
</div>
    <div class="bieudo">
        
    <div id="chart"></div>
    </div>  

</aside>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>
<script>
    Morris.Bar({
    element : 'chart',
    data:[<?php echo $chart_data; ?>],
    xkey:['nam'],
    ykeys:['Tổng'],
    labels:['Tổng'],
    hideHover:'auto'
    });
</script>