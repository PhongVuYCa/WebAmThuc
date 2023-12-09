<?php 
   
    if (isset($_SESSION['username'])) 
{?>
    <header class="row">
        <div class="logo">
            &nbsp;&nbsp;
            <a href="home.php?"><img src="img/LOGO.png" wight="100" height="100"></a>
        </div>
        <div class="menu">
        
            <li><a href="category_us.php?idtk=17">Làm bánh</a></li>
            <li><a href ="category_us.php?idtk=m1">Món ăn theo mùa</a>
                <ul class="menu-m">
                    <li><a href="category_us.php?idtk=1">Mùa xuân</a></li>
                    <li><a href="category_us.php?idtk=2">Mùa hạ</a></li>
                    <li><a href="category_us.php?idtk=3">Mùa thu</a></li>
                    <li><a href="category_us.php?idtk=4">Mùa đông</a></li>
                </ul>
            
            </li>
            <li><a href="category_us.php?idtk=18">Món chay</a>
                
            </li>
                
            </li>
            <li><a href="category_us.php?idtk=m2">Món ngon ba Miền</a>
                <ul class="menu-3m">
                    <li><a href="category_us.php?idtk=5">Miên Bắc</a></li>
                    <li><a href="category_us.php?idtk=6">Miền Trung</a></li>
                    <li><a href="category_us.php?idtk=7">Miền Nam</a></li>
                </ul>
            </li>
            <li><a href="category_us.php?idtk=m3">Khác</a>
                <ul class="menu-o">
                    <li><a href="ingredient_us.php">Nguyên liệu</a></li>
                    <li><a href="">Món ngon mỗi ngày</a>
                        <ul>
                            <li><a href="category_us.php?idtk=8">Món canh</a></li>
                            <li><a href="category_us.php?idtk=12">Món chiên</a></li>
                            <li><a href="category_us.php?idtk=11">Món hầm</a></li>
                            <li><a href="category_us.php?idtk=9">Món kho</a></li>
                            <li><a href="category_us.php?idtk=10">Món luộc</a></li>
                            <li><a href="category_us.php?idtk=13">Món xào</a></li>
                            <li><a href="category_us.php?idtk=14">Món nướng</a></li>
                            <li><a href="category_us.php?idtk=16">Món hấp</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="contact_us.php">Liên hệ</a>
           
        </div>
        
        <div class ="right-header">
            <ul class=list_CN>
                 <li>
                    <form class="search" action="search_us.php" method="post">
                        <li><input type="text" name="tk1" placeholder="Tìm kiếm thông tin" ></li> &emsp;
                        <li><input type="submit" name="submit" value="Tìm kiếm"></li> &emsp;
                    </form>
                </li>
                <li><a href="basket_us.php"><img src="img/giohang.png" width="45px" height="35px"></a></li>
                <div class="menuuu">
                 <li><a href="information.php"><img src="img/users.png" width="40px" height="40px"></a>
                 <ul class="menuuu1">
                    <?php 
                            
                        include("localhost.php");
                        $name=addslashes($_SESSION['username']);
                        $sql = "SELECT * from `users` where username= '$name'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) { 
                            ?> 
                            <div>
                                <ul>
                                    <li><?php echo $row["username"];?></li><br>
                                    <li><?php echo $row["fullname"];?></li><br>
                                    <li><?php echo $row["phone"];?></li><br>
                                    <li><?php echo $row["email"];?></li><br>
                                    <li><?php echo $row["address"];?></li><br>
                                    <li><a href="logout.php">Đăng xuất</a></li>
                                </ul>
                            </div>
                            <?php   
                            }
                        }     
                    ?>
                    </ul>
                </li>
                </div>
            </ul>    
         </div>
    </header>
    <?php
} else {
    header('location:index.php');
    }
?>