

</tr><div class="table-responsive">
  <?php
    if(isset($_SESSION['cart'])&& count($_SESSION['cart'])>0)
    {
  ?>
      <table class="table table-bordered">
        <thead>
          <tr><td colspan="5"><h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2></td></tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $j=0;
            $tongTen = 0;
            foreach ($_SESSION['cart'] as $key => $item) {
              $j++;
          ?>
            <tr>
              <form action="?action=giohang&method=updateQtyCart" method="post">
              <td><?php echo $j;?></td>
              <td><img width="50px" height="50px" src="Content\IMG1\<?php echo $item['hinh'];?>">
              <?php echo $item['tenhh'];?></td>
              <input type="hidden" name="idHh" value="<?=$item['mahh']?>">
              <td>Đơn Giá: <?php echo number_format($item['dongia']);?>- Số Lượng:
                <input type="number" name="qty" min="0" value="<?php $tongTen += $item['soluong'] * $item['dongia']; echo $item['soluong'];?>" /><br />
                <p style="float: right;"> Thành Tiền <?php echo number_format($item['soluong'] * $item['dongia']);?> <sup><u>đ</u></sup></p>
              </td>
              <td><a href="index.php?action=giohang&method=delete_giohang&id=<?php echo $key;?>"><button type="button" class="btn btn-danger">Xóa</button></a>

                <button type="submit" class="btn btn-secondary">Cập nhật</button>
              </td>
            </form>
          <?php
            }
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>
                <?php
                  echo number_format($tongTen);
              ?> 
              <sup><u>đ</u></sup></b>
            </td>
            <td><a href="index.php?action=thanhtoan&tongtien=<?=$tongTen?>" class="btn btn-danger">Đặt Hàng  </a></td>
          </tr>
        </tbody>
      </table>
 <?php
    }
    else
    {
      echo '<script> alert("Giỏ hàng bạn chưa có hàng");</script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
    }
?>
</div>
</div>