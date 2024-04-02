<?php
$act="loai";
if(isset($_GET['act']))
{
    $act=$_GET['act'];
}
switch ($act) {
    case 'loai':
        include_once "./View/addloaisanpham.php";
        break;
    
    case 'import_loai':
        if(isset($_POST['submit_file']))
        {
            // b1: lấy về
            $file=$_FILES['file']['tmp_name'];
            //b2: thay thế các ký tự đặc biệt xEF,XBB,xBF
            file_put_contents($file,str_replace("\xEF\xBB\xBF","",file_get_contents($file)));
            // b3: mở ra file
            $file_open=fopen($file,"r");
            //b4: đọc nội dung file
            while(($csv=fgetcsv($file_open,1000,","))!==false)
            {
                $db=new connect();
                $maloai=$csv[0];
                $tenloai=$csv[1];
                $menu=$csv[2];
                $query="insert into loai(maloai,tenloai,idmenu) values ($maloai,'$tenloai',$menu)";
                $db->exec($query);
            }
            echo '<script> alert("Import thành công")</script>';
        }
        include_once "./View/addloaisanpham.php";
        break;
}
?>