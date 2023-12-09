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
    include("header1.php");
?>
<div class="row">

    <?php 
        include("menu.php");
    ?>
    <aside >
<form class="form1" action='th.php'  method="post">
    <?php
    include("localhost.php");
    $id=$_SESSION['iduser'];
    $sql = "SELECT * from users where id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {  
            ?>
            
	<table class="information">
    <caption>Chỉnh sửa thông tin cá nhân</caption>
	<tr>
		<td>Họ và tên: </td>
        <td><textarea type="text" name="t2" rows="2" cols="40px"><?php echo $row["fullname"];?></textarea></td>
	</tr>
	<tr>
		<td>số điện thoại: </td>
        <td><textarea type="text" name="t4" rows="2" cols="40px"><?php echo $row["phone"];?></textarea></td>
	</tr>
    <tr>
		<td>email: </td>
        <td><textarea type="text" name="t5" rows="2" cols="40px"><?php echo $row["email"];?></textarea></td>
	</tr>
    <tr>
		<td>Địa chỉ: </td>
        <td><textarea type="text" name="t6" rows="2" cols="40px"><?php echo $row["address"];?></textarea></td>
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
</aside>
</div>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>