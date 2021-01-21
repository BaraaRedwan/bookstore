<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }


    public function search(Request $request)
    {
        $q = '';
        if($request->q){
            $q = $request->q;
        }
        $items = Product::where("name","like","%$q%")
                ->orWhere("email","like","%$q%")
                ->get();
                dd($items);
        return view("home")->with('items',$items);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $all_catigories = Category::orderBy('created_at', 'ASC')->get();  
        $slider_products = Product::latest()->limit(4)->orderBy('created_at', 'DESC')->get();  
        $new_arrivals = Product::latest()->limit(8)->get();


        return view('home', [
            'slider_products' => $slider_products,
            'catigories' => $all_catigories,
            'new_arrivals' => $new_arrivals,

        ]);
    }
}
