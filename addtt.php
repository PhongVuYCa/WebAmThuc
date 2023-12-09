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
    include("header_ad.php");echo "<br>";
?>
<div class="row">

    <?php 
        include("menu_ad.php");
    ?>
    <aside >
    <body>
<form class="form1" action='addtt_th.php'  method="post">
	<h3 align="center">Thêm món ăn</h3><br><br>
    <?php
    include("localhost.php");

            ?>
            
	<table class="guide_cs">
	<tr>
		<td>Tên món ăn: </td>
        <td><input type="text" name="t1"><br></td>
    </tr>
	<tr>
		<td>Link hình ảnh: </td>
        <td><textarea type="text" name="t2" rows="4" cols="126px"></textarea></td>
	</tr>
    <tr>
		<td>Tên danh muc: </td>
        <td>
        <select name="t3">
            <option>Mùa xuân</option>
            <option>Mùa Hạ</option>
            <option>Mùa thu</option>
            <option>Mùa đông</option>
            <option>Miền Bắc</option>
            <option>Miền Trung</option>
            <option>Miền Nam</option>
            <option>Món canh</option>
            <option>Món kho</option>
            <option>Món luộc</option>
            <option>Món hầm</option>
            <option>Món chiên</option>
            <option>Món xào</option>
            <option>Món nướng</option>
            <option>Món hấp</option>
            <option>Làm bánh</option>
            <option>Món chay</option>
        </select>
        </td>
	</tr>
	<tr>
		<td>Nguyên liệu: </td>
        <td><textarea type="text" name="t4" rows="6" cols="126px"></textarea></td>
	</tr>
    <tr>
		<td>Cách chế biến: </td>
        <td><textarea type="text" name="t5" rows="18" cols="126px"></textarea></td>
	</tr>
    </table>
    <table class="guide_cs1">
    <tr>
        <td>
        <input type="submit" name="submit" value="Thêm"></input> 
        </td>
        <td>
	    <input type="reset" name="reset" value="Làm lại"></input>
        </td>
    </tr>
    </table>
  
</form>

    </aside>
</div>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>