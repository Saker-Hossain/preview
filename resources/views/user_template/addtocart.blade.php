@extends('user_template.layouts.template')
@section('main-content')
<h2>Add to Cart page</h2>
@if (session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif

<div class="row">
    <div class="col-12">
        <div class="box-main">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>Product Image</th>
                        <th>Product Name</th>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>

                    </tr>
                    @foreach ($cart_item as $item)
                    <tr>
                        @php
                            $product_name = App\Models\Product::where('id',$item->product_id)->value('product_name');
                            $img = App\Models\Product::where('id',$item->product_id)->value('product_img');
                        @endphp
                        <td><img src="{{asset($img)}}" style="height: 50px"></td>
                        <td>{{$product_name}}</td>
                        <td>{{$item->size}}</td>
                        <td>{{$item->color}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->price}}</td>
                        <td><a href="" class="btn btn-danger">Remove</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
