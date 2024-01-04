@extends('user_template.layouts.template')
@section('main-content')
<h2>checkout page</h2>
<div class="checkout_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 col-lg-5 ml-lg-auto">
                <div class="order-details-confirmation">
                    <div class="cart-page-heading">
                        <h5>Product Will Send At-</h5>
                    </div>

                    <ul class="order-details-form mb-4">
                        <li><span>Name</span> <span>{{$shipping_address->name}}</span></li>
                        <li><span>Address</span> <span>{{$shipping_address->street_address}}</span></li>
                        <li><span>Postcode</span> <span>{{$shipping_address->postcode}}</span></li>
                        <li><span>Town/City</span> <span>{{$shipping_address->city}}</span></li>
                        <li><span>Phone No</span> <span>{{$shipping_address->phone_number}}</span></li>
                        <li><span>Email Address</span> <span>{{$shipping_address->email_address}}</span></li>
                    </ul>
                </div>
            </div>
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">
                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>cash on delievery</p>
                        </div>
                    <table class="table">
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart_item as $item)
                        <tr>
                            @php
                                $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                            @endphp
                            <td>{{$product_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price}}</td>
                        </tr>
                        @php
                            $total = $total + $item->price;
                        @endphp
                        @endforeach
                        @if ($total >0)
                        <tr>
                            <td></td>
                            <td>Total</td>
                            <td>{{$total}}</td>
                        </tr>
                        @endif
                    </table>
                    <div class="d-grid gap-2 d-md-block">
                        <form  action="" method="POST">
                            @csrf
                            <a href="#" class="btn btn-primary">Place Order</a>
                        </form>
                        <form action="" method="POST">
                            @csrf
                            <a href="#" class="btn btn-danger">Cancel Order</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
