@extends('user.layout.master')
@section('content')

<section class="shop_grid_area section_padding_100">
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
                                        <a href="#">All</a>
                                    </li>
                                    
                                    <!-- Single Item -->
                                    @foreach($categories as $category)
                                    <li data-toggle="collapse" data-target="#{{ $category->id }}" class="collapsed">
                                        <a href="#">{{ $category->name }}</a>
                                        <ul class="sub-menu collapse" id="{{ $category->id }}">
                                            
                                            @foreach($subcategories as $subcategory)
                                                @if($subcategory->category_id == $category->id)
                                                <li><a href="#">{{ $subcategory->name }}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
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
                    <div class="row">

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.2s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-1.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.3s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-2.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.4s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-3.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.5s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-4.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.6s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-5.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.7s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-6.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.8s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-7.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="0.9s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-8.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>

                        <!-- Single gallery Item -->
                        <div class="col-12 col-sm-6 col-lg-4 single_gallery_item wow fadeInUpBig" data-wow-delay="1s">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product-9.jpg" alt="">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
                                </div>
                            </div>
                            <!-- Product Description -->
                            <div class="product-description">
                                <h4 class="product-price">$39.90</h4>
                                <p>Jeans midi cocktail dress</p>
                                <!-- Add to Cart -->
                                <a href="#" class="add-to-cart-btn">ADD TO CART</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="shop_pagination_area wow fadeInUp" data-wow-delay="1.1s">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection