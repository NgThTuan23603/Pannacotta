<div class="table-responsive">
  <?php 
  if(!isset($_SESSION['makh'])):
    echo'<script> alert("Bạn chưa đăng nhập ");</script>';
    echo'<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
  ?>
  <?php
  else:
  ?>
    <form action="" method="post">
      <table class="table table-bordered" border="0">                       
       <tr>
          <td colspan="4">
            <h2 class="" style="color: red;">HÓA ĐƠN CỦA BẠN</h2>
          </td>
        </tr>
      <tr>
          <td colspan="2">Số Hóa đơn: <?=$_GET['idhd']?></td>
        </tr>
       <tr>
          <td colspan="2">Họ và tên: <?=$_SESSION['tenkh']?></td>
      
        </tr>
       
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          

        <?php
          $tongTen = 0;
          foreach($show as $i) 
          {
            extract($i);
            $tongTen += $thanhtien;
            echo '
              <tr>
                <td>'. $tenhh .'</td>
                <td>Sản Phẩm: <img width="50px" src="Content/IMG1/'. $hinh.'"> Đơn Giá: '. $dongia .'  - Số Lượng: '. $soluongmua .'<br />
                </td>
                <td>'. number_format($thanhtien) .'</td>
              </tr>
            ';
          }
        ?>
          <tr>
            <td colspan=" 2">
              <h3><b>Tổng Tiền</b></h3>
            </td>
            <td >
              <b><?=$tongTen?><sup><u>đ</u></sup></b>
            </td>
          </tr>
        </tbody>
     
      </table>
    </form>
  <?php
  endif;
  ?>
 
</div> 
 
 
</div>

