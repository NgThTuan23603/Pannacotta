<?php
class hoadon
{

    // Phương thức insert vào bảng hoadon
    function insertHoaDon($makh, $tongtien)
    {
        $db = new connect();
        $date = new DateTime('now');
        $ngay = $date->format('Y-m-d');

        $query = "INSERT INTO hoadon(masohd, makh, ngaydat, tongtien) VALUES (NULL, $makh, '$ngay', '$tongtien')";
        $db->exec($query);

        // Đã insert vào trong database

        $select = "SELECT masohd FROM hoadon ORDER BY masohd DESC LIMIT 1";
        $masohd = $db->getInstance($select);

        return $masohd[0]; // $masohd=array(17);
    }

    // Phương thức insert vào bảng cthoadon
    function insertCTHoaDon($masohd, $mahh, $soluongmua, $thanhtien)
    {
        $db = new connect();
        // Kiểm tra giá trị $mahh, nếu là NULL thì sử dụng NULL trong câu lệnh SQL
        $mahhValue = ($mahh !== NULL) ? $mahh : 'NULL';
        $query = "INSERT INTO cthoadon(masohd, mahh, soluongmua,   thanhtien, tinhtrang)
            VALUES ($masohd, $mahhValue, $soluongmua,   $thanhtien, 0)";
        $db->exec($query);
    }

    // Phương thức update vào bảng hoa don tổng tiền
    function updateTongTien($masohd, $makh, $tongtien)
    {
        $db = new connect();
        $query = "UPDATE hoadon SET tongtien=$tongtien WHERE masohd=$masohd AND makh=$makh";
        $db->exec($query);
    }

    function loadOrder($idHd)
    {
        $db = new connect();
        $query = "SELECT cthoadon.*, hanghoa.tenhh, cthanghoa.hinh, cthanghoa.dongia
                    FROM cthoadon
                    JOIN hanghoa ON cthoadon.mahh = hanghoa.mahh
                    JOIN cthanghoa ON cthoadon.mahh = cthanghoa.idhanghoa
                    WHERE cthoadon.masohd = '$idHd'
        ";
        $chua = $db->getAll($query);
        return $chua;
    }
    // Phương thức cập nhật số lượng tồn của sản phẩm sau khi thanh toán thành công
    function updateInventory($idhh, $soluongmua)
    {
        $db = new connect();
        // Lấy số lượng tồn hiện tại của sản phẩm
        $query = "SELECT soluongton FROM cthanghoa WHERE idhanghoa = $idhh";
        $currentInventory = $db->getInstance($query);
        $currentInventory = $currentInventory[0]; // Lấy giá trị đầu tiên từ mảng

        // Trừ số lượng mua khỏi số lượng tồn
        $newInventory = $currentInventory - $soluongmua;

        // Cập nhật số lượng tồn mới vào cơ sở dữ liệu
        $updateQuery = "UPDATE cthanghoa SET soluongton = $newInventory WHERE idhanghoa = $idhh";
        $db->exec($updateQuery);
    }

}

?>