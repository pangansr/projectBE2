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
        $category_id = $request->get('id');
        Category::destroy($category_id);
        return redirect()->route('user.list');
    }
}
