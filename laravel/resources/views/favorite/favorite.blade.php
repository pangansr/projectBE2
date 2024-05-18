@extends('dashboard')
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
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

        .anh {
            border: 2px solid rgb(9, 9, 9);
            border-radius: 20px;
            height: 180px;
            width: 220px;
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

        .product-info {
            border: 1px solid #ced4da;
            border-radius: 10px;
            padding: 10px;
        }

        .image-container img {
            width: 100%;
        }

        .info-container {
            padding: 10px;
        }

        .name {
            font-size: 26px;
        }

        .price {
            font-size: 26px;
        }

        .mota {
            font-size: 20px;
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
            margin: auto;
        }

        .size {
            width: auto;
        }

        .img-fluid {
            background-color: red;
        }

        .image {
            padding: 10px;
            height: 100px;
        }
    </style>
</head>
@section('content')
<body>
<div class="container">
    <h2>Sản phẩm yêu thích</h2>
    <!-- Hiển thị thông báo lỗi và thành công -->
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($products->isEmpty())
    <p>Không có sản phẩm yêu thích nào.</p>
    @else
    <div class="row">
    @foreach ($products as $product)
    <div class="row mb-4">
        <div class="col-lg-6">
            <div class="product-info">
                <div class="image-container" id="image-container-{{ $product->id }}">
                    <img src="{{ asset('images/' . $product->image1) }}" alt="" class="img-fluid" id="hienthi-{{ $product->id }}">
                    <div class="image" style="margin-top:20px; display: flex; justify-content: center;">
                        <img src="{{ asset('images/' . $product->image1) }}" alt="" class="img-thumbnail anh active" id="anh-{{ $product->id }}-1">
                        <img src="{{ asset('images/' . $product->image2) }}" alt="" class="img-thumbnail anh mx-4" id="anh-{{ $product->id }}-2">
                        <img src="{{ asset('images/' . $product->image3) }}" alt="" class="img-thumbnail anh" id="anh-{{ $product->id }}-3">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="mb-3">
                <h1 class="name">{{ $product->name }}</h1>
            </div>
            <div class="mb-3 price">
                <span>Giá: {{ $product->price }}đ</span>
            </div>
            <div class="mb-3">
                <span class="mota">Mô tả:<br> {{ $product->description }}</span><br><br><br>
            </div>
            <form action="{{ route('favorite.delete') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash" style="color: red"></i></button>
            </form>
        </div>
    </div>
    @endforeach
    </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let products = document.querySelectorAll('.image-container');

        products.forEach(product => {
            let productId = product.id.split('-')[2];

            let hiethi = document.getElementById('hienthi-' + productId);
            let anh = product.querySelectorAll('.anh');

            function switchImage(img) {
                hiethi.src = img.src;
                anh.forEach(i => i.classList.remove('active'));
                img.classList.add('active');
            }

            anh.forEach(img => {
                img.addEventListener('click', () => switchImage(img));
            });
        });
    });
</script>
</body>
@endsection
