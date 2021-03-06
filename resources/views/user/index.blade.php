@extends('user.layout.master')
@section('content')

<!-- ****** Welcome Slides Area Start ****** -->
<section class="welcome_area">
    <div class="welcome_slides owl-carousel">

        <!-- Single Slide Start -->
        @foreach($banners as $banner)
        <div class="single_slide height-800 bg-img background-overlay" style="background-image: url( {{ asset('img/banner') }}/{{$banner->photo}} );">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="welcome_slide_text">
                            <h6 data-animation="bounceInDown" data-delay="0" data-duration="500ms">* Only today we offer free shipping</h6>
                            <h2 data-animation="fadeInUp" data-delay="500ms" data-duration="500ms">{{ $banner->headline }}</h2>
                            <a href="{{ url('product') }}" class="btn karl-btn" data-animation="fadeInUp" data-delay="1s" data-duration="500ms">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</section>
<!-- ****** Welcome Slides Area End ****** -->

<!-- ****** Quick View Modal Area Start ****** -->
<div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

            <div class="modal-body">
                <div class="quickview_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-5">
                                <div class="quickview_pro_img">
                                    <img src="{{ asset('assets/user/img/product-img/product-1.jpg') }}" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="quickview_pro_des">
                                    <h4 class="title">Name Product</h4>
                                    
                                    <h5 class="price">Rp139.900</h5>
                                    <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium eligendi, in fugiat?</p>
                                </div>

                                <a href="" name="addtocart" class="cart-submit">Contact Me</a>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ****** Quick View Modal Area End ****** -->

<!-- ****** New Arrivals Area Start ****** -->
<section class="new_arrivals_area section_padding_100_0 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading text-center">
                    <h2>New Arrivals</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="karl-projects-menu mb-100">
        <div class="text-center portfolio-menu">
            <button class="btn active" data-filter="*">ALL</button>
            <button class="btn" data-filter=".women">WOMAN</button>
            <button class="btn" data-filter=".man">MAN</button>
            <button class="btn" data-filter=".access">ACCESSORIES</button>
            <button class="btn" data-filter=".shoes">shoes</button>
            <button class="btn" data-filter=".kids">KIDS</button>
        </div>
    </div> -->

    <div class="container">
        <div class="row karl-new-arrivals">

            <!-- Single gallery Item Start -->
            @foreach($products as $product)
            <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                <!-- Product Image -->
                <div class="product-img">
                @foreach($product->images as $image)
                    @if($loop->first)
                        <img src="{{ asset('img/product/') }}/{{ $image->name }}" alt="">
                    @endif
                @endforeach
                    <div class="product-quicview">
                        <a href="{{ url('product/detail/'.$product->name) }}"><i class="ti-plus"></i></a>
                    </div>
                </div>
                <!-- Product Description -->
                <div class="product-description">
                    <h4 class="product-price">Rp @currency($product->price)</h4>
                    <p>{{ $product->name }}</p>
                    <!-- Add to Cart -->
                    <a href="{{ url('product/detail/'.$product->name) }}" class="add-to-cart-btn">Detail</a>
                </div>
            </div>

            @endforeach
            
        </div>
    </div>
</section>
<!-- ****** New Arrivals Area End ****** -->

@endsection