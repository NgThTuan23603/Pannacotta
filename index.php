<?php
 
function myAutoloader($class){
$classFile ="Model/$class.php";
if(file_exists($classFile)){
    include $classFile;
}
}
spl_autoload_register('myAutoloader');
    //cách 1
    include_once "Model/class.phpmailer.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- duong link icon cua boostrap4 -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--duong link logo facbook  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet"
       integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous"> -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- link đăng nhập -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- end link đăng nhập -->
    <link rel="stylesheet" type="text/css" href="Content/CSS/Tour.css" />
    <title>SanPham</title>
</head>

<body>
    <!-- Hiển thị header  -->
    <?php
    // $kn = new connect();
    include_once "View/headder.php";
     
    ?>
    <!-- Hiển thị nội dung  -->
    <div class="container">
        <div class="row">
            <!-- Hiển thị nội dung ở đây -->
            <?php
            // Muốn trang chủ hiển thị view nào lên thì khởi tạo biến tên trang đó 
            $ctrl = 'home';
            // index điều hướng đến những controller khác nhau thông qua URL, được đặt bằng tên biến = giá trị
            if(isset($_GET['action']))
            {
                $ctrl = $_GET['action'];
            }
            // index gọi controller
            include_once "./Controller/$ctrl.php";
            $ctrl='about';
            $ctrl='contact';
            ?>
        </div>
    </div>
     
    <!-- Hiển thị footer  -->
    <?php
    include_once "View/footer.php";
    ?>
</body>

</html>
