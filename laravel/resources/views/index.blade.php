@extends('dashboard')

    <style>
        body {
            margin: 0%;
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

        .containerr {
            display: flex;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .category-list {
            margin-left: 10px;
            width: 250px;
            background-color: #FFDEAD;
            display: flex;
            flex-direction: column;
            font-size: 14px;
            justify-content: center;
            border-radius: 5px;
        }

        .category-list-header {
            background-color: #993333;
            display: flex;
            padding: 8px 20px;
            border-radius: 5px;
        }

        .category-list-title {
            display: flex;
            align-items: center;
            flex-grow: 1;
            color: white;
            font-size: 20px;
        }

        .products-add {
            text-decoration: none;
            font-weight: 300;
            font-size: 30px
        }

        .category-item {
            border-radius: 10px;
            background-color: #f0cbcb;
            margin-top: 5px;
            margin-inline: 20px;
            padding: 2px 10px;
        }

        .category-item:last-child {
            margin-bottom: 9px;
        }

        .product {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            width: 300px;
            text-align: center;
            background: white;
            margin: 20px;
        }

        .product img {
            width: 100%;
            height: 350px;
            border-radius: 5px;
        }

        .product h2 {
            font-size: 20px;
            margin-top: 10px;
        }

        .product p {
            margin-top: 5px;
        }

        .price {
            color: #007bff;
            /* Màu sắc cho giá */
        }

        .rating {
            color: #28a745;
            /* Màu sắc cho lượt đánh giá */
        }

        .container-product {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
    </style>
@section('content')
    <div class="container">
        
        <main class="main-content">
        </main>
    </div>

    <div class="containerr">
        <div class="column">
            <div class="category-list">
                <div class="category-list-header">
                    <div class="category-list-title">Danh mục sản phẩm</div>

                </div>

                {{-- quyền admin --}}
                @if (Auth::user()->email == 'admin@gmail.com')
                <form action="{{ route('categories.add') }}" method="post"
                    style="display:flex; justify-content: center; margin: 10px 0px;">
                    @csrf
                    <input type="text" name="name" value=""
                        style="width: 150px; padding: 10px; height:20px; margin-right:10px;">
                    <input type="submit" value="Thêm"
                        style="border-radius:10px; padding: 10px; background-color: #01ddff">
                </form>
            @endif
                
                <button class="category-item" style="">Tất cả</button>
                @foreach ($category as $category)
                    <div
                        style="display: flex; align-items: center; padding: 5px; margin: 10px;border-radius:10px; background-color: #ff6633">
                        <button class="category-item" style="">{{ $category->name }}</button>

                          {{-- quyền admin --}}
                          @if (Auth::user()->email == 'admin@gmail.com')
                          <a href="">
                            <i class="fa fa-edit"
                            style="font-size:25px; color: rgb(0, 68, 255); margin-right:15px; "></i></a>
                            <a href="#" onclick="confirmDelete('{{ route('categories.delete', ['id' => $category->id]) }}')">
                                <i class="fa fa-trash" style="font-size:25px;color:red;"></i>
                            </a>
                            <script>
                                function confirmDelete(url) {
                                    if (confirm("Bạn có chắc chắn muốn xóa danh mục này?")) {
                                        window.location.href = url;
                                    }
                                }
                            </script>

                      @endif
                        
                                
                    </div>
                @endforeach
            </div>
            <div class="category-list">
                <div class="category-list-header">
                    <div class="category-list-title">Sản phẩm mới nhất</div>
                </div>
                @foreach ($productss as $product)
                    <li>{{ $product->name }}</li>
                @endforeach
            </div>
        </div>
        <div class="column">
            <div class="slideshow-container">

                <div class="slide fade " style="display: flex;">
                    <h1>Welcome to the website </h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. </p>
                    <button type="button" class="btn btn-default get">Get it now</button>
                </div>
                <div class="slide fade" style="display: flex;">
                   
                        <h1>Trải nghiệm với đa dạng loại sản phẩm</h1>
                        <h2>Free Ecommerce Template</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. </p>
                        <button type="button" class="btn btn-default get">Get it now</button>
                   
                </div>
            </div>
            <div style="margin-left:40px; clear: both; font-size: 30px"><Strong>Danh sách sản phẩm </Strong>

                {{-- quyền admin --}}        
                @if (Auth::user()->email == 'admin@gmail.com')
                <a class="products-add" href="{{ route('products.index') }}"><button style="font-size: 25px; width: 40px; height: 40px; border-radius: 50%; background-color: #000000; color: rgb(255, 255, 255); font-weight:700; margin-left: 30px; ">+</button></a>
            @endif

                <br>
                <hr>
            </div>

            <div class="container-product"  style="clear: both;">
                @foreach ($products as $product)
                    <div class="product">
                        <img src="{{ asset('images/' . $product->image1) }}" alt="Ảnh sản phẩm">
                        <h2>{{ $product->name }}</h2>
                        <p class="price">Giá: {{ $product->price }}</p>
                        <p class="rating">Lượt đánh giá: 50</p>
                        <a href="{{ route('product.read', ['id' => $product->id]) }}">Chi tiết</a> |


                        {{-- quyền admin --}}
                        @if (Auth::user()->email == 'admin@gmail.com')
                        <a href="{{ route('product.updateProduct', ['id' => $product->id]) }}">Sửa</a> |
                        <a href="#" onclick="confirmDelete('{{ route('product.deleteProduct', ['id' => $product->id]) }}')">Delete</a>
                    @endif
                      

                        <script>
                            function confirmDelete(url) {
                                if (confirm("Are you sure you want to delete this product?")) {
                                    window.location.href = url;
                                }
                            }
                        </script>
                        
                        



                    </div>
                @endforeach

            </div>
            <div class="pagination-container">
                <!-- Hiển thị nút Quay lại -->
                @if ($products->onFirstPage())
                    <span style="margin: 10px;" class="disabled">&laquo;</span>
                @else
                    <a href="{{ $products->previousPageUrl() }}" style="margin: 10px;" rel="prev">&laquo;</a>
                @endif

                <!-- Hiển thị các trang -->
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <a href="{{ $products->url($i) }}" style="margin: 10px;"
                        class="{{ $products->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                @endfor

                <!-- Hiển thị nút Trang kế tiếp -->
                @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" style="margin: 10px;" rel="next">&raquo;</a>
                @else
                    <span style="margin: 10px;" class="disabled">&raquo;</span>
                @endif
            </div>
        </div>
    </div>

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
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 2500);
    }
</script>


@endsection