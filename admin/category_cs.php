
    <div class="category_cs">
<table>
<caption>Thông tin món ăn</caption>
    <tr>
        <td>ID</td>
        <td>Hình ảnh</td>
        <td>Tên món ăn</td>
        <td>Danh mục</td>
        <td>Ngày cập nhật</td>
        <td>Chỉnh sửa</td>
        <td>Xóa</td>
    </tr>
<?php
    
    $idtk = $_GET['idtk'];
    include("localhost.php");
    if($idtk!="m1" && $idtk!="m2" && $idtk!="m3"){
        $sql = "SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail,thongtin.updated_at 
                FROM thongtin 
                join danhmuc on danhmuc.id=thongtin.id_danhmuc 
                where danhmuc.id= ".$idtk;
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
        // Load dữ liệu lên website
    
            // echo '<table>';
            while($row = $result->fetch_assoc()) {  
    
               
    
            // echo  '<tr>';
                echo  ' <tr><td>'.$row['id'].'</td>
                            <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                            <td>'.$row["title"].'</td>
                            <td>'.$row["namedm"].'</td>
                            <td>'.$row["updated_at"].'</td>
                            <td><a href="guide_ad.php?idhd='.$row["id"].'"><button class="sua">Sửa</button></a></td>
                            <td>';?><a href="delete_tt.php?id=<?php echo $row["id"];?>" onclick="return confirm('Bạn có chắc muốn xóa thông tin món ăn này không?');">
                                <button class="xoa">Xóa</button></a><?php echo '</td>
                            </tr>';
                ?>
                </div>
                <?php
            }
            // echo '</table>';
        } 
    }
    if($idtk=="m1"){
        $sql1="SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail,thongtin.updated_at 
        FROM thongtin 
        join danhmuc on danhmuc.id=thongtin.id_danhmuc 
        where danhmuc.id=1 or danhmuc.id=2 or danhmuc.id=3 or danhmuc.id=4 ";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {  

                echo  ' <tr><td>'.$row['id'].'</td>
                <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                <td>'.$row["title"].'</td>
                <td>'.$row["namedm"].'</td>
                <td>'.$row["updated_at"].'</td>
                <td><a href="guide_ad.php?idhd='.$row["id"].'"><button class="sua">Sửa</button></a>.</td>
                <td> 
                    <button class="xoa" onclick="deleteCategory('.$row["id"].')">Xóa</button></a>.</td>
                    
                </tr>';
            ?>
            </div>
            <?php
            }
        }
    }
    if($idtk=="m2"){
        $sql2="SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail,thongtin.updated_at 
                FROM thongtin 
                join danhmuc on danhmuc.id=thongtin.id_danhmuc 
                where danhmuc.id=5 or danhmuc.id=6 or danhmuc.id=7";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            while($row = $result2->fetch_assoc()) {  
                echo  ' <tr><td>'.$row['id'].'</td>
                <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                <td>'.$row["title"].'</td>
                <td>'.$row["namedm"].'</td>
                <td>'.$row["updated_at"].'</td>
                <td><a href="guide_ad.php?idhd='.$row["id"].'"><button class="sua">Sửa</button></a>.</td>
                <td> 
                    <button class="xoa" onclick="deleteCategory('.$row["id"].')">Xóa</button></a>.</td>
                
                </tr>';
            ?>
            </div>
            <?php
            }
        }
    }
    if($idtk=="m3"){
        $sql3="SELECT thongtin.id, namedm,title,content,id_danhmuc,thumbnail,thongtin.updated_at FROM thongtin join danhmuc on danhmuc.id=thongtin.id_danhmuc where danhmuc.id=8 or danhmuc.id=9 or danhmuc.id=10 or danhmuc.id=11 or danhmuc.id=12 or danhmuc.id=13 or danhmuc.id=14 or danhmuc.id=16";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
            while($row = $result3->fetch_assoc()) {  

                    echo  ' <tr><td>'.$row['id'].'</td>
                        <td>'.'<img src='.$row['thumbnail'].' width="60" height="50">'.'</td>
                        <td>'.$row["title"].'</td>
                        <td>'.$row["namedm"].'</td>
                        <td>'.$row["updated_at"].'</td>
                        <td><a href="guide_ad.php?idhd='.$row["id"].'"><button class="sua">Sửa</button></a>.</td>
                        <td> 
                            <button class="xoa" onclick="deleteCategory('.$row["id"].')">Xóa</button></a>.</td>
                        
                        </tr>';
                ?>
                </div>
                <?php
            }
        }
            
    }
    $conn->close();
    ?>
</table>
</div>