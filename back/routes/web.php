<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\HomeController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
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


Route::prefix('admin')->group(function(){
    
    Route::resource('categories', CategoriesController::class);
    Route::get('/categories/{id}/childs', [CategoriesController::class,'index'])->name('categories.child');

    Route::resource('products', ProductsController::class);

   

});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/product/{id}', [App\Http\Controllers\ProductsController::class , 'show'])
            ->name('product.details')
            ->where([
                'id' => '\d+'
            ]);
Route::get('/category/{id}', [App\Http\Controllers\CategoriesController::class , 'show'])
        ->name('category.details')
        ->where([
            'id' => '\d+'
        ]);

