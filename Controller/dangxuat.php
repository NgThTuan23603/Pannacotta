<?php
if(isset($_SESSION['tenkh'])){

    unset($_SESSION['tenkh']);

    header('Location: index.php?action=dangnhap');
 exit;
}
?>