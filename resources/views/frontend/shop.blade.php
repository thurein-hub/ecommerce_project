@extends('layouts.frontendtemplate')
@section('content')

<!--Body Content-->
<div id="page-content">
    <!--Collection Banner-->
    <div class="collection-header">
        <div class="collection-hero">
            <div class="collection-hero__image"><img class="blur-up lazyload" data-src="{{asset('assets/images/cat-women.jpg')}}" src="{{asset('assets/images/cat-women.jpg')}}" alt="Women" title="Women" /></div>
            <div class="collection-hero__title-wrapper">
                
                    <h1 class="collection-hero__title page-width">{{$cate_info->name}}<span class="px-3"><i class="fas fa-arrow-right"></i></span>{{$sub_info->name}}</h1>
                
                
            </div>
        </div>
    </div>
    <!--End Collection Banner-->
    
    <div class="container-fluid pt-5">
        <div class="row">
            <!--Sidebar-->
            <div class="col-12 col-sm-12 col-md-3 col-lg-3 sidebar filterbar">
                <div class="closeFilter d-block d-md-none d-lg-none"><i class="icon icon anm anm-times-l"></i></div>
                <div class="sidebar_tags">
                    <!--Categories-->
                    <div class="sidebar_widget categories filter-widget">
                        <div class="widget-title"><h2>Categories</h2></div>
                        <div class="widget-content">
                            <ul class="sidebar_categories">
                                @foreach($categories as $category)
                                    <li class="level1 sub-level"><a href="#;" class="site-nav">{{$category->name}}</a>
                                        <ul class="sublinks">
                                            @foreach($subcategories as $subcategory)
                                                @if($category->id == $subcategory->category_id)
                                                    <li class="level2"><a href="{{route('shop',$subcategory->id)}}" class="site-nav">{{$subcategory->name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--Categories-->
                    <!--Price Filter-->
                    {{-- <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title">
                            <h2>Price</h2>
                        </div>
                        <form action="#" method="post" class="price-filter">
                            <div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                                <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="no-margin"><input id="amount" type="text"></p>
                                </div>
                                <div class="col-6 text-right margin-25px-top">
                                    <button class="btn btn-secondary btn--small">filter</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                    <!--End Price Filter-->
                    <!--Size Swatches-->
                    {{-- <div class="sidebar_widget filterBox filter-widget size-swacthes">
                        <div class="widget-title"><h2>Size</h2></div>
                        <div class="filter-color swacth-list">
                            <ul>
                                <li><span class="swacth-btn checked">X</span></li>
                                <li><span class="swacth-btn">XL</span></li>
                                <li><span class="swacth-btn">XLL</span></li>
                                <li><span class="swacth-btn">M</span></li>
                                <li><span class="swacth-btn">L</span></li>
                                <li><span class="swacth-btn">S</span></li>
                                <li><span class="swacth-btn">XXXL</span></li>
                                <li><span class="swacth-btn">XXL</span></li>
                                <li><span class="swacth-btn">XS</span></span></li>
                            </ul>
                        </div>
                    </div> --}}
                    <!--End Size Swatches-->
                    <!--Color Swatches-->
                    {{-- <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title"><h2>Color</h2></div>
                        <div class="filter-color swacth-list clearfix">
                            <span class="swacth-btn black"></span>
                            <span class="swacth-btn white checked"></span>
                            <span class="swacth-btn red"></span>
                            <span class="swacth-btn blue"></span>
                            <span class="swacth-btn pink"></span>
                            <span class="swacth-btn gray"></span>
                            <span class="swacth-btn green"></span>
                            <span class="swacth-btn orange"></span>
                            <span class="swacth-btn yellow"></span>
                            <span class="swacth-btn blueviolet"></span>
                            <span class="swacth-btn brown"></span>
                            <span class="swacth-btn darkGoldenRod"></span> 
                            <span class="swacth-btn darkGreen"></span> 
                            <span class="swacth-btn darkRed"></span> 
                            <span class="swacth-btn dimGrey"></span>
                            <span class="swacth-btn khaki"></span> 
                        </div>
                    </div> --}}
                    <!--End Color Swatches-->
                    <!--Brand-->
                    <div class="sidebar_widget filterBox filter-widget">
                        <div class="widget-title"><h2>Brands</h2></div>
                        <ul>
                            @foreach($brands as $brand)
                            <li>
                                <a href="{{route('brand_shop',$brand->id)}}" style="text-decoration: none">
                                {{-- <input type="checkbox" value="" id="check1"> --}}
                                <label for="check1">{{$brand->name}}</label>
                                </a>
                                
                                
                            </li>
                            @endforeach
                            
                    </div>
                    <!--End Brand-->
                    <!--Popular Products-->
                    <div class="sidebar_widget">
                        <div class="widget-title"><h2>Popular Products</h2></div>
                        <div class="widget-content">
                            <div class="list list-sidebar-products">
                                <div class="grid">
                                    @foreach ($bestseller_items as $bestseller)
                                    @foreach ($all_item as $bestseller_item)

                                        @if($bestseller_item->id == $bestseller->item_id)
                                        
                                            <div class="grid__item">
                                                <div class="mini-list-item">
                                                <div class="mini-view_image">
                                                    <a class="grid-view-item__link" href="#">
                                                        <img class="grid-view-item__image" src="{{asset('storage/'.$bestseller_item->photo)}}" alt="" />
                                                    </a>
                                                </div>
                                                <div class="details"> <a class="grid-view-item__title" href="#">{{$bestseller_item->name}}</a>
                                                    <div class="grid-view-item__meta">
                                                        <span class="product-price__price">
                                                            @if($bestseller_item->discount)
                                                                {{-- <span class="old-price">${{$bestseller_item->price}}</span> --}}
                                                                <span class="money">${{$bestseller_item->discount}}</span>
                                                            @else
                                                                <span class="money">${{$bestseller_item->price}}</span>
                                                            @endif
                                                        </span>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Popular Products-->
                    <!--Banner-->
                    <div class="sidebar_widget static-banner">
                        <img src="{{asset('assets/images/side-banner-2.jpg')}}" alt="" />
                    </div>
                    <!--Banner-->
                    <!--Information-->
                    <div class="sidebar_widget">
                        <div class="widget-title"><h2>Information</h2></div>
                        <div class="widget-content"><p>Use this text to share information about your brand with your customers. Describe a product, share announcements, or welcome customers to your store.</p></div>
                    </div>
                    <!--end Information-->
                    <!--Product Tags-->
                    {{-- <div class="sidebar_widget">
                        <div class="widget-title">
                        <h2>Product Tags</h2>
                        </div>
                        <div class="widget-content">
                        <ul class="product-tags">
                            <li><a href="#" title="Show products matching tag $100 - $400">$100 - $400</a></li>
                            <li><a href="#" title="Show products matching tag $400 - $600">$400 - $600</a></li>
                            <li><a href="#" title="Show products matching tag $600 - $800">$600 - $800</a></li>
                            <li><a href="#" title="Show products matching tag Above $800">Above $800</a></li>
                            <li><a href="#" title="Show products matching tag Allen Vela">Allen Vela</a></li>
                            <li><a href="#" title="Show products matching tag Black">Black</a></li>
                            <li><a href="#" title="Show products matching tag Blue">Blue</a></li>
                            <li><a href="#" title="Show products matching tag Cantitate">Cantitate</a></li>
                            <li><a href="#" title="Show products matching tag Famiza">Famiza</a></li>
                            <li><a href="#" title="Show products matching tag Gray">Gray</a></li>
                            <li><a href="#" title="Show products matching tag Green">Green</a></li>
                            <li><a href="#" title="Show products matching tag Hot">Hot</a></li>
                            <li><a href="#" title="Show products matching tag jean shop">jean shop</a></li>
                            <li><a href="#" title="Show products matching tag jesse kamm">jesse kamm</a></li>
                            <li><a href="#" title="Show products matching tag L">L</a></li>
                            <li><a href="#" title="Show products matching tag Lardini">Lardini</a></li>
                            <li><a href="#" title="Show products matching tag lareida">lareida</a></li>
                            <li><a href="#" title="Show products matching tag Lirisla">Lirisla</a></li>
                            <li><a href="#" title="Show products matching tag M">M</a></li>
                            <li><a href="#" title="Show products matching tag mini-dress">mini-dress</a></li>
                            <li><a href="#" title="Show products matching tag Monark">Monark</a></li>
                            <li><a href="#" title="Show products matching tag Navy">Navy</a></li>
                            <li><a href="#" title="Show products matching tag new">new</a></li>
                            <li><a href="#" title="Show products matching tag new arrivals">new arrivals</a></li>
                            <li><a href="#" title="Show products matching tag Orange">Orange</a></li>
                            <li><a href="#" title="Show products matching tag oxford">oxford</a></li>
                            <li><a href="#" title="Show products matching tag Oxymat">Oxymat</a></li>
                        </ul>
                        <span class="btn btn--small btnview">View all</span> </div>
                    </div> --}}
                    <!--end Product Tags-->
                </div>
            </div>
            <!--End Sidebar-->
            <!--Main Content-->
            <div class="col-12 col-sm-12 col-md-9 col-lg-9 main-col">
                {{-- <div class="category-description">
                    <h3>Category Description</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</p>
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
                </div> --}}
                <hr>
                <div class="productList product-load-more">
                    <!--Toolbar-->
                    <button type="button" class="btn btn-filter d-block d-md-none d-lg-none"> Product Filters</button>
                    <div class="toolbar">
                        <div class="filters-toolbar-wrapper">
                            <div class="row">
                                <div class="col-4 col-md-4 col-lg-4 filters-toolbar__item collection-view-as d-flex justify-content-start align-items-center">
                                    <a href="shop-left-sidebar.html" title="Grid View" class="change-view change-view--active">
                                        <img src="{{asset('assets/images/grid.jpg')}}" alt="Grid" />
                                    </a>
                                    <a href="shop-listview.html" title="List View" class="change-view">
                                        <img src="{{asset('assets/images/list.jpg')}}" alt="List" />
                                    </a>
                                </div>
                                <div class="col-4 col-md-4 col-lg-4 text-center filters-toolbar__item filters-toolbar__item--count d-flex justify-content-center align-items-center">
                                    <span class="filters-toolbar__product-count">Showing: 22</span>
                                </div>
                                <div class="col-4 col-md-4 col-lg-4 text-right">
                                    <div class="filters-toolbar__item">
                                        <label for="SortBy" class="hidden">Sort</label>
                                        <select name="SortBy" id="SortBy" class="filters-toolbar__input filters-toolbar__input--sort">
                                            <option value="title-ascending" selected="selected">Sort</option>
                                            <option>Best Selling</option>
                                            <option>Alphabetically, A-Z</option>
                                            <option>Alphabetically, Z-A</option>
                                            <option>Price, low to high</option>
                                            <option>Price, high to low</option>
                                            <option>Date, new to old</option>
                                            <option>Date, old to new</option>
                                        </select>
                                        <input class="collection-header__default-sort" type="hidden" value="manual">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--End Toolbar-->
                    <div class="grid-products grid--view-items">
                        <div class="row">
                                @foreach($items as $item)
                                <div class="col-6 col-sm-6 col-md-4 col-lg-3 item">
                                    <!-- start product image -->
                                    <div class="product-image">
                                        <!-- start product image -->
                                        <a href="{{route('detail',$item->id)}}">
                                            <!-- image -->
                                            <img class="primary blur-up lazyload" data-src="{{asset('storage/'.$item->photo)}}" src="{{asset('storage/'.$item->photo)}}" alt="image" title="product" />
                                            <!-- End image -->
                                            <!-- Hover image -->
                                            <img class="hover blur-up lazyload" data-src="{{asset('storage/'.$item->photo)}}" src="{{asset('storage/'.$item->photo)}}" alt="image" title="product" />
                                            <!-- End hover image -->
                                            <!-- product label -->
                                            <div class="product-labels"><span class="lbl on-sale">Sale</span></div>
                                            <!-- End product label -->
                                        </a>
                                        <!-- end product image -->

                                        <!-- Start product button -->
                                        <form class="variants add" action="#" method="">
                                            <button class="btn btn-addto-cart addtocartBtn" type="button" data-id="{{$item->id}}" data-name="{{$item->name}}" data-price="{{$item->price}}" 
                                                data-discount="{{$item->discount}}" data-photo="{{$item->photo}}" data-codeno="{{$item->codeno}}">Add to Cart</button>
                                        </form>
                                        <div class="button-set">
                                            <a href="javascript:void(0)" title="Quick View" class="quick-view-popup quick-view" data-toggle="modal" data-target="#content_quickview">
                                                        <i class="icon anm anm-search-plus-r"></i>
                                                    </a>
                                            <div class="wishlist-btn">
                                                <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist">
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
                                            <a href="#">{{$item->name}}</a>
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
                <div class="infinitpaginOuter">
                    <div class="infinitpagin">	
                        <a href="#" class="btn loadMore">Load More</a>
                    </div>
                </div>
            </div>
            <!--End Main Content-->
        </div>
    </div>
    
</div>
<!--End Body Content-->

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('frontend/custom.js') }}"></script>
@endsection