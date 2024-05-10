<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class CrudCartController extends Controller
{
    public function addToCart(Request $request)
    {
         // Lấy thông tin sản phẩm từ request
    $productId = $request->input('product_id');
    $quantity = $request->input('quantity');
    $size = $request->input('size'); 
    // Kiểm tra sản phẩm có tồn tại không
    $product = Product::find($productId);
    if (!$quantity || $quantity <= 0) {
        return redirect()->back()->with('error', 'Số lượng không hợp lệ.');
    }
    if (!$product) {
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
    }

    // Tạo hoặc cập nhật giỏ hàng
    $cartItem = ShoppingCart::updateOrCreate(
        ['product_id' => $productId, 'user_id' => auth()->id()],
        ['quantity' => $quantity, 'price' => $product->price, 'size' => $size]
    );

    return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');

      //  return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
      //return redirect()->route('cart.ViewCart')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
    public function ViewCart()
    {
        $selectedProducts = session()->get('selectedProducts', []); // Lấy danh sách các sản phẩm đã được chọn từ session
        $shopingCart = ShoppingCart::with('product')->get(); // Lấy thông tin sản phẩm trong giỏ hàng cùng với thông tin sản phẩm
        $user = Auth::user();
        return view('crud_cart.view', compact('user', 'shopingCart', 'selectedProducts'));
    }
    
    public function removeFromCart(Request $request)
{
    $category_id = $request->get('product_id');
    ShoppingCart::destroy($category_id);
        return redirect()->route('cart.ViewCart');
}
public function removeAllFromCart(Request $request)
{
    ShoppingCart::where('user_id', auth()->id())->delete();
    return redirect()->route('cart.ViewCart');
}
public function checkout(Request $request)
{
    $userId = auth()->id();
    $shopingCart = $request->input('shopingCart');

    // Tạo một đơn hàng mới
    $order = new Order();
    $order->user_id = $userId;
    $order->save();
    if (!empty($shopingCart)) {
    // Lặp qua từng sản phẩm trong giỏ hàng và lưu thông tin của chúng vào đơn hàng
    foreach ($shopingCart as $item) {
        $order->products()->attach($item->product_id, [
            'quantity' => $item->quantity,
            'price' => $item->product->price
        ]);
    }
} else {
    // Xóa giỏ hàng sau khi thanh toán
    ShoppingCart::where('user_id', $userId)->delete();
}
    // Sau khi lưu đơn hàng và các sản phẩm tương ứng, bạn có thể chuyển hướng người dùng đến trang xác nhận đơn hàng
    return redirect()->route('purchase.confirmation');
}



}
