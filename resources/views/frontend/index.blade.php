@extends('layouts.frontendtemplate')
@section('content')
    <!--Body Content-->
    <div id="page-content">
    	<!--Home slider-->
    	<div class="slideshow slideshow-wrapper pb-section">
        	<div class="home-slideshow">
            	<div class="slide">
                	<div class="blur-up lazyload">
                        <img class="blur-up lazyload" data-src="{{ asset('assets/images/slideshow-banners/home2-default-banner1.jpg') }}" src="assets/images/slideshow-banners/home2-default-banner1.jpg" alt="Shop Our New Collection" title="Shop Our New Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic middle">
                            <div class="slideshow__text-content middle">
                            	<div class="container">
                                    <div class="wrap-caption right">
                                        <h2 class="h1 mega-title slideshow__title">Our New Collection</h2>
                                        <span class="mega-subtitle slideshow__subtitle">Save up to 50% Off</span>
                                        <span class="btn">Shop now</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide">
                	<div class="blur-up lazyload">
                        <img class="blur-up lazyload" data-src="{{ asset('assets/images/slideshow-banners/home2-default-banner2.jpg') }}" src="assets/images/slideshow-banners/home2-default-banner2.jpg" alt="Summer Bikini Collection" title="Summer Bikini Collection" />
                        <div class="slideshow__text-wrap slideshow__overlay classic middle">
                            <div class="slideshow__text-content middle">
                            	<div class="container">
                                    <div class="wrap-caption center">
                                        <h2 class="h1 mega-title slideshow__title">Fashion &amp; Show</h2>
                                        <span class="mega-subtitle slideshow__subtitle">A World Fashion and Trendy Fashion Clother's</span>
                                        <span class="btn">Shop now</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Home slider-->
        
        <!--Weekly Bestseller-->
        <div class="section">
        	<div class="container-fluid">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">New Arrivals</h2>
                            <p>Our most popular products based on sales</p>
                        </div>
						<div class="productSlider grid-products">
                            @foreach($items as $item)
                            <div class="col-12 item">
                                <!-- start product image -->
                                <div class="product-image">
                                    <!-- start product image -->
                                    <a href="{{route('detail',$item->id)}}" class="grid-view-item__link">
                                        <!-- image -->
                                        <img class="primary blur-up lazyload" data-src="{{ asset('storage/'.$item->photo) }}" src="" alt="image" title="product">
                                        <!-- End image -->
                                        <!-- Hover image -->
                                        <img class="hover blur-up lazyload" data-src="{{ asset('storage/'.$item->photo) }}" src="" alt="image" title="product">
                                        <!-- End hover image -->
                                        <!-- Variant Image-->
                                        {{-- <img class="grid-view-item__image hover variantImg" src="{{ asset('assets/images/product-images/product-image1.jpg') }}" alt="image" title="product"> --}}
                                        <!-- Variant Image-->
                                        <!-- product label -->
                                        <div class="product-labels rounded"><span class="lbl pr-label1">new</span></div>
                                        <!-- End product label -->
                                    </a>
                                    <!-- end product image -->
                                    
                                    <!-- countdown start -->
                                    {{-- <div class="saleTime desktop" data-countdown="2022/03/01"></div> --}}
                                    <!-- countdown end -->

                                    <!-- Start product button -->
                                    <form class="variants add" action="#" method="post">
                                        <button class="btn btn-addto-cart addtocartBtn" type="button" tabindex="0" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" 
                                            data-discount="{{$item->discount}}" data-photo="{{$item->photo}}" data-codeno="{{$item->codeno}}">Add To Cart</button>
                                    </form>
                                    <div class="button-set">
                                        <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                            <i class="icon anm anm-search-plus-r"></i>
                                        </a>
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                <i class="icon anm anm-heart-l"></i>
                                            </a>
                                        </div>
                                        <div class="compare-btn">
                                            <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                <i class="icon anm anm-random-r"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- end product button -->
                                </div>
                                <!-- end product image -->
                                <!--start product details -->
                                <div class="product-details text-center">
                                    <!-- product name -->
                                    <div class="product-name">
                                        <a href="product-layout-1.html">{{$item->name}}</a>
                                    </div>
                                    <!-- End product name -->
                                    <!-- product price -->
                                    <div class="product-price">
                                        @if($item->discount)
                                        <span class="old-price">${{$item->price}}</span>
                                        <span class="price">${{$item->discount}}</span>
                                        @else
                                        <span class="price">${{$item->price}}</span>
                                        @endif
                                    </div>
                                    <!-- End product price -->
                                    <!-- Color Variant -->
                                    {{-- <ul class="swatches">
                                        <li class="swatch small rounded navy" rel="{{ asset('assets/images/product-images/product-image-stw1.jpg') }}"></li>
                                        <li class="swatch small rounded green" rel="{{ asset('assets/images/product-images/product-image-stw1-1.jpg') }}"></li>
                                        <li class="swatch small rounded gray" rel="{{ asset('assets/images/product-images/product-image-stw1-2.jpg') }}"></li>
                                        <li class="swatch small rounded aqua" rel="assets/images/product-images/product-image-stw1-3.jpg"></li>
                                        <li class="swatch small rounded orange" rel="assets/images/product-images/product-image-stw1-4.jpg"></li>
                                    </ul> --}}
                                    <div class="product-review">
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star"></i>
                                        <i class="font-13 fa fa-star-o"></i>
                                        <i class="font-13 fa fa-star-o"></i>
                                    </div>
                                    <!-- End Variant -->
                                </div>
                                <!-- End product details -->
                            </div>
                            @endforeach
                        </div>
                    </div>
            	</div>    
            </div>
        </div>
        <!--Weekly Bestseller-->
        <!--Parallax Section-->
        {{-- <div class="section">
            <div class="hero hero--large hero__overlay bg-size">
            	<img class="bg-img" src="assets/images/parallax-banners/parallax-banner.jpg" alt="" />
                <div class="hero__inner">
                    <div class="container">
                        <div class="wrap-text left text-small font-bold">
                            <h2 class="h2 mega-title">Belle <br> The best choice for your store</h2>
                            <div class="rte-setting mega-subtitle">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</div>
                            <a href="#" class="btn">Purchase Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!--End Parallax Section-->

        <!--Collection Box slider-->
        <div class="collection-box section">
        	<div class="container-fluid">
				<div class="collection-grid">
                    @foreach($categories as $category)
                        <div class="collection-grid-item">
                            <a href="#" class="collection-grid-item__link">
                                <img data-src="{{asset('storage/'.$category->photo)}}" src="{{asset('storage/'.$category->photo)}}" alt="Fashion" height="250" class="blur-up lazyload"/>
                                <div class="collection-grid-item__title-wrapper">
                                    <h3 class="collection-grid-item__title btn btn--secondary no-border">{{$category->name}}</h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
            </div>
        </div>
        <!--End Collection Box slider-->

        <!--Collection Tab slider-->
        <div class="tab-slider-product section">
        	<div class="container-fluid">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="section-header text-center">
                            <h2 class="h2">Feature Products</h2>
                            <p>Browse the huge variety of our products</p>
                        </div>
                        <div class="tabs-listing">
                            <ul class="tabs clearfix">
                                <li class="active" rel="tab1">Top Seller</li>
                                <li rel="tab2">Discount Products</li>
                                <li rel="tab3">Flash Sale</li>
                            </ul>
                            <div class="tab_container">
                                <div id="tab1" class="tab_content grid-products">
                                    <div class="productSlider">
                                        @foreach ($bestseller_items as $bestseller)

                                            @foreach ($items as $bestseller_item)

                                                @if($bestseller_item->id == $bestseller->item_id)
                                                    <div class="col-12 item">
                                                        <!-- start product image -->
                                                        <div class="product-image">
                                                            <!-- start product image -->
                                                            <a href="{{route('detail',$bestseller_item->id)}}">
                                                                <!-- image -->
                                                                <img class="primary blur-up lazyload" data-src="{{asset('storage/'.$bestseller_item->photo)}}" src="{{asset('storage/'.$bestseller_item->photo)}}" alt="image" title="product">
                                                                <!-- End image -->
                                                                <!-- Hover image -->
                                                                <img class="hover blur-up lazyload" data-src="{{asset('storage/'.$bestseller_item->photo)}}" src="{{asset('storage/'.$bestseller_item->photo)}}" alt="image" title="product">
                                                                <!-- End hover image -->
                                                                <!-- product label -->
                                                                <div class="product-labels rectangular"><span class="lbl pr-label2">Hot</span></div>
                                                                <!-- End product label -->
                                                            </a>
                                                            <!-- end product image -->
                    
                                                            <!-- Start product button -->
                                                            <form class="variants add" action="#" method="">
                                                                <button class="btn btn-addto-cart addtocartBtn" type="button" tabindex="0" data-id="{{$bestseller_item->id}}" data-name="{{$bestseller_item->name}}" data-price="{{$bestseller_item->price}}" 
                                                                    data-discount="{{$bestseller_item->discount}}" data-photo="{{$bestseller_item->photo}}" data-codeno="{{$bestseller_item->codeno}}">Add To Cart</button>
                                                            </form>
                                                            <div class="button-set">
                                                                <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                                    <i class="icon anm anm-search-plus-r"></i>
                                                                </a>
                                                                <div class="wishlist-btn">
                                                                    <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                                        <i class="icon anm anm-heart-l"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="compare-btn">
                                                                    <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                                        <i class="icon anm anm-random-r"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <!-- end product button -->
                                                        </div>
                                                        <!-- end product image -->
                    
                                                        <!--start product details -->
                                                        <div class="product-details text-center">
                                                            <!-- product name -->
                                                            <div class="product-name">
                                                                <a href="short-description.html">{{$bestseller_item->name}}</a>
                                                            </div>
                                                            <!-- End product name -->
                                                            <!-- product price -->
                                                            <div class="product-price">
                                                                @if($bestseller_item->discount)
                                                                <span class="old-price">${{$bestseller_item->price}}</span>
                                                                <span class="price">${{$bestseller_item->discount}}</span>
                                                            @else
                                                                <span class="price">${{$bestseller_item->price}}</span>
                                                            @endif
                                                            </div>
                                                            <!-- End product price -->
                                                            
                                                            <div class="product-review">
                                                                <i class="font-13 fa fa-star"></i>
                                                                <i class="font-13 fa fa-star"></i>
                                                                <i class="font-13 fa fa-star"></i>
                                                                <i class="font-13 fa fa-star"></i>
                                                                <i class="font-13 fa fa-star-o"></i>
                                                            </div>
                                                            
                                                        </div>
                                                        <!-- End product details -->
                                                    </div>
                                                @endif

                                            @endforeach

                                        @endforeach
                                    </div>
                                </div>
                                <div id="tab2" class="tab_content grid-products">
                                    <div class="productSlider">
                                        @foreach($discountitems as $discountitem)
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="{{route('detail',$discountitem->id)}}">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload" data-src="{{asset('storage/'.$discountitem->photo)}}" src="{{asset('storage/'.$discountitem->photo)}}" alt="image" title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload" data-src="{{asset('storage/'.$discountitem->photo)}}" src="assets/images/product-images/product-image6-1.jpg" alt="image" title="product">
                                                    <!-- End hover image -->
                                                    <!-- product label -->
                                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span></div>
                                                    <!-- End product label -->
                                                </a>
                                                <!-- end product image -->
        
                                                <!-- Start product button -->
                                                <form class="variants add" action="#" method="">
                                                    <button class="btn btn-addto-cart addtocartBtn" type="button" tabindex="0" data-id="{{$discountitem->id}}" data-name="{{$discountitem->name}}" data-price="{{$discountitem->price}}" 
                                                        data-discount="{{$discountitem->discount}}" data-photo="{{$discountitem->photo}}" data-codeno="{{$discountitem->codeno}}">Add To Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->
        
                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">{{$discountitem->name}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    <span class="old-price">${{$discountitem->price}}</span>
                                                    <span class="price">${{$discountitem->discount}}</span>
                                                </div>
                                                <!-- End product price -->
                                                
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div id="tab3" class="tab_content grid-products">
                                    <div class="productSlider">
                                        @foreach ($fresh_items as $fresh_item)
                                        <div class="col-12 item">
                                            <!-- start product image -->
                                            <div class="product-image">
                                                <!-- start product image -->
                                                <a href="{{route('detail',$fresh_item->id)}}">
                                                    <!-- image -->
                                                    <img class="primary blur-up lazyload" data-src="{{asset('storage/'.$fresh_item->photo)}}" src="{{asset('storage/'.$fresh_item->photo)}}" alt="image" title="product">
                                                    <!-- End image -->
                                                    <!-- Hover image -->
                                                    <img class="hover blur-up lazyload" data-src="{{asset('storage/'.$fresh_item->photo)}}" src="{{asset('storage/'.$fresh_item->photo)}}" alt="image" title="product">
                                                    <!-- End hover image -->
                                                </a>
                                                <!-- end product image -->
        
                                                <!-- Start product button -->
                                                <form class="variants add" action="#" method="">
                                                    <button class="btn btn-addto-cart addtocartBtn" type="button" tabindex="0" data-id="{{$fresh_item->id}}" data-name="{{$fresh_item->name}}" data-price="{{$fresh_item->price}}" 
                                                        data-discount="{{$fresh_item->discount}}" data-photo="{{$fresh_item->photo}}" data-codeno="{{$fresh_item->codeno}}">Add To Cart</button>
                                                </form>
                                                <div class="button-set">
                                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                                    <div class="wishlist-btn">
                                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                                            <i class="icon anm anm-heart-l"></i>
                                                        </a>
                                                    </div>
                                                    <div class="compare-btn">
                                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                                            <i class="icon anm anm-random-r"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!-- end product button -->
                                            </div>
                                            <!-- end product image -->
        
                                            <!--start product details -->
                                            <div class="product-details text-center">
                                                <!-- product name -->
                                                <div class="product-name">
                                                    <a href="short-description.html">{{$fresh_item->name}}</a>
                                                </div>
                                                <!-- End product name -->
                                                <!-- product price -->
                                                <div class="product-price">
                                                    @if($fresh_item->discount)
                                                        <span class="old-price">${{$fresh_item->price}}</span>
                                                        <span class="price">${{$fresh_item->discount}}</span>
                                                    @else
                                                        <span class="price">${{$fresh_item->price}}</span>
                                                    @endif
                                                </div>
                                                <!-- End product price -->
                                                
                                                <div class="product-review">
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                    <i class="font-13 fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <!-- End product details -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            	</div>    
            </div>
        </div>
        <!--Collection Tab slider-->

        <!--New Arrivals-->
        {{-- <div class="product-rows section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
        				<div class="section-header text-center">
                            <h2 class="h2">New Arrivals</h2>
                            <p>Grab these new items before they are gone!</p>
                        </div>
            		</div>
                </div>
	            <div class="grid-products">
                	<div class="row">
                        <div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="product-layout-1.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image1.jpg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image1-1.jpg" src="assets/images/product-images/product-image1-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- Variant Image-->
                                    <img class="grid-view-item__image hover variantImg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product">
                                    <!-- Variant Image-->
                                    <!-- product label -->
                                    <div class="product-labels rounded"><span class="lbl on-sale">Sale</span> <span class="lbl pr-label1">new</span></div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->
                                
                                <!-- countdown start -->
                                <div class="saleTime desktop" data-countdown="2022/03/01"></div>
                                <!-- countdown end -->
    
                                <!-- Start product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                </form>
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- end product image -->
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-layout-1.html">Edna Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="old-price">$500.00</span>
                                    <span class="price">$600.00</span>
                                </div>
                                <!-- End product price -->
                                <!-- Color Variant -->
                                <ul class="swatches">
                                    <li class="swatch small rounded navy" rel="assets/images/product-images/product-image-stw1.jpg"></li>
                                    <li class="swatch small rounded green" rel="assets/images/product-images/product-image-stw1-1.jpg"></li>
                                    <li class="swatch small rounded gray" rel="assets/images/product-images/product-image-stw1-2.jpg"></li>
                                    <li class="swatch small rounded aqua" rel="assets/images/product-images/product-image-stw1-3.jpg"></li>
                                    <li class="swatch small rounded orange" rel="assets/images/product-images/product-image-stw1-4.jpg"></li>
                                </ul>
                                <!-- End Variant -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="product-layout-1.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image2.jpg" src="assets/images/product-images/product-image2.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image2-1.jpg" src="assets/images/product-images/product-image2-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- Variant Image-->
                                    <img class="grid-view-item__image hover variantImg" src="assets/images/product-images/product-image1.jpg" alt="image" title="product">
                                    <!-- Variant Image-->
                                </a>
                                <!-- end product image -->
    
                                <!-- Start product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Select Options</button>
                                </form>
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- end product image -->
    
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-layout-1.html">Elastic Waist Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">$748.00</span>
                                </div>
                                <!-- End product price -->
                                <!-- Color Variant -->
                                <ul class="swatches">
                                    <li class="swatch small rounded black" rel="assets/images/product-images/product-image2.jpg"></li>
                                    <li class="swatch small rounded navy" rel="assets/images/product-images/product-image-swt2.jpg"></li>
                                    <li class="swatch small rounded purple" rel="assets/images/product-images/product-image-swt2-1.jpg"></li>
                                    <li class="swatch small rounded teal" rel="assets/images/product-images/product-image-swt2-2.jpg"></li>
                                </ul>
                                <!-- End Variant -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                               <a href="product-layout-1.html" class="grid-view-item__link">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image3.jpg" src="assets/images/product-images/product-image3.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image3-1.jpg" src="assets/images/product-images/product-image3-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- Variant Image-->
                                    <img class="grid-view-item__image hover variantImg" src="assets/images/product-images/product-image3.jpg" alt="image" title="product">
                                    <!-- Variant Image-->
                                    <!-- product label -->
                                    <div class="product-labels rounded"><span class="lbl pr-label2">Hot</span></div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->
    
                                <!-- Start product button -->
                                <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                    <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                                </form>
                                <div class="button-set">
                                    <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                        <i class="icon anm anm-search-plus-r"></i>
                                    </a>
                                    <div class="wishlist-btn">
                                        <a class="wishlist add-to-wishlist" href="wishlist.html">
                                            <i class="icon anm anm-heart-l"></i>
                                        </a>
                                    </div>
                                    <div class="compare-btn">
                                        <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                            <i class="icon anm anm-random-r"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- end product button -->
                            </div>
                            <!-- end product image -->
    
                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="product-layout-1.html">3/4 Sleeve Kimono Dress</a>
                                </div>
                                <!-- End product name -->
                                <!-- product price -->
                                <div class="product-price">
                                    <span class="price">$550.00</span>
                                </div>
                                <!-- End product price -->
                                <!-- Color Variant -->
                                <ul class="swatches">
                                    <li class="swatch small rounded gray" rel="assets/images/product-images/product-image16.jpg"></li>
                                    <li class="swatch small rounded red" rel="assets/images/product-images/product-image5.jpg"></li>
                                    <li class="swatch small rounded orange" rel="assets/images/product-images/product-image5-1.jpg"></li>
                                    <li class="swatch small rounded yellow" rel="assets/images/product-images/product-image17.jpg"></li>
                                </ul>
                                <!-- End Variant -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-6 col-sm-2 col-md-3 col-lg-3 item">
                        <!-- start product image -->
                        <div class="product-image">
                            <!-- start product image -->
                            <a href="product-layout-1.html" class="grid-view-item__link">
                                <!-- image -->
                                <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image4.jpg" src="assets/images/product-images/product-image4.jpg" alt="image" title="product" />
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image4-1.jpg" src="assets/images/product-images/product-image4-1.jpg" alt="image" title="product" />
                                <!-- End hover image -->
                                <!-- Variant Image-->
                                <img class="grid-view-item__image hover variantImg" src="assets/images/product-images/product-image3.jpg" alt="image" title="product">
                                <!-- Variant Image-->
                                <!-- product label -->
                                <div class="product-labels rounded"><span class="lbl on-sale">Sale</span></div>
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->

                            <!-- Start product button -->
                            <form class="variants add" action="#" onclick="window.location.href='cart.html'"method="post">
                                <button class="btn btn-addto-cart" type="button" tabindex="0">Add To Cart</button>
                            </form>
                            <div class="button-set">
                                <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                    <i class="icon anm anm-search-plus-r"></i>
                                </a>
                                <div class="wishlist-btn">
                                    <a class="wishlist add-to-wishlist" href="wishlist.html">
                                        <i class="icon anm anm-heart-l"></i>
                                    </a>
                                </div>
                                <div class="compare-btn">
                                    <a class="compare add-to-compare" href="compare.html" title="Add to Compare">
                                        <i class="icon anm anm-random-r"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- end product button -->
                        </div>
                        <!-- end product image -->

                        <!--start product details -->
                        <div class="product-details text-center">
                            <!-- product name -->
                            <div class="product-name">
                                <a href="product-layout-1.html">Cape Dress</a>
                            </div>
                            <!-- End product name -->
                            <!-- product price -->
                            <div class="product-price">
                                <span class="old-price">$900.00</span>
                                <span class="price">$788.00</span>
                            </div>
                            <!-- End product price -->
                            <!-- Color Variant -->
                            <ul class="swatches">
                                <li class="swatch small rounded black" rel="assets/images/product-images/cape-dress-2.jpg"></li>
                                <li class="swatch small rounded maroon" rel="assets/images/product-images/product-image4-1.jpg"></li>
                                <li class="swatch small rounded navy" rel="assets/images/product-images/product-image2.jpg"></li>
                                <li class="swatch small rounded darkgreen" rel="assets/images/product-images/product-image2-1.jpg"></li>
                            </ul>
                            <!-- End Variant -->
                        </div>
                        <!-- End product details -->
                    </div>
                    
                    <div class="row text-center">
                    	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        	<a href="shop-left-sidebar.html" class="btn">View all</a>
                        </div>
                    </div>
                </div>
           </div>
        </div>	 --}}
        <!--End Featured Product-->
        
        <!--Logo Slider-->
        <div class="section logo-section">
        	<div class="container">
            	<div class="row">
                	<div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    	<div class="section-header text-center">
                        	<h2 class="h2">The Most Loved Brands</h2>
                    	</div>
                		<div class="logo-bar">
                            @foreach($brands as $brand)
                            <div class="logo-bar__item">
                                <img src="{{asset('storage/'.$brand->logo)}}" width="120" height="100" alt="" title="" />
                            </div>
                            @endforeach
                            
               			 </div>
                	</div>
                </div>
            </div>
        </div>
        <!--End Logo Slider-->
    </div>
    <!--End Body Content-->
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('frontend/custom.js') }}"></script>
@endsection