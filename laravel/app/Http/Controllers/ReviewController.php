<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostsProduct;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function postReview(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'id_product' => 'required',
            'id_user' => 'required',
            'star' => 'nullable',
            'comment' => 'nullable',
        ]);
    
        // Lưu dữ liệu đánh giá vào cơ sở dữ liệu
        $post = new PostsProduct();
        $post->id_product = $request->input('id_product');
        $post->star = $request->input('star');
        $post->comment = $request->input('comment');
        $post->id_user = $user->id; 
        $post->save();
        return back();
    }    
}
