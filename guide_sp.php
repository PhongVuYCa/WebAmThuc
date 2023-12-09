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
<form action='update_sp.php'  method="post">
	<h3 align="center">Chỉnh sửa thông tin nguyên liệu</h3><br><br>
    <?php
    $idhd = $_GET['idhd'];
    include("localhost.php");

    $sql = "SELECT sanpham.id,titlesp,contentsp,thumbnail,soluong,price,namedm, sanpham.updated_at 
            FROM sanpham
            join danhmuc on danhmuc.id= sanpham.id_danhmuc
            where sanpham.id = ".$idhd;
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {  
            ?>
            
	<table class="guide_cs">
    <tr>
		<td>ID: </td>
        <td><input type="hidden" name="id" value="<?php echo $row["id"];?>"><?php echo $row["id"];?></td>
    </tr>
    <tr>
		<td>Tên danh muc:  </td>
        <td><input type="hidden" name="dm" value="<?php echo $row["namedm"];?>"><?php echo $row["namedm"];?></td>
    </tr>
	<tr>
		<td>Tên nguyên liệu: </td>
        <td><input type="text" name="t1" value="<?php echo $row["titlesp"];?>"><br></td>
    </tr>
	<tr>
		<td>Link hình ảnh: </td>
        <td><textarea type="text" name="t2" rows="4" cols="120px"><?php echo $row["thumbnail"];?></textarea></td>
	</tr>
	<tr>
		<td>Giá: </td>
        <td><textarea type="text" name="t3" rows="6" cols="120px"><?php echo $row["price"];?></textarea></td>
	</tr>
    <tr>
		<td>Số lượng: </td>
        <td><textarea type="text" name="t4" rows="6" cols="120px"><?php echo $row["soluong"];?></textarea></td>
	</tr>
    <tr>
		<td>Giới thiệu sản phẩm: </td>
        <td><textarea type="text" name="t5" rows="18" cols="120px"><?php echo $row["contentsp"];?></textarea></td>
	</tr>
    </table>
    <table class="guide_cs1">
    <tr>
        <td>
        <input type="submit" name="submit" value="Chỉnh sửa"></input> 
        </td>
        <td>
	    <input type="reset" name="reset" value="Làm lại"></input>
        </td>
    </tr>
    </table>
    <?php
        }
        // echo '</table>';
    } else {
    echo "0 results";
    }
    $conn->close();
    ?>
</form>

</body>
</html>