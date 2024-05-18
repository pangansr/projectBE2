<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function ViewDetailOrder()
    {
        $user = Auth::user();
        $orders = Order::with('user')->where('id_users', $user->id)->get(); 
        $shopingCart = ShoppingCart::where('user_id', $user->id)->get();
        return view('order', compact('user', 'orders', 'shopingCart'));
    }
    public function ViewOrder()
    {
        return view('thanhtoan.thanhtoan');
    }
    public function GetOrderDetails(Request $request)
    {

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

        $detailOrders = [];
        foreach ($request->products as $product) {
            $detailOrder = new OrderDetail();
            $detailOrder->product_id = $product['product_id'];
            $detailOrder->size = $product['size'];
            $detailOrder->quantity = $product['quantity'];
            $detailOrder->total = $product['quantity'] * $product['price'];


            $productModel = Product::find($product['product_id']);
            if ($productModel) {
                if ($productModel->stock_quantity < $product['quantity']) {
                    return redirect()->back()->with('error', 'Số lượng sản phẩm trong kho không đủ');
                }
                $productModel->stock_quantity -= $product['quantity'];
                $productModel->save();
            }
            $detailOrders[] = $detailOrder;
        }

        session(['detailOrders' => $detailOrders]);
        return view('thanhtoan.thanhtoan'   );
        
    }


    public function AddOrder(Request $request)
    {
        $user = Auth::user();
        $userId = Auth::id(); 

        ShoppingCart::where('user_id', $userId)->delete();
        $detailOrders = session('detailOrders');
        $totalAmount = collect($detailOrders)->sum('total');


        $order = new Order();
        $order->id_users = $user->id;
        $order->address =  $request->input('address');
        $order->phone =  $request->input('phone');
        $order->note =  $request->input('note');
        $order->total = $totalAmount;
        $order->save();



        foreach ($detailOrders as $detailOrder) {
            $detailOrder->order_id = $order->id;
            $detailOrder->save();
        }

        session()->forget('detailOrders');
        return redirect()->route('user.list');
    }
}
