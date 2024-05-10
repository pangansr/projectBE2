@extends('dashboard')

@section('content')
    <h1>Đơn hàng đã thanh toán</h1>
    @if($orders->count() > 0)
        @foreach($orders as $order)
            <h3>Đơn hàng #{{ $order->id }}</h3>
            <ul>
                @foreach($order->products as $product)
                    <li>{{ $product->name }} - {{ $product->pivot->quantity }} - {{ $product->pivot->price }}</li>
                @endforeach
            </ul>
        @endforeach
    @else
        <p>Không có đơn hàng nào đã thanh toán.</p>
    @endif
@endsection
