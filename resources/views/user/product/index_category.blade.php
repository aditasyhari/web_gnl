@extends('user.layout.master')
@section('content')

<section class="shop_grid_area mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">
                    
                    <div class="widget catagory mb-50">
                        <!--  Side Nav  -->
                        <div class="nav-side-menu">
                            <h6 class="mb-0">Catagories</h6>
                            <div class="menu-list">
                                <ul id="menu-content2" class="menu-content collapse out">
                                    <!-- Single Item -->
                                    <li>
                                        <a href="{{ url('product') }}">All</a>
                                    </li>
                                    
                                    <!-- Single Item -->
                                    @foreach($categories as $category)
                                    <li data-toggle="collapse" data-target="#{{ $category->id }}" class="collapsed">
                                        <a href="#">{{ $category->name }}</a>
                                        <ul class="sub-menu collapse" id="{{ $category->id }}">
                                            @foreach($subcategories as $subcategory)
                                                @if($subcategory->category_id == $category->id)
                                                <li><a href="{{ url('product/'.$subcategory->name) }}">{{ $subcategory->name }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @endforeach
                                    @foreach($singlecategories as $singlecategory)
                                    <li class="collapsed">
                                        <a href="{{ url('product/'.$singlecategory->name) }}">{{ $singlecategory->name }}</a>
                                    </li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <!-- <h4>All Product</h4> -->
                    @foreach($products as $category)
                        <h4 class="mb-5">{{ $category->name }}</h4>
                    @endforeach
                    <div class="row">
                        <!-- Single gallery Item -->
                        @foreach($products[0]->productphoto as $product)
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Product Image -->
                            <div class="product-img">
                            <!-- {{$product}} -->
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

                <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm">
                            <li class="page-item">{{ $products->links() }}</li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection