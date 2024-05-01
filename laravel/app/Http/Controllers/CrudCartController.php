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

        // Kiểm tra sản phẩm có tồn tại không
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại.');
        }

        // Tạo hoặc cập nhật giỏ hàng
        $cartItem = ShoppingCart::updateOrCreate(
            ['product_id' => $productId, 'user_id' => auth()->id()],
            ['quantity' => $quantity, 'price' => $product->price]
        );

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
    public function ViewCart()
    {
      //  $products = Product::all();
      //$categories = Category::all();
      $shopingCart = ShoppingCart::all();
            $user = Auth::user();
        return view('crud_cart.view',compact('user','shopingCart'));
    }
}
