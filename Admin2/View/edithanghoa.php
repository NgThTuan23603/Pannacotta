<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<style>
  
  .container {
    margin-top: 0px;
    display: flex;
    justify-content: center; /* Căn giữa theo chiều ngang */
    align-items: center; /* Căn giữa theo chiều dọc */
    height: 100vh; /* Chiều cao của container là 100% chiều cao của viewport */
  }

  .row {
    width: 100%; /* Đảm bảo hàng nằm trên toàn bộ chiều rộng của container */
  }

  .card {
    width: 600px; /* Đặt chiều rộng của card */
    /* Nếu bạn muốn thêm các kiểu dáng hoặc điều chỉnh khác, bạn có thể thêm các thuộc tính CSS ở đây */
    font-size: 20px;
  }
  .form-control {
    font-size: 15px;
  }
</style>

 
<body>
  
 
<?php
 
if (isset($_GET['id'])) {
  $mahh = $_GET['id'];
  $hh = new hanghoa();
  $result = $hh->getHangHoaID($mahh);
  $mahh = $result['mahh'];
  $tenhh = $result['tenhh'];
  $dacbiet = $result['dacbiet'];
  $maloai = $result['maloai'];
  $slx = $result['soluotxem'];
  $ngaylap = $result['ngaylap'];
  $mota = $result['mota'];
  $soluongton =$result['soluongton'];
   
}
?>
<?php
$ac = 1;
if (isset($_GET['action'])) {
  if (isset($_GET['act']) && $_GET['act'] == 'insert_action') {
    $ac = 1;
  } else {
    $ac = 2;
  }
}
?>
<div class="container col-6  "> 
<div class=" row ">
  <div class="card   " style=" width: 600px;"> 
  <h3 class="text-center  card-header"> Cập Nhật Sản Phẩm</h3>
  <?php
  if ($ac == 1) {
    echo '<form action="index.php?action=hanghoa&act=insert_action" method="post" enctype="multipart/form-data">';
  } else {
    echo '<form action="index.php?action=hanghoa&act=update_action" method="post" enctype="multipart/form-data">';
  }
  ?>
  <table class="table" style="border: 0px;  ">
    <tr>
      <td>Mã hàng</td>
      <td> <input type="text" class="form-control" name="mahh" value="<?php if (isset($mahh))
        echo $mahh; ?>" readonly />
      </td>
    </tr>
    <tr>
      <td>Tên hàng</td>
      <td><input type="text" class="form-control" name="tenhh" value="<?php if (isset($tenhh))
        echo $tenhh; ?>"
          maxlength="100px"></td>
    </tr>
    <tr>
      <td>Mã loại</td>
      <td>
        <select name="maloai" class="form-control" style="width:150px;">
          <?php
          $selectedLoai = -1;
          if (isset($maloai) && $maloai != -1) {
            $selectedLoai = $maloai;
          }
          $loai = new loai();
          $result = $loai->getLoai();
          while ($set = $result->fetch()):
            ?>
            <option value="<?php echo $set['maloai'] ?>" <?php if ($selectedLoai == $set['maloai'])
                echo 'selected' ?>>
              <?php echo $set['tenloai']; ?>
            </option>
            <?php
          endwhile;
          ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>Đặc biệt</td>
      <td><input type="text" class="form-control" value="<?php if (isset($dacbiet))
        echo $dacbiet; ?>" name="dacbiet">
      </td>
    </tr>
    <tr>
      <td>Số lượt xem</td>
      <td><input type="text" class="form-control" value="<?php if (isset($slx))
        echo $slx; ?>" name="slx">
      </td>
    </tr>
    <tr>
      <td>Ngày lập</td>
      <td><input type="date" class="form-control" value="<?php if (isset($ngaylap))
        echo $ngaylap; ?>" name="ngaylap">
      </td>
    </tr>
    <tr>
      <td>Mô tả</td>
      <td><input type="text" class="form-control" value="<?php if (isset($mota))
        echo $mota; ?>" name="mota">
      </td>
    </tr>
    <tr>
    <td>Số lượng tồn</td>
    <td>
        <input type="text" class="form-control" value="<?php if (isset($soluongton)) echo $soluongton; ?>" name="soluongton">
    </td>
</tr>

    <tr>
      <td colspan="2" class="text-center">
        <input class="btn btn-warning form-control " type="submit" value="Lưu">
      </td>
    </tr>
  </table>
  </form>
</div>
        </div>
        </div>
        </body>
</html>