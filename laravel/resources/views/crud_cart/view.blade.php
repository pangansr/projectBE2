@extends('dashboard')
<style>
    /* CSS styles */
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
    .nameTitle {
        font-family: cursive;
        font-size: 40px;
    }
    .sl {
        font-family: cursive;
    }
    .container {
        border: 2px solid black;
        border-radius: 15px;
        padding: 20px;
        width: 100%;
        margin: 0 auto;
        overflow-x: auto;
    }
    .quantity-input {
        width: auto;
    }
    .table {
        width: 100%;
    }
    .table td {
        text-align: center;
    }
    .checkout-wrapper {
        display: flex;
        justify-content: space-between;
        /* Đặt khoảng cách đều giữa hai phần tử con */
        align-items: center;
    }
    .total-price {
        display: flex;
        justify-content: space-between;
        /* Đặt khoảng cách đều giữa hai phần tử con */
        align-items: center;
    }
    .checkout-button {
        background-color: #69D5F3;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
</style>
@section('content')
<body>
    <div class="title">
        <h1 class="material-icons sl">Giỏ hàng của bạn</h1>
    </div>
    <h2 class="sl">{{ $shopingCart->count() }} sản phẩm</h2>
    <hr>
    <div class="container">
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <th class="image">Hình ảnh</th>
                    <th class="description">Tên sản phẩm</th>
                    <th class="price">Giá</th>
                    <th class="size">Size</th>
                    <th class="quantity">Số lượng</th>
                    <th class="total">Tổng tiền</th>
                    <th class="total">Chức năng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($shopingCart as $item)
                <tr>
                    <td><img src="{{ asset('images/' . $item->product->image1) }}" alt="{{ $item->product->name }}" class="avatar"></td>
                    <td>{{ $item->product->name }}</td>
                    <td class="pricedefau">{{ $item->product->price }}</td>
                    <td>
                    <select name="size" class="form-control size-select">
    <option value="S" data-price="{{ $item->product->price_S }}">S</option>
    <option value="M" data-price="{{ $item->product->price_M }}">M</option>
    <option value="L" data-price="{{ $item->product->price_L }}">L</option>
    <option value="XL" data-price="{{ $item->product->price_XL }}">XL</option>
</select>
                    </td>
                    <td>
    <input type="number" name="quantity"  class="form-control quantity-input" style="width: 100px;" data-price="{{ $item->product->price }}">
</td>

                    <td>
                        <div class="price" id="total-price-{{ $loop->index }}">{{ $item->product->price * $item->quantity }}</div>
                    </td>
                    <td>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="checkout-wrapper">
            <div class="total-price">
                Tổng tiền: <span id="total-price-all">0</span>
            </div>
            <form id="checkout-form" action="{{ route('cart.checkout') }}" >
    @csrf
    <button type="submit" class="checkout-button">Thanh toán</button>
</form>


        </div>
    </div>

    <script>
function confirmDelete() {
    return confirm("Bạn có chắc muốn thanh toán toàn bộ sản phẩm ?");
}
document.querySelectorAll('.btn-danger').forEach(function(button) {
    button.addEventListener('click', function() {
        // Trích xuất chỉ mục của sản phẩm được nhấp xóa
        var index = button.closest('tr').rowIndex - 1;

        // Loại bỏ hàng sản phẩm từ bảng
        button.closest('tr').remove();

        // Gọi lại hàm tính toán tổng tiền
        calculateTotalPrice();
    });
});



        document.querySelectorAll('.quantity-input').forEach(function(input) {
    input.addEventListener('input', function() {
        // Lấy giá trị nhập vào
        var quantity = parseInt(input.value);

        // Kiểm tra nếu giá trị nhập vào nhỏ hơn 0
        if (quantity < 0 || isNaN(quantity)) {
            // Nếu nhỏ hơn 0 hoặc không phải số, đặt lại giá trị nhập thành 0
            input.value = 1;
            quantity = 1; // Đặt giá trị quantity thành 0 để tính toán tổng tiền
        }

        // Sau khi kiểm tra và đặt giá trị nhập, tính toán tổng tiền
        calculateTotalPrice();
    });
});






    // Hàm tính tổng tiền của mỗi sản phẩm và tổng tiền của tất cả sản phẩm
// Hàm tính tổng tiền của mỗi sản phẩm và tổng tiền của tất cả sản phẩm
function calculateTotalPrice() {
    var totalPriceAll = 0;
    // Lặp qua mỗi sản phẩm trong giỏ hàng
    document.querySelectorAll('.quantity-input').forEach(function(input, index) {
        // Lấy số lượng
        var quantity = parseInt(input.value);
        // Kiểm tra nếu số lượng ban đầu là 0 thì đặt nó thành 1
        if (quantity === 0) {
            input.value = 1;
            quantity = 1;
        }
        // Lấy giá của sản phẩm từ attribute data-price
        var price = parseFloat(input.getAttribute('data-price'));
        // Tính tổng tiền của sản phẩm (giá * số lượng)
        var totalPrice = price * quantity;
        // Cập nhật tổng tiền của sản phẩm vào phần tử hiển thị
        var totalPriceElement = document.getElementById('total-price-' + index);
        if (totalPriceElement) {
            totalPriceElement.textContent = totalPrice.toFixed(2);
        }
        // Cộng tổng tiền của sản phẩm vào tổng tiền của tất cả sản phẩm
        totalPriceAll += totalPrice;
    });
    // Hiển thị tổng tiền của tất cả sản phẩm
    var totalPriceAllElement = document.getElementById('total-price-all');
    if (totalPriceAllElement) {
        totalPriceAllElement.textContent = totalPriceAll.toFixed(2);
    }
}

    
    // Lắng nghe sự kiện khi số lượng thay đổi
    document.querySelectorAll('.quantity-input').forEach(function(input) {
        input.addEventListener('change', function() {
            calculateTotalPrice(); // Gọi lại hàm tính toán tổng tiền khi số lượng thay đổi
        });
    });

    // Gọi hàm tính toán tổng tiền lần đầu khi trang được tải
    calculateTotalPrice();
//     document.querySelectorAll('.size-select').forEach(function(select) {
//     select.addEventListener('change', function() {
//         // Lấy giá của kích thước được chọn từ value của option
//         var price = parseFloat(select.value);
        
//         // Kiểm tra kích thước được chọn và cập nhật giá dựa trên điều kiện
//         var selectedSize = select.value;
//         if (selectedSize === 'M') {
//             price += 50;
//         } else if (selectedSize === 'L') {
//             price += 100;
//         } else if (selectedSize === 'XL') {
//             price += 150;
//         }

//         // Cập nhật giá sản phẩm trong cột "Giá"
//         var priceElement = select.closest('tr').querySelector('.pricedefau');
//         if (priceElement) {
//             priceElement.textContent = price.toFixed(2);
//         }

//         // Gọi lại hàm tính toán tổng tiền
//         calculateTotalPrice();
//     });
// });


    </script>
</body>
@endsection
