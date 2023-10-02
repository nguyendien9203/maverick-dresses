
<?php
require_once __DIR__.'/../config/config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">  
    <script src="https://kit.fontawesome.com/yourcode.js"></script>
    <title>Document</title>

</head>
<body>
    <header>
        <div class="logo">
            <a href="index.php"><span>Marverick</span> Dresses</a>
            
        </div>
        <div class="menu">
            <li><a href="index.php">Trang chủ</a></li>
            <li><a href="products.php">Sản Phẩm</a> 
                <ul class="Sub-menu">
                    <li><a href="">Áo</a>
                        <ul>
                            <li><a href="">Tất cả áo</a></li>
                            <li><a href="">Áo sơ mi</a></li>
                            <li><a href="">Áo thun</a></li>
                        </ul>
                    </li>
                    <li><a href="">Váy</a></li>
                    <li><a href="">Logo</a></li>
                    <li><a href="">Chân váy</a></li>
                    <li><a href="">Quần</a>  
                        <ul>
                            <li><a href="">Tất cả quần</a></li>
                            <li><a href="">Quần short</a></li>
                            <li><a href="">Quần thể thao</a></li>
                        </ul>
                    </li>
                    <li><a href="">Phụ Kiện</a>
                        <ul>
                            <li><a href="">Tất cả phụ kiện</a></li>
                            <li><a href="">Thắt lưng</a></li>
                            <li><a href="">Cà vạt</a></li>
                            <li><a href="">Tất</a></li>
                        </ul>
                    </li>
                </ul>                  
            </li>
            <li><a href="about.php">Về Chúng Tôi</a></li>
            <li><a href="#contact-box">Liên Hệ</a></li>
        </div>
        <div class="user-controls">
            <div class="user-logo">
                <a href=""><i class="fa-solid fa-user"></i></a>
            </div>
            <div class="cart-logo">
                <a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a>
            </div>
            <div class="logout-logo">
                <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
            </div>
        </div>
    </header>