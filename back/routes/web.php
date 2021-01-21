<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});


//الراوت الخاصة باليوزر
Route::resource('cart', CartController::class);
Route::get('/cart/{id}', [CategoriesController::class, 'destroy'])->name('cart.delete');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get("showProduct/{id}", [ProductDetailsController::class, 'show'])->name("Productshow");
Route::get("showCategoey/{id}", [CategoryDetailsController::class, 'show'])->name("Categoryshow");


//الراوت الخاصة بالأدمن
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->group(function () {

        Route::resource('categories', CategoriesController::class);
        Route::get('/categories/{id}/childs', [CategoriesController::class, 'index'])->name('categories.child');

        Route::resource('products', ProductsController::class);
    });
});

Auth::routes();
