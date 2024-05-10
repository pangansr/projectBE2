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
        <h2 class="sl">{{ $shopingCart->count() }} sản phẩm</h2>
        <hr>
        <table class="table table-condensed">
            <thead>
                <tr class="cart_menu">
                    <th class="image">Hình ảnh</th>
                    <th class="description">Tên sản phẩm</th>
                    <th class="price">Giá</th>
                    <th class="price">Size</th>
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
                        <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control">
                    </td>
                    <td>{{ $item->product->price * $item->quantity }}</td>
                    <td>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <main class="main-content">
        </main>
    </div>
</body>
@endsection
