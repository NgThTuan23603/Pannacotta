<?php
    $act="hanghoa";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'hanghoa':
            include_once "./View/hanghoa.php";
            break;
        case 'insert_action':
            // nhận thông tin gồm mahh,tenhh,maloai,dacbiet,soluotxem,ngaylap,mota
            if($_SERVER['REQUEST_METHOD']=='POST')
            {
                $mahh=$_POST['mahh'];
                $tenhh=$_POST['tenhh'];
                $maloai=$_POST['maloai'];
                $dacbiet=$_POST['dacbiet'];
                $slx=$_POST['slx'];
                $ngaylap=$_POST['ngaylap'];
                $mota=$_POST['mota'];
                // dem thông tin insert vào database
                $hh=new hanghoa();
                $result=$hh->insertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
                if($result!=false)
                {
                    echo '<script> alert("Thêm dữ liệu thành công")</script>';
                    echo '<meta http-equiv=refresh content="0;url=http://localhost:3000/Admin2/index.php?action=hanghoa"/>';
                }
                else
                {
                    echo '<script> alert("Thêm dữ liệu ko thành công")</script>';
                }
            }
            break;
        case 'update_hanghoa':
            include_once "./View/edithanghoa.php";
            break;
         case 'update_action':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $dacbiet = $_POST['dacbiet'];
            $slx = $_POST['slx'];
            $ngaylap = $_POST['ngaylap'];
            $mota = $_POST['mota'];
            $soluongton = $_POST['soluongton'];

            // Kiểm tra dữ liệu hợp lệ
            if (!empty($mahh) && !empty($tenhh) && !empty($maloai) && isset($dacbiet) && isset($slx) && !empty($ngaylap) && !empty($mota) && isset($soluongton)) {
                // Xử lý cập nhật hàng hóa
                $hh = new hanghoa();
                $result = $hh->updateHangHoa($mahh, $tenhh, $maloai, $dacbiet, $slx, $ngaylap, $mota, $soluongton);
                if ($result != false) {
                    echo '<script> alert("Cập nhật dữ liệu thành công")</script>';
                    echo '<meta http-equiv=refresh content="0;url=http://localhost:3000/DuAnMau/Admin2/index.php?action=hanghoa"/>';
                } else {
                    echo '<script> alert("Cập nhật dữ liệu thành công")</script>';
                    echo '<meta http-equiv=refresh content="0;url=http://localhost:3000/DuAnMau/Admin2/index.php?action=hanghoa"/>';
                }
            } else {
                echo '<script> alert("Dữ liệu không hợp lệ")</script>';
                echo '<meta http-equiv=refresh content="0;url=http://localhost:3000/DuAnMau/Admin2/index.php?action=hanghoa"/>';
            }
        }
        break;
            case 'delete_hanghoa':
                if(isset($_GET['id'])) {
                    $mahh = $_GET['id'];
                    $hh = new hanghoa();
                    $result = $hh->deleteHangHoa($mahh);
                    if($result != false) {
                        echo '<script>alert("Xóa sản phẩm thành công")</script>';
                    } else {
                        echo '<script>alert("Xóa sản phẩm không thành công")</script>';
                    }
                    echo '<meta http-equiv=refresh content="0;url=http://localhost:3000/DuAnMau/Admin2/index.php?action=hanghoa"/>';
                }
                break;
    }
    
?>