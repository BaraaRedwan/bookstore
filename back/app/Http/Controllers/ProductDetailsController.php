<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);

        //$similar_prdoucts = $product->getSimilar();

        return view('product-details', [
            'product' => $product,
            //'similar_prdoucts' => $similar_prdoucts,
        ]);
    }
}
