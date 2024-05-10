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
        <table class="table table-condensed">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">tên</td>
                        <td class="price">Giá</td>
                        <td class="price">size</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td class="total">Chức năng</td>
                        <td></td>
                    </tr>
                </thead>
            <tbody>
            @foreach($shopingCart as $item)
                <tr>
                    <td><img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}" class="avatar"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }}</td>
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
                    <td>{{ $item->price * $item->quantity }}</td>
                    <td>
                        <button class="btn btn-danger">Xóa</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </table>
        
        <main class="main-content">
        </main>
    </div>
</body>
@endsection
