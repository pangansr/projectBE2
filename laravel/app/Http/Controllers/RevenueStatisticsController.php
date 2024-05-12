<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class RevenueStatisticsController extends Controller
{
    public function ViewRevenueStatistics(Request $request)
    {
        $product = Product::all();
        $categories = Category::all();
        $user = Auth::user();
        return view('ViewRevenueStatistics', compact('user', 'product','categories'));
    }
}
