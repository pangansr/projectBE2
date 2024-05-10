<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <title>Đánh Giá Chất Lượng Sản Phẩm</title>
    <style>
        .danhgiaStart {
            display: flex;


            justify-content: space-between;
        }

        .danhgiaStart i {
            max-width: 100%;
            justify-content: space-between;
        }

        .container {
            background-color: #c3e7c3;
            border-radius: 10px;

            width: 70%;
            justify-content: center;
            align-items: center;
        }

        .tensp {
            display: flex;
            align-items: center;
        }

        .img {
            background-color: rgb(74, 175, 186);
            width: 200px;
            border-radius: 5px;
            height: 200px;
            margin-right: 20px;
        }

        .bi-star-fill,
        .bi-star {
            color: #ffc107;
            /* Màu sao mặc định */
        }

        .bi-star:hover {
            cursor: pointer;
        }

        .textdanhgia {
            display: "none";
        }

        .danhgia {
            display: flex;
        }

        .danhgiaStart {
            display: flex;
            justify-content: space-between;
            width: 150px;
            /* Điều chỉnh kích thước theo nhu cầu */
        }


        .file {
            text-align: center;
            justify-content: center;
            background-color: #d2bf85;
            border-radius: 5px;
        }

        .bistar {
            font-weight: bold;
            font-size: 35px;
            margin-left: 25x;
            padding-right: 25px;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div>
            <h1 style="text-align:center;justify-content: center;">Đánh Giá Chất Lượng Sản Phẩm</h1>
            <div class="tensp">
                <img class="img" src="{{ asset('images/' . $product_rv->image1) }}" alt="aaa">
                <div>
                    <h4>Tên sản phẩm</h4>
                    <h4>Phân Loại</h4>
                </div>
            </div>
        </div>
        <form action="{{ route('add.review') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <input name="id_products" type="hidden" value="{{ $product_rv->id }}">
                <input name="star" type="hidden" value="">
                {{-- <input name="id_user" type="text" value="{{$user->id}}">  --}}
                <div class="row mt-3">
                    <div class="col-3">
                        <h5>Chất lượng sản phẩm:</h5>
                    </div>
                    <div class="col-7">
                        <div class="danhgiaStart ">
                            <i name='star' data-value='1' class="bi bi-star star-icon bistar"
                                onclick="showRating(1)"></i>
                            <i name='star' data-value='2' class="bi bi-star star-icon bistar"
                                onclick="showRating(2)"></i>
                            <i name='star' data-value='3' class="bi bi-star star-icon bistar"
                                onclick="showRating(3)"></i>
                            <i name='star' data-value='4' class="bi bi-star star-icon bistar"
                                onclick="showRating(4)"></i>
                            <i name='star' data-value='5' class="bi bi-star star-icon bistar"
                                onclick="showRating(5)"></i>

                        </div>
                    </div>
                    <div class="col-2">
                        <div class="textdanhgia">
                            <p style="color: #72061e;font-weight: bold;
            font-size: 15px;">Tệ</p>
                            <p style="color: #ff0707;font-weight: bold;
            font-size: 15px;">Không Hài Lòng</p>
                            <p style="color: #d317aa;font-weight: bold;
            font-size: 15px;">Bình Thường</p>
                            <p style="color: #1d608d;font-weight: bold;
            font-size: 15px;">Hài Lòng</p>
                            <p style="color: #f9faf7fd;font-weight: bold;
            font-size: 15px;">Tuyệt Vời</p>
                        </div>
                    </div>
                </div>
            </div>



            <div class="container">
                <div class="row mt-2">
                    <div class="col-2">
                        <h5>Chất Liệu</h5>
                    </div>
                    <div class="col-8">
                        <div class="d-flex justify-content-center">
                            <textarea style="width:80%" id="" placeholder="Nhập chất liệu" name="chat_Lieu"></textarea>

                        </div>
                    </div>
                    <div class="col-2">

                    </div>
                </div>
                <div class="row mt-3 mb-3">
                    <div class="col-2">
                        <h5>Đúng với mô tả</h5>
                    </div>
                    <div class="col-8">
                        <div class="d-flex justify-content-center">
                            <textarea style="width:80%;" id="" placeholder="Nhập mô tả" name="mota"></textarea>
                        </div>
                        </label>
                    </div>
                    <div class="col-2">

                    </div>
                </div>
                <div class="row">
                    <div class="col-1">
                    </div>
                    <div class="col-10 ">
                        <textarea style="width:99%" id="" placeholder="Chia sẻ nhận xét sản phảm với mọi người" name="chia_se"></textarea>
                    </div>
                    <div class="col-1">

                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Xác Nhận</button>
        </form>
    </div>
    </div>
    <script>
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
                if (index === rating -1) {
                    text.style.display = "block";
                } else {
                    text.style.display = "none";
                }
            });
        }
    </script>
    
    
</body>

</html>
