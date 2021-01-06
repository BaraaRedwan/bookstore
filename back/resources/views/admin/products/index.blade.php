@extends('layouts.admin')

@section('title', 'Products')

@section('main')
<header class="d-flex flex-wrap mt-3 mb-5">
    <h1 class="mr-auto">Products</h1>
</header>
<div>
    <a class="btn btn-outline-primary btn-sm" href="{{ route('products.create') }}">Add Product</a>
</div>

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
            <th>Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp
        @forelse($products as $product)
        <tr @if($product->deleted_at) class="text-danger" style="text-decoration: line-through" @endif>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->id }}</td>
            <td><img src="{{ asset('storage/' . $product->image) }}" width="60"></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <a href="{{ route('products.edit', [$product->id]) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                @if ($product->deleted_at)
                <form method="post" action="{{ route('products.restore', [$product->id]) }}" class="form-inline d-inline">
                    @csrf
                    @method('post')
                    <button type="submit" class="btn btn-outline-success btn-sm">Restore</button>
                </form>
                <form method="post" action="{{ route('products.forceDelete', [$product->id]) }}" class="form-inline d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete from Trash</button>
                </form>
                @else
                <form method="post" action="{{ route('products.destroy', [$product->id]) }}" class="form-inline d-inline">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No products found!</td>
        </tr>
        @endforelse
    </tbody>
</table>

@if (method_exists($products, 'links'))
{{ $products->links() }}
@endif

<form method="get" action="{{ route('products.index') }}" class="form-inline">
    <label class="mr-1">Items Per Page:</label>
    <select name="perpage" class="form-control form-control-sm">
        <option value="all">All</option>
        <option value="1">1</option>
        <option value="5">5</option>
        <option value="10">10</option>
    </select>
    <button type="submit" class="btn btn-sm btn-outline-dark ml-1">Apply</button>
</form>

@endsection