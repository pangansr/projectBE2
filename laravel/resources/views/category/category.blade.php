@extends('dashboard')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category</title>
    <link rel="stylesheet" href="cart.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
    <style>
        /*Danh mục sản phẩm */
     
.horizontal-list {
    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding: 0;
    margin: 0;
    list-style-type: none;
    width: 100%;
}
.category-list {
    width: 100%; 
    overflow-x: auto; 
}
.category-item-container {
    display: flex;
    align-items: center;
    margin-top: 1px;
    margin-bottom: 4px;
    margin-right: 70px;
    flex-grow: 1; 
}

.category-item {
    border: none;
    background: none;
    padding: 0;
    margin: 0;
    cursor: pointer;
    font-size: inherit;
    color: black;
    width: 100%;
}

.admin-icons {
    margin-left: auto;
    color: black;
}

/* */
        body {
            margin: 0%;
            /* background-color: #DEEFFF; */
            
        }
        .slideshow-container {
            margin-left: 40px;
            position: absolute;
        bottom: 0;
        right: 0;
        }
        .slide {
            justify-content: flex-end;
    align-items: flex-end;
            display: flex;
            position: relative;
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

        /* .category-list {
            margin-left: 10px;
            width: 250px;
            background-color: #D9DDF0;
            display: flex;
            flex-direction: column;
            font-size: 14px;
            justify-content: center;
            border-radius: 5px;
        }

        .category-list-header {
            background-color: #60ACF4;
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
        } */

        .products-add {
            text-decoration: none;
            font-weight: 300;
            font-size: 30px
        }
/* 
        .category-item {
            border-radius: 10px;
            background-color: #B8D1E9;
            margin-top: 5px;
            margin-inline: 20px;
            padding: 2px 10px;
        } */

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
      .content{
        width: 700px;
        height: 440px;
      }


h1, h2, p {
    margin: 10px 0; /* Adjust as needed */
}

.nut {
    margin-top: 10px;
    padding: 10px 20px;
    background-color: #007BFF;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
        
        .hero {
    position: relative;
    width: 100%;
    height: calc(120vh - 40px); 
  
}
.hero img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

    </style>
@section('content')
    <div class="container">
        
        <main class="main-content">
        </main>
    </div>

   
    <div class="category-list">
    <ul class="horizontal-list">
        {{-- quyền admin --}}
        @if (Auth::user()->email == 'admin@gmail.com')
        <form action="{{ route('categories.add') }}" method="post" style="display:flex; justify-content: center; margin: 10px 0px;">
            @csrf
            <input type="text" name="name" value="" style="width: 150px; padding: 10px; height:20px; margin-right:10px;">
            <input type="submit" value="Thêm" style="border-radius:10px ;border-color:#60ACF4; padding: 5px; background-color: #60ACF4">
        </form>
        @endif
        <li>
            <div class="category-item-container">
                <a href="{{ route('user.list') }}" class="category-item" onclick="changeColor(this)">Tất cả</a>
            </div>
        </li>
        @foreach ($category as $category)
    <li>
        <div class="category-item-container">

            <a class="category-item" href="{{ route('categories.products',['id'=>$category->id]) }}"  data-id="{{ $category->id }}">{{ $category->name }}</a>
            {{-- quyền admin --}}
            @if (Auth::user()->email == 'admin@gmail.com')
            <div class="admin-icons">
                <a href="#">
                    <i class="fa fa-edit" style="font-size:25px; color:#007bff; margin-right:15px; "></i>
                </a>
                <a href="#" onclick="confirmDelete('{{ route('categories.delete', ['id' => $category->id]) }}')">
                    <i class="fa fa-trash" style="font-size:25px;color: #F5E3A9;"></i>
                </a>
            </div>
            <script>
                function confirmDelete(url) {
                    if (confirm("Bạn có chắc chắn muốn xóa danh mục này?")) {
                        window.location.href = url;
                    }
                }
            </script>
            @endif
        </div>
    </li>
@endforeach
    </ul>
    
</div>
<div class="hero">
        <img alt="Lamborghini Huracán STO" src="../images/background.png"  class="" style=" min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
        </div>
        <div class="hero">
        <img alt="Lamborghini Huracán STO" src="../images/background1.png"  class="" style=" min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
        <div class="slideshow-container">
            <div class="slide">
        <div class="content">
            <h1>Welcome to the website </h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button type="button" class="nut">Get it now</button>
        </div>
    </div>
    <div class="slide">
        <div class="content">
            <h1>Trải nghiệm với đa dạng loại sản phẩm</h1>
            <h2>Free Ecommerce Template</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            <button type="button" class="nut">Get it now</button>
        </div>
    </div>
    
    </div>
    </div>
<div class="containerr">

      
        <div class="column" >
       

         
           
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
<!-- The Modal -->
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

    function changeColor(element) {
       
        var items = document.querySelectorAll('.category-item');

       
        items.forEach(function(item) {
            item.style.color = 'black';
        });

        
        element.style.color = 'Blue';
    }
    
</script>
@endsection