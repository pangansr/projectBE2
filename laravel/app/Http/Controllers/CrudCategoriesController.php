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
        // Kiểm tra xem tên danh mục có được cung cấp không và có rỗng không
        if (!$request->has('name') || empty($request->input('name'))) {
            // Nếu không có tên danh mục hoặc tên danh mục rỗng, redirect về trang trước và gửi thông báo lỗi
            return redirect()->back()->with('error', 'Vui lòng nhập tên danh mục.');
        }
    
        // Kiểm tra độ dài của tên danh mục
        if (strlen($request->input('name')) > 255) {
            // Nếu tên danh mục quá dài, redirect về trang trước và gửi thông báo lỗi
            return redirect()->back()->with('error', 'Tên danh mục không được vượt quá 255 kí tự.');
        }
    
        // Nếu không có vấn đề gì, tiếp tục lưu danh mục vào cơ sở dữ liệu
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
    
        // Sau khi lưu xong, redirect về danh sách danh mục
        return redirect()->route('user.list');
    }    public function deleteCategories(Request $request) {
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
