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
                    <td>{{ $item->product->price }}</td>
                    <td>
                        <select name="size" class="form-control">
                            <option value="S" {{ $item->size == 'S' ? 'selected' : '' }}>S</option>
                            <option value="M" {{ $item->size == 'M' ? 'selected' : '' }}>M</option>
                            <option value="L" {{ $item->size == 'L' ? 'selected' : '' }}>L</option>
                            <option value="XL" {{ $item->size == 'XL' ? 'selected' : '' }}>XL</option>
                        </select>
                    </td>
                    <td>
                        <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control quantity-input" style="width: 100px;">
                    </td>
                    <td>
                        <div class="price" id="total-price-{{ $loop->index }}">{{ $item->product->price * $item->quantity }}</div>
                    </td>
                    <td>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                    <td><input type="checkbox" name="selected_products[]" class="item-checkbox" value="{{ $item->product->id }}"></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="checkout-wrapper">
            <div class="total-price">
                Tổng tiền: <span id="total-price-all">0</span>
            </div>
            <button class="checkout-button" id="checkout-button">Xác nhận</button>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Lắng nghe sự kiện khi người dùng nhấp vào nút "Xác nhận"
        document.getElementById('checkout-button').addEventListener('click', function() {
            // Mảng để lưu trữ ID của các sản phẩm đã được chọn
            var selectedProductIds = [];
            // Lặp qua tất cả các checkbox và kiểm tra xem nó có được chọn không
            document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
                if (checkbox.checked) {
                    // Nếu được chọn, thêm ID của sản phẩm vào mảng
                    selectedProductIds.push(checkbox.value);
                }
            });
            // Chuyển hướng người dùng đến trang xác nhận thanh toán với các sản phẩm đã chọn
            window.location.href = "{{ route('confirm.payment') }}?selected_products=" + selectedProductIds.join(',');
        });
    });


       
       function toggleCheckoutButton() {
    var anyCheckboxChecked = false;
    document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
        if (checkbox.checked) {
            anyCheckboxChecked = true;
        }
    });
    var checkoutButton = document.querySelector('.checkout-button');
    if (checkoutButton) {
        if (anyCheckboxChecked) {
            checkoutButton.style.display = 'block';
        } else {
            checkoutButton.style.display = 'none';
        }
    }
}
// Lắng nghe sự kiện thay đổi của checkbox
document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        toggleCheckoutButton();
    });
});

// Ẩn ban đầu nút thanh toán
toggleCheckoutButton();

document.querySelectorAll('.quantity-input').forEach(function(input) {
    input.addEventListener('change', function() {
        var row = input.closest('tr');
        if (row) {
            var priceElement = row.querySelector('.price');
            var quantity = parseInt(input.value);
            if (priceElement && !isNaN(quantity)) {
                var price = parseFloat(priceElement.textContent);
                var totalPrice = price * quantity;

               
                var rowIndex = row.sectionRowIndex;
                var totalPriceElement = document.getElementById('total-price-' + rowIndex);
                if (totalPriceElement) {
                    totalPriceElement.textContent = totalPrice; 
                } else {
                    console.error("Phần tử 'total-price' không tồn tại trong DOM.");
                }

               
                calculateTotalPriceAll();
            }
        }
    });
});
        // Lắng nghe sự kiện thay đổi của checkbox
        document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
    checkbox.addEventListener('change', function() {
        // Tính tổng tiền của tất cả sản phẩm
        var totalPriceAll = 0;

        // Tính tổng tiền của mỗi sản phẩm và cập nhật tổng tiền của tất cả sản phẩm
        document.querySelectorAll('.item-checkbox').forEach(function(checkbox) {
            if (checkbox.checked) {
                var row = checkbox.closest('tr');
                if (row) {
                    var priceElement = row.querySelector('.price');
                   
                    if (priceElement) {
                        var price = parseFloat(priceElement.textContent); // Sử dụng textContent thay vì innerText
                   
                        totalPriceAll += price ;
    
                    }
                }
            }
        });

        // Hiển thị tổng tiền của tất cả sản phẩm
        var totalPriceAllElement = document.getElementById('total-price-all');
        if (totalPriceAllElement) {
            totalPriceAllElement.textContent = totalPriceAll; // Sử dụng textContent thay vì innerText
        } else {
            console.error("Phần tử 'total-price-all' không tồn tại trong DOM.");
        }
        console.log(totalPriceAllElement.textContent);
       // Lắng nghe sự kiện khi số lượng thay đổi


    });
});

    </script>
</body>
@endsection
