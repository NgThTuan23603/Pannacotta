<?php
    class hanghoa{
        // thuộc tính
        // phương thức lấy 8 sản phẩm mới nhất
        function getHangHoaNew()
        {
            // b1: kết nối được với database
            $db=new connect();
            //b2: cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac 
            from hanghoa a,cthanghoa b, mausac c 
            WHERE a.mahh=b.idhanghoa AND b.idmau=c.Idmau ORDER by a.mahh DESC limit 8";
            // b3: ai thực thi câu lệnh select? query nằm trong getList, mà getList thuọc về lớp connect
            $result=$db->getList($select);
            return $result;// đã lấy được dư liệu là 8 sản phẩm mới nhất
        }
        function getHangHoaSale()
        {
            // b1: kết nối được với database
            $db=new connect();
            //b2: cần lấy cái gì thì truy vấn cái đó tức là viết lệnh select
            $select="select a.mahh,a.tenhh,a.soluotxem,b.hinh,b.dongia,c.mausac, b.giamgia from hanghoa a,cthanghoa b, mausac c WHERE a.mahh=b.idhanghoa AND b.idmau=c.Idmau and giamgia!=0 ORDER by a.mahh DESC limit 4;";
            // b3: ai thực thi câu lệnh select? query nằm trong getList, mà getList thuọc về lớp connect
            $result=$db->getList($select);
            return $result;// đã lấy được dư liệu là 8 sản phẩm mới nhất

        }
    }
?>