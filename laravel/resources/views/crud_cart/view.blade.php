@extends('dashboard')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css" />

</head>
@section('content')
<body>

    <!-- The Modal -->
    <button id="cart">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        Giỏ Hàng
    </button>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Giỏ Hàng</h4>
                <span class="close">&times;</span>
                <p class="modal-quantity">2 sản phẩm</p>

            </div>
            <div class="modal-body">
                <div class="cart-items">
                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <img class="cart-item-image"
                                src="https://bizweb.dktcdn.net/thumb/large/100/228/168/products/sualai.jpg?v=1573720306000"
                                width="100" height="100">
                            <div class="cart-item-details">
                                <div class="cart-item-title">Mũi Hàn 500</div>
                                <div class="cart-price cart-column">25000đ</div>
                                <div class="cart-quantity cart-column">
                                    <input class="cart-quantity-input" type="number" value="1">
                                </div>
                            </div>
                            <span class="close-pr">&times;</span>
                        </div>
                    </div>
                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <img class="cart-item-image"
                                src="https://bizweb.dktcdn.net/thumb/large/100/228/168/products/sualai.jpg?v=1573720306000"
                                width="100" height="100">
                            <div class="cart-item-details">
                                <div class="cart-item-title">Tên sản phẩm </div>
                                <div class="cart-color cart-column">Màu: đỏ</div>
                                <div class="cart-size cart-column">Size: freesize</div>
                                <div class="cart-price cart-column">25000đ</div>
                                <div class="cart-quantity cart-column">
                                    <input class="cart-quantity-input" type="number" value="1">
                                </div>
                            </div>
                            <span class="close-pr">&times;</span>
                        </div>
                    </div>

                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <img class="cart-item-image"
                                src="https://bizweb.dktcdn.net/thumb/large/100/228/168/products/sualai.jpg?v=1573720306000"
                                width="100" height="100">
                            <div class="cart-item-details">
                                <div class="cart-item-title">Tên sản phẩm </div>
                                <div class="cart-color cart-column">Màu: đỏ</div>
                                <div class="cart-size cart-column">Size: freesize</div>
                                <div class="cart-price cart-column">25000đ</div>
                                <div class="cart-quantity cart-column">
                                    <input class="cart-quantity-input" type="number" value="1">
                                </div>
                            </div>
                            <span class="close-pr">&times;</span>
                        </div>
                    </div>

                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <img class="cart-item-image"
                                src="https://bizweb.dktcdn.net/thumb/large/100/228/168/products/sualai.jpg?v=1573720306000"
                                width="100" height="100">
                            <div class="cart-item-details">
                                <div class="cart-item-title">Tên sản phẩm </div>
                                <div class="cart-color cart-column">Màu: đỏ</div>
                                <div class="cart-size cart-column">Size: freesize</div>
                                <div class="cart-price cart-column">25000đ</div>
                                <div class="cart-quantity cart-column">
                                    <input class="cart-quantity-input" type="number" value="1">
                                </div>
                            </div>
                            <span class="close-pr">&times;</span>
                        </div>
                    </div>

                    <div class="cart-row">
                        <div class="cart-item cart-column">
                            <img class="cart-item-image"
                                src="https://bizweb.dktcdn.net/thumb/large/100/228/168/products/sualai.jpg?v=1573720306000"
                                width="100" height="100">
                            <div class="cart-item-details">
                                <div class="cart-item-title">Tên sản phẩm </div>
                                <div class="cart-color cart-column">Màu: đỏ</div>
                                <div class="cart-size cart-column">Size: freesize</div>
                                <div class="cart-price cart-column">25000đ</div>
                                <div class="cart-quantity cart-column">
                                    <input class="cart-quantity-input" type="number" value="1">
                                </div>
                            </div>
                            <span class="close-pr">&times;</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="cart-total">
                    <strong class="cart-total-title">Tổng Cộng:</strong>
                    <span class="cart-total-price">3223000VNĐ</span>
                </div>
                <div class="cart-button" >
                    <button type="button" class="btn btn-secondary close-footer">Mua Thêm</button>
                    <button type="button" class="btn btn-primary order" >Thanh Toán</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="cart.js"></script>
@endsection
