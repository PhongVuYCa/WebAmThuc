<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>web</title>
<link rel="stylesheet" href="style1.css"/> 
</head>
<body >
<?php 
        include("header.php");?>


<div class="row">
<article>
    <img src="img/OIP.jpg" width=192px height="450px">
</article>
<aside class="login">
    <?php
        include("filelogin.php");
    ?>
</aside>
<?php 
    include("footer.php");echo "<br>";
?>
</body>
</html>
