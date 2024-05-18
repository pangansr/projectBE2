<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thanh Toán</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: linear-gradient(135deg, #60ACF4, #4A90E2);
            color: #fff;
            padding: 20px 0;
            text-align: center;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2em;
            animation: fadeInDown 1s;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .invoice {
            margin: 30px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .invoice h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .invoice ul {
            list-style: none;
            padding: 0;
        }

        .invoice ul li {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            animation: fadeInUp 0.5s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .invoice ul li:last-child {
            border-bottom: none;
        }

        .invoice .product-details {
            display: flex;
            justify-content: space-between;
        }

        .invoice .product-details span {
            display: block;
            width: 48%;
        }

        .invoice .total {
            text-align: right;
            font-weight: bold;
            font-size: 1.2em;
            margin-top: 20px;
        }

        .product-list,
        .customer-info,
        .checkout {
            background: #fff;
            padding: 40px;
            margin: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-list .product {
            display: flex;
align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .product-list .product:last-child {
            border-bottom: none;
        }

        .product img {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            flex-grow: 1;
        }

        .product-info h2 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .product-info p {
            margin: 5px 0;
            color: #666;
        }

        .product-info .details {
            display: flex;
            gap: 20px;
        }

        .summary {
            text-align: right;
            margin-top: 10px;
        }

        .summary p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
        }

        .customer-info label {
            display: block;
            margin: 10px 0 5px;
        }

        .customer-info input,
        .customer-info textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s ease;
        }

        .customer-info input:focus,
        .customer-info textarea:focus {
            border-color: #4A90E2;
            outline: none;
        }

        .checkout button {
            width: 100%;
            background: linear-gradient(135deg, #28a745, #218838);
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .checkout button:hover {
            background: linear-gradient(135deg, #218838, #1e7e34);
        }

        .checkout button:active {
            background: linear-gradient(135deg, #1e7e34, #1c7430);
        }

        /* CSS for the submit button */
        input[type="submit"] {
            padding: 15px 30px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            /* Hiệu ứng chuyển động */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Đổ bóng */
        }

        /* CSS for the submit button on hover */
        input[type="submit"]:hover {
            background-color: #218838;
            transform: translateY(-2px);
            /* Dịch chuyển lên trên khi hover */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.2);
            /* Đổ bóng lớn hơn khi hover */
        }
        .styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 18px;
    min-width: 400px;
box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    width: 100%;
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th, .styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr:hover {
    background-color: #f1f1f1;
    transition: background-color 0.2s;
}

    </style>
</head>

<body>
    <header>
        <h1>Thanh Toán</h1>
    </header>
    <div class="container">
        <div class="invoice">
            <h1>Chi tiết đơn hàng</h1>
            <ul>
            <table class="styled-table">
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
        @if(session('detailOrders'))
            @foreach(session('detailOrders') as $info)
                <tr>
                    <td>{{ $info->name }}</td>
                    <td>{{ $info->size }}</td>
                    <td>{{ $info->quantity }}</td>
                    <td>{{ $info->price }}</td>
                    <td>{{ $info->total }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

            </ul>
            <div class="total">
            </div>
        </div>
        <form action="{{ route('AddOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="customer-info">
                <h2>Thông tin người nhận</h2>
                <label for="phone">Số điện thoại:</label>
                <input type="tel" id="phone" name="phone" required>
                <label for="address">Địa chỉ:</label>
                <input type="text" id="address" name="address" required>
                <label for="note">Ghi chú:</label>
                <textarea id="note" name="note" rows="4"></textarea>
            </div>
            <div class="checkout">
                <input type="submit" value="Thanh Toán">
            </div>
        </form>
    </div>
</body>

</html>