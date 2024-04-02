<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
   .left {
    float: left;
    width: 50%;
}

.right {
    float: right;
    width: 50%;
}
.contact form {
    display: flex;
    flex-direction: column;
}

.contact .inputBox {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px; /* Để tạo khoảng cách giữa các cặp input */
}

.contact .inputBox input,
.contact .inputBox textarea {
    width: 250px;
    padding: 10px;
    margin-right: 10px; /* Để tạo khoảng cách giữa các input */
}

.contact .inputBox input[type="submit"] {
    width: auto; /* Đặt lại width cho button submit */
}
.link a i {
    font-size: 30px; /* Đặt kích thước biểu tượng */
    margin: 0 10px; /* Tạo khoảng cách giữa các biểu tượng */
}
    </style>
</head>
<body>
    

<section class="about contact">
    <h2 class="heading-1">Liên hệ</h2>

    <div class="box-container">

        <div class="left">

            <h1 class="text-center">Liên hệ chúng tôi!</h1>

            <div class="box">
                <div class="Box">
                    <a href="https://www.google.com/maps/place/34+%C4%90.%C4%90%E1%BB%97+Nhu%E1%BA%ADn,+S%C6%A1n+K%E1%BB%B3,+T%C3%A2n+Ph%C3%BA,+Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.8044413,106.6230375,17z/data=!3m1!4b1!4m6!3m5!1s0x31752be32c3a2753:0xce7e3f5bcd806b76!8m2!3d10.804436!4d106.6256124!16s%2Fg%2F11v5sg2bql?entry=ttu" target="_blank"><i class="fas fa-home"></i>Địa chỉ :</a>
                    <p>34 Đ.Đỗ Nhuận  , Phường Hòa Thạnh, Quận Tân Phú, Thành phố Hồ Chí Minh</p>
                </div>
                <div class="Box">
                    <a href="tel:1999999999"><i class="far fa-phone-office"></i>Hotline bàn :</a>
                    <p>19999 999 99, 19999 000 00</p>
                </div>

                <div class="Box">
                    <a href="tel:0345123856"><i class="fas fa-phone-alt"></i>Hotline cá nhân :</a>
                    <p>+84 345 123 856</p>
                </div>

                <div class="Box">
                    <a href="hotrophongfood@gmail.com"><i class="fas fa-envelope"></i>Email :</a>
                    <p>hotrophongfood@gmail.com</p>
                </div>

                <div class="Box">
                    <a href="#"><i class="fas fa-link"></i>website :</a>
                    <p>www.phongfood.com</p>
                </div>

                <div class=" text-center link "  >
                    <p>Theo dõi chúng tôi qua: </p>
                    <a href="https://www.facebook.com/profile.php?id=100023322742768"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100023322742768"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100023322742768"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=100023322742768"><i class="fab fa-google"></i></a>
                </div>

            </div>

        </div>

        <div class="right">
            <div class="box">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.08998417027!2d106.620757276549!3d10.804419931231878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bb4fd3be105%3A0x630eb6b087b976cd!2sGreen%20Market!5e0!3m2!1svi!2s!4v1698865783488!5m2!1svi!2s" width="700px" height="400px"></iframe>
            </div>
        </div>

    </div>

</section>

<section class="contact" id="contact">

    <h1 class="heading text-center">Để lại lời nhắn</h1>

    <form action=" ">
    <div class="inputBox">
            <input class="form-control" type="text" name="nameUser" placeholder="Tên của bạn">
            <input class="form-control" type="email" name="mailUser" placeholder="email">
        </div>
        <div class="inputBox">
            <input class="form-control" type="number" name="phoneUser" placeholder="Số điện thoại">
            <input class="form-control" type="text" name="titleUser" placeholder="Tiêu đề">
        </div>
        <textarea class=" " placeholder="Lời nhắn..." name="contentUser" id="" cols="30" rows="10"></textarea>
        <input class="form-control btn btn-primary" type="submit" name="feedback" value="Gửi thông điệp"  >
    </form>

</section>
</body>
</html>