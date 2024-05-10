<?php

use App\Http\Controllers\CrudProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\CrudCartController;
use App\Http\Controllers\CrudCategoriesController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('dashboard', [CrudUserController::class, 'dashboard']);

Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

Route::get('create', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('create', [CrudUserController::class, 'postUser'])->name('user.postUser');

Route::get('read', [CrudUserController::class, 'readUser'])->name('user.readUser');

Route::get('delete', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

Route::get('update', [CrudUserController::class, 'updateUser'])->name('user.updateUser');
Route::post('update', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

Route::get('index', [CrudUserController::class, 'index'])->name('user.list');

Route::get('signout', [CrudUserController::class, 'signOut'])->name('signout');


Route::get('/', function () {
    return view('welcome');
});



//categories
Route::post('addCategories', [CrudCategoriesController::class, 'postCategories'])->name('categories.add');
Route::get('deleteCategories', [CrudCategoriesController::class, 'deleteCategories'])->name('categories.delete');



//product
Route::get('/products', [CrudProductController::class, 'index'])->name('products.index');

Route::post('/addProduct', [CrudProductController::class, 'postProduct'])->name('products.add');

Route::get('/readProduct', [CrudProductController::class, 'readProduct'])->name('product.read');
Route::get('/readProduct', [CrudProductController::class, 'readPost'])->name('product.read');
//Route::get('/readProduct', [CrudProductController::class, 'readCaretory'])->name('product.read');

Route::get('updateProduct', [CrudProductController::class, 'updateProduct'])->name('product.updateProduct');
Route::post('updateProduct', [CrudProductController::class, 'postUpdateProduct'])->name('product.postupdateProduct');

Route::get('deleteProduct', [CrudProductController::class, 'deleteProduct'])->name('product.deleteProduct');

//cart
Route::post('/add-to-cart', [CrudCartController::class, 'addToCart'])->name('cart.add');
Route::get('ViewCart', [CrudCartController::class, 'ViewCart'])->name('cart.ViewCart');
//Nam Trân Đánh Giá Sp
Route::get('/danhgia',[CrudProductController::class,'getIdOfReview'])->name('products.review');
Route::post('/addDanhgia', [CrudProductController::class, 'postReview'])->name('add.review');

