<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Add the following CSS for the zoom effect */
        .zoom-effect {
            transition: transform 0.3s ease;
        }

        .zoom-effect:hover {
            transform: scale(1.1); /* You can adjust the scale factor */
        }
        

    .product-name {
        font-size: 1em;
        color: black;
        transition: color 0.3s ease;
    }

    .product-price {
        font-size: 1.2em;
        color: black;
        transition: color 0.3s ease;
    }

      .product-container:hover .product-name,
      .product-container:hover .product-price {
        color: #191970; /* Change color on hover */
    }
    .custom-button {
        display: inline-block;
        padding: 10px 20px; /* Adjust padding as needed */
        font-size: 10px ; /* Adjust font size as needed */
        background-color: #F08080; /* Bootstrap's btn-danger color */
        color: #fff;
        border: none;
        border-radius: 3px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.2); /* Add box shadow */
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    }

    .custom-button:hover {
        background-color: #DDA0DD; /* Bootstrap's btn-dark color on hover */
        color: #000;
        transform: scale(1.1);
        box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.3); /* Increase box shadow on hover */
    }
 
    h3.font {
        display: inline-block;
        border: 1px solid #000;
        padding: 10px;
    } 
 

    
    </style>
</head>
<body>

<div class="container">
    <?php 
    include_once "View/menuimage.php" ?>

    <!-- Section: Examples -->
    <section id="examples" class="text-center">
        <!-- Heading -->
        <div class="row">
            <div class="col-lg-8 text-right mt-5">
                <h1 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM MỚI NHẤT</h1>
            </div>
            <div class="col-lg-4 text-right mt-4">
                <a href="index.php?action=sanpham">
                    <h3 class="font" style="color :#000">Xem chi tiết</h3>
                </a>
            </div>
        </div>
        <!-- Grid row -->
        <div class="row">
            <?php
            $hh = new hanghoa();
            $result = $hh->getHangHoaNew(); // 1 bảng chứa 8 sản phẩm
            //Lấy từng sản phẩm dùng vòng lập
            while ($set = $result->fetch()) :
                ?>
                <!-- Grid column -->
                <!-- Grid column --> 
<div class="col-lg-3 col-md-4 mb-3 text-center product-container">
    <div class="view overlay z-depth-1-half zoom-effect">
        <img src="Content\IMG1\<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
        <div class="mask rgba-white-slight"></div>
    </div>
    <h5 class="my-4 font-weight-bold product-price">
        <span><?php echo $set['dongia']; ?><sup><u>đ</u></sup></span>
    </h5>
    <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>" class="product-name">
        <span><?php echo $set['tenhh']  ?></span></br>
    </a>
    <a href="index.php?action=giohang&luachon=luachon&mahh=<?=$set['mahh']?>&soluong=1&tenhh=<?=$set['tenhh']?>&dongia=<?=$set['dongia']?>&hinh=<?=$set['hinh']?>" class="custom-button" id="may4" value="lap 4">Thêm giỏ hàng</a>

    <h5>Số lượt xem:<?php echo $set['soluotxem']; ?></h5>
</div>

            <?php
            endwhile;
            ?>
        </div>
        <!-- Grid row -->
    </section>
    <!-- End sản phẩm mới nhất -->

    <!-- Sản phẩm khuyến mãi -->
       <section id="examples" class="text-center">
        <!-- Heading -->
        <div class="row mt-5">
            <div class="col-lg-8 text-right ">
                <h1 class="mb-5 font-weight-bold" style="color: red;">SẢN PHẨM KHUYẾN MÃI</h1>
            </div>
            <div class="col-lg-4 text-right mt-4">
                <a href="index.php?action=sanpham&act=sanphamkhuyenmai">
                    <h3 class="font" style="color: black;">Xem chi tiết</h3>
                </a>
            </div>
        </div>
        <!-- Grid row -->
        <div class="row">
            <?php
            $result = $hh->getHangHoaSale(); // 1 bảng chứa 8 sản phẩm
            //Lấy từng sản phẩm dùng vòng lập
            while ($set = $result->fetch()) :
                ?>
                <!-- Grid column -->
                <div class="col-lg-3 col-md-4 mb-3 text-center">
                    <div class="view overlay z-depth-1-half zoom-effect">
                        <img src="Content\IMG1\<?php echo $set['hinh']; ?> " class="img-fluid" alt="">
                        <div class="mask rgba-white-slight"></div>
                    </div>
                    <h5 class="my-4 font-weight-bold">
                        <font color="red"><?php echo $set['giamgia']; ?><sup><u>đ</u></sup></font>
                        <strike><?php echo $set['dongia'] ?></strike><sup><u>đ</u></sup>
                    </h5>
                    <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>" class="product-name">
                <span><?php echo $set['tenhh']  ?></span></br>
    </a>
                    <a href="index.php?action=giohang&luachon=luachon&mahh=<?=$set['mahh']?>&soluong=1&tenhh=<?=$set['tenhh']?>&dongia=<?=$set['dongia']?>&hinh=<?=$set['hinh']?>" class="custom-button" id="may4" value="lap 4">Thêm giỏ hàng</a>
                    <h5>Số lượt xem:<?php echo $set['soluotxem']; ?></h5>
                </div>
            <?php
            endwhile;
            ?>
        </div>
    </section>
     
</div>
<!-- End sản phẩm khuyến mãi -->
</body>
</html>
