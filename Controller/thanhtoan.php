<?php
// Kiểm tra xem biểu mẫu đã được gửi để đặt hàng chưa
if(isset($_GET['tongtien']) && isset($_SESSION['makh']) && $_SESSION['tenkh']   )  {
    $hd = new hoadon;
  
   
    $maHD = $hd->insertHoaDon($_SESSION['makh'], $_GET['tongtien']);
foreach ($_SESSION['cart'] as $value) {
    extract($value);
    $thanhtien = $dongia * $soluong;
    $hd->insertCTHoaDon($maHD, $mahh, $soluong, $thanhtien);
    
    // Cập nhật số lượng tồn
    $hd->updateInventory($mahh, $soluong);
}
    unset($_SESSION['cart']);
    $_SESSION['order_placed'] = true;
    header('Location: ?action=thanhtoan&method=loadOrder&idhd='. $maHD .'');
    exit();
} elseif(isset($_GET['method']) && $_GET['method'] == 'loadOrder') {
    $hd = new hoadon;
    $show = $hd->loadOrder($_GET['idhd']);
    include 'View/order.php';
} else {
    echo '<script>alert("Bạn chưa đăng nhập!"); window.location.href = "?";</script>';
}
?>
<?php
// Kiểm tra xem biến phiên cho biết đơn hàng đã được đặt có được đặt hay không
if(isset($_SESSION['order_placed']) && $_SESSION['order_placed'] === true) {
    // Display the success message
    echo '<script>alert("Đặt hàng thành công! Hóa đơn của bạn. ");</script>';
    // Clear the session variable to avoid displaying the message again on subsequent visits
    unset($_SESSION['order_placed']);
}
?>
