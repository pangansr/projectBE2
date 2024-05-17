<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thanh Toán</title>
    <style>
        .invoice {
            max-width: 2000px;
            margin: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px ;
        }

        .invoice h1 {
            text-align: center;
            color: #333;
        }

        .invoice ul {
            list-style: none;
            padding: 0;
        }

        .invoice ul li {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
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
            background: #60ACF4;
            color: #333;
            padding: 3px;
            text-align: center;
        }

        .product-list,
        .customer-info,
        .checkout {
            background: #fff;
            padding: 20px;
            margin: 20px 0;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .product {
            display: flex;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .product:last-child {
            border-bottom: none;
        }

        .product img {
            width: 100px;
            height: 100px;
            margin-right: 20px;
            border-radius: 5px;
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
        }

        .checkout button {
            width: 100%;
            background: #28a745;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .checkout button:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    <header>
        <h1>Trang Thanh Toán</h1>

    </header>
    <div class="container">

        <div class="invoice">
            <h1>Chi tiết Đơn hàng</h1>
            <ul>
             
            </ul>
            <div class="total">

                Tổng cộng :0 VND
            </div>
        </div>
        <form action="{{ route('AddOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="customer-info">
                <h2>Thông tin khách hàng</h2>
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