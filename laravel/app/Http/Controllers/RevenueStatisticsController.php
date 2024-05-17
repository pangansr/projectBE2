<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB; 
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

        $customerRevenue = DB::table('orders')
            ->join('users', 'orders.id_users', '=', 'users.id')
            ->select('users.name as customerName', DB::raw('SUM(orders.total) as totalRevenue'))
            ->groupBy('users.name')
            ->get();

            $purchasedProducts = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('products.id as productId', 'products.name as productName', 'order_details.quantity', DB::raw('order_details.quantity * products.price as total'))
            ->get();

          
        return view('ViewRevenueStatistics', compact('user', 'product', 'categories', 'shopingCart', 'totalOrders', 'selectedCategoryId', 'customerRevenue','purchasedProducts'));
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



    public function getCustomerRevenue(Request $request)
    {
        $customerRevenue = DB::table('orders')
            ->join('users', 'orders.id_users', '=', 'users.id')
            ->select('users.name as customerName', DB::raw('SUM(orders.total) as totalRevenue'))
            ->groupBy('users.name')
            ->get();

        return view('CustomerRevenue', compact('customerRevenue'));
    }



}
