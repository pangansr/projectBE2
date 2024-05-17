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
        $product_id = $request->input('product_id');
        $size = $request->input('size');

        // Lấy thông tin về sản phẩm từ cơ sở dữ liệu
        $product = Product::find($product_id);

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng với cùng kích thước hay không
        $existingCartItem = ShoppingCart::where('user_id', $user->id)
            ->where('product_id', $product_id)
            ->where('size', $size)
            ->first();

        if ($existingCartItem) {
            // Nếu sản phẩm đã tồn tại, hiển thị thông báo lỗi
            return redirect()->back()->with('error', 'Sản phẩm này đã tồn tại trong giỏ hàng của bạn.');
        }

        // Nếu sản phẩm không tồn tại, thêm vào giỏ hàng
        $shoppingCart = new ShoppingCart();
        $shoppingCart->user_id = $user->id;
        $shoppingCart->product_id = $product_id;
        $shoppingCart->price  = ($request->input('quantity') * $product->price);
        $shoppingCart->quantity = $request->input('quantity');
        $shoppingCart->size = $size;
        $shoppingCart->save();

        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
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
        $cart = $request->input('id');
        ShoppingCart::where('id', $cart)->delete();
        return redirect()->back();
    }
    public function removeAllFromCart(Request $request)
    {
        ShoppingCart::where('user_id', auth()->id())->delete();
        return redirect()->back();
    }
    public function checkout(Request $request)
    {
        $userId = auth()->id();

        ShoppingCart::where('user_id', $userId)->delete();
        return redirect()->back();
    }
}
