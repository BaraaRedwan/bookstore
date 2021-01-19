<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function show($id)
    { 
        $catigory = Category::with('products')->findOrFail($id);
        $products = $catigory->products;
        $children = $catigory->children;

        //$similar_prdoucts = $product->getSimilar();

        return view('category-details', [
            'catigory' => $catigory,
            'products' => $products,
            'children' => $children,
            
        ]);
    }
}
