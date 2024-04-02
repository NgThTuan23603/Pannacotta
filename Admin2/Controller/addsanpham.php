<?php
// Xử lý logic thêm sản phẩm
include "Model/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset ($_POST['submit'])) {
    // Nhận dữ liệu từ form
    $tenhh = $_POST['tenhh'];
    $maloai = $_POST['maloai'];
    $dacbiet = $_POST['dacbiet'];
    $slx = $_POST['slx'];
    $ngaylap = $_POST['ngaylap'];
    $mota = $_POST['mota'];
    $soluongton = $_POST['soluongton'];

    // Xử lý hình ảnh
    $hinh = ''; // Khởi tạo biến hình ảnh rỗng
    if (isset ($_FILES['hinh'])) {
        $file_name = $_FILES['hinh']['name'];
        $file_tmp = $_FILES['hinh']['tmp_name'];
        $file_type = $_FILES['hinh']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['hinh']['name'])));
        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            echo "Chỉ được phép tải lên các file JPEG hoặc PNG.";
            exit(); // Thoát khỏi script nếu không phải file hợp lệ
        }

        // Di chuyển file vào thư mục mong muốn
        // Di chuyển file vào thư mục mong muốn
        $target_dir = "../Content/imagetourdien/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true); // Tạo thư mục nếu chưa tồn tại
        }

        $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
        if (move_uploaded_file($file_tmp, $target_file)) {
            // Lưu tên file vào cơ sở dữ liệu thay vì đường dẫn đầy đủ
            $hinh = basename($_FILES["hinh"]["name"]); // Lấy tên file
        } else {
            echo "Có lỗi khi di chuyển file. Vui lòng thử lại.";
            exit();
        }

    }

    // Gọi phương thức themHangHoa() từ class hanghoa
    $hh = new hanghoa();
    $result = $hh->themHangHoa($tenhh, $maloai, $dacbiet, $slx, $ngaylap, $mota, $soluongton, $hinh);

    if ($result) {
        echo '<script> alert("Thêm sản phẩm thành công")</script>';
        echo '<meta http-equiv=refresh content="0;url=http://localhost:3000/DuAnMau/Admin2/index.php?action=hanghoa"/>';
    } else {
        echo '<script> alert("Thêm sản phẩm không thành công")</script>';
    }
}

include_once ("View/addsanpham.php");
?>