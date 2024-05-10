<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
      //  $products = Product::all();
      //$categories = Category::all();
      $shopingCart = ShoppingCart::with('product')->get(); // Lấy thông tin sản phẩm trong giỏ hàng cùng với thông tin sản phẩm
      $user = Auth::user();
      return view('crud_cart.view', compact('user', 'shopingCart'));
    }
}
