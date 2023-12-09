<?php
    
$id = $_GET['id'];
include("localhost.php");
$ktr = "select *from donhang where id='$id' ";
$rktr = $conn->query($ktr);
$rows = $rktr->fetch_assoc();
$tinhtrang=$rows['tinhtrang'];
if($tinhtrang!='Bị hủy' && $tinhtrang!='Đã giao'){
$sql = "update donhang set tinhtrang='Bị hủy' where id='$id'";
$result = $conn->query($sql);
$tr="update doanhthu set tinhtrang='Bị hủy', ngaygiao= '$updated_at' where iddh=$id";
$ttr = $conn->query($tr);
if($result){
    $sql2="select * from chitietdonhang where iddh='$id'";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0){
        while($row = $result2->fetch_assoc()) {
        
            $idsp=$row['idsp'];
            $sql5="select * from chitietdonhang where idsp='$idsp' and iddh='$id'";
            $result5 = $conn->query($sql5);
            $row5 = $result5->fetch_assoc();
            $qty=$row5['qty'];
            $sql4="select * from sanpham where id='$idsp'";
            $result4 = $conn->query($sql4);
            $row1 = $result4->fetch_assoc();
            $soluong=$row1['soluong'];

            $soluonghoan=$soluong+$qty;

            $update="update sanpham set soluong='$soluonghoan' where id='$idsp'";
            $updatetc=$conn->query($update);
            

         }
         header('location:donhang.php');
    }
}}
else header('location:donhang.php');
?>