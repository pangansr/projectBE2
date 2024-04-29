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
        .slideshow-container {
    max-width: 1000px;
    position: relative;
    margin: auto;
}

.slide {
    display: none;
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
.containerr {
    opacity: 0.8;
    display: flex;
}
.column {
    flex: 1;
}
    </style>
</head>
<body>
    <div class="container">
        @if(Auth::user()->name === 's')
            <p>Đây là tài khoảng admin</p>
        @endif
        <header class="header">
            <nav class="header-nav">
                <img src="images/logo.png" alt="Logo" class="logo" />
                <a href="#" class="nav-item">Trang chủ</a>
                <a href="#" class="nav-item">Giỏ hàng</a>
                <a href="#" class="nav-item">Yêu thích</a>
            </nav>
            <div class="nav-right">
                <form class="search-form">
                    <input type="text" class="search-input" placeholder="Tìm kiếm" aria-label="Tìm kiếm" />
                    <button type="submit" class="search-button">Tìm kiếm</button>
                </form>
                 <a class="nav-link" href="{{ route('signout') }}">Đăng xuất</a>
                <img src="{{ asset('avatar/' . $user->avatar) }}" alt="" class="avatar" />
            </div>
        </header>
        <main class="main-content">
        </main>
    </div>
   
    <div class="containerr">
        <div class="column">
            <h4>Danh sách danh mục</h4>
            @foreach($category as $category)
            <buttonb class="btn" style="">{{ $category->name }}</button>
        @endforeach   
        </div>
        <div class="column">
            <div class="slideshow-container ms-5">
                
                <div class="slide fade">
                    <img src="images/s2.jpg" style="width:700px; height:150px; border: 3px solid black;">
                </div>
                <div class="slide fade">
                    <img src="images/s3.jpg" style="width:700px; height:150px; border: 3px solid black;">
                </div>
                <div class="slide fade">
                    <img src="images/s4.jpg" style="width:700px; height:150px; border: 3px solid black;">
                </div>
            </div>
        </div>
    </div>


<ul>
    @foreach($products as $product)
        <li>{{ $product->name }}</li>
    @endforeach
</ul>
</body>
<script>
    var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("slide");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 4000); // Đổi ảnh sau mỗi 2 giây
}
</script>
</html>
