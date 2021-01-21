@extends('layouts.admin')

@section('title', 'Orders')

@section('main')
<header class="d-flex flex-wrap mt-3 mb-5">
    <h1 class="mr-auto">Orders</h1>
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
            <th>User ID</th>
            <th>User name</th>
            <th>Status</th>
            <th>Tax</th>
            <th>discount</th>
            <th>date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $i = 1 @endphp
        @forelse($orders as $order)
        <tr @if($order->deleted_at) class="text-danger" style="text-decoration: line-through" @endif>
            <td>{{ $loop->iteration }}</td>
            <td>
                <a class="btn btn-outline-primary btn-sm" href="{{ route('orders.show' , $order->id) }}">{{ $order->id }}</a>
            </td>
            <td>{{ $order->user_id }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->tax }}</td>
            <td>{{ $order->discount }}</td>
            <td>{{ $order->created_at }}</td>
            <td>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">No orders found!</td>
        </tr>
        @endforelse
    </tbody>
</table>



@endsection