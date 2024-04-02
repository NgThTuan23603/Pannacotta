  <!-- quảng cáo -->
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
    .text-center {
            text-align: center; /* Căn giữa nội dung */
        }

        .marquee {
            overflow: hidden; /* Ẩn nội dung vượt ra khỏi khung */
            white-space: nowrap; /* Không để nội dung xuống dòng */
            animation: marquee 5s linear infinite; /* Chạy ngang qua trong 5s và lặp vô hạn */
        }

        @keyframes marquee {
            0% { transform: translateX(100%); } /* Bắt đầu từ bên phải */
            100% { transform: translateX(-100%); } /* Di chuyển về bên trái */
        }
    </style>
  </head>
  <body>
 
  <?php 
    include_once"Model/page.php"
    
    ?>
  <!-- end quảng cáo -->
  <!-- phân trang-->
  <?php
   //b1 xác định tổng sản phẩm 
   $hh=new hanghoa();
   $result=$hh->getHangHoaAll();//trả về bảng 14 sản phẩm
   $count=$result->rowCount();
   //bước 2 cho giới hạn,mỗi trang bao nhiêu sản phẩm
   $limit=8;
   //bước 3 tính tra có bao nhiêu page
   $trang = new page();
   //lấy số trang
   $page = $trang->findPage($count, $limit);  //trả về trang 2
   //lấy start
   $start=$trang->findStart($limit);
   //khởi gán trang hiện tại
   $current_page = isset($_GET['page']) ? $_GET['page'] : 1;  // Add a semicolon at the end

   ?>

  <!-- end số lượt xem san phẩm -->
  <!-- sản phẩm-->

  <!-- Cấm cờ để sử dụng 1 thiết kế mà cho 2 model khác nhau xử lí -->
  <?php
$ac = 1;
if (isset($_GET['action']) && $_GET['action'] == 'sanpham') {
    if (isset($_GET['act'])) {
        if ($_GET['act'] == 'sanphamkhuyenmai') {
            $ac = 2;
        } elseif ($_GET['act'] == 'timkiem') {
            $ac = 3;
        } else {
            $ac = 1;
        }
    }
}
?>
   
  <!--Section: Examples-->
  <section id="examples" class=" ">

      <!-- Heading -->
      <div class="row">
          <div class="col   ">
              <!-- Hiển thị tiêu đề -->
              <?php
                if ($ac == 1) {
                    echo '<h4 class="mb-5 mt-5 font-weight-bold text-center">TẤT CẢ SẢN PHẨM</h4>';
                }
                if ($ac == 2) {
                    echo '<h4 class="mb-5 mt-5 font-weight-bold  text-center">TẤT CẢ SẢN PHẨM SALE</h4>';
                }
                if($ac==3){
                    echo '<h4 class="mb-5 mt-5 font-weight-bold text-center">KẾT QUẢ TÌM KIẾM </h4>';
                }
                ?>
              <!-- Kết thúc hiển thị tiêu đề -->
          </div>

      </div>
      <!--Grid row-->
      <div class="row">
          <?php
            $hh = new hanghoa();
            if ($ac == 1) {
               // $result = $hh->getHangHoaAll(); // Lấy về tất cả sản phẩm
               $result=$hh->getHangHoaAllPage( $start,$limit );
            }
            if ($ac == 2) {
                $result = $hh->getHangHoaAllSale(); // Lấy về tất cả sản phẩm slae
            }
            if($ac==3){
                if(isset($_POST['txtsearch']))
                {
                    $tk=$_POST['txtsearch'];
                    $result=$hh->timkiemSP($tk);
                }
            }
            // lấy từng sản phẩm đổ lên view
            while ($set = $result->fetch()) :
            ?>

              <!--Grid column-->
              <div class="col-lg-3 col-md-4 mb-3 text-center">

                  <div class="view overlay z-depth-1-half">
                      <img src="Content\IMG1\<?php echo $set['hinh']; ?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>

                  <!-- Phần hiển thị thông tin sản phẩm -->
                  <?php
                    if ($ac == 1) {
                        echo '<h5 class="my-4 font-weight-bold" style="color: red;">' . number_format($set['dongia']) . '<sup><u>đ</u></sup></br></h5>';
                    }
                    if ($ac == 2 ) {
                        echo '<h5 class="my-4 font-weight-bold">
                        <font color="red">' . $set['giamgia'] . '<sup><u>đ</u></sup></font>
                        <strike>' . $set['dongia'] . '</strike><sup><u>đ</u></sup>
                    </h5>';
                    }
                    if ($ac == 3 ) {
                        echo '<h5 class="my-4 font-weight-bold" style="color: red;">' . number_format($set['dongia']) . '<sup><u>đ</u></sup></br></h5>';
                
                    }
                     
                    ?>
                  <!-- Hết phần hiển thị thông tin sản phẩm -->
                  <a href="index.php?action=sanpham&act=sanphamchitiet&id=<?php echo $set['mahh']; ?>" class="product-name">
                    <span><?php echo $set['tenhh']  ?>  </span></br>
                 </a>
 <a href="index.php?action=giohang&luachon=luachon&mahh=<?=$set['mahh']?>&soluong=1&tenhh=<?=$set['tenhh']?>&dongia=<?=$set['dongia']?>&hinh=<?=$set['hinh']?>" class="custom-button" id="may4" value="lap 4">Thêm giỏ hàng</a>                     
                  <h5>Số lượt xem: <?php echo $set['soluotxem']; ?></h5>

              </div>
          <?php
            endwhile;
            ?>
      </div>

      <!--Grid row-->

  </section>


  <!-- end sản phẩm mới nhất -->
<?php
if($ac==1):
?>
  <div class="col-md-6 div col-md-offset-3">
				<ul class="pagination">
					<?php
                  if($current_page>1 && $page>1){
                    echo'<li><a href="index.php?action=sanpham&page='.($current_page-1).'">prev</a></li>';
                  }                  
                   for ($i = 1; $i <= $page; $i++):
                    ?>
				    <li ><a href="index.php?action=sanpham&page=<?php echo $i;?>">
                  <?php 
                  echo $i;
                  ?>
                </a>
            </li>
            <?php 
             endfor;
             if($current_page<$page && $page>1)
             {
                echo'<li><a href="index.php?action=sanpham&page='.($current_page+1).'"> Next</a></li>';
              }

           ?>
	 </ul>
</div> 
</div>
<?php
endif;
?>
</body>
  </html>