@extends('dashboard')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cart.css" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
   <!-- jQuery -->
   <script src="assets/js/jquery-3.6.0.min.js"></script>
   <script src="assets/js/preloader.js"></script>
</head>
    <style>

     
.horizontal-list {
    display: flex;
    justify-content: center;
    flex-wrap: nowrap;
    overflow-x: auto;
    padding: 0;
    margin: 30px;
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
    font-size: 25px;
    color: black;
    width: 100%;
}
.category-item:hover {
    border: none;
    text-decoration: none;
    color: #F3274C;
    transform: translateY(-5px);
    border-radius: 5px;
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
            height: 600px;
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



        .products-add {
            text-decoration: none;
            font-weight: 300;
            font-size: 30px
        }


        .category-item:last-child {
            margin-bottom: 9px;
        }

        .product {
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 15px;
            width: 400px;
            text-align: center;
            background: wheat;
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
.btn-addPro{
    font-size: 25px; 
    border: 2px solid #F3274C; 
    padding: 15px; 
    border-radius: 10px;
    background-color: white;
    color:#F3274C; 
    font-weight:700; 
    margin-left: 30px; 
}
.btn-addPro:hover{
    background-color: #F3274C;
    color: white;
    transform: translateY(-5px);
    border-radius: 5px;
}
    </style>
@section('content')
    <div class="container">
        <main class="main-content">
        </main>
    </div>
   
    <div class="category-list">
    <ul class="horizontal-list">
        <li>
            <div class="category-item-container">
                <a class="category-item" onclick="changeColor(this)">Tất cả</a>
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
{{-- quyền admin --}}
        @if (Auth::user()->email == 'admin@gmail.com')
        <form action="{{ route('categories.add') }}" method="post" style="margin-bottom: 15px;">
            @csrf
            <input type="text" name="name" value="" style="width: 150px; padding: 10px; height:35px; margin-right:10px;">
            <input type="submit" value="Thêm" style="border-radius:10px ;border-color:#60ACF4; padding: 5px; background-color: #60ACF4; height: 35px;">
        </form>
        @endif
    </ul>
</div>



<section class="slider-hero">
    <div class="slider-home-1 owl-carousel owl-theme">
       <div class="hero-section item" style="background-image: url(images/background.png)">
          <div class="container">
             <div class="row align-items-end">
                <div class="col-xl-6">
                   <div class="featured-area">
                      <h2>The Perfect Space to Enjoy Fantastic Food</h2>
                      <h5>Festive dining at Farthings where we are strong believers in using the very best produce</h5>
                      <div class="d-md-flex align-items-center">
                         <a href="menu-1.html" class="button">See Our Menus</a>
                         <div class="video">
                         <a data-fancybox="" href="https://www.youtube.com/watch?v=1La4QzGeaaQ"><i>
                           <svg width="15" height="22" viewBox="0 0 11 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                             <path d="M11 8.5L0.5 0.272758L0.5 16.7272L11 8.5Z" fill="#fff"/>
                           </svg>
                            </i>Watch Video</a>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="hero-section item" style="background-image: url(images/background1.png)">
          <div class="container">
             <div class="row align-items-end">
                <div class="col-xl-6">
                   <div class="featured-area">
                      <h2>grilled cheese</h2>
                      <h1>burger</h1>
                      <h6>limited time offer</h6>
                      <div class="d-md-flex align-items-center">
                         <a href="menu-1.html" class="button">get offer today</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="hero-section item" style="background-image: url(images/hero-slider-three.webp)">
          <div class="container">
             <div class="row align-items-end">
                <div class="col-xl-6">
                   <div class="featured-area">
                      <h2>delicious</h2>
                      <h1>Hot Pizza</h1>
                      <h6>don't miss this deal</h6>
                      <div class="d-md-flex align-items-center">
                         <a href="menu-1.html" class="button">get offer today</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="hero-section item" style="background-image: url(images/hero-slider-two.webp)">
          <div class="container">
             <div class="row align-items-end">
                <div class="col-xl-6">
                   <div class="featured-area">
                      <h2>Summer Drink</h2>
                      <h1>Cocktail</h1>
                      <h6>limited time offer</h6>
                      <div class="d-md-flex align-items-center">
                         <a href="menu-1.html" class="button">get offer today</a>
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 
</section>


<section class="gap">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="bbq" style="background-image: url(images/anhnen.jpg)">
               <h2>Áo khoác</h2>
               <p>canonical classics to obscure<br> vải len</p>
               <div class="bbr-price">
                  <div>
                     <h3>$120</h3>
                     <span>per person</span>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="bbq mb-0" style="background-image: url(images/6.jpg)">
               <h2>Đồ bộ</h2>
               <p>canonical classics to obscure <br> Lorem, ipsum.</p>
               <div class="bbr-price">
                  <div>
                     <h3>$120</h3>
                     <span>per person</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>




<div id="progress">
      <span id="progress-value"><i class="fa-solid fa-arrow-up"></i></span>
</div>

<!-- Bootstrap Js -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<!-- fancybox -->
<script src="assets/js/jquery.fancybox.min.js"></script>
<script src="assets/js/custom.js"></script>

<!-- Form Script -->
<script src="assets/js/contact.js"></script>
<script type="text/javascript" src="assets/js/sweetalert.min.js"></script>


<div class="hero">

<div class="containerr">

      
        <div class="column" >
       
                
  
        
            <div style="margin-left:40px; clear: both; font-size: 30px"><Strong>Danh sách sản phẩm </Strong>

                {{-- quyền admin --}}        
                @if (Auth::user()->email == 'admin@gmail.com')
                <a class="products-add" href="{{ route('products.index') }}"><button class="btn-addPro" >Thêm sản phẩm mới</button></a>
            @endif

                <br>
                <hr>
            </div>

            <div class="container-product"  style="clear: both;">
                @foreach ($products as $product)
                    <div class="product">
                        <img src="{{ asset('images/' . $product->image1) }}" style="width: 370px; height: 370px;" alt="Ảnh sản phẩm"><br><br>
                        <h2>{{ $product->name }}</h2>
                        <p class="price">Giá: {{ $product->price }}</p>
                        <p class="rating">Số lượng  : {{$product->stock_quantity }}</p>
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
<script>
    var errorMessage = "{{ session('error') }}";
    if(errorMessage) {
        alert(errorMessage);
    }
</script>

@endsection