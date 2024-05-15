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
        $shoppingCart->price  = ($request->input('quantity') * $product->price);
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
