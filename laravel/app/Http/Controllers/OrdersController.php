<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CrudCartController;

class OrdersController extends Controller
{
    public function ViewOrder()
    {
        return view('thanhtoan.thanhtoan');
    }
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
            $detailOrder = new OrderDetail();
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

       session(['detailOrders' => $detailOrders]);

       return view('thanhtoan.thanhtoan');

    }
    

    public function AddOrder(Request $request)
    {
     
        $user = Auth::user();
      
            $detailOrders = session('detailOrders');
        $totalAmount = collect($detailOrders)->sum('total');
    
        // // Tạo đơn hàng mới và lưu vào cơ sở dữ liệu
         $order = new Order();
        $order->id_users = $user->id;
        $order->address =  $request->input('address');
        $order->phone =  $request->input('phone');
        $order->note =  $request->input('note');
        $order->total = $totalAmount;
        $order->save();

       
      //  Lưu thông tin chi tiết đơn hàng vào cơ sở dữ liệu
        foreach ($detailOrders as $detailOrder) {
            $detailOrder->order_id = $order->id;
            $detailOrder->save();
        }
    
        session()->forget('detailOrders');
        return redirect()->route('user.list');
            
    }
    
}
