<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh sách hàng hóa</title>
  <style>
    /* Thiết lập font chữ mặc định */
    body {
      font-family: Arial, sans-serif;
    }
    
    /* Định dạng tiêu đề */
    h1 {
      font-size: 30px;
      text-align: center;
      margin-top: 50px;
      margin-bottom: 20px;
    }
    
    /* Định dạng nút thêm sản phẩm */
    .btn-add {
      text-align: center;
      margin-left: auto;
      margin-right: auto;
      display: block;
      margin-bottom: 20px;
    }
    
    /* Định dạng bảng */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: auto;
      margin-left: 200px;
    }
    th, td {
      padding: 8px;
      border: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    img {
      max-width: 70px;
      height: auto;
    }
    .btn {
      text-decoration: none;
      padding: 5px 10px;
      border-radius: 3px;
      font-size: 14px;
      cursor: pointer;
    }
    .btn-info {
      background-color: #007bff;
      color: #fff;
    }
    .btn-danger {
      background-color: #dc3545;
      color: #fff;
    }
  </style>
</head>
<body>
  <h1>DANH SÁCH HÀNG HÓA</h1>
  <div class="btn-add">
    <a class="btn btn-success" href="index.php?action=addsanpham">Thêm sản phẩm</a>
  </div>
  <table>
    <thead>
      <tr>
        <th>Mã hàng</th>
        <th>Tên hàng</th>
        <th>Mã loại</th>
        <th>Đặc biệt</th>
        <th>Số lượt xem</th>
        <th>Ngày lập</th>
        <th>Mô tả</th>
        <th>Số lượng tồn</th>
        <th>Hình ảnh</th>
        <th>Cập nhật</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $hh = new hanghoa();
        $hang = $hh->getHangHoa();
        while ($set = $hang->fetch()):
      ?>
      <tr>
        <td><?php echo $set['mahh'];?></td>
        <td><?php echo $set['tenhh'];?></td>
        <td><?php echo $set['maloai'];?></td>
        <td><?php echo $set['dacbiet'];?></td>
        <td><?php echo $set['soluotxem'];?></td>
        <td><?php echo $set['ngaylap'];?></td>
        <td><?php echo $set['mota'];?></td>
        <td><?php echo $set['soluongton'];?></td>
        <td><img src="../Content/IMG1/<?php echo $set['hinh'];?>" alt="Hình ảnh hàng hóa"></td>
        <td>
          <a class="btn btn-primary" href="index.php?action=hanghoa&act=update_hanghoa&id=<?php echo $set['mahh'];?>">Sửa</a>
          <a class="btn btn-danger" href="index.php?action=hanghoa&act=delete_hanghoa&id=<?php echo $set['mahh'];?>">Xóa</a>
        </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</body>
</html>
