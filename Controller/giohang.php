<?php
 
function checkCart()
{
    if(isset($_SESSION['cart']) && $_SESSION['cart'] > 0) {
        $id = $_GET['mahh'];
        foreach($_SESSION['cart'] as $i) {
            extract($i);
            if($mahh == $id) {
                return false;
            }
        }
        return true;
    } else {
        return true;
    }
}

if(isset($_GET['mahh']) && isset($_GET['soluong']) && $_GET['soluong'] > 0) {
    if(checkCart()) {
        $_SESSION['cart'][] = array(
            'mahh' => $_GET['mahh'],
            'soluong' => $_GET['soluong'],
            'tenhh' => $_GET['tenhh'],
            'dongia' => $_GET['dongia'],
            'hinh' => $_GET ['hinh']
        );
    } else {
        $id = $_GET['mahh'];
        for($i = 0; $i < count($_SESSION['cart']); $i++) {
            if($_SESSION['cart'][$i]['mahh'] == $id) {
                $_SESSION['cart'][$i]['soluong'] = $_SESSION['cart'][$i]['soluong'] + $_GET['soluong'];
            }
        }        
    }
    header('location: ?action=giohang&page=cart');
}
if(isset($_GET['page'])) {
    if(isset($_SESSION['cart'])) {
        include 'View/cart.php';
       
    } else {
        echo '
            <script>
                alert("Khong co san pham trong gio hang!");
                window.location.href = "?";
            </script>
        ';
    }
}

if(isset($_GET['method']) && $_GET['method'] == 'updateQtyCart') {
    // die($_POST['idHh']);
    if(isset($_SESSION['cart'])) {
        for($i = 0; $i < count($_SESSION['cart']); $i++) {
            if($_SESSION['cart'][$i]['mahh'] == $_POST['idHh']) {
                $_SESSION['cart'][$i]['soluong'] = $_POST['qty'];
            }
        }     
    } else {
        echo '
        
            <script>
                alert("Khong co san pham trong gio hang!");
                window.location.href = "?";
            </script>
        ';
    }
    header('location: ?action=giohang&page=cart');
} else if(isset($_GET['method']) && $_GET['method'] == 'delete_giohang') {
    unset($_SESSION['cart'][$_GET['id']]);
    header('location: ?action=giohang&page=cart');
}