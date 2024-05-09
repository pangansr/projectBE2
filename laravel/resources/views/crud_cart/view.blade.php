@extends('dashboard')
    <style>
        .search-form {
            display: flex;
            align-items:right;
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
            border-radius:0px 15px 15px 0px;
            margin-left: -25px;
            border: 1px solid rgb(0, 0, 0);
            background-color: #69D5F3;
            color: rgb(255, 255, 255);
            padding: 10px 15px;
        }
        .avatar{
            width: 50px;
            height: 50px;
            border: 2px solid black;
            border-radius: 50%; 
        }
        .nameTitle{
            font-family: cursive;
            
            font-size: 40px;
        }
        .sl{
            font-family: cursive;
        }
</style>
@section('content')
<body>
    <div class="container">
        
        <div class="title">
            <h1 class="material-icons sl">Giỏ hàng của bạn</h1>
            </div>
            <h2 class="sl">{{ $shopingCart->count(); }} sản phẩm</h2>
            <hr>
        <table>
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shopingCart as $shopingCart)
                <tr>
                    <td>{{ $shopingCart->quantity }}</td>
                    <td>{{ $shopingCart->price }}</td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <main class="main-content">
        </main>
    </div>
</body>
@endsection
