<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* CSS để căn giữa và làm chữ chạy ngang */
        .text-center {
            text-align: center; /* Căn giữa nội dung */
        }

        .marquee {
            overflow: hidden; /* Ẩn nội dung vượt ra khỏi khung */
            white-space: nowrap; /* Không để nội dung xuống dòng */
            animation: marquee 5s linear infinite; /* Chạy ngang qua trong 5s và lặp vô hạn */
        }

        @keyframes marquee {
            0% { transform: translateX(100%); } /* Bắt đầu từ bên phải */
            100% { transform: translateX(-100%); } /* Di chuyển về bên trái */
        }
         /* CSS Flexbox */
         .about {
            display: flex;
        }

        .about > div {
            flex: 1;
            padding: 20px;
            border: 1px solid #ccc;
            margin: 10px;
        }

        .left {
            flex-basis: 200px; /* Độ rộng cố định của phần bên trái */
        }

        .right {
            flex: 1; /* Phần thông tin bên phải sẽ chiếm phần còn lại của không gian */
        }
        .services .box i {
    font-size: 50px; /* Đặt kích thước biểu tượng */
    margin-bottom: 20px; /* Tạo khoảng cách dưới biểu tượng */
    display: block; /* Đảm bảo biểu tượng sẽ hiển thị trên một dòng riêng */
    margin: 0 auto; /* Căn giữa biểu tượng */
    text-align: center;
}

    </style>
</head>
<body>
    <section> 
        <div class="mt-5  text-center">
            <h1 class=" "><b>PANACOTTA</b></h1>
        </div>
        <div class="about">
        <!-- Hình ảnh bên trái -->
        <div class="left">
            <h3 class="">Người sáng lập</h3>
            <img src="Content/IMG1/12.jpg" width="200px" alt="">
        </div>
        <!-- Thông tin bên phải -->
        <div class="right">
            <div>
                <h1 class="text-center">PANACOTTA là gì ?</h1>
            </div>
            <div>
                <h2>Mục đích của PANACOTTA?</h2>
                <p>PANACOTTA được tạo ra nhằm mục đích mua và bán giữa người dùng và người dùng, một trong sàn thương mại điện tử cung cấp mặt hàng thực phẩm Xanh.</p>
            </div>
            <div>
                <h2>Sự sáng lập</h2>
                <p>PANACOTTA được sáng lập thông qua một cậu sinh viên năm hai trường Công nghệ thông tin TP Hồ Chí Minh.</p>
            </div>
        </div>
    </div>
        </div>
    </section>
    <section class="services">

    <div class="content">
        <h2 class="heading-1">Những gì PANACOTTA Cung Cấp</h2>
        <p class="para">Sự trải nghiệm hài lòng của bạn là tiêu chí hàng đầu của chúng tôi.</p>
    </div>

    <div class="box-container">

        <div class="box">
            <i class="fad fa-shopping-bag"></i>
            <div class="content-1">
                <h2>Giá & ưu đãi tốt nhất</h2>
                <p>Chúng tôi tự hào mang đến cho bạn những ưu đãi đặc biệt chỉ dành riêng cho khách hàng trung thành như bạn.</p>
            </div>
        </div>

        <div class="box">
            <i class="far fa-globe-asia"></i>
            <div class="content-1">
                <h2>Hỗ trợ 24/7</h2>
                <p>Những gì bạn thắc mắc, hãy gửi lời nhắn đến chúng tôi.</p>
            </div>
        </div>

        <div class="box">
            <i class="far fa-undo"></i>
            <div class="content-1">
                <h2>Dễ dàng hoàn hàng</h2>
                <p>Hỗ trợ hàng hàng trong vòng 15 ngày.</p>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-truck-moving"></i>
            <div class="content-1">
                <h2>Hỗ trợ vận chuyển</h2>
                <p>Miễn phí vận chuyển trong nước và $2 ngoài nước.</p>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-shopping-basket"></i>
            <div class="content-1">
                <h2>Hương vị mọi nơi</h2>
                <p>Cung cấp những mặt hàng ngoại quốc và trong nước.</p>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-tag"></i>
            <div class="content-1">
                <h2>Voucher mỗi ngày</h2>
                <p>Voucher thả ga không lo giá tiền.</p>
            </div>
        </div>

    </div>

</section>
</body>
</html>
