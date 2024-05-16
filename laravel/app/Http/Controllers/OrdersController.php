<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CrudCartController;

class OrdersController extends Controller
{
    public function GetOrderDetails(Request $request)
{
    $user = Auth::user();
    
    // Validate the incoming request data
    $request->validate([
        'products' => 'required|array',
        'products.*.product_id' => 'required|exists:products,id',
        'products.*.size' => 'required|string|max:10',
        'products.*.quantity' => 'required|integer|min:1',
        'products.*.price' => 'required|numeric|min:0',
        'address' => 'nullable|string|max:255',
        'phone_number' => 'nullable|string|max:20',
        'note' => 'nullable|string'
    ]);

    // Array to hold detail orders
    $detailOrders = [];

    foreach ($request->products as $product) {
        $detailOrder = new DetailOrder();
        $detailOrder->product_id = $product['product_id'];
        $detailOrder->size = $product['size'];
        $detailOrder->quantity = $product['quantity'];
        $detailOrder->total = $product['quantity'] * $product['price']; 
        
        $productModel = Product::find($product['product_id']);
        if ($productModel) {
            $productModel->stock_quantity -= $product['quantity'];
            $productModel->save();
        }

        $detailOrders[] = $detailOrder;
    }

    // Pass the array of detail orders to the view
    return view('thanhtoan.thanhtoan', ['detailOrders' => $detailOrders]);
}

}
