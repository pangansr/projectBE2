<!DOCTYPE html>
<html>

<head>
    <title>Shop bán hàng</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<style>
    .header {

        /* background: linear-gradient(to left, #12FFA0, #59DAB8, #F1F2B6); */
        /* background-color: #08ed11; */
        background-color: #800000;
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
        color: white;
        padding: 10px;
        border-radius: 10px;
        font-size: large;
        transition: background-color 0.3s ease;
    }

    .nav-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .search-form {
        display: flex;
        align-items: right;
        margin-inline: 70px;
    }

    .search-input {
        border-radius: 15px;
        border: 1px solid rgb(0, 0, 0);
        background-color: #69D5F3;
        color: black;
        padding: 10px;
    }

    .search-button {
        border-radius: 0px 15px 15px 0px;
        margin-left: -25px;
        border: 1px solid rgb(0, 0, 0);
        background-color: #69D5F3;
        color: rgb(255, 255, 255);
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
    .logo{
        width: 100px;
        height: 100px;
    }
</style>

<body>
    <header class="header">
        <nav class="header-nav">
            <img src="images/logo.png" alt="Logo" class="logo" />
            <a href="{{ route('user.list') }}" class="nav-item"><h3>Trang chủ </h3></a>
            <a href="{{ route('cart.ViewCart') }}" class="nav-item"><h3>Giỏ hàng</h3></a>
            <a href="{{ route('ViewRevenueStatistics') }}" class="nav-item"><h3>Thống kê doanh thu</h3></a>
        </nav>
        <div class="nav-right">
            <form class="search-form">
                <input type="text" class="search-input" placeholder="Tìm kiếm" aria-label="Tìm kiếm" />
                <button type="submit" class="search-button">Tìm kiếm</button>
            </form>

            <a  href="{{ route('signout') }}">
                        <button style=" border: none; background-color: red;color: white; border-radius:5px; font-size: 10px; padding: 10px;">
                            Đăng xuất
                        </button>
                    </a>
                    <a href="{{ route('user.readUser', ['id' => $user->id]) }}">
                        <img src="{{ asset('avatar/' . $user->avatar) }}" alt="" class="avatar" />
                    </a>
                 
     
        </div>
    </header>
    @yield('content')
</body>

</html>