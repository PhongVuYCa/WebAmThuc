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
    include("header.php");
?>
<div class="row">

    <?php 
        include("menuin.php");
    ?>
    <aside >
        <?php 
            include("giohang.php");
        ?>
    </aside>
</div>
<?php 
    include("footer.php");
?>
</body>
</html>