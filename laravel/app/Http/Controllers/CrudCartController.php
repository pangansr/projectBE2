<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class CrudCartController extends Controller
{
    public function addToCart(Request $request)
    { 
    $user = Auth::user();
    $shoppingCart = new ShoppingCart();
    $product = Product::find($request->input('product_id'));
    $shoppingCart->user_id = $user->id;  
    $shoppingCart->product_id  = $request->input('product_id');
    //$shoppingCart->price  = ($request->input('quantity')*($product->price));
    $shoppingCart->price  = ($request->input('quantity')*$product->price);
    $shoppingCart->quantity = $request->input('quantity');
    $shoppingCart->size = $request->input('size'); 
    $shoppingCart->save();
    return back();

    return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
    public function ViewCart()
    {
        $selectedProducts = session()->get('selectedProducts', []); 
        $shopingCart = ShoppingCart::with('product')->get(); 
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
//     $shopingCart = $request->input('shopingCart');

//     // Tạo một đơn hàng mới
//     $order = new Order();
//     $order->user_id = $userId;
//     $order->save();
//     if (!empty($shopingCart)) {
//     // Lặp qua từng sản phẩm trong giỏ hàng và lưu thông tin của chúng vào đơn hàng
//     foreach ($shopingCart as $item) {
//         $order->products()->attach($item->product_id, [
//             'quantity' => $item->quantity,
//             'price' => $item->product->price
//         ]);
//     }
// } else {
//     // Xóa giỏ hàng sau khi thanh toán
    ShoppingCart::where('user_id', $userId)->delete();
// }
  
   // return redirect()->route('purchase.confirmation');
   return redirect()->route('cart.checkout');
}



}
