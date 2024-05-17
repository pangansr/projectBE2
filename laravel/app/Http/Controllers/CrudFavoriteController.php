<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favorities; 
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CrudFavoriteController extends Controller
{
    public function addFavorite(Request $request)
{
    $product_id = $request->input('product_id');

    
    $existingFavorite = Favorities::where('id_product', $product_id)->first();

    if ($existingFavorite) {
       
        return back()->with('error', 'Sản phẩm đã có trong yêu thích');
    }

  
    $favorite = new Favorities();
    $favorite->id_product = $product_id;

  
    $product = Product::find($product_id);
    if ($product) {
      
        $favorite->favorite_name = $product->name;
        $favorite->favorite_description = $product->description;
    } else {
       
        $favorite->favorite_name = 'Unknown Product';
        $favorite->favorite_description = 'No description available';
    }

    $favorite->save();

 
    return back()->with('success', 'Product added to favorites successfully.');
}
public function showProduct()
{
   
    $products = Product::join('favorities', 'products.id', '=', 'favorities.id_product')
                        ->select('products.*')
                        ->get();
                        $user = Auth::user();
                        $shopingCart = ShoppingCart::with('product')->get();
    if ($products->isEmpty()) {
       
        return back()->with('error', 'No products found.');
    } else {
       
        
        return view('favorite.favorite', compact('user', 'shopingCart','products'));
    }
}

public function deleteFavorite(Request $request)
{
    $id = $request->input('id');
    Log::info('Delete request received for ID: ' . $id);

    
    $favorite = Favorities::where('id_product', $id)->first();

    if ($favorite) {
        $favorite->delete();
        Log::info('Favorite product deleted: ' . $id);
        return redirect()->back()->with('success', 'Xóa thành công');
    }

    Log::error('Favorite product not found: ' . $id);
    return redirect()->back()->with('error', 'Thất bại');
}


}


