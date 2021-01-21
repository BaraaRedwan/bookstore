<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        

        $orders = Order::with('user')->get();

        return view('admin.orders.index', [
            'orders' => $orders,
        ]);
    }

    
    
}
