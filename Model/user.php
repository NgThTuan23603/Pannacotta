<?php
class user{

    // Phướng thức kiểm tra user và email có trùng hay không
    function checkUser($user, $email) {
        $db =  new connect();
        $select = "SELECT a.username, a.email FROM khachhang a WHERE a.username = '$user' or a.email = '$email'";
        $result = $db->getList($select);
        return $result;
    }

    // Phương thức insert vào database
    function insertKH ($tenkh, $user, $matkhau, $email, $diachi, $sdt) {
        $db = new connect();
        $query = "INSERT INTO khachhang (makh, tenkh, username, matkhau, email, diachi, sodienthoai) VALUES (NULL, '$tenkh', '$user', '$matkhau', '$email', '$diachi', '$sdt')";
        $result = $db->exec($query);
        return $result;
    }

    // Phương thức login
    function loginUser($user, $pass) {
        $db =  new connect();
        $select = "SELECT a.makh, a.tenkh, a.matkhau FROM khachhang a WHERE a.username = '$user' AND a.matkhau = '$pass'";
        $result = $db->getList($select);
        return $result;
    }
    function checkEmail($email){
        $db = new connect ();
        $select="select * from khachhang a WHERE   a.email='$email'";
        $result = $db->getList($select);//trả về table 
        return $result;

    }
    function updatePassEmail($emailold,$passnew){
        $db=new connect();
        $query ="update khachhang set matkhau='$passnew' where email ='$emailold'";
        //echo query
        $db->exec($query);
    }
    function insertComment($idkh, $idhh, $content){
        $db = new connect();
        $query = "INSERT INTO comment (idcomment, idkh, idhanghoa, content, luotthich) VALUES (NULL, $idkh, $idhh, '$content', 0)";
        $db->exec($query);
    }
    
    //phương thức hiển thị nội dung comment
    function selectComment($idsp){
        $db = new connect();
        $select="SELECT a.username , b.content from khachhang a ,comment b WHERE a.makh=b.idkh and b.idhanghoa=$idsp";
        $result=$db->getList($select);
        return $result;
    }
    // function soluongton($soluongton) {
    //     $db = new connect();
    //     $select = "SELECT soluongton FROM cthanghoa";
    //     $result = $db->getList($select);
    //     return $result;
    // }
}


?>