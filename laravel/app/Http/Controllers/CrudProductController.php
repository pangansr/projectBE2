<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Posts;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
    public function readProduct(Request $request)
    {
        $product_id = $request->get('id');
        $product = Product::find($product_id);
        return view('crud_product.readProduct', ['product' => $product]);
       
    }
    public function readPost(Request $request)
    {
        $product_id = $request->get('id');
        $product = Product::find($product_id);
       $posts = Posts::where('product_id', $product_id)->get();
      // $posts = Posts::all();
        return view('crud_product.readProduct', ['product' => $product, 'posts' => $posts]);
    }
    public function readCaretory(Request $request)
    {
        $product_id = $request->get('category_id');
        $product = Product::find($product_id);
       $category = Category::where('name', $product_id)->get();
      // $posts = Posts::all();
        return view('crud_product.readProduct', ['product' => $product, 'category' => $category]);
    }
    public function readProduct_id_user(Request $request)
    {
        $user_id_post = $request->get('id');
        $user_id = Product::find($user_id_post);
        return view('crud_product.readProduct', ['user' => $user_id]);
       
    }
    public function getIdOfReview(Request $request)
    {
        $product_id = $request->get('id');
        $product = Product::find($product_id);
        return view('NamTran.danhgiasp', ['product_rv' => $product]);
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
            if ($file->isValid()) { // Kiểm tra xem tệp có hợp lệ hay không
                $extension = $file->getClientOriginalExtension();
                $filename1 = '1' . time() . '.' . $extension; // Thêm dấu chấm để tạo tên file hợp lệ
                $file->move('images/', $filename1);
                $product->image1 = $filename1;
            } else {
                return redirect()->back()->withErrors(['image1' => 'File ảnh không hợp lệ.']); // Trả về lỗi nếu file không hợp lệ
            }
        }
    
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            if ($file->isValid()) { // Kiểm tra xem tệp có hợp lệ hay không
                $extension = $file->getClientOriginalExtension();
                $filename2 = '2' . time() . '.' . $extension; // Thêm dấu chấm để tạo tên file hợp lệ
                $file->move('images/', $filename2);
                $product->image2 = $filename2;
            } else {
                return redirect()->back()->withErrors(['image2' => 'File ảnh không hợp lệ.']); // Trả về lỗi nếu file không hợp lệ
            }
        }
    
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            if ($file->isValid()) { // Kiểm tra xem tệp có hợp lệ hay không
                $extension = $file->getClientOriginalExtension();
                $filename3 = '3' . time() . '.' . $extension; // Thêm dấu chấm để tạo tên file hợp lệ
                $file->move('images/', $filename3);
                $product->image3 = $filename3;
            } else {
                return redirect()->back()->withErrors(['image3' => 'File ảnh không hợp lệ.']); // Trả về lỗi nếu file không hợp lệ
            }
        }
    
        $product->save();
    
        // Chuyển hướng về trang danh sách sản phẩm hoặc trang chi tiết sản phẩm
        return redirect()->route('user.list')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function postReview(Request $request)
    {
        //Kiểm tra dữ liệu đầu vào từ form
        $request->validate([
            'id_products' => 'required',
            'star' => 'nullable',
            'chat_Lieu' => 'nullable',
            'mota' => 'nullable',
            'chia_se' => 'nullable',
            
        ]);
    
        // Lưu dữ liệu sản phẩm vào cơ sở dữ liệu
        $post = new Posts();
        $post->product_id = $request->input('id_products');
        $post->star = $request->input('star');
        $post->Chat_lieu = $request->input('chat_Lieu');
        $post->MoTa = $request->input('mota');
        $post->chia_se = $request->input('chia_se');
        // $post->product_id = 7;
        // $post->star = 3;
        // $post->Chat_lieu = 'HHH';
        // $post->MoTa = 'HHHHHGFGHF';
        // $post->chia_se = 'T';
        $post->save();
       // return redirect()->route('products.review')->with('success', 'Bài post của đã được thêm thành công!');
       return redirect()->route('user.list');

    }
    
    
    
    public function deleteProduct(Request $request) {
        $product_id = $request->get('id');
        Product::destroy($product_id);
        return redirect()->route('user.list');
    }





    public function updateProduct(Request $request)
    {
        //tim user theo id
        $product_id = $request->get('id');
        $product = Product::find($product_id);
        $categories = Category::all();
        return view('crud_product.updateProduct', ['product' => $product],compact('categories'));
    }

    /**
     * Submit form update user
     */
    public function postUpdateProduct(Request $request)
    {
        $input = $request->all();
        $product = Product::find($input['id']);
        $product->name = $input['name'];
        $product->description = $input['description'];
        $product->price = $input['price'];
        $product->stock_quantity = $input['stock_quantity']; // Sửa lỗi thiếu dấu bằng
        $product->category_id = $input['category_id']; // Sửa lỗi thiếu dấu bằng
    
        // Xử lý và lưu các hình ảnh
        if ($request->hasFile('image1')) {
            $file = $request->file('image1');
            $extension = $file->getClientOriginalExtension();
            $filename1 = '1' . time() . '.' . $extension;
            $file->move('images/', $filename1);
            $product->image1 = $filename1;
        }
        if ($request->hasFile('image2')) {
            $file = $request->file('image2');
            $extension = $file->getClientOriginalExtension();
            $filename2 = '2' . time() . '.' . $extension;
            $file->move('images/', $filename2);
            $product->image2 = $filename2;
        }
        if ($request->hasFile('image3')) {
            $file = $request->file('image3');
            $extension = $file->getClientOriginalExtension();
            $filename3 = '3' . time() . '3.' . $extension; // Sửa lỗi định dạng tên file
            $file->move('images/', $filename3);
            $product->image3 = $filename3;
        }
        $product->save(); 
    
        return redirect()->route('user.list')->with('success', 'Sản phẩm đã được cập nhật thành công!'); // Sử dụng route() để chuyển hướng
    }
    
}
