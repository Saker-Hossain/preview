@extends('user_template.layouts.template')
@section('main-content')
<section class="single_product_details_area d-flex align-items-center">

    <!-- Single Product Thumb -->
    <div class="single_product_thumb clearfix">
        <div class="product_thumbnail_slides owl-carousel">
            <img src="{{asset($product->product_img)}}" alt="">
            <img src="{{asset($product->product_img)}}" alt="">
            <img src="{{asset($product->product_img)}}" alt="">
        </div>
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        <span>{{$product->product_category_name}}->{{$product->product_subcategory_name}}</span>
        <a href="cart.html">
            <h2>{{$product->product_name}}</h2>
        </a>
        <p class="product-price"><span class="old-price">$65.00</span> ${{$product->price}}</p>
        <p class="product-desc">{{$product->product_long_des}}</p>

        <span style="color: #989898">Available Quantity {{$product->quantity}}</span>
        <!-- Form -->
        {{-- <form class="cart-form clearfix" method="post">
            <!-- Select Box -->
            <div class="select-box d-flex mt-50 mb-30">
                <select name="select" id="productSize" class="mr-5">
                    <option value="value">Size: XL</option>
                    <option value="value">Size: X</option>
                    <option value="value">Size: M</option>
                    <option value="value">Size: S</option>
                </select>
                <select name="select" id="productColor">
                    <option value="value">Color: Black</option>
                    <option value="value">Color: White</option>
                    <option value="value">Color: Red</option>
                    <option value="value">Color: Purple</option>
                </select>
            </div> --}}
            <!-- Cart & Favourite Box -->
            <div class="cart-fav-box d-flex align-items-center">
                <!-- Cart -->
                <form action="{{route('addproducttocart')}}" method="post">
                    @csrf
                    <div class="form_group">
                        <input type="hidden" value="{{$product->id}}" name="product_id">
                        <input type="hidden" value="{{$product->price}}" name="price">
                        {{-- <div class="select-box d-flex mt-50 mb-30">
                            <select name="select" id="productSize" class="mr-5">
                                <option value="value">Size: XL</option>
                                <option value="value">Size: X</option>
                                <option value="value">Size: M</option>
                                <option value="value">Size: S</option>
                            </select>
                            <select name="select" id="productColor">
                                <option value="value">Color: Black</option>
                                <option value="value">Color: White</option>
                                <option value="value">Color: Red</option>
                                <option value="value">Color: Purple</option>
                            </select>
                        </div> --}}
                        <label for="quantity">How many piece?</label>
                        <input class="" type="number" min="1" placeholder="1" name="quantity">
                        <input type="hidden" value="M" name="size">
                        <input type="hidden" value="Black" name="color">
                    </div>

                    <input class="btn essence-btn" type="submit" value="Add To Cart">
                </form>
                {{-- <button type="submit" name="addtocart" value="5" class="btn essence-btn">Add to cart</button> --}}
                <!-- Favourite -->
                {{-- <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div> --}}
            </div>
        </form>
    </div>
</section>
<div class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    @foreach ($related_products as $product)
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
                                {{-- <span>topshop</span> --}}
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
                                                <input type="hidden" value="M" name="size">
                                                <input type="hidden" value="Black" name="color">
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
@endsection
