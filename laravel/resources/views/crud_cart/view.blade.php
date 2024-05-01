<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Document</title>
    <style>
        body {
            background:#BFF1FF;
            margin: 0%;
        }
        .container {
            
            padding: 14px;
        }
        .header {
            border-radius: 30px;
            background: linear-gradient(to right, hsl(120, 98%, 26%), hsl(120, 83%, 50%), hsl(120, 76%, 77%));
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
        }
        .header-nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .nav-right{
            display: flex;
            justify-content: right;
            align-items: center;
        }
        .nav-link{
            font-family: cursive;
            margin-left: 50px;
            margin-right: 10px;
        }
        .nav-item {
            text-decoration: none;
            font-family: cursive;
            color: white;
            padding: 10px;
            border-radius: 10px;
            transition: background-color 0.3s ease;
        }
        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .search-form {
            display: flex;
            align-items:right;
        }
        .search-input {
            font-family: cursive;
            border-radius: 15px;
            border: 1px solid rgb(0, 0, 0);
            background-color: #69D5F3;
            color: black;
            padding: 10px;
        }
        .search-button {
            font-family: cursive;
            border-radius:0px 15px 15px 0px;
            margin-left: -25px;
            border: 1px solid rgb(0, 0, 0);
            background-color: #69D5F3;
            color: rgb(255, 255, 255);
            padding: 10px 15px;
        }
        .avatar{
            width: 50px;
            height: 50px;
            border: 2px solid black;
            border-radius: 50%; 
        }
        .title{
            display: flex;
            justify-content: start;
            align-items: center;
        }
        .nameTitle{
            font-family: cursive;
            margin-left: 30px;
            font-size: 40px;
        }
        .iconTitle{
            color: black;
            font-size: 60px;
        }
        .sl{
            font-family: cursive;
        }
</style>
</head>
<body>
    <div class="container">
     
        <header class="header">
            <nav class="header-nav">
                <img src="images/logo.png" alt="Logo" class="logo" />
                <a href="{{ route('user.list') }}" class="nav-item">Trang chủ</a>
                <a href="{{ route('cart.ViewCart') }}" class="nav-item" style="background-color: #044afb; padding: 10px 30px;">Giỏ hàng</a>
                <a href="#" class="nav-item">Yêu thích</a>
            </nav>
            <div class="nav-right">
                <form class="search-form">
                    <input type="text" class="search-input" placeholder="Tìm kiếm" aria-label="Tìm kiếm" />
                    <button type="submit" class="search-button">Tìm kiếm</button>
                </form>
                 <a class="nav-link" href="{{ route('signout') }} " ><button style="border: none; background-color: #ff0505; border-radius:5px; padding: 10px;">Đăng xuất</button> </a>
                <img src="{{ asset('avatar/' . $user->avatar) }}" alt="" class="avatar" />
            </div>
        </header>
        
        <div class="title">
            <div class="material-icons iconTitle">shopping_cart</div>
            <h1 class="nameTitle">Giỏ hàng của bạn</h1></div>
            <h2 class="sl">{{ $shopingCart->count(); }} sản phẩm</h2>
            <hr>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shopingCart as $shopingCart)
                <tr>
                    <td>{{ $shopingCart->quantity }}</td>
                    <td>{{ $shopingCart->price }}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <main class="main-content">
        </main>
    </div>
</body>
</html>
