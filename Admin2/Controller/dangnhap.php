<?php
    $act="dangnhap";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'dangnhap':
            include_once "./View/dangnhap.php";
            break;
        
        case 'dangnhap_action':
            //nhận thông tin là username và pass
           
            if($_SERVER['REQUEST_METHOD']=='POST')// if(isset($_POST['txtusername']))
            {
                $user=$_POST['txtusername'];// admin
                $pass=$_POST['txtpassword'];//123456
                // kiểm tra xem trong database có tồn tại thông tin đó hay không
                $nv=new nhanvien();
                $checknv=$nv->getAdmin($user,$pass);// trả về là mảng $checknv[admin,123456]
                if($checknv!=false)
                {
                    // tạo ra session lưu thông tin đăng nhập
                    $_SESSION['admin']=$checknv[0];
                    echo '<script> alert("Đăng nhập thành công")</script>';
                    echo '<meta http-equiv=refresh content="0;url=http://localhost:3000/DuAnMau/Admin2/index.php?action=hanghoa"/>';
                }

            }
            break;
    }
?>