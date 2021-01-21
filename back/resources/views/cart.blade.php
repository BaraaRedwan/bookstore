@extends('layouts.home')

@section('content')

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
