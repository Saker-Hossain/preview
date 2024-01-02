@extends('user_template.layouts.template')
@section('main-content')
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>{{$category->category_name}} - ({{$category->product_count}})</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->

                    @foreach ($products as $product)
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
                                    <form action="{{route('addproducttocart'}}" method="post">
                                        @csrf
                                        <div class="form_group">
                                            <input type="hidden" value="{{$product->id}}" name="product_id">
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
@endsection
