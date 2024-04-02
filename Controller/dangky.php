<?php
$act = "dangky";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include_once "./View/registration.php";
        break;

    case 'dangky_action':
        // Gửi thông tin qua đây, nhận thông tin
        $tenkh = '';
        $dc = '';
        $sodt = '';
        $user = '';
        $email = '';
        $pass = '';
        if (isset($_POST['submit'])) {
            $tenkh = $_POST['txttenkh'];
            $dc = $_POST['txtdiachi'];
            $sodt = $_POST['txtsodt'];
            $user = $_POST['txtusername'];
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            $saltF = 'G433#';
            $salL = 'T234!';
            $passnew = md5($saltF . $pass . $salL); // Mã hóa mật khẩu nhầm bảo mật an toàn
            // $passnew = md5($pass);
            // Trước khi đăng ký cần kiểm tra xem user và email nó trùng hay không
            $kh = new user();
            $check = $kh->checkUser($user, $email)->rowCount();
            if ($check > 0) {
                echo '<script> alert("Username hoặc email đã tồn tại"); </script>';
                // include_once "./View/registration.php"; 
                echo '<meta http-equiv="refresh" content="0; url=../DuAnMau/index.php?action=dangky"/>'; // thẻ meta là refresh lại trang với content là 0s và đến trang có link url
            } else {
                // tiến hành insert vào trong database
                $inSKH = $kh->insertKH($tenkh, $user, $passnew, $email, $dc, $sodt);
              if ($inSKH !== false) {
        $_SESSION['registration_success'] = true; // Set session variable
        echo '<meta http-equiv="refresh" content="0; url=../DuAnMau/index.php?action=sanpham"/>';
    } else {
        echo '<script> alert("Đăng ký không thành công"); </script>';
        echo '<meta http-equiv="refresh" content="0; url=../DuAnMau/index.php?action=dangky"/>';
    }
    break;
            }
        }
}