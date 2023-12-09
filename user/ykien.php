<?php
    include('localhost.php');
    if($_POST['t1']!=null && $_POST['t2']!=null && $_POST['t3']!=null){
        $email=$_POST['t1'];
        $chude=$_POST['t2'];
        $noidung=$_POST['t3'];
        $sql= "insert into donggopykien(chude,noidung,email,tinhtrang) values('$chude','$noidung','$email','Chưa xử lý')";
        $result = $conn->query($sql);
        if($result){
            echo '<script language="javascript">alert("Cảm ơn bạn đã đóng góp ý kiến!"); window.location="index.php";</script>';
        }
    }
    if($_POST['t1']==null || $_POST['t2']==null || $_POST['t3']==null){
        echo '<script language="javascript">alert("Vui lòng nhập đầy đủ thông tin!"); window.location="contact.php";</script>';
    }
?>