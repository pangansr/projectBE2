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
    public function AddOrders(Request $request)
    {
        $user = Auth::user();
        // Validate the incoming request data
        // $request->validate([
        //     'id_users' => 'required|exists:users,id',
        //     'address' => 'nullable|string|max:255',
        //     'phone' => 'nullable|string|max:20',
        //     'note' => 'nullable|string'
        // ]);

        // // Create a new order
        // $order = new Order();
        // $order->user_id = $user->id;
        // $order->address = $request->address;
        // $order->phone = $request->phone;
        // $order->note = $request->note;
        // $order->save();


        foreach ($request->products as $product) {
            $detailOrder = new DetailOrder();
            $detailOrder->product_id = $product['product_id'];
            $detailOrder->user_id = $user->id;
            $detailOrder->size = $product['size'];
            $detailOrder->quantity = $product['quantity'];
            $detailOrder->total = $product['quantity'] * $product['price']; // Tính tổng giá trị cho mỗi sản phẩm
            $detailOrder->address = $request->address;
            $detailOrder->phone_number = $request->phone_number;
            $detailOrder->save();
            $productModel = Product::find($product['product_id']);
            if ($productModel) {
                $productModel->stock_quantity -= $product['quantity'];
                $productModel->save();
            }
         
        }

        return redirect()->back();
    }
}
