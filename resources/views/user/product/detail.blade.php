@extends('user.layout.master')
@section('content')

<div class="breadcumb_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ol class="breadcrumb d-flex align-items-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/product') }}">Product</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
                <!-- btn -->
                <a href="{{ url()->previous() }}" class="backToHome d-block"><i class="fa fa-angle-double-left"></i> Back </a>
            </div>
        </div>
    </div>
</div>

<section class="single_product_details_area section_padding_0_100">
    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                        @foreach($product as $p)
                            @foreach($p->images as $img)
                            <li class="{{ $loop->first ? 'active' : '' }}" data-target="#product_details_slider" data-slide-to="{{ $loop->iteration - 1 }}" style="background-image: url({{ asset('img/product/'.$img->name) }});">
                            </li>
                            @endforeach
                        @endforeach    
                        </ol>

                        <div class="carousel-inner">
                        @foreach($product as $p)
                            @foreach($p->images as $img)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                <a class="gallery_img" href="{{ asset('img/product/'.$img->name) }}">
                                    <img class="d-block w-100" src="{{ asset('img/product/'.$img->name) }}" alt="First slide">
                                </a>
                            </div>
                            @endforeach
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6">
                <div class="single_product_desc">
                @foreach($product as $p)
                    <h4 class="title"><a href="#">{{ $p->name }}</a></h4>

                    <h4 class="price">Rp @currency($p->price)</h4>

                    <p class="available">Available: <span class="text-muted">In Stock</span></p>

                    <!-- Add to Cart Form -->
                    <form class="cart clearfix mb-50 d-flex" method="post">

                        <a href="" name="addtocart" class="btn cart-submit d-block">Contact Me</a>
                    </form>

                    <div id="accordion" role="tablist">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h6 class="mb-0">
                                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Description</a>
                                </h6>
                            </div>

                            <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <p>
                                        {{ $p->desc }}
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection