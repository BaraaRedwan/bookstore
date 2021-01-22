@extends('layouts.home')

@section('content')
<div class="container-fluid" id="header">
    <div class="row">
        <div class="col-md-3 col-lg-3" id="category">
            <div style="background:palevioletred;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop
            </div>
            <ul>
                @foreach ($catigories as $catigory)
                <li> <a href="{{ route('Categoryshow', $catigory->id) }}"> {{ $catigory->name }} </a> </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-6 col-lg-6">
            <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="myCarousel" data-slide-to="1"></li>
                    <li data-target="myCarousel" data-slide-to="2"></li>
                    <li data-target="myCarousel" data-slide-to="3"></li>
                    <li data-target="myCarousel" data-slide-to="4"></li>
                    <li data-target="myCarousel" data-slide-to="5"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img class="img-responsive" style="height: 300px" src="{{ asset('img/logo.jpg') }}">
                    </div>
                    @foreach ($slider_products as $product)
                    <div class="item">

                        <img class="img-responsive" style="height: 300px;width:600px" src="{{ asset('storage/' . $product->image) }}">

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3" id="offer">
            <a href=""> <img class="img-responsive center-block" src="{{ asset('img/offers/1.png') }}"></a>
            <a href=""> <img class="img-responsive center-block" src="{{ asset('img/offers/2.png') }}"></a>
            <a href=""> <img class="img-responsive center-block" src="{{ asset('img/offers/3.png') }}"></a>
        </div>
    </div>
</div>

<div class="container-fluid text-center" id="new">
    <div class="row" style="height: 350px">
        @foreach ($new_arrivals as $product)
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="{{ route('Productshow', $product->id) }}">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="{{ asset('img/tag.png') }}"></div>
                    <img style="height: 250px" class="book block-center img-responsive" src="{{ asset('storage/' . $product->image) }}">
                    <hr>
                    {{ $product->name }} <br>
                    $ {{ $product->price }} &nbsp
                </div>
            </a>
        </div>
        @endforeach
    </div>

</div>

@endsection