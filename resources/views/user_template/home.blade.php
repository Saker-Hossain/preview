@extends('user_template.layouts.template')
@section('main-content')
<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>All Products</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->

                    @foreach ($allproducts as $product)
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{asset($product->product_img)}}" alt="">
                            <!-- Hover Thumb -->
                            {{-- <img class="hover-img" src="{{asset('home/img/product-img/product-2.jpg')}}" alt="">
                            --}}
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <div class="product-description">
                            <a href="{{route('singleproduct', [$product->id, $product->slug])}}" style="color: RED">see
                                more</a>
                            <a href="single-product-details.html">
                                <h6>{{$product->product_name}}</h6>
                            </a>
                            <p class="product-price">${{$product->price}}</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <form action="{{route('addproducttocart')}}" method="post">
                                        @csrf
                                        <div class="form_group">
                                            <input type="hidden" value="{{$product->id}}" name="product_id">
                                            <input type="hidden" value="{{$product->price}}" name="price">
                                            <input type="hidden" value="1" name="quantity">
                                        </div>
                                        <input class="btn essence-btn" type="submit" value="Buy Now">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('home/img/core-img/brand1.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('home/img/core-img/brand2.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('home/img/core-img/brand3.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('home/img/core-img/brand4.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('home/img/core-img/brand5.png')}}" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="{{asset('home/img/core-img/brand6.png')}}" alt="">
    </div>
</div>
<!-- ##### Brands Area End ##### -->

@endsection
