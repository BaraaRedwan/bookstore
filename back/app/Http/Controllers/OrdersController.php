<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->orders;
    }

    public function store()
    {
        $user = Auth::user();
        /*$order = Order::forceCreate([
            'user_id' => $user->id,
        ]);*/

        DB::beginTransaction();


        try {
            $order = $user->orders()->create([
                'status' => 'pending-payment',
                'tax' => '14',
                'discount' => '0',
            ]);

            foreach ($user->cartProducts as $product) {
                $order->products()->attach($product->id, [
                    'quantity' => $product->cart->quantity,
                    'price' => $product->cart->price,
                ]);
            }

            Cart::where('user_id', $user->id)->delete();

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();
            return $e->getMessage();
        }

        return redirect()
            ->route('cart')
            ->with('success', "Order created We will contact you by email!");
    }
}
