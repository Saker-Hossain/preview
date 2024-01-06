@extends('admin.layouts.template')
@section('page_title')
Pendig Orders
@endsection
@section('content')
<div class="container my-5">
    <div class="card p-4">
        <div class="card-title">
            <h2 class="text-center">Pendig Orders</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>User Id</th>
                    <th>Shipping Information</th>
                    <th>Product Id</th>
                    <th>Quantity</th>
                    <th>Total Will Pay</th>
                    <th>Action</th>
                </tr>
                    @foreach ($pending_orders as $order)
                        <tr>
                            <td>{{$order->userid}}</td>
                            <td>
                                <ul>
                                    <li>Name - {{$order->shipping_name}}</li>
                                    <li>Address - {{$order->shipping_address}}</li>
                                    <li>Postal Code - {{$order->shipping_postCode}}</li>
                                    <li>City/Town - {{$order->shipping_city}}</li>
                                    <li>Phone Number - {{$order->shipping_phoneNumber}}</li>
                                    <li>Email - {{$order->shipping_emailAddress}}</li>
                                </ul>
                            </td>
                            <td>{{$order->product_id}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->total_price}}</td>
                            <td>
                                <a href="{{ route('confirmorder', ['order' => $order->id]) }}" class="btn btn-success">Confirm Order</a>
                            </td>
                        </tr>
                    @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
