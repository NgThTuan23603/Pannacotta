<?php
class Connect {
    public $db = null;

    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=panacotta2';
        $user = 'root';
        $pass = '';

        try {
            $this->db = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            // Thiết lập PDO để ném ra ngoại lệ khi có lỗi SQL
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo  "";
        } catch (PDOException $e) {
            echo "Kết nối thất bại: " . $e->getMessage();
        }
    }

    function getList($select) {
        $result = $this->db->query($select);
        return $result;
    }

    function getInstance($select) {
        $result = $this->db->query($select);
        $result = $result->fetch();
        return $result;
    }

    function getAll($select) {
        $result = $this->db->query($select);
        $result = $result->fetchAll();
        return $result;
    }

    function exec($query) {
        $result = $this->db->exec($query);
        return $result;
    }

    function execp($query) {
        $statement = $this->db->prepare($query);
        return $statement;
    }
    function getLastInsertedID() {
        // Kiểm tra xem kết nối đã được thiết lập chưa
        if ($this->db) {
            // Sử dụng phương thức lastInsertId() của đối tượng PDO để lấy ID của bản ghi vừa được thêm vào
            return $this->db->lastInsertId();
        } else {
            // Nếu kết nối chưa được thiết lập, trả về giá trị null
            return null;
        }
    }
}
?>
