<?php
class loai{
    function getLoai()
    {
        $db=new connect();
        $select="select maloai,tenloai from loai";
        $result=$db->getList($select);
        return $result;
    }
}
?>