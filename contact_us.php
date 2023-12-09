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
        include("header1.php");
    ?>
    <div class="row">

        <?php 
            include("menu.php");
        ?>
        <aside >
        <div class="contact">
                <h2>Đóng góp ý kiến</h2>
                <form action="ykien_us.php" method="post">
                    <table>
                    <tr>
                            <td>Email nhận phản hồi:</td>
                            <td><input type="email" name="t1" placeholder="Nhập email"></td>
                        </tr>
                        <tr>
                            <td>Chủ đề:</td>
                            <td><input type="text" name="t2" placeholder="Chủ đề"></td>
                        </tr>
                        <tr>
                            <td>Nội dung:</td>
                            <td><textarea name="t3" rows="6" cols="88" placeholder="   Nội dung"></textarea></td>
                        </tr>
                        
                    </table>
                    <input type="submit" name="submit" value="Gửi">
                </form>
            </div>
        </aside>
    </div>
    <?php
        include("footer.php");
    ?>
</html>