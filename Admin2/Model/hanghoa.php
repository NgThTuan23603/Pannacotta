<?php
class hanghoa
{
    function getHangHoa()
    {
        $db = new connect();
        $select = "SELECT hanghoa.*, cthanghoa.soluongton, cthanghoa.hinh AS hinh
                   FROM hanghoa
                   LEFT JOIN cthanghoa ON hanghoa.mahh = cthanghoa.idhanghoa";
        $result = $db->getList($select);
        return $result;
    }



    function insertHangHoa($tenhh, $maloai, $dacbiet, $slx, $ngaylap, $mota)
    {
        $db = new connect();
        $query = "insert into hanghoa(mahh,tenhh,maloai,dacbiet,soluotxem,ngaylap,mota) 
        values (Null,'$tenhh',$maloai,$dacbiet,$slx,'$ngaylap','$mota')";
        $result = $db->exec($query);
        return $result;
    }
    function themHangHoa($tenhh, $maloai, $dacbiet, $slx, $ngaylap, $mota, $soluongton, $hinh)
    {
        $db = new connect();
        $query = "INSERT INTO hanghoa (mahh, tenhh, maloai, dacbiet, soluotxem, ngaylap, mota) 
                  VALUES (NULL, '$tenhh', $maloai, $dacbiet, $slx, '$ngaylap', '$mota')";
        $result = $db->exec($query);

        // Lấy ID của hàng hóa vừa được thêm vào
        $lastInsertedID = $db->getLastInsertedID();

        // Nếu thêm hàng hóa thành công và có ID được thêm vào
        if ($result && $lastInsertedID) {
            // Thêm số lượng tồn vào bảng cthanghoa
            $query_ct = "INSERT INTO cthanghoa (idhanghoa, soluongton, hinh) VALUES ($lastInsertedID, $soluongton, '$hinh')";
            $result_ct = $db->exec($query_ct);

            // Trả về kết quả của cả hai truy vấn
            return $result_ct;
        }

        return false;
    }


    function getHangHoaID($id)
    {
        $db = new connect();
        // Truy vấn thông tin từ bảng hanghoa
        $select = "SELECT * FROM hanghoa WHERE mahh=$id";
        $result = $db->getInstance($select);
        // Truy vấn số lượng tồn từ bảng cthanghoa
        $select_ct = "SELECT soluongton FROM cthanghoa WHERE idhanghoa=$id";
        $result_ct = $db->getInstance($select_ct);
        // Nếu có kết quả trả về từ cthanghoa thì gán giá trị cho $soluongton
        $soluongton = isset ($result_ct['soluongton']) ? $result_ct['soluongton'] : null;
        // Thêm giá trị số lượng tồn vào kết quả trả về từ bảng hanghoa
        $result['soluongton'] = $soluongton;
        return $result;
    }
    function updateHangHoa($mahh, $tenhh, $maloai, $dacbiet, $slx, $ngaylap, $mota, $soluongton)
    {
        $db = new connect();
        $query = "UPDATE hanghoa SET tenhh='$tenhh', maloai=$maloai, dacbiet=$dacbiet, soluotxem=$slx, ngaylap='$ngaylap', mota='$mota' WHERE mahh=$mahh";
        $result = $db->exec($query);

        $query_ct = "UPDATE cthanghoa SET soluongton=$soluongton WHERE idhanghoa =$mahh";

        $result_ct = $db->exec($query_ct);

        return $result && $result_ct;
    }

    function deleteHangHoa($mahh)
    {
        $db = new connect();
        // Xóa hàng hóa từ bảng cthanghoa
        $query1 = "DELETE FROM cthanghoa WHERE idhanghoa = $mahh";
        $result1 = $db->exec($query1);

        // Xóa hàng hóa từ bảng hanghoa
        $query2 = "DELETE FROM hanghoa WHERE mahh = $mahh";
        $result2 = $db->exec($query2);

        // Trả về true nếu cả hai truy vấn đều thành công
        return ($result1 && $result2);
    }
    // phương thức thống kê
    function getThongke()
    {
        $db = new connect();
        $select = "select a.tenhh,sum(b.soluongmua) as soluong from hanghoa a,cthoadon b WHERE a.mahh=b.mahh GROUP BY a.tenhh";
        $result = $db->getList($select);
        return $result;
    }
    function thongKeTheoQuy($year)
    {
        $db = new connect(); // Giả sử connect() là hàm kết nối CSDL

        // Khởi tạo mảng để lưu kết quả
        $result = array();

        // Thực hiện truy vấn để lấy thông tin từ bảng hoadon
        $query_sales = "SELECT QUARTER(ngaydat) AS quarter, SUM(tongtien) AS total_sales
                    FROM hoadon
                    WHERE YEAR(ngaydat) = $year
                    GROUP BY QUARTER(ngaydat)";
        $result_sales = $db->getList($query_sales); // Giả sử getList() là hàm thực hiện truy vấn và trả về kết quả

        // Thực hiện truy vấn để lấy thông tin từ bảng cthoadon
        $query_quantity = "SELECT QUARTER(hoadon.ngaydat) AS quarter, SUM(cthoadon.soluongmua) AS total_quantity
                       FROM cthoadon
                       INNER JOIN hoadon ON cthoadon.masohd = hoadon.masohd
                       WHERE YEAR(hoadon.ngaydat) = $year
                       GROUP BY QUARTER(hoadon.ngaydat)";
        $result_quantity = $db->getList($query_quantity);

        // Gộp kết quả của doanh thu và số lượng sản phẩm đã bán theo quý
        foreach ($result_sales as $sale) {
            $quarter = $sale['quarter'];
            $result[$quarter]['doanh_thu'] = $sale['total_sales'];
        }

        foreach ($result_quantity as $quantity) {
            $quarter = $quantity['quarter'];
            $result[$quarter]['so_luong_san_pham'] = $quantity['total_quantity'];
        }

        return $result;
    }

    function thongKeTheoNam($year)
    {
        $db = new connect(); // Giả sử connect() là hàm kết nối CSDL

        // Khởi tạo mảng để lưu kết quả
        $result = array();

        // Thực hiện truy vấn để lấy thông tin từ bảng hoadon
        $query_sales = "SELECT MONTH(ngaydat) AS month, SUM(tongtien) AS total_sales
                    FROM hoadon
                    WHERE YEAR(ngaydat) = $year
                    GROUP BY MONTH(ngaydat)";
        $result_sales = $db->getList($query_sales); // Giả sử getList() là hàm thực hiện truy vấn và trả về kết quả

        // Thực hiện truy vấn để lấy thông tin từ bảng cthoadon
        $query_quantity = "SELECT MONTH(hoadon.ngaydat) AS month, SUM(cthoadon.soluongmua) AS total_quantity
                       FROM cthoadon
                       INNER JOIN hoadon ON cthoadon.masohd = hoadon.masohd
                       WHERE YEAR(hoadon.ngaydat) = $year
                       GROUP BY MONTH(hoadon.ngaydat)";
        $result_quantity = $db->getList($query_quantity);

        // Gộp kết quả của doanh thu và số lượng sản phẩm đã bán theo tháng
        foreach ($result_sales as $sale) {
            $month = $sale['month'];
            $result[$month]['doanh_thu'] = $sale['total_sales'];
        }

        foreach ($result_quantity as $quantity) {
            $month = $quantity['month'];
            $result[$month]['so_luong_san_pham'] = $quantity['total_quantity'];
        }

        return $result;
    }

    function getMau(){
        $db = new connect();
        $select = "SELECT * FROM mausac";
        $result = $db->getList($select);
        return $result;
    }
    function getSize(){
        $db = new connect();
        $select = "SELECT * FROM size";
        $result = $db->getList($select);
        return $result;
    }




}
?>