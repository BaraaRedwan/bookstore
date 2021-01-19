<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
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

Route::resource('cart', CartController::class);
Route::post('switchToWishlist', function () {
    return view('wishlist');
});
Route::prefix('admin')->group(function(){

    Route::resource('categories', CategoriesController::class);
    Route::get('/categories/{id}/childs', [CategoriesController::class,'index'])->name('categories.child');

    Route::resource('products', ProductsController::class);


    Route::get('/home','HomeController@index');




    /*Route::get('/categories','CategoriesController@index')->name('categories');
    Route::get('/categories/creat','CategoriesController@creat')->name('categories.creat');
    Route::post('/categories','CategoriesController@store')->name('categories.store');
    Route::get('/categories/{id}','CategoriesController@edit')->name('categories.edit');
    Route::put('/categories/{id}','CategoriesController@update')->name('categories.update');
    Route::delete('/categories/{id}','CategoriesController@delete')->name('categories.delete');

    Route::get('/products','ProductsController@index');
    Route::get('/products/create','ProductsController@create');
    Route::post('/products','ProductsController@store');
    Route::get('/products/{id}','ProductsController@edit');
    Route::put('/products/{id}','ProductsController@update');
    Route::delete('/products/{id}','ProductsController@delete');*/

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
