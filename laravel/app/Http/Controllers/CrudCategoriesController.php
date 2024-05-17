<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cat;
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
        $category = $request->input('id');
        Category::where('id', $category)->delete();
        return redirect()->back();
    }
    public function updateCategories(Request $request) {
        $categoryId = $request->input('id');
        $category = Category::find($categoryId);
        
        if (!$category) {
            // Xử lý khi không tìm thấy danh mục
            return redirect()->back()->with('error', 'Không tìm thấy danh mục cần cập nhật.');
        }
    
        // Cập nhật thông tin của danh mục
        $category->name = $request->input('name');
        $category->save();
    
        return redirect()->back();
    }
    
}
