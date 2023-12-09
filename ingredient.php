<!DOCTYPE html>
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
<?php
    session_start();
?>
<?php 
        include("header.php");
?>
 <div class="row">
    <?php 
        include("menuin.php");
    ?>

</div>
    </article>
    <aside>
    <div class="product">
    <?php
    include("localhost.php");

    $sql = "SELECT * FROM sanpham ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // Load dữ liệu lên website

        // echo '<table>';
        while($row = $result->fetch_assoc()) {  

            ?>
            <div class=monan>
            <?php

        // echo  '<tr>';
            echo  '<img src='.$row['thumbnail'].' width="493" height="250">'.
                    "<a href='nguyenlieu.php?idsp=".$row["id"]."'>".
                    "<h3>".$row["titlesp"]."</a> "."<a href='insert.php?idsp=".$row["id"]."'><button>Mua ngay</button></a>"."</h3>"."<br>";
            //echo  '</tr>';
            ?>
            </div>
            <?php
        }
        // echo '</table>';
    } 
    $conn->close();
    ?>
    </div>
    </aside>

</div>
<?php 
   include("footer.php");
?>
</body>
</html>