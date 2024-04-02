<?php
class giohang
{
    // phương thức thêm vào giỏ hàng
    function addGioHang($mahh, $mausac, $size, $soluong)
    {
        // thiếu hình,tên,giá,thành tiền
        $hh = new hanghoa();
        $sanpham = $hh->getHangHoaId($mahh);
        $j=0;
        $tenhh = $sanpham['tenhh'];
        $dongia = $sanpham['dongia'];
        // lấy tên màu dựa vào id màu
        $mau=$hh->getHangHoaIdMauGH($mausac);
        $tenmau=$mau['mausac'];
        // thiếu hình
        $hinh = $hh->getHangHoaMauHinh($mahh, $mausac, $size); // getInstance nên trả về 1 array
        $img = $hinh['hinh'];
        $total = $soluong * $dongia;
        $flag=false;
        foreach ($_SESSION['cart'] as $key=>$item) {
            if($item['mahh']==$mahh   )
            {
                $flag=true;
                $soluong+=$item['soluong'];//$_SESSION['cart][12]['soluong]
                $dongia=$item['dongia'];
                // $_SESSION['cart'][$mahh]['soluong']=$soluong;
               $this->update_item($key,$soluong);
                //return;
            }
        }
        if($flag==false)
        {
            $item = array(
                'id'=>$j++,
                'mahh' => $mahh, //24
                'hinh' => $img, //21.jpg
                'tenhh' => $tenhh, //giày cao gót
                'dongia' => $dongia,
                'soluong' => $soluong,
                'thanhtien' => $total
            );
            // dem đối tượng add vào mảng giỏ hàng a[]
            $_SESSION['cart'][] = $item;
        }
       
       
    }
    // phương thức tính tổng thành tiền 
    function get_subTotal()
    {
        $subtotal = 0;
        // duyệt qua giỏ hàng
        foreach ($_SESSION['cart'] as $item) {
            $subtotal += $item['thanhtien'];

        }
        // định dạng tiền tệ
        $subtotal = number_format($subtotal, 2);
        return $subtotal;
    }
    // phương thức update dựa vào mã hàng 
    function update_item($index,$soluong)
    {
        
        if($soluong<=0)
        {
           
            unset($_SESSION['cart'][$index]);
        }
        else
        {
        //   cap nhat la phep gan
            $_SESSION['cart'][$index]['soluong']=$soluong;
            $tienmoi= $_SESSION['cart'][$index]['soluong']* $_SESSION['cart'][$index]['dongia'];
            $_SESSION['cart'][$index]['thanhtien']=$tienmoi;
        }
    }
}

?>