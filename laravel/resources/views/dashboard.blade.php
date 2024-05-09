<!DOCTYPE html>
<html>

<head>
    <title>Laravel 10.48.0 - CRUD User Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
</head>
<style>
    .header {

        background: linear-gradient(to right, #12FFF7, #59DAB8, #F1F2B6);
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

    .nav-link {
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
        font-size: large;
        transition: background-color 0.3s ease;
    }

    .nav-item:hover {
        background-color: rgba(255, 255, 255, 0.2);
    }

    .search-form {
        display: flex;
        align-items: right;
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
        border-radius: 0px 15px 15px 0px;
        margin-left: -25px;
        border: 1px solid rgb(0, 0, 0);
        background-color: #69D5F3;
        color: rgb(255, 255, 255);
        padding: 10px 15px;
    }

    .avatar {
        width: 50px;
        height: 50px;
        border: 2px solid black;
        border-radius: 50%;
    }

    .slideshow-container {
        margin-left: 40px;

    }

    .slide {
        display: flex;
        height: 250px;
        float: left;
    }

    .fade {
        animation-name: fade;
        animation-duration: 1.5s;
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
        background-color: red;
        color: #fff;
    }
</style>

<body>
    <header class="header">
        <nav class="header-nav">
            <img src="images/logo.png" alt="Logo" class="logo" />
            <a href="{{ route('user.list') }}" class="nav-item">Trang chủ</a>
            <a href="{{ route('cart.ViewCart') }}" class="nav-item">Giỏ hàng</a>
            <a href="#" class="nav-item">Yêu thích</a>
        </nav>
        <div class="nav-right">
            <form class="search-form">
                <input type="text" class="search-input" placeholder="Tìm kiếm" aria-label="Tìm kiếm" />
                <button type="submit" class="search-button">Tìm kiếm</button>
            </form>
            <a class="nav-link" href="{{ route('signout') }}"><button style="border: none; background-color: #ff0505; border-radius:5px; padding: 10px;">Đăng
                    xuất</button></a>
            <span style="margin-inline:10px;border-radius: 40px; padding-inline: 10px; background-color: white; font-family: cursive;">{{$user->name}}</span>
            <a href="{{ route('user.readUser', ['id' => $user->id]) }}"><img src="{{ asset('avatar/' . $user->avatar) }}" alt="" class="avatar" /></a>

        </div>
    </header>
    @yield('content')
</body>

</html>