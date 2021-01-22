<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SearchController;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\ProductDetailsController;
use App\Http\Controllers\CategoryDetailsController;

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/



Route::prefix('admin')->middleware('auth')->group(function () {

    Route::resource('categories', CategoriesController::class);
    Route::get('/categories/{id}/childs', [CategoriesController::class, 'index'])->name('categories.child');

    Route::resource('products', ProductsController::class);
    Route::get('/orders', [OrderController::class , 'index'])->name('orders.index');
    Route::get('/show/{id}', [OrderController::class , 'show'])->name('orders.show');
});


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get("showProduct/{id}", [ProductDetailsController::class, 'show'])->name("Productshow");
Route::get("showCategoey/{id}", [CategoryDetailsController::class, 'show'])->name("Categoryshow");





Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/search_result', [SearchController::class, 'index'])->name('search');

Route::get('/product/{id}', [App\Http\Controllers\ProductsController::class, 'show'])
    ->name('product.details')
    ->where([
        'id' => '\d+'
    ]);
Route::get('/category/{id}', [App\Http\Controllers\CategoriesController::class, 'show'])
    ->name('category.details')
    ->where([
        'id' => '\d+'
    ]);

Route::post('cart', [CartController::class,'store'] )->name('cart.store');
Route::get('cart', [CartController::class,'index'])->name('cart');
Route::put('cart', [CartController::class,'update'])->name('cart.update');
Route::get('cart/remove/{product_id}', [CartController::class,'remove'])->name('cart.remove');

Route::get('orders', [OrdersController::class , 'index'] )->name('orders')->middleware('auth');
Route::get('orders/create', [OrdersController::class , 'store'] )->name('orders.store')->middleware('auth');

        Route::resource('products', ProductsController::class);
   

Auth::routes();

