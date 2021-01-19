@extends('layouts.home')

@section('content')



<div class="container-fluid" id="header">
    <div class="row">
        <div class="col-md-3 col-lg-3" id="category">
            <div style="background:palevioletred;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop </div>
            <ul>
                @foreach($catigories as $catigory)
                <li> <a href="{{route('categories.index', $catigory->id)}}"> {{$catigory->name}} </a> </li>
                @endforeach
            </ul>
        </div>
        <script>
            $('.carousel').carousel()
        </script>

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
                        @foreach($slider_products as $product)
                        <img class="img-responsive" src="{{ asset('storage/' . $product->image) }}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3" id="offer">
            <a href=""> <img class="img-responsive center-block" src="{{asset('img/offers/1.png')}}"></a>
            <a href=""> <img class="img-responsive center-block" src="{{asset('img/offers/2.png')}}"></a>
            <a href=""> <img class="img-responsive center-block" src="{{asset('img/offers/3.png')}}"></a>
        </div>
    </div>
</div>
<div class="container-fluid text-center" id="new">
    <div class="row">
    @foreach($new_arrivals as $product)
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="{{route('products.index', $product->id)}}">
                <div class="book-block">
                    <div class="tag">New</div>
                    <div class="tag-side"><img src="{{asset('img/tag.png')}}"></div>
                    <img class="book block-center img-responsive" src="{{asset('storage/' . $product->image)}}">
                    <hr>
                    {{$product->name}} <br>
                    $ {{$product->price}} &nbsp
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>

<div class="container-fluid" id="author">
    <h3 class="text-center" style="color:palevioletred;"> Who Owns this Store </h3>
    <div class="row">
        <div class="col-sm-5 col-md-3 col-lg-3">
            <a href=""><img class="img-author img-responsive center-block" src="{{asset('img/popular-author/1.jpg')}}"></a>
            <h4 class="name-author">Noor M. Albardawil</h4>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href=""><img class="img-author img-responsive center-block" src="{{asset('img/popular-author/2.jpg')}}"></a>
            <h4 class="name-author">Aya K. Omar</h4>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href=""><img class="img-author img-responsive center-block" src="{{asset('img/popular-author/3.jpg')}}"></a>
            <h4 class="name-author">Baraa SH. Redwan</h4>
        </div>
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href=""><img class="img-author img-responsive center-block" src="{{asset('img/popular-author/4.jpg')}}"></a>
            <h4 class="name-author">Mai Y. Allhaam</h4>
        </div>
    </div>

</div>
@endsection
