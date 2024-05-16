@extends('dashboard')

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .comments-container {
            margin-top: 20px;
        }

        .comment {
            display: flex;
            margin-bottom: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .username {
            font-weight: bold;
        }

        .comment-content {
            flex: 1;
        }

        .comment-text {
            margin-bottom: 5px;
        }

        .comment-date {
            font-size: 12px;
            color: #888;
        }

        #hienthi {
            border: 2px double rgb(0, 0, 0);
            border-radius: 20px;
            height: 900px;
            width: 800px;
        }

        .anh {
            border: 2px solid rgb(9, 9, 9);
            border-radius: 20px;
            height: 180px;
            width: 250px;
            opacity: 0.5;
            transition: opacity 0.3s ease-in-out;
        }

        .anh:hover {
            cursor: pointer;
        }

        .active {
            opacity: 1;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }


        .image-container {
            padding: 15px;
            height: 1000px;
            border-radius: 40px;
        }

        .info-container {
            padding: 20px;
            /* background-color:#c4f4c8; */
            border-radius: 40px;
        }

        .title {
            font-family: cursive;
            color: black;
        }

        .name {
            font-family: cursive;
            font-size: 40px;
            color: rgb(0, 0, 0);
        }

        .mota {
            font-family: cursive;
            font-size: 20px;
            color: rgb(0, 0, 0);
        }

        .price {
            color: red;
            font-family: cursive;
            font-size: 30px;

        }

        .btn {
            font-family: cursive;

        }

        .row {
            display: flex;
        }

        .size {
            width: 'auto';
        }
    </style>
</head>
@section('content')

