<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailOrder;
use Illuminate\Support\Facades\Auth;
class DetailOrdersController extends Controller
{
    public function AddOrders(Request $request)
{
    $user = Auth::user();

    // Lặp qua mảng các sản phẩm gửi từ biểu mẫu
    foreach ($request->products as $product) {
        // Tạo một bản ghi DetailOrder cho mỗi sản phẩm
        $detailOrder = new DetailOrder();
        $detailOrder->product_id = $product['product_id'];
        $detailOrder->user_id = $user->id;
        $detailOrder->size = $product['size'];
        $detailOrder->quantity = $product['quantity'];
        $detailOrder->total = $product['quantity'] * $product['price']; // Tính tổng giá trị cho mỗi sản phẩm
        $detailOrder->address = $request->address;
        $detailOrder->phone_number = $request->phone_number;
        $detailOrder->save();
    }

    return redirect()->back();
}

}
