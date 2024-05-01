<form action="{{ route('cart.add') }}" method="post">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    <div>
        <label for="quantity">Số lượng:</label>
        <input type="number" id="quantity" name="quantity" value="1" min="1">
    </div>
    <button type="submit">Thêm vào giỏ hàng</button>
</form>
