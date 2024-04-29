<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class CrudProductController extends Controller
{
    public function index()
    {
      //  $products = Product::all();
      $categories = Category::all();
        return view('crud_product.addProduct',compact('categories'));
    }
    
    public function postProduct(Request $request)
    {
        // Kiểm tra dữ liệu đầu vào từ form
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Lưu dữ liệu sản phẩm vào cơ sở dữ liệu
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock_quantity = $request->input('stock_quantity');
        $product->category_id = $request->input('category_id');
    
        // Xử lý và lưu các hình ảnh
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $extension = $file->getClientOriginalExtension();
            $filename1 = '1' .time().'.'.$extension;
            $file->move('images/',$filename1);
            $product->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $extension = $file->getClientOriginalExtension();
            $filename2 = '2' .time().'.'.$extension;
            $file->move('images/',$filename2);
            $product->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $extension = $file->getClientOriginalExtension();
            $filename3 ='3' . time().'3.'.$extension;
            $file->move('images/',$filename3);
            $product->image3 = $filename3;
        }
    
        $product->save();
    
        // Chuyển hướng về trang danh sách sản phẩm hoặc trang chi tiết sản phẩm
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    
    
}
