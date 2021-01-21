@extends('layouts.admin')

@section('title', 'Orders')

@section('main')
<header class="d-flex flex-wrap mt-3 mb-5">
    <h1 class="mr-auto">Order number {{$order->id}}</h1>
</header>


@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif


<table class="table table-striped table-sm">
    <thead>
        <tr>
        <th>#</th>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
           
            
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp
        @forelse($products as $product)
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->product->id }}</td>
            <td><img src="{{ asset('storage/' . $product->image) }}" width="60"></td>
            <td>{{ $product->product->name }}</td>
            <td>{{ $product->product->price }}</td>
            <td>{{ $product->product->category->name }}</td>
            
            
        </tr>
        @empty
        <tr>
            <td colspan="5">No products found!</td>
        </tr>
        @endforelse
    </tbody>
</table>



@endsection