<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #hienthi {   
            border: 2px double rgb(0, 0, 0);
            border-radius: 20px;
            height: 700px;
            width: 650px;
        }
        #hienthi:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}
        .anh {
            border: 2px solid rgb(9, 9, 9);
            border-radius: 20px;
            height: 100px;
            width: 145px;
            opacity: 0.5;
            transition: opacity 0.3s ease-in-out;
        }

        .anh:hover {
            cursor: pointer;
        }

        .active {
            opacity: 1;
        }
        .nav{
                display: flex;
                justify-content:space-between;
                align-items: center;
                margin-bottom: 50px;
         }
         body{
            margin: 20px;
            background-color: #c2f2eb;
         }

.logo {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
}


.image-container{
    text-align: center;
    padding: 15px;
    height: 800px;
    /* background-color:#c4f4c8; */
    border-radius:40px; 
}
.info-container{
    padding: 20px;
    height: 800px;
    /* background-color:#c4f4c8; */
    border-radius:40px; 
}
.title{
    font-family: cursive;
    font-size: 60px;
    color: red;
    font-weight:200;
}
.name{
    font-family: cursive;
    font-size: 40px;
    color: rgb(0, 0, 0);
}
.mota{
    font-family: cursive;
    font-size: 20px;
    color: rgb(0, 0, 0);
}
.price{
    color: red;
    font-family: cursive;
    font-size: 30px;

}
.btn{
    font-family: cursive;
    
}
.row{
    display: flex;
    justify-content: center;
}
    </style>
</head>

<body>
        <div class="nav"> <img src="images/logo.png" alt="Logo" class="logo" /> <h1 class="title">Chi tiết sản phẩm</h1>
        <span> <a href="{{ route('user.list') }}"><button class="btn btn-secondary">Trang chủ</button></a>
            <a href="{{ route('cart.ViewCart') }}"><button class="btn btn-secondary">Giỏ hàng</button></a></span>
        </div>
      
        <div class="row">
            <div class="col-lg-5" style=" ">
                       <div class="image-container">
                        <img src="{{ asset('images/' . $product->image1) }}" alt="" class="img-fluid" id="hienthi">
                        <div style="margin-top:20px; ">
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
                </div>
                <div class="mb-3 price">
                    <span>Giá: {{ $product->price }}đ</span>
                </div>
                <div class="mb-3">
                    <span class="mota">Mô tả: {{ $product->description }}</span><br><br><br>
                    <label for="product-quantity" class="product-quantity-label">Số lượng</label>
                    <div class="form-group">
                        <input type="number"  name="quantity" required class="form-control" min="0" style="width: 100px;">
                    </div>
                      
                <button class="btn btn-warning px-3 py-3" style="color: white">Add to cart
                </button>
            <button class="btn btn-primary px-3 py-3">Mua</button>
                </div>
               
               </div>
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
    </script>
</body>

</html>
  
  