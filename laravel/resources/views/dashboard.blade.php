<!DOCTYPE html>
<html>

<head>
    <title>Shop bán hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="cart.css" />


</head>
<style>
    .header {

        /* background: linear-gradient(to left, #12FFA0, #59DAB8, #F1F2B6); */
        /* background-color: #08ed11; */
        background-color: #B8D1E9;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        margin-bottom: 20px;


    }

    .header-nav {
        display: flex;
        align-items: center;
        gap: 20px;

    }

    .nav-right {
        display: flex;
        justify-content: right;
        align-items: center;
    }



    .nav-item {
        text-decoration: none;
        color: #333;
        padding: 10px;
        border-radius: 10px;
        font-size: large;
        transition: background-color 0.3s ease;
    }

    .nav-item:hover {
        background-color: #69D5F3;
        color: #AEFCAD;
    }

    .search-form {
        display: flex;
        align-items: right;
        margin-inline: 70px;
    }

    .search-input {
        border-radius: 15px;
        border: 1px solid #69D5F3;
        color: #333;
        padding: 10px;
    }

    .search-button {
        border-radius: 0px 15px 15px 0px;
        margin-left: -25px;
        border: 1px solid #69D5F3;
        background-color: #69D5F3;
        color: #333;
        padding: 10px 15px;
    }

    .avatar {
        width: 70px;
        height: 70px;
        margin-inline: 5px;
        border: 3px solid black;
        border-radius: 50%;
    }

    @keyframes fade {
        from {
            opacity: 0.4;
        }

        to {
            opacity: 1;
        }
    }

    .nav-item:hover {
        color: black;
        border: 1px solid #000;
    }

    .logo {
        width: 100px;
        height: 100px;
    }

    .footer {
        background-color: #A8C4DB;
        
    }

    .footer h5 {
        color: #333;
    }

    .footer ul {
        list-style: none;
        padding-left: 0;
    }

    .footer ul li {
        margin-bottom: 10px;
    }

    .footer-bottom {
        background-color: #343a40;
        color: #fff;
        padding: 15px 0;
    }

    .footer-bottom p {
        margin-bottom: 0;
    }
</style>

<body>
    <header class="header">
        <nav class="header-nav">
            <img src="images/logo.png" alt="Logo" class="logo" />
            <a href="{{ route('user.list') }}" class="nav-item">
                <h3>Trang chủ </h3>
            </a>
            <div id="cart" class="nav-item">
                <h3> Giỏ Hàng </h3>
            </div>
            <a href="{{ route('ViewRevenueStatistics') }}" class="nav-item">
                <h3>Thống kê</h3>
            </a>
        </nav>
        <div class="nav-right">
            <form class="search-form">
                <input type="text" class="search-input" placeholder="Tìm kiếm" aria-label="Tìm kiếm" />
                <button type="submit" class="search-button">Tìm kiếm</button>
            </form>

            <a href="{{ route('signout') }}">
                <button style=" border: none; background-color: #60ACF4; border-radius:5px; font-size: 18px; padding: 10px;">
                    Đăng xuất
                </button>
            </a>
            <a href="{{ route('user.readUser', ['id' => $user->id]) }}">
                <img src="{{ asset('avatar/' . $user->avatar) }}" alt="" class="avatar" />
            </a>
        </div>
    </header>

    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Giỏ Hàng</h1>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="cart-items">
                    <form action="{{ route('addDetailOrder') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach($shopingCart as $item)
                        <div class="cart-row">
                            <div class="cart-item cart-column">
                                <img class="cart-item-image" src="{{ asset('images/' . $item->product->image1) }}" width="80px" height="80px">
                                <div class="product-row">
                                    <div class="cart-item-title">{{ $item->product->name }}</div><br>
                                    <select name="products[{{ $loop->index }}][size]" style="width: 35px; font-size: 15px;">
                                        <option value="S" {{ $item->size == 'S' ? 'selected' : '' }}>S</option>
                                        <option value="M" {{ $item->size == 'M' ? 'selected' : '' }}>M</option>
                                        <option value="L" {{ $item->size == 'L' ? 'selected' : '' }}>L</option>
                                        <option value="XL" {{ $item->size == 'XL' ? 'selected' : '' }}>XL</option>
                                    </select>
                                    <div class="cart-quantity cart-column">
                                        <input class="cart-quantity-input" name="products[{{ $loop->index }}][quantity]" type="number" min="1" value="{{ $item->quantity }}" data-price="{{ $item->price }}">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="products[{{ $loop->index }}][product_id]" value="{{ $item->product->id }}">
                            <input type="hidden" name="products[{{ $loop->index }}][price]" value="{{ $item->price }}">
                            <div class="cart-action cart-column">
                                <a href="{{ route('cart.remove',['id'=>$item->id]) }}"><button style="background-color: red; padding: 5px 10px; border-radius: 10px; color: white;">Xóa</button></a>
                            </div>
                        </div>
                        @endforeach
                        @php
                        $totalPrice = 0;
                        foreach($shopingCart as $item) {
                        $totalPrice += $item->price * $item->quantity;
                        }
                        @endphp
                        <input type="text" name="address" placeholder="Địa chỉ giao hàng">
                        <input type="text" name="phone_number" placeholder="Số điện thoại">
                        <div class="modal-footer">
                            <div class="cart-total">
                                <strong class="cart-total-title">Tổng Cộng:</strong>
                                <span class="cart-total-price">{{ $totalPrice }} VNĐ</span>
                            </div>
                            <div class="cart-button">
                                <input type="submit" class="btn btn-secondary close-footer" value="Thanh toán">
                            </div>
                        </div>
                    </form>

                    <script>
                        // Lắng nghe sự kiện khi số lượng sản phẩm thay đổi
                        const quantityInputs = document.querySelectorAll('.cart-quantity-input');
                        quantityInputs.forEach(input => {
                            input.addEventListener('change', updateTotalPrice);
                        });

                        // Hàm cập nhật tổng giá trị
                        function updateTotalPrice() {
                            let totalPrice = 0;
                            quantityInputs.forEach(input => {
                                const price = parseFloat(input.dataset.price);
                                const quantity = parseInt(input.value);
                                totalPrice += price * quantity;
                            });

                            // Hiển thị tổng giá trị mới
                            const cartTotalPriceElement = document.querySelector('.cart-total-price');
                            cartTotalPriceElement.textContent = `${totalPrice} VNĐ`;
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
    </div>





    <script src="cart.js"></script>
    @yield('content')
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Liên kết</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm</a></li>
                        <li><a href="#">Về chúng tôi</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Thông tin liên hệ</h5>
                    <p>123 Đường ABC, Quận XYZ, TP HCM</p>
                    <p>Email: contact@example.com</p>
                    <p>Điện thoại: 0123 456 789</p>
                </div>
                <div class="col-md-4">
                    <h5>Theo dõi chúng tôi</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p>&copy; 2024 Tên Công Ty. Tất cả các quyền được bảo lưu.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>