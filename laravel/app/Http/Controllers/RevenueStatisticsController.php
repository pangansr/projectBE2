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
        $totalOrders = Order::count(); 
        $selectedCategoryId = request()->query('categoryId', 0);
      
        return view('ViewRevenueStatistics', compact('user', 'product', 'categories', 'shopingCart', 'totalOrders', 'selectedCategoryId'));
    }


    public function getStatsByCategory(Request $request)
    {
        $categoryId = $request->input('categoryId');

        // cê a i
        $stats = OrderDetail::selectRaw('COUNT(order_details.id) as orderCount, SUM(order_details.total) as totalValue, COUNT(DISTINCT orders.id_users) as customerCount')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->where('products.category_id', $categoryId)
            ->first();

     
        return response()->json($stats);
    }
    public function getAllStats(Request $request)
    {
        $stats = OrderDetail::selectRaw('COUNT(order_details.id) as orderCount, SUM(order_details.total) as totalValue, COUNT(DISTINCT orders.id_users) as customerCount')
            ->join('orders', 'order_details.order_id', '=', 'orders.id')
            ->first();

        return response()->json($stats);
    }

    
}
