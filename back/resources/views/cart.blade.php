@extends('layouts.home')

@section('content')


<div class="container-fluid" id="cart">
    <div class="row">
        <div class="col-xs-12 text-center" id="heading">
            <h2 style="color:palevioletred;text-transform:uppercase;"> YOUR CART </h2>
        </div>
    </div>
    <div class="row">

        <div class="cart-main-area ptb--100 bg__white">
            <form action="{{ route('cart.update') }}" method="post">
                @csrf
                @method('put')
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="col-md-12 col-sm-12 col-xs-12" style="color:palevioletred;font-weight:800;">
                                <div class="panel-heading">Orders</div>
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="product-name">name of products</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                                <th class="product-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                            @php
                                            if (isset($quantity[$product->id])) {
                                            $q = $quantity[$product->id];
                                            $price = $product->price;
                                            } else {
                                            $q = $product->cart->quantity;
                                            $price = $product->cart->price;
                                            }

                                            @endphp
                                            <tr>
                                                <td class="product-name"><a href="#">{{ $product->name }}</a>
                                                </td>
                                                <td class="product-price"><span class="amount">${{ $product->price }}</span></td>
                                                <td class="product-quantity"><input type="number" value="{{ $q }}" name="quantity[{{ $product->id }}]" min="0"></td>
                                                <td class="product-subtotal">{{ $product->price * $q }}$</td>

                                                <td class="product-remove">
                                                    <a href="{{ route('cart.remove', [$product->id]) }}" class="btn btn-sm" style="background:palevioletred;color:white;font-weight:800;">
                                                        Remove
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="panel col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 text-center" style="color:palevioletred;font-weight:800;">
                            <div class="panel-heading">TOTAL
                            </div>
                            <div class="panel-body">
                                <div class="cart__desk__list">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>cart total</th>
                                                <th>tax</th>
                                                <th>shipping</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="#"></a></td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br> <br>

                <div class="row">
                    <div class="b col-xs-9 col-xs-offset-3 col-sm-4 col-sm-offset-2 col-md-6 col-md-offset-5">
                        <button type="submit" class="btn btn-lg">update</button>
                    </div>
                    <div class="b col-xs-8 col-xs-offset-5  col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
                        <a href="index.html" class="btn btn-lg" style="background:palevioletred;color:white;font-weight:800;">Continue Shopping</a>
                    </div>

                    <div class="b col-xs-9 col-xs-offset-3  col-sm-4 col-sm-offset-2 col-md-4 col-md-offset-5">
                        <a href="{{ route('orders.store') }}" class="btn btn-lg" style="background:palevioletred;color:white;font-weight:800;">Place Order</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
=======
    <div class="container">
        <p><a href="{{ url('home') }}">Home</a> / Cart</p>
        <h1>Your Cart</h1>

        <hr>

        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif

        @if ($count > 0)



            <table class="table">
                <thead>
                    <tr>
                        <th class="table-image">Book Image</th>
                        <th>Book Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th class="column-spacer"></th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td class="table-image"><a href="#"><img width="70px"
                                        src="{{ asset('storage/' . $item->image) }}" alt="product"
                                        class="img-responsive cart-image"></a></td>
                            <td><a href="#">{{ $item->name }}</a></td>
                            <td>
                                <select class="quantity" data-id="{{ $item->rowId }}">
                                    <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
                                    <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
                                    <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
                                    <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
                                    <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
                                </select>
                            </td>
                            <td>${{ $item->price }}</td>
                            <td class=""></td>
                            <td>
                                <form class="" action="{{ route('cart.delete',[$item->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"class="btn btn-danger" name="button">Delete</button>
                                </form>

                                <form action="{{ url('switchToWishlist', [$item->rowId]) }}" method="POST"
                                    class="side-by-side">
                                    {!! csrf_field() !!}
                                    <input type="submit" class="btn btn-success btn-sm" value="To Wishlist">
                                </form>
                            </td>
                        </tr>

                    @endforeach


                </tbody>
            </table>

            <a href="{{ url('/home') }}" class="btn btn-primary btn-lg">Continue Shopping</a> &nbsp;
            <a onclick="alert('Your Balance is $')" class="btn btn-success btn-lg">Proceed to Checkout</a>

            <div style="float:right">
                <form action="{{ url('/emptyCart') }}" method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger btn-lg" value="Empty Cart">
                </form>
            </div>

        @else

            <h3>You have no items in your shopping cart</h3>
            <a href="{{ url('/shop') }}" class="btn btn-primary btn-lg">Continue Shopping</a>

        @endif

        <div class="spacer"></div>

    </div> <!-- end container -->

@endsection

@section('extra-js')
    <script>
        (function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.quantity').on('change', function() {
                var id = $(this).attr('data-id')
                $.ajax({
                    type: "PATCH",
                    url: '{{ url(' / cart ') }}' + '/' + id,
                    data: {
                        'quantity': this.value,
                    },
                    success: function(data) {
                        window.location.href = '{{ url(' / cart ') }}';
                    }
                });

            });

        })();

    </script>
@endsection

