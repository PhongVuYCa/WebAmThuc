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
        <?php 
            include("giohang_us.php");
        ?>
    </aside>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>