@extends('user_template.layouts.user_profile_template')
@section('profilecontent')
<h1>Pending orders</h1>
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<div class="table-responsive">
    <table class="table">
        <tr>
            <th>Product Id</th>
            <th>Price</th>
        </tr>
        @foreach ($pending_orders as $order)
        <tr>
            <td>
                {{$order->product_id}}
            </td>
            <td>
                {{$order->total_price}}
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
