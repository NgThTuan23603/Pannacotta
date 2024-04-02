<?php
if(isset($_POST['submit'])){
    $makh=$_SESSION['makh'];
    $content=$_POST['comment'];
    $masp=$_POST['txtmahh'];
    $kh=new user();
    $kh->insertComment($makh,$masp,$content);
}
echo '<meta http-equiv="refresh" content="0;url=./index.php?action=sanpham&act=sanphamchitiet&id='.$masp.'"/>';
?>