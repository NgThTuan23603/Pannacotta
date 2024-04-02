<script type="text/javascript">
    function chonsize(a) {
        document.getElementById("size").value = a;

    }
</script>
<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mb-5 font-weight-bold">CHI TIẾT SẢN PHẨM</h3>
        </div>

    </div>
    <article class="col-12">
        <!-- <div class="card"> -->
        <div class="container-fliud">
            <div class="wrapper row">
                <form action="index.php?action=giohang&act=giohang_action" method="post">
                    <!-- <input type="hidden" name="action" value="giohang&add_cart"/> -->

                    <div class="preview col-md-6">
                        <div class="tab-content">
                            <?php
                            // Truyền id để lấy thông tin của một sản phẩm
                            if (isset($_GET['id'])) {
                                $id = $_GET['id']; // id = 24
                                //Yêu cầu model lấy thông tin của sản phẩm 24
                                $hh = new hanghoa();
                                $sanpham = $hh->getHangHoaId($id); // $sanpham = array(mahh: 24, tenhh:...)
                                $tenhh = $sanpham['tenhh'];
                                $mota = $sanpham['mota'];
                                $dongia = $sanpham['dongia'];
                            }
                            ?>
                            <?php
                            $hinh = $hh->getHangHoaImage($id);
                            $set = $hinh->fetch();
                            ?>

                            <div class="tab-pane active" id=""><img src="Content\IMG1\<?php echo $set['hinh'] ?>" alt="" width="200px" height="350px">
                            </div>

                        </div>
                        <ul class="preview-thumbnail nav nav-tabs">
                            <?php
                            while ($img = $hinh->fetch()) :
                            ?>
                                <li class="active"><a href="#<?php echo $img['hinh']; ?>" data-toggle="tab">
                                        <img src="<?php echo 'Content/IMG1/'.$img['hinh'];?>" alt="Học thiết kế web bán hàng Online"></a>
                                </li>
                            <?php
                            endwhile;
                            ?>
                        </ul>
                    </div>
                    <div class="details col-md-6">
                        <input type="hidden" name="mahh" value="<?= $id;?>" />
                        <h3 class="product-title"> <?php echo $tenhh ?> </h3>
                        <div class="rating">
                            <div class="stars"> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star checked"></span> <span class="fa fa-star"></span> <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <p class="product-description">
                            <?php echo $mota ?>
                        </p>
                        <h4 class="price">Giá bán: <?php echo number_format($dongia) ?> đ</h4>

                        <h5 class="colors">Màu:
                            <select name="mymausac" class="form-control" style="width:150px;">
                                <?php
                                $mau = $hh->getHangHoaMau($id);
                                while ($set = $mau->fetch()) :
                                ?>
                                    <option value="<?php echo $set['idmau'] ?>"><?php echo $set['mausac'] ?></option>
                                <?php
                                endwhile;
                                ?>
                            </select><br>

                            </br></br>
                            Số Lượng:

                            <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="10" />


                        </h5>

                        <div class="action">

                            <button class="add-to-cart btn btn-default" type="submit" name="submit" data-toggle="modal" data-target="#myModal">MUA NGAY
                            </button>

                            <a href="http://hocwebgiare.com/" target="_blank"> <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- </div> -->
    </article>
</section>

<p class="float-left"><b>BÌnh luận </b></p>
<hr>
</div>
<form action="index.php?action=binhluan" method="post">
    <div class="row">

        <input type="hidden" name="txtmahh" value=" <?php echo $id;?>" />
        <img src="Content/imagetourdien/people.png" width="50px" height="50px" ; />
        <textarea class="input-field" type="text" name="comment" rows="2" cols="70" id="comment" placeholder="Thêm bình luận">  </textarea>
        <input type="submit" class="btn btn-primary" id="submitButton" style="float: right;" value="Bình Luận" />

    </div>

</form>
<div class="row">
    <p class="float-left"><b>Các bình luận</b></p>
    <hr>
    <?php
    $kh = new user();
    $noidung=$kh->selectComment($id);
    while ($set=$noidung->fetch()):
    ?>
    <span><?php echo $set['username'];?>:</span>
    <span <?php echo $set['content'];?>></span>
    <br>
    <?php
     endwhile;

     ?>
     <hr>
</div>
<div class="row">
    <br />
</div>

</div>
</section>