<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/png" href="./Content/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="./Content/assets/css/styles.min.css" />
 
    <style>
   /* Đặt font-weight cho văn bản trong thẻ h1 là đậm */
   .brand-logo h1 {
    font-weight: bold;
  }

  /* Đổ bóng và tạo hiệu ứng phồng chữ cho văn bản */
  .brand-logo h1 {
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Đổ bóng với màu đen và mờ độ là 0.5 */
    transform: scale(1.05); /* Tăng kích thước của chữ lên 5% */
  }
 
    </style>
</head>
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js">
        
    </script>
 

 <script>
    document.addEventListener('DOMContentLoaded', function () {
    var dropdownMenuLink = document.getElementById('dropdownMenuLink');
    var dropdownMenu = document.getElementById('dropdownMenu');

    dropdownMenuLink.addEventListener('click', function (event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định khi click vào liên kết

        dropdownMenu.classList.toggle('show'); // Thêm hoặc xóa lớp 'show' cho danh sách dropdown
    });
});

 </script>
<body>
    
 
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.php?action=dashboard" class="text-nowrap logo-img">
            <h1> PANACOTTA</h1>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?action=dashboard" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu"   >Trang Chủ</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Quản trị doanh mục</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?action=hanghoa" aria-expanded="false">
                <span>
                  <i class="ti ti-alert-circle"></i>
                </span>
                <span class="hide-menu">Sản phẩm</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Thống kê</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?action=thongke" aria-expanded="false">
                <span>
                  <i class="ti ti-user-plus"></i>
                </span>
                <span class="hide-menu">Thống kê</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?action=thongkequy" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">Thống kê quý</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="index.php?action=thongkenam" aria-expanded="false">
                <span>
                  <i class="ti ti-mood-happy"></i>
                </span>
                <span class="hide-menu">Thống kê năm</span>
              </a>
            </li>
           
            
          </ul>
      
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
</div>



 
 
 
</body>
</html>