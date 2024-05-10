@extends('dashboard')

@section('content')
    <div class="title">
        <h1 class="material-icons sl">Thanh toán</h1>
    </div>
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
                </tr>
            </thead>
            <tbody>
                @foreach($selectedProducts ?? [] as $product)
                    <tr>
                        <td><img src="{{ asset('images/' . $product->image1) }}" alt="{{ $product->name }}" class="avatar"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->size }}</td>
                        <td>1</td> <!-- Số lượng sản phẩm -->
                        <td>{{ $product->price }}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
