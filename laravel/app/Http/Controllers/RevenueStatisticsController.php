<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class RevenueStatisticsController extends Controller
{
    public function ViewRevenueStatistics(Request $request)
    {
        $user = Auth::user();
        $shopingCart = ShoppingCart::where('user_id', $user->id)->get();
        $product = Product::all();
        $categories = Category::all();
        $user = Auth::user();
        $totalOrders = Order::count();
        $orderCountByCategory = OrderDetail::selectRaw('categories.name as category_name, COUNT(order_detail.id) as order_count')
            ->join('products', 'order_detail.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->groupBy('categories.name')
            ->get();


        return view('ViewRevenueStatistics', compact('user', 'product', 'categories', 'shopingCart', 'totalOrders', 'orderCountByCategory'));
    }

    public function getStatsByCategory(Request $request)
{
    $categoryId = $request->input('categoryId');

    // Số lượng đơn hàng, giá trị đơn hàng và số lượng khách hàng theo danh mục
    $stats = OrderDetail::selectRaw('COUNT(order_detail.id) as orderCount, SUM(order_detail.total) as totalValue, COUNT(DISTINCT orders.id_users) as customerCount')
        ->join('orders', 'order_detail.orders_id', '=', 'orders.id')
        ->join('products', 'order_detail.product_id', '=', 'products.id')
        ->where('products.category_id', $categoryId)
        ->first();

    // Trả về số liệu dưới dạng JSON
    return response()->json($stats);
}

}
