<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
            width: 400px;
            max-width: 90%;
        }

        .card-header {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="file"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

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
        $hinh = $result['hinh'];
        $soluongton = $result['soluongton'];
    }
    ?>
    <div class="container">
        <div class="card">
            <h3 class="card-header">Thêm Sản Phẩm</h3>
            <form method="POST" action="index.php?action=addsanpham" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="mahh">Mã Hàng:</label>
                    <input type="text" id="mahh" name="mahh" value="<?php if (isset($mahh)) echo $mahh; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="tenhh">Tên Hàng:</label>
                    <input type="text" id="tenhh" name="tenhh" value="<?php if (isset($tenhh)) echo $tenhh; ?>">
                </div>
                <div class="form-group">
                    <label for="hinh">Hình:</label>
                    <input type="file" id="hinh" name="hinh" value="<?php if (isset($hinh)) echo $hinh; ?>">
                </div>
                <div class="form-group">
                    <label for="maloai">Mã Loại:</label>
                    <select id="maloai" name="maloai">
                        <?php
                        $selectedLoai = -1;
                        if (isset($maloai) && $maloai != -1) {
                            $selectedLoai = $maloai;
                        }
                        $loai = new loai();
                        $result = $loai->getLoai();
                        while ($set = $result->fetch()) :
                        ?>
                            <option value="<?php echo $set['maloai'] ?>" <?php if ($selectedLoai == $set['maloai'])
                                                                                echo 'selected' ?>>
                                <?php echo $set['tenloai']; ?>
                            </option>
                        <?php
                        endwhile;
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dacbiet">Đặc Biệt:</label>
                    <input type="text" id="dacbiet" name="dacbiet" value="<?php if (isset($dacbiet)) echo $dacbiet; ?>">
                </div>
                <div class="form-group">
                    <label for="slx">Số Lượt Xem:</label>
                    <input type="text" id="slx" name="slx" value="<?php if (isset($slx)) echo $slx; ?>">
                </div>
                <div class="form-group">
                    <label for="ngaylap">Ngày Lập:</label>
                    <input type="date" id="ngaylap" name="ngaylap" value="<?php if (isset($ngaylap)) echo $ngaylap; ?>">
                </div>
                <div class="form-group">
                    <label for="mota">Mô Tả:</label>
                    <input type="text" id="mota" name="mota" value="<?php if (isset($mota)) echo $mota; ?>">
                </div>
                <div class="form-group">
                    <label for="soluongton">Số Lượng Tồn:</label>
                    <input type="text" id="soluongton" name="soluongton" value="<?php if (isset($soluongton)) echo $soluongton; ?>">
                </div>
                <div class="form-group">
                    <input class="btn" type="submit" name="submit" value="Lưu">
                </div>
            </form>
        </div>
    </div>
</body>

</html>
