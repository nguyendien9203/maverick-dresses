<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/main.css">
</head>

<body>
    <div class="cart-section">
        <div class="cart__heading">GIỎ HÀNG</div>
        <div class="cart__wrap">
            <div class="product">
            <div class="cart__box">
                <div class="cart__product">
                    <img src="/download (1).jfif" alt="item-1" class="cart__product-picture">
                    <div class="cart__product-infobox">
                        <div class="cart__product-title">Tên sản phẩm</div>
                        <div class="cart__product-info">Mã sản phẩm: 123</div>
                        <div class="cart__product-info">Màu sắc: Blue</div>
                        <div class="cart__product-info">Kích cỡ: M</div>
                        <form action="/action_page.php">
                            <label class="cart__product-amount" for="cart__product-amount">số lượng:</label>
                            <select name="cart__product-amount" id="cart__product-amount">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </form>
                        <div class="cart__product-subtitle">Tổng: <div class="cart__returnPrice">100000 VNĐ</div></div>
                    </div>
                </div>
            </div>
        </div>
            <div class="bill">
                <div class="bill__outerbox">
                    <div class="bill__heading">TỔNG ĐƠN HÀNG</div>
                    <div class="bill__productnumber">2 SẢN PHẨM</div>
                    <div class="bill__box">
                        <div class="bill__infobox-1">
                            <div class="bill__info-1">Tổng cộng</div>
                            <div class="bill__info-1">200000 VNĐ</div>
                        </div>
                        <div class="bill__infobox-2">
                            <div class="bill__info-2">Tổng </div>
                            <div class="bill__info-2">250000 VNĐ</div>
                           
                        </div>
                        <div class="bill__subinfobox">
                            <div class="bill__info-3">Đã bao gồm thuế giá trị gia tăng</div>
                            <div class="bill__info-3">50000 VNĐ</div>
                        </div>
                        <div class="bill__infobox-3">
                            <div class="bill__info-2">Tổng đơn đặt hàng</div>
                            <div class="bill__info-2">250000 VNĐ</div>
                        </div>    
                    </div>
                </div>
                <a href="#" class="btn btn--black btn--animated">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;THANH TOÁN</a>
                <a href="#" class="btn btn--black btn--animated">&nbsp;TIẾP TỤC MUA SĂMS</a>
            </div>
        </div>
    </div>
</body>

</html>