<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            background: linear-gradient(to right, hsl(120, 93%, 46%), hsl(120, 73%, 33%), hsl(120, 85%, 64%));
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
        .nav-item {
            text-decoration: none;
            font-family: cursive;
            color: white;
            padding: 10px;
            border-radius: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <header class="header">
            <nav class="header-nav">
                <img src="images/logo.png" alt="Logo" class="logo" />
                <a href="#" class="nav-item">Trang chủ</a>
                <a href="#" class="nav-item">Giỏ hàng</a>
                <a href="#" class="nav-item">Yêu thích</a>
            </nav>
            <form class="search-form">
                <input type="text" class="search-input" placeholder="Tìm kiếm" aria-label="Tìm kiếm" />
                <button type="submit" class="search-button">Tìm kiếm</button>
            </form>
            
            <img src="{{ asset('avatar/' . $user->avatar) }}" alt="" class="avatar" />

        </header>
        <main class="main-content">
        </main>
    </div>
</body>
</html>
