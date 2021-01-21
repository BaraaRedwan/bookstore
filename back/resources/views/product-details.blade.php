@extends('layouts.home')

@section('content')


<div class="container-fluid" id="books">
    <div class="row">
        <div class="col-xs-12 text-center" id="heading">
            <h2 style="color:palevioletred;text-transform:uppercase;margin-bottom:0px;"> {{$product->name}} </h2>
        </div>
    </div>
    <div class="row">

        <a href="description">
            <div class="a col-sm-6 col-md-3 col-lg-3 text-center">
                <div class="book-block" style="border :3px solid palevioletred;height: 260px">
                    <img  class="container book img-responsive" src="{{ asset('storage/' . $product->image) }}">
                    <span style="text-decoration:line-through;color:palevioletred"> </span>
                    <span class="label" style="color: palevioletred;">DisAccount</span>
                </div>
            </div>
        </a>
        <div class="col-sm-6 col-md-5 col-lg-5">
            <div class="book-block" style="border :3px solid palevioletred;height: 260px">
                <h1>{{$product->name}}

                </h1>
                <h3>Description</h3>
                <h4>{{ $product->description }}</h4>
                <h3>Reader Review</h3>
                <span class="glyphicon glyphicon-star star color-complement-2"></span>
                <span class="glyphicon glyphicon-star star color-complement-2"></span>
                <span class="glyphicon glyphicon-star star color-complement-2"></span>
                <span class="glyphicon glyphicon-star star color-complement-2"></span>
                <span class="glyphicon glyphicon-star star color-complement-2"></span>
            </div>
        </div>


        <div class="col-sm-6 col-md-5 col-lg-4" style="text-align: center;back">
            <div class="book-block" style="border :3px solid palevioletred;height: 260px">
                <h3 style="color: red">Buy it Now</h3>
                <h3 class="text-muted" hidden> Out Stock</h3>
                <h3>${{$product->price}} <span class="smaller text-muted">USD</span></h3>
                <h5>May Ship Separately</h5>
                <a href="{{route('cart.store')}}" role="button"class="btn btn-lg btn-block btn-success invert white bd-white bg-color-secondary-2-0">Add to Cart</a>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
