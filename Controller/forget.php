<?php
$act = 'forget';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'forget':
        include_once "./View/forgetpassword.php";
        break;

    case 'forget_action':
        // If the submit button is pressed, process the email
        if (isset($_POST['submit_email'])) {
            $email = $_POST['email'];
            $_SESSION['email'] = array();

            // Check if the email exists in the database
            $kh = new user();
            $checkemail = $kh->checkEmail($email)->rowCount();

            if ($checkemail > 0) {
                // Generate a random code
                $code = random_int(10000, 1000000);

                // Store the code and email in the session
                $item = array(
                    'id' => $code,
                    'email' => $email,
                );
                $_SESSION['email'][] = $item;

                // Send the email
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                $mail->SMTPAuth = true;
                $mail->Username = "haquocphong04@gmail.com";
                $mail->Password = "pslw lvyt mlfb jzsp"; // Application password
                $mail->SMTPSecure = "tls"; // Change to "ssl" if needed
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587; // Change to 465 if using SSL
                $mail->From = "haquocphong04@gmail.com";
                $mail->FromName = 'Quốc Phong';
                $mail->AddAddress($email, 'receiver_name');
                $mail->Subject = 'Reset Password';
                $mail->IsHTML(true);
                $mail->Body = 'Cấp lại mã code ' . $code;

                if ($mail->Send()) {
                    echo '<script>alert("Check Your Email and Click on the link sent to your email");</script>';
                    include "./View/resetpw.php";
                } else {
                    echo "Mail Error: " . $mail->ErrorInfo;
                    include "./View/forgetpassword.php";
                }
            } else {
                echo "<script> alert('Địa chỉ Email không tồn tại') </script>";
                include "./View/forgetpassword.php";
            }
        }
        break;

    case 'reset':
        if (isset($_POST['submit_password'])) {
            $pass = $_POST['password'];
            // Loop through the session to find a match
            foreach ($_SESSION['email'] as $key => $item) {
                if ($item['id'] == $pass) {
                    $emailold = $item['email'];
                    $saltF = "G4335#";
                    $salfL = "F5567!";
                    $passnew = md5($saltF . $pass . $salfL);

                    // Update the password in the database
                    $kh = new user();
                    $kh->updatePassEmail($emailold, $passnew);
                }
            }
        }
        echo '<meta http-equiv="refresh" content=";url=../index.php?action=dangnhap"/>';
        break;
}
?>
