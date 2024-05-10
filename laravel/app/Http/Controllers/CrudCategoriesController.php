<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CrudCategoriesController extends Controller
{
    public function postCategories(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('user.list');
    }
    public function deleteCategories(Request $request) {
        $productId = $request->input('product_id');
    
        // Xóa sản phẩm khỏi giỏ hàng dựa vào product_id
        ShoppingCart::where('product_id', $productId)->delete();
        
        // Sau khi xóa, chuyển hướng người dùng đến trang xem giỏ hàng
        return redirect()->route('cart.ViewCart');
    }
}
