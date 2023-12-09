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
        <?php 
            include("guide_sp.php");
        ?>
    </aside>
</div>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>