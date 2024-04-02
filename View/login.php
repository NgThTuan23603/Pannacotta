 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    /* Add your custom styles here */

.custom-button {
  padding: 12px 24px; /* Adjust the padding to make the button larger */
  transition: transform 0.3s, background-color 0.3s;
  background-color :blanchedalmond;
  border-radius: 20px;
}

.custom-button:hover {
  transform: scale(1.1); /* Zoom in effect on hover */
  background-color: #F08080; /* Change the background color on hover */
  color:black;
}

  </style>
 </head>
 <body>
  


  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h1 class="card-header text-center  ">Đăng nhập</h1>
            <form  action="index.php?action=dangnhap&act=dangnhap_action" class="login-form" method="post">
              <div class="form-group">
              <label for="exampleInputEmail1" class="text-uppercase">Username</label>
                <input type="text" class="form-control"  name="txtusername" required>
              </div>
              <div class="form-group">
              <label for="exampleInputPassword1" class="text-uppercase">Password</label>
                <input type="password" class="form-control"  name="txtpassword" required>
              </div>
              <div class="form-check">
              <div class="text-center">
  <button class="   custom-button" name="submit" type="submit">Đăng Nhập</button>
</div>
          </div>
          <div class="copy-text">PANACOTTA <i class="fa fa-star"></i> <a href="index.php?action=forget">Quên mật khẩu</a></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

 
 </body>
 </html>