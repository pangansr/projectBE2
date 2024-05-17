<!DOCTYPE html>
<html>

<head>
    <title>Shop bán hàng</title>
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
  <link rel="icon" href="assets/img/logo-icon.png">
  <!-- CSS only -->
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
   <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
   <!-- fancybox -->
   <link rel="stylesheet" href="assets/css/jquery.fancybox.min.css">

   <link rel="stylesheet" href="assets/css/style.css">
   <!-- responsive -->
   <link rel="stylesheet" href="assets/css/responsive.css">
   <!-- color -->
   <link rel="stylesheet" href="assets/css/color.css">
   <link rel="stylesheet" href="cart.css" />
</head>
<style>
    
    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        padding-top: 20px;
        margin-bottom: 20px;
        position: fixed;
        width: 100%;
        top: 0;
        background-color: white;
        z-index: 1000;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .header-nav {
        display: flex;
        align-items: center;
        gap: 20px;
        height: 100px;
    }

    .nav-right {
        display: flex;
        justify-content: right;
        align-items: center;
    }

    .nav-item {
        text-decoration: none;
        color: #333;
        padding: 25px;
        border-radius: 10px;
        font-size: large;
        transition: background-color 0.3s ease;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        z-index: 1;
    }

    .nav-item:hover {
        background-color: #F3274C;
        color: white;
        text-decoration: none;
        transform: translateY(-5px);
        box-shadow: 0px 15px 15px rgba(0, 0, 0, 0.2);
    }

    .search-form {
        display: flex;
        align-items: right;
        margin-inline: 70px;
        margin-bottom: -10px;
    }

    .search-input {
        border-radius: 20px; 
        border: 1px solid #F3274C; 
        color: black;
        padding: 12px; 
        transition: border-color 0.3s ease, box-shadow 0.3s ease; 
    }

    .search-input:focus {
        border-color: #69D5F3; 
        box-shadow: 0 0 5px rgba(105, 213, 243, 0.5); 
    }

    .search-button {
        border-radius: 0px 20px 20px 0px; 
        margin-left: -25px;
        border: 1px solid black;
        background-color: #F3274C;
        color: white;
        padding: 12px 20px; 
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .search-button:hover {
        background-color: #F3274C;
        color: white;
    }

    .avatar {
        width: 70px;
        height: 70px;
        margin-inline: 5px;
        border: 3px solid black;
        border-radius: 50%;
        margin-bottom: -10px;
    }

    @keyframes fade {
        from {
            opacity: 0.4;
        }
        to {
            opacity: 1;
        }
    }

    .logo {
        width: 140px;
        height: 130px;
    }

    .logout {
        margin-bottom: -10px;
        border: 2px solid red; 
        background-color: white;
        border-radius: 5px;
        font-size: 18px;
        padding: 10px;
        transition: border-color 0.3s ease;
    }

    .logout:hover {
        background-color: #F3274C;
        color: white;
    }

    body {
        padding-top: 180px; /* Adjust this value based on the height of your navbar */
    }

</style>

<body>
    <header class="header">
        <nav class="header-nav">
        <a href="{{ route('user.list') }}">    <img src="images/logo.png" alt="Logo" class="logo"  /></a>
            <a href="{{ route('user.list') }}" class="nav-item">
                <h3>TRANG CHỦ</h3>
            </a>
            <div id="cart" class="nav-item">
                <h3>GIỎ HÀNG </h3>
            </div>
            <a href="{{ route('ViewDetailOrder') }}" class="nav-item">
                <h3>ĐƠN HÀNG</h3>
            </a>
            <a href="{{ route('ViewRevenueStatistics') }}" class="nav-item">
                <h3>THỐNG KÊ</h3>
            </a>
            <a href="{{ route('showProduct') }}" class="nav-item">
                <h3>YÊU THÍCH</h3>
            </a>
        </nav>
        <div class="nav-right">
        <form class="search-form" action="{{route('search')}}" method="GET">
    <input type="text" name="key" class="search-input" placeholder="Tìm kiếm" aria-label="Tìm kiếm" />
   <button type="submit" class="search-button"> <i class="bi bi-search"></i></button>
  
</form>


            <a href="{{ route('user.readUser', ['id' => $user->id]) }}">
                <img src="{{ asset('avatar/' . $user->avatar) }}" alt="" class="avatar" />
            </a>
            <a href="{{ route('signout') }}">
                
                <i class="bi bi-box-arrow-right" style="font-weight: 300;"></i> Logout
            </a>
        </div>
    </header>
<hr>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Giỏ Hàng</h1>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <div class="cart-items">
                    <form action="{{ route('GetOrderDetails')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach($shopingCart as $item)
                        <div class="cart-row">
    <div class="cart-item cart-column">
        <img class="cart-item-image" src="{{ asset('images/' . $item->product->image1) }}" width="80px" height="80px">
        <div class="product-row">
            <div class="cart-item-title">{{ $item->product->name }}</div>
            <select name="products[{{ $loop->index }}][size]" class="cart-item-size" style="width: 50px; height: 30px; margin-inline:10px ; margin-bottom: 5px;">
                <option value="S" {{ $item->size == 'S' ? 'selected' : '' }}>S</option>
                <option value="M" {{ $item->size == 'M' ? 'selected' : '' }}>M</option>
                <option value="L" {{ $item->size == 'L' ? 'selected' : '' }}>L</option>
                <option value="XL" {{ $item->size == 'XL' ? 'selected' : '' }}>XL</option>
            </select>
            <div class="cart-quantity cart-column">
                <input class="cart-quantity-input" style="width: 50px; height: 30px;" name="products[{{ $loop->index }}][quantity]" type="number" min="1" value="{{ $item->quantity }}" data-price="{{ $item->price }}">
            </div>
        </div>
    </div>
    <input type="hidden" name="products[{{ $loop->index }}][product_id]" value="{{ $item->product->id }}">
    <input type="hidden" name="products[{{ $loop->index }}][price]" value="{{ $item->price }}">
    <div class="cart-action cart-column">
        <a href="{{ route('cart.remove',['id'=>$item->id]) }}" class="cart-remove">Xóa</a>
    </div>
</div>

                        @endforeach
                        @php
                        $totalPrice = 0;
                        foreach($shopingCart as $item) {
                        $totalPrice += $item->price * $item->quantity;
                        }
                        @endphp
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
                        const quantityInputs = document.querySelectorAll('.cart-quantity-input');
                        quantityInputs.forEach(input => {
                            input.addEventListener('change', updateTotalPrice);
                        });

                        function updateTotalPrice() {
                            let totalPrice = 0;
                            quantityInputs.forEach(input => {
                                const price = parseFloat(input.dataset.price);
                                const quantity = parseInt(input.value);
                                totalPrice += price * quantity;
                            });

                            const cartTotalPriceElement = document.querySelector('.cart-total-price');
                            cartTotalPriceElement.textContent = `${totalPrice} VNĐ`;
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
    <script src="cart.js"></script>
    @yield('content')
</body>

</html>