@extends('layouts.home')

@section('content')

<h1> {{$catigory->name}} </h1>

<div class="container-fluid" id="header">
    <div class="row">
        <div class="col-md-3 col-lg-3" id="category">
            <div style="background:palevioletred;color:#fff;font-weight:800;border:none;padding:15px;"> The Book Shop </div>
            <ul>
                @foreach($children as $catigory)
                <li> <a href="{{asset('#')}}"> {{$catigory->name}} </a> </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="container-fluid text-center" id="new">
    <div class="row">
    @foreach($products as $product)
        <div class="col-sm-6 col-md-3 col-lg-3">
            <a href="">
                <div class="book-block">
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