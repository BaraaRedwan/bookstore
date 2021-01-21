<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Validator;

class CartController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        
        if ($user) {
            return view('cart', [
                'products' => $user->cartProducts,
            ]);
        }

        $request = request();

        $product_ids = $request->cookie('cart', []);
        if ($product_ids) {
            $product_ids = unserialize($product_ids);
        }
        $ids = array_keys($product_ids);

        $products = Product::whereIn('id', $ids)->get();
        
        return view('cart', [
            'products' => $products,
            'quantity' => $product_ids,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|int|exists:products,id',
            'quantity' => 'int',
        ]);
        $product_id = $request->post('product_id');
        
        $user = Auth::user();

        if ($user) {
            $quantity = $request->post('quantity', 0);
            $price = Product::find($product_id)->price;

            Cart::updateOrCreate(
                ['user_id' => $user->id, 'product_id' => $product_id],
                [
                    'quantity' => DB::raw('quantity + ' . $quantity), 
                    'price' => $price
                ]
            );

            return redirect()->route('cart');

        } else {
            $products = $request->cookie('cart', []);
            if ($products) {
                $products = unserialize($products);
            }
            
            if (array_key_exists($product_id, $products)) {
                $products[$product_id]++;
            } else {
                $products[$product_id] = 1;
            }

            
            $cookie = Cookie::make('cart', serialize($products), 10080); // One week

            return redirect()->route('cart')
                ->cookie($cookie);
        }
    }

    public function update(Request $request)
    {
        $quantity = $request->post('quantity');
        $user = Auth::user();
        if ($user) {
            foreach ($quantity as $pid => $q) {
                $cart = Cart::where([
                    'user_id' => $user->id,
                    'product_id' => $pid
                ]);
                if ($q <= 0) {
                    $cart->delete();
                } else {
                    $cart->update([
                        'quantity' => $q
                    ]);
                }
            }
        }
        return redirect()->route('cart');
    }

    public function remove($product_id)
    {
        $user = Auth::user();
        if ($user) {
            Cart::where('user_id', $user->id)
                ->where('product_id', $product_id)
                ->delete();
            return redirect()->route('cart');
        }

        // Delete all cookie!
        /*$cookie = Cookie::make('cart', '', -100); // One week

        return redirect()->route('cart')
            ->cookie($cookie);*/

        $request = request();
        $products = $request->cookie('cart', []);
        if ($products) {
            $products = unserialize($products);
        }
        if (array_key_exists($product_id, $products)) {
            unset($products[$product_id]);
        }

        $cookie = Cookie::make('cart', serialize($products), 10080); // One week

        return redirect()->route('cart')
            ->cookie($cookie);
    }

    public function indexSession()
    {
        $product_ids = session('cart', []);
        //request()->session()->get('cart', []);
        

        $ids = array_keys($product_ids);

        $products = Product::whereIn('id', $ids)->get();
        
        return view('cart', [
            'products' => $products,
            'quantity' => $product_ids,
        ]);
    }

    public function storeSession(Request $request)
    {
        $products = session('cart', []);
        //$products = $request->session()->get('cart', []);
        
        $product_id = $request->post('product_id');
        if (array_key_exists($product_id, $products)) {
            $products[$product_id]++;
        } else {
            $products[$product_id] = 1;
        }
        session([
            'cart' => $products,
        ]);
        //$request()->session()->put('cart', $products);

        return redirect()->route('cart');
    }

    public function removeSession($product_id)
    {
        $products = session('cart', []);
        if (array_key_exists($product_id, $products)) {
            unset($products[$product_id]);
        }
        session([
            'cart' => $products
        ]);

        return redirect()->route('cart');
=======

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();
        $products = Product::get();
        $count = Product::get()->count();

        $cart = Cart::get();
        //dd($count);
        return view('cart',compact('user','products','cart','count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($request) {
            return $cartItem->id === $request->id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your cart!');
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Product');
        return redirect('cart')->withSuccessMessage('Item was added to your cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        // Validation on max quantity
        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

         if ($validator->fails()) {
            session()->flash('error_message', 'Quantity must be between 1 and 5.');
            return response()->json(['success' => false]);
         }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');

        return response()->json(['success' => true]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect('cart')->withSuccessMessage('Item has been removed!');
    }

    /**
     * Remove the resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function emptyCart()
    {
        Cart::destroy();
        return redirect('cart')->withSuccessMessage('Your cart has been cleared!');
    }

    /**
     * Switch item from shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function switchToWishlist($id)
    {
        $item = Cart::get($id);

        Cart::remove($id);

        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $cartItem->id === $id;
        });

        if (!$duplicates->isEmpty()) {
            return redirect('cart')->withSuccessMessage('Item is already in your Wishlist!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
                                  ->associate('App\Product');

        return redirect('cart')->withSuccessMessage('Item has been moved to your Wishlist!');
    }
}
