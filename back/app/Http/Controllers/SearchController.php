<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function index()
    {
        $request = request();

        $name = $request->query('name');

        $model = Product::with('category');

        $model->when($name, function($query, $name) {
            return $query->where('name', 'LIKE', "%{$name}%");
        });
        
        $products = $model->get();
 

        return view('search', [
            'products' => $products,
            'name'=> $name,
            
        ]);
    }
}
