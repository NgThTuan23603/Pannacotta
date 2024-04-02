<?php
$act = "dangnhap";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;

    case 'dangnhap_action':
        // Nhận thông tin
        $user = '';
        $pass = '';
        if (isset($_POST['submit'])) {
            $user = $_POST['txtusername'];
            $pass = $_POST['txtpassword'];
            $saltF = 'G433#';
            $salL = 'T234!';
            $passnew = md5($saltF . $pass . $salL);
            // $passnew = md5($pass);
            $kh = new user();
            $logUser = $kh->loginUser($user, $passnew); // Trả về cái bảng
            $count = $logUser->rowCount(); // Nếu có thì trả về số dòng trong bảng
            $uslg = $logUser->fetch();
            if ($count > 0) 
            {
                // Nếu như đăng ký thành công thì lưu thông tin vào trong session
                $_SESSION['makh'] = $uslg['makh'];
                $_SESSION['tenkh'] = $uslg['tenkh'];
                // echo $_SESSION['makh'];
                echo '<script> alert("Đăng nhập thành công"); </script>';
                echo '<meta http-equiv="refresh" content="0; url =../DuAnMau/index.php?action=sanpham"/>';
            } else 
            {
                echo '<script> alert("Đăng nhập không thành công"); </script>';
                echo '<meta http-equiv="refresh" content="0; url =../DuAnMau/index.php?action=dangnhap"/>';
            }
        }
        break;
}