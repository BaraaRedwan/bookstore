@extends('layouts.home')

@section('content')

<div class="container-fluid text-center" id="new">
    <h1 style="color:palevioletred">  {{$catigory->name}}</h1>
    <div class="row">
        @foreach($products as $product)
        <div  class="col-sm-6 col-md-3 col-lg-3">
         <a href="{{route('Productshow', $product->id)}}">
            <div class="book-block">
                <div class="tag">New</div>
                <div class="tag-side"><img  src="{{asset('img/tag.png')}}"></div>
                <img style="height: 250px;width:250px" class="book block-center img-responsive" src="{{asset('storage/' . $product->image)}}">
                <hr>
                {{$product->name}} <br>
                $ {{$product->price}}  &nbsp
                <span style="text-decoration:line-through;color:#828282;"> 175 </span>
                <span class="label label-warning">35%</span>
            </div>
          </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