<body>


    <div class="row">
        <div class="col-lg-5">
            <div class="image-container">
                <img src="{{ asset('images/' . $product->image1) }}" alt="" class="img-fluid" id="hienthi">
                <div style="margin-top:20px; display: flex; justify-content: center;">
                    <img src="{{ asset('images/' . $product->image1) }}" alt="" class="img-thumbnail anh active" id="anh1">
                    <img src="{{ asset('images/' . $product->image2) }}" alt="" class="img-thumbnail anh mx-4">
                    <img src="{{ asset('images/' . $product->image3) }}" alt="" class="img-thumbnail anh">
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="info-container">
                <div class="mb-3">
                    <h1 class="name">{{ $product->name }}</h1>
                    <h1 class="">{{ number_format($averageRating, 2) }}/5</h1>
                    @for ($i = 1; $i <= 5; $i++) @if ($i <=round($averageRating)) <i class="bi bi-star-fill" style="font-size: 40px; color: yellow;"></i> <!-- Biểu tượng sao đầy -->
                        @else
                        <i class="bi bi-star" style="font-size: 40px; color: yellow;"></i> <!-- Biểu tượng sao trống -->
                        @endif
                        @endfor
                </div>
                <div class="mb-3 price">
                    <span>Giá: {{ $product->price }}đ</span>
                </div>
                <div class="mb-3">
                    <span class="mota">Mô tả:<br> {{ $product->description }}</span><br><br><br>
                    <div class="mb-3">
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input name="id_user" type="hidden" value="{{$user->id}}">
                            <input name="product_id" type="hidden" value="{{request('id')}}">
                            <label for="quantity"  style=" font-size: 20px; ">Số lượng:</label>
                            <input type="number" id="quantity" name="quantity" min="1" value="1" style="width: 50px; font-size: 20px; ">
                            <br><br>
                            <label for="size"  style=" font-size: 20px; ">Chọn kích thước:</label>
                            <select id="size" name="size"  style="width: 50px; font-size: 20px; ">
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                            </select>
                            <br><br>
                            <input type="submit" class="btn btn-warning px-3 py-2" value="Thêm vào giỏ hàng">
                        </form>
                    </div>
                </div>
                <hr>
            </div>





            @foreach($post as $post_productt)
            <div class="comments-container">
                <div class="comment">
                    <img src="{{ asset('avatar/' . $post_productt->user->avatar) }}" alt="User Avatar" class="avatar">

                    <div class="comment-content">
                        <div class="username">{{ $post_productt->user ->name }}</div>
                        <div class="star-rating">
                            @for ($i = 1; $i <= 5; $i++) @if ($i <=$post_productt->star)
                                <i class="bi bi-star-fill" style="font-size: 20px;"></i> <!-- Biểu tượng sao đầy -->
                                @else
                                <i class="bi bi-star" style="font-size: 20px;"></i> <!-- Biểu tượng sao trống -->
                                @endif
                                @endfor
                        </div>
                        <p class="comment-text">{{$post_productt->comment}}</p>
                        <span class="comment-date">{{$post_productt->created_at}}</span>
                    </div>
                </div>

            </div>
            @endforeach




            <form action="{{ route('ViewPostReview') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input name="star" type="hidden" value="5">
                <!-- {{-- <input name="id_user" type="text" value="{{$user->id}}"> --}} -->
                <input name="id_product" type="hidden" value="{{request('id')}}">
                <input name="id_user" type="hidden" value="{{$user->id}}">
                <h5>Chất lượng sản phẩm:</h5>
                <div class="danhgiaStart ">
                    <i name='star' style="font-size: 20px;" data-value='1' class="bi bi-star star-icon bistar" onclick="showRating(1)"></i>
                    <i name='star' style="font-size: 20px;" data-value='2' class="bi bi-star star-icon bistar" onclick="showRating(2)"></i>
                    <i name='star' style="font-size: 20px;" data-value='3' class="bi bi-star star-icon bistar" onclick="showRating(3)"></i>
                    <i name='star' style="font-size: 20px;" data-value='4' class="bi bi-star star-icon bistar" onclick="showRating(4)"></i>
                    <i name='star' style="font-size: 20px;" data-value='5' class="bi bi-star star-icon bistar" onclick="showRating(5)"></i>


                    <div class="textdanhgia">
                        <p style="color: #72061e;font-weight: bold;
            font-size: 15px;">Tệ</p>
                        <p style="color: #ff0707;font-weight: bold;
            font-size: 15px;">Không Hài Lòng</p>
                        <p style="color: #d317aa;font-weight: bold;
            font-size: 15px;">Bình Thường</p>
                        <p style="color: #1d608d;font-weight: bold;
            font-size: 15px;">Hài Lòng</p>
                        <p style="color: green;font-weight: bold;
            font-size: 15px;">Tuyệt Vời</p>
                    </div>
                </div>
                <textarea style="width:50%;" style="height: 50px;" id="" placeholder="Nhập mô tả" name="comment"></textarea>
                <input type="submit" style="height: 55px; margin-bottom: 47px;" value="Xác Nhận" class="btn btn-primary">
            </form>
        </div>
    </div>

    <script>
        let hiethi = document.getElementById('hienthi');
        let anh = document.querySelectorAll('.anh');
        anh.forEach(img => {
            img.addEventListener('click', () => {
                hiethi.src = img.src;
                anh.forEach(i => i.classList.remove('active'));
                img.classList.add('active');
            });
        });
        var defaultRating = 5;
        window.addEventListener("DOMContentLoaded", function() {
            // Lấy danh sách các sao và văn bản đánh giá
            var stars = document.querySelectorAll(".danhgiaStart i");
            var texts = document.querySelectorAll(".textdanhgia p");

            // Đặt rating mặc định
            setRating(defaultRating);

            // Gán sự kiện onclick cho từng sao
            stars.forEach(function(star, index) {
                star.addEventListener("click", function() {
                    // Lấy giá trị rating từ thuộc tính data-value
                    var dataValue = star.getAttribute("data-value");
                    if (dataValue !== undefined && !isNaN(parseInt(dataValue))) {
                        var rating = parseInt(dataValue);
                        setRating(rating);

                        // Cập nhật giá trị của input star
                        var starInput = document.querySelector("input[name='star']");
                        starInput.value = rating;
                    }
                });
            });
        });

        function setRating(rating) {
            var stars = document.querySelectorAll(".danhgiaStart i");

            // Đặt lại màu in đậm cho tất cả các sao
            stars.forEach(function(star, index) {
                if (index + 1 <= rating) {
                    star.classList.remove("bi-star");
                    star.classList.add("bi-star-fill");
                } else {
                    star.classList.remove("bi-star-fill");
                    star.classList.add("bi-star");
                }
            });

            var texts = document.querySelectorAll(".textdanhgia p");
            texts.forEach(function(text, index) {
                if (index === rating - 1) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            });

        }

        function updateStar(value) {
            document.getElementById('star').value = value;
        }
    </script>
</body>

</html>
@endsection