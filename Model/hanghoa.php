<?php
class hanghoa
{
    //Thuộc tính
    // Hàm tạo
    // Phương thức lấy về 8 sản phẩm mới nhất
    function getHangHoaNew()
    {
        // b1: Kết nối được với dữ liệu
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT a.mahh,a.tenhh,b.hinh,a.soluotxem,b.dongia,c.mausac FROM hanghoa a,cthanghoa b, mausac c where a.mahh=b.idhanghoa and c.Idmau=b.idmau ORDER by a.mahh DESC limit 8";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }
 
    function getHangHoaSale() {
        // b1: Kết nối được với dữ liệu
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT a.mahh,a.tenhh,b.hinh,a.soluotxem,b.giamgia,b.dongia,c.mausac FROM hanghoa a,cthanghoa b, mausac c where a.mahh=b.idhanghoa and c.Idmau=b.idmau and b.giamgia != 0 ORDER by a.mahh DESC limit 4";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }
 
    function getHangHoaAll() {
        // b1: Kết nối được với dữ liệu
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT a.mahh,a.tenhh,b.hinh,a.soluotxem,b.dongia,c.mausac FROM hanghoa a,cthanghoa b, mausac c where a.mahh=b.idhanghoa and c.Idmau=b.idmau and b.giamgia = 0 ORDER by a.mahh DESC";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }
 
    function getHangHoaAllSale() {
        // b1: Kết nối được với dữ liệu
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "SELECT a.mahh,a.tenhh,b.hinh,a.soluotxem,b.dongia,b.giamgia,c.mausac FROM hanghoa a,cthanghoa b, mausac c where a.mahh=b.idhanghoa and c.Idmau=b.idmau and b.giamgia != 0 ORDER by a.mahh DESC";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php
        $result = $db->getList($select);
        return $result; // Lấy được dữ liệu
    }
    function getHangHoaAllPage($start, $limit)
    {
        // b1 kết nối được với dữ liệu
        $db = new connect();
 
        // b2 cần lấy cái gì thì truy vấn cái đó
        $select = "SELECT a.mahh, a.tenhh, a.soluotxem, b.hinh, b.dongia, c.mausac
           FROM hanghoa a, cthanghoa b, mausac c
           WHERE a.mahh = b.idhanghoa AND b.idmau = c.idmau AND b.giamgia = 0
           ORDER by a.mahh DESC LIMIT " . $start . "," . $limit;
 
        //b3 ai thực thi câu lệnh select?query nằm trong class connect  trong phương thức getlist      
        $result = $db->getList($select);
        return $result;
        // đã lấy được dữ liệu là 8 sản phẩm mới nhất
    }
    function getHangHoaImage($id){
        $db = new connect();
        $select = "SELECT DISTINCT a.hinh from cthanghoa a WHERE a.idhanghoa=$id";
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaId($id)
    {
        // b1: Kết nối được với dữ liệu 
        $db = new connect();
        // b2: viết câu truy vấn
        $select = "select DISTINCT a.mahh, a.tenhh, a.mota, b.dongia from hanghoa a, cthanghoa b WHERE a.mahh = b.idhanghoa and a.mahh=$id;";
        // b3: ai thực thi câu truy vấn này? getList trong class connect của file connect.php 
        $result = $db->getInstance($select); // vì trả về đúng 1 row
        return $result; // thông 1 sp dạng array(mahh: 24, tenhh:...)
    }
    function getHangHoaMau($id){
        $db = new connect();
        $select = "SELECT DISTINCT a.idmau, b.mausac from cthanghoa a,mausac b WHERE a.idmau=b.idmau and a.idhanghoa = $id";
        $result = $db->getList($select);
        return $result;
    }
   
    function getHangHoaMauHinh($mahh,$mau,$size){
        $db = new connect();
        $select= "SELECT a.hinh from cthanghoa a  , sizegiay c
                  WHERE a.idmau=b.idmau and a.idsize=c.idsize and a.idhanghoa=$mahh and  b.idmau=$mau  ";
        echo $select;
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaIdMauGH($idmau)
    {
        $db = new connect();
        $select = "select mausac from mausac where idmau=$idmau";
        $result = $db->getList($select);
         return $result;
    }
    function timkiemSP($tenhh){
        $db = new connect();
        $select ="SELECT a.mahh,a.tenhh,b.hinh,a.soluotxem,b.dongia,b.giamgia FROM hanghoa a, cthanghoa b  WHERE a.mahh=b.idhanghoa AND a.tenhh LIKE '%$tenhh%'"; // Sử dụng thực sự giá trị của $tenhh
        $result = $db->getList($select);
        return $result;
    }
    
}
?>