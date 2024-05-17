@extends('dashboard')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
</head>
<style>
/* Đặt cấu hình cơ bản cho trang */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Đặt cấu hình cho container chính */
.container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    animation: fadeIn 1s ease-in-out;
}

/* Hiệu ứng động cho container */
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* Đặt cấu hình cho tiêu đề chính */
h1 {
    text-align: center;
    color: #333;
}

/* Đặt cấu hình cho chi tiết đơn hàng */
.order-detail {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fafafa;
    transition: transform 0.3s;
}

/* Hiệu ứng động khi di chuột qua chi tiết đơn hàng */
.order-detail:hover {
    transform: scale(1.02);
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

/* Đặt cấu hình cho tiêu đề chi tiết đơn hàng */
.order-detail h2 {
    color: #555;
    border-bottom: 1px solid #ddd;
    padding-bottom: 5px;
}

/* Đặt cấu hình cho đoạn văn trong chi tiết đơn hàng */
.order-detail p {
    font-size: 16px;
    margin: 5px 0;
}

/* Đặt màu chữ đậm */
.order-detail p strong {
    color: #333;
}

/* Đặt cấu hình cho phần danh sách các mặt hàng */
.order-detail .items {
    margin-top: 10px;
}

/* Đặt cấu hình cho bảng danh sách các mặt hàng */
.order-detail .items table {
    width: 100%;
    border-collapse: collapse;
    animation: slideIn 0.5s ease-in-out;
}

/* Hiệu ứng động cho bảng */
@keyframes slideIn {
    from { transform: translateX(-100%); }
    to { transform: translateX(0); }
}

/* Đặt cấu hình cho bảng và các ô bảng */
.order-detail .items table, th, td {
    border: 1px solid #ddd;
}

/* Đặt cấu hình cho tiêu đề ô bảng và ô bảng */
.order-detail .items th, .order-detail .items td {
    padding: 8px;
    text-align: left;
}

/* Đặt cấu hình cho hàng tiêu đề */
.order-detail .items th {
    background-color: #f2f2f2;
    color: #333;
}

</style>
@section('content')
<div class="container">
    <h1>Đơn hàng</h1>
    
    @foreach ($orders as $order)
    <div class="order-detail">
        <h3>Thông tin đơn hàng</h3>
        <p><strong>Tên:</strong>
            @if($order->user) 
                {{ $order->user->name }}
            @else
                Không có người dùng liên kết
            @endif
        </p>
        <p><strong>Số điện thoại:</strong> {{ $order->phone }}</p>
        <p><strong>Địa chỉ:</strong> {{ $order->address }}</p>
        <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
        
        <h3>Sản phẩm</h3>
        <div class="items">
            <table>
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Size</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                  
                @if($order->orderDetails)
                 @foreach ($order->orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $orderDetail->product->name }}</td>
                            <td>{{ $orderDetail->size}}</td>
                            <td>{{ $orderDetail->quantity }}</td>
                            <td>{{$orderDetail->product->price }}</td>
                            <td>{{ $orderDetail->quantity *$orderDetail->product->price  }}</td>
                        </tr>
                    @endforeach
                    @else
                    <tr>
                            <td colspan="5">Không có sản phẩm nào trong đơn hàng này.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <p><strong>Tổng tiền:</strong> {{ $order->total }} VND</p>
    </div>
    @endforeach
</div>
@if (session('error'))
    <script>
        var errorMessage = "{{ session('error') }}";
        if(errorMessage) {
            alert(errorMessage);
        }
    </script>
@endif
@endsection
