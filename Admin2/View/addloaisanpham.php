<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Định dạng các phần tử */
        .card {
            margin: 0 auto; /* căn giữa theo chiều ngang */
            width: 500px; /* Độ rộng của card */
            height: 500px;
            margin-top: 100px;
        }

        .card-header,
        .form-group label {
            font-size: 20px; /* Kích thước font */
            font-weight: bold; /* Chữ đậm */
            line-height: 1.5; /* Độ cao dòng */
        }

        .card-body {
            padding: 20px; /* Khoảng cách giữa nội dung và viền */
        }

        .form-control {
            font-size: 18px; /* Kích thước font */
        }

        .btn-primary,
        .btn-danger {
            width: 100px; /* Độ rộng của nút */
        }
    </style>
</head>
<body>
  
<div class="card mt-3">
        <div class="card-header info">
          QUẢN LÝ LOẠI HÀNG
        </div>
        <div class="card-body">
        <form action="index.php?action=loai&act=import_loai" method="post" enctype="multipart/form-data">
          <input type="file" name="file"/>
          <input type="submit" name="submit_file" value="Submit">
        </form>

            <div class="form-group">
                <label for="">Mã danh mục</label>
                <input type="text" readonly name="id" class="form-control" >
              </div>
              <div class="form-group">
                <label for="">Tên danh mục</label>
                <input type="text" name="namecata" class="form-control">

              </div>
              <div class="form-group">
                <label for="">Menu số:</label>
                <input type="text" name="menu"  class="form-control">

              </div>

              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Lưu</button>
                  <a href="" class="btn btn-danger">Danh sách</a>
              </div>
          </form>
        </div>
      </div>

</body>
</html>
