<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Website</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- Link Bootstrap CSS -->
    <!-- Your Custom Styles -->
    <!-- Your Custom Styles -->
    <style>
        /* Content/style.css */
        /* Navbar styling */
        .navbar {
            background-color: #D8BFD8;
        }

        .navbar-nav .nav-link {
            color: #000000;
            font-weight: bold;
            /* Make the font bold */
            transition: color 0.3s, transform 0.3s;
            /* Smooth color transition and font size change */
            font-size: 18px;
            /* Set the font size */
            margin-right: 15px;
            /* Set the right margin between navbar items */
        }

        .navbar-nav .nav-link:hover {
            color: rgb(8, 12, 116);
            /* Dark purple text color on hover */
            transform: scale(1.05);
            /* Slightly scale the text on hover */
        }

        .list-group-item {
            font-size: 16px;
            /* Set the font size for list-group items */
        }

        /* Add padding to the navbar items for better spacing */
        .navbar-nav>li {
            padding: 0 10px;
        }
        .carousel-item{
          
        }
    </style>
</head>

<body>
    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg ">
        <a class="navbar-brand" href="#"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav mt-3">
                <li class="nav-item  ">
                    <a class="nav-link" href="?controller=home&action=home">Trang chủ<span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controller=sanpham&action=sanpham">Cửa Hàng</a>
                </li>
                <li class="nav-item">
                 <a class="nav-link" href="?controller=about&action=about">Giới thiệu</a>
    </li>
                <li class="nav-item">
                    <a class="nav-link" href="?controller=contact&action=contact">Liên hệ</a>
                </li>
            </ul>
            <ul>
                <form class="form-inline " action="index.php?action=sanpham&act=timkiem" method="post">
                    <div class="input-group">
                        <div class="input-group-prepend">
                
                
                            <input class="input-group-text form-control mt-4" type="text" name="txtsearch" id="btsearch" value="" placeholder="Tìm kiếm"/>

                            <button class="btn btn-info mt-4" type="submit" id="btsearch">Tìm Kiếm</button>
                    </div>

                </form>
            </ul>
             
            <ul class="navbar-nav">
                <?php
                if (!isset($_SESSION['tenkh'])) {
                    echo '<li class="nav-item"><a href="index.php?action=dangky" class="nav-link mt-3">Đăng Ký</a> </li>';
                    echo ' <li class="nav-item"><a href="index.php?action=dangnhap" class="nav-link mt-3">Đăng Nhập</a> </li>';
                } else {
                    echo '<li class="nav-item mt-3">
                                <a href="index.php?action=dangxuat" class="nav-link">Đăng Xuất</a>
                            </li>';
                }

                ?>
                <li class="nav-item">
                <a href="index.php?action=giohang&page=cart" class="nav-link"><img src="./Content/imagetourdien/cartx2.png" width="30px" height="30px"
                alt=""></a>
                </li>
                <!-- <li>
                    <p style="color: red; margin-top: 20px; margin-left: 0px;"> (0)</p>
                </li> -->
                <?php
                if (isset($_SESSION['tenkh'])) {
                    echo '<p style="color: red; margin-top: 20px; margin-left: 0px;">' . $_SESSION['tenkh'] . '</p>';
                }

                echo '<p style="color: red; margin-top: 20px; margin-left: 0px;"></p> ';
                ?>
            </ul>
        </div>
    </nav>
    <!-- Bootstrap Carousel -->
    <!-- Bootstrap Carousel with Navigation Arrows -->
                <div id="carouselExample" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./Content/IMG1/26.jpg" class="d-block w-100" height="600px" alt="Slide 1">
                        </div>
                        <div class="carousel-item">
                            <img src="./Content/IMG1/28.png" class="d-block w-100" height="600px" alt="Slide 2">
                        </div>
                        <div class="carousel-item">
                            <img src="./Content/IMG1/27.jpg" class="d-block w-100" height="600px" alt="Slide 3">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
        <!-- Link Bootstrap JS and Popper.js -->
</body>

</html>