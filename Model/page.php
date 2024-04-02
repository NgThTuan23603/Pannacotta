<?php
 class page{
    //tính ra số trang 
    function findPage($count,$limit)//14,8
    {
        $page=(($count%$limit)==0?$count/$limit:ceil($count/$limit));
        return $page;//2

    }
    //viết pt tính start,current_page là trang hiện tại
    //trang hiện tại đặt tên biến là page
    function findStart($limit){
        if(!isset($_GET['page'])||$_GET['page']==1)
        {
            $start=0;
        }else
        {
            $start=($_GET['page']-1)*$limit;
        }
        return $start;
    }
 }
?>