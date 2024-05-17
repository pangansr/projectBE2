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
          
                // Lấy thông tin sản phẩm từ bảng order_details và kết hợp với thông tin từ bảng products
                $purchasedProducts = DB::table('order_details')
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->select('products.id as productId', 'products.name as productName', DB::raw('SUM(order_details.quantity) as totalQuantity'), DB::raw('SUM(order_details.quantity * products.price) as total'))
                    ->groupBy('products.id', 'products.name')
                    ->get();
            
                // Tạo một mảng tạm thời để lưu trữ thông tin sản phẩm với mã sản phẩm làm key
                $uniqueProducts = [];
                foreach ($purchasedProducts as $product) {
                    $productId = $product->productId;
                    if (!isset($uniqueProducts[$productId])) {
                        // Nếu sản phẩm chưa tồn tại trong mảng tạm thời, thêm nó vào với số lượng và thành tiền ban đầu
                        $uniqueProducts[$productId] = [
                            'productId' => $product->productId,
                            'productName' => $product->productName,
                            'totalQuantity' => $product->totalQuantity,
                            'total' => $product->total,
                        ];
                    } else {
                        // Nếu sản phẩm đã tồn tại trong mảng tạm thời, cộng thêm số lượng và thành tiền vào
                        $uniqueProducts[$productId]['totalQuantity'] += $product->totalQuantity;
                        $uniqueProducts[$productId]['total'] += $product->total;
                    }
                }
            
                // Chuyển đổi mảng tạm thời thành mảng kết quả
                $finalProducts = array_values($uniqueProducts);
            
        
                $productQuantity = DB::table('products')->sum('stock_quantity');

                // Lấy tổng số lượng đã bán từ bảng order_details
                $soldQuantity = DB::table('order_details')->sum('quantity');
            
                // Tính toán số lượng sản phẩm còn lại
                $remainingQuantity = $productQuantity - $soldQuantity;
          
        return view('ViewRevenueStatistics', compact('user', 'product', 'categories', 'shopingCart', 'totalOrders', 'selectedCategoryId', 'customerRevenue','finalProducts','remainingQuantity'));
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
