<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
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
        return view('ViewRevenueStatistics', compact('user', 'product','categories','shopingCart'));
    }
}
