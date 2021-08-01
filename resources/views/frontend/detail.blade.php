@extends('layouts.frontendtemplate')
@section('content')

<!--Body Content-->
<div id="page-content" class="template-product belle">
    <!--MainContent-->
    <div id="MainContent" class="main-content" role="main">
        <!--Breadcrumb-->
        <div class="bredcrumbWrap">
            <div class="container breadcrumbs">
                <a href="{{route('index')}}" title="Back to the home page">Home</a><span aria-hidden="true">›</span><span>{{$items->subcategory->category->name}}</span>
            </div>
        </div>
        <!--End Breadcrumb-->
        
        <div id="ProductSection-product-template" class="product-template__container prstyle1 container">
            <!--product-single-->
            <div class="product-single">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-img">
                 
                            <div class="zoompro-wrap product-zoom-right pl-20">
                                <div class="zoompro-span">
                                    <img class="blur-up lazyload zoompro" data-zoom-image="{{asset('storage/'.$items->photo)}}" alt="" src="{{asset('storage/'.$items->photo)}}" />
                                </div>
                                <div class="product-labels"><span class="lbl on-sale">Sale</span><span class="lbl pr-label1">new</span></div>
                                <div class="product-buttons">
                                    <a href="https://www.youtube.com/watch?v=93A2jOW5Mog" class="btn popup-video" title="View Video"><i class="icon anm anm-play-r" aria-hidden="true"></i></a>
                                    <a href="#" class="btn prlightbox" title="Zoom"><i class="icon anm anm-expand-l-arrows" aria-hidden="true"></i></a>
                                </div>
                            </div>
                     

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="product-single__meta">
                                <h1 class="product-single__title">{{$items->name}}</h1>
                                <div class="product-nav clearfix">					
                                    <a href="#" class="next" title="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                                <div class="prInfoRow">
                                    <div class="product-stock"> <span class="instock ">In Stock</span> <span class="outstock hide">Unavailable</span> </div>
                                    <div class="product-sku"><span class="variant-sku">{{$items->codeno}}</span></div><br><br>
                                    <div class="product-review"><a class="reviewLink" href="#tab2"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><span class="spr-badge-caption">6 reviews</span></a></div>
                                </div>
                                <p class="product-single__price product-single__price-product-template">
                                    <span class="visually-hidden">Regular price</span>
                                    @if($items->discount)
                                    <s id="ComparePrice-product-template"><span class="money">${{$items->price}}</span></s>
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">${{$items->discount}}</span></span>
                                    </span>
                                    @else
                                    <span class="product-price__price product-price__price-product-template product-price__sale product-price__sale--single">
                                        <span id="ProductPrice-product-template"><span class="money">${{$items->price}}</span></span>
                                    </span>
                                    @endif
                                </p>
                                {{-- <div class="orderMsg" data-user="23" data-time="24">
                                    <img src="assets/images/order-icon.jpg" alt="" /> <strong class="items">5</strong> sold in last <strong class="time">26</strong> hours</div>
                                </div> --}}
                            <div class="product-single__description rte">
                                
                                <ul>
                                    <li>{{$items->description}}</li>
                                </ul>
                            </div>
                            {{-- <div id="quantity_message">Hurry! Only  <span class="items">4</span>  left in stock.</div> --}}
                            <form method="" action="" id="product_form_10508262282" accept-charset="UTF-8" class="product-form product-form-product-template hidedropdown" enctype="multipart/form-data">
   
                                <div class="product-action clearfix">
                                    <div class="product-form__item--quantity d-block">
                                        <div class="wrapQtyBtn">
                                            <div class="qtyField">
                                                <a class="qtyBtn minus" href="javascript:void(0);"><i class="fa anm anm-minus-r" aria-hidden="true"></i></a>
                                                <input type="text" id="qty" name="quantity" value="1" class="product-form__input qty">
                                                <a class="qtyBtn plus" href="javascript:void(0);"><i class="fa anm anm-plus-r" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div><br><br><br>                               
                                    <div class="product-form__item--submit">
                                        <button type="button" name="add" class="btn product-form__cart-submit w-50 addtocartBtn" data-id="{{$items->id}}" data-name="{{$items->name}}" data-price="{{$items->price}}" 
                                            data-discount="{{$items->discount}}" data-photo="{{$items->photo}}" data-codeno="{{$items->codeno}}">
                                            Add to cart
                                        </button>
                                    </div>
                                    {{-- <div class="shopify-payment-button" data-shopify="payment-button">
                                        <button type="button" class="shopify-payment-button__button shopify-payment-button__button--unbranded w-50">ADD TO CART</button>
                                    </div> --}}
                                </div>
                                <!-- End Product Action -->
                            </form>
                            <div class="display-table shareRow">
                                    <div class="display-table-cell medium-up--one-third">
                                        <div class="wishlist-btn">
                                            <a class="wishlist add-to-wishlist" href="#" title="Add to Wishlist"><i class="icon anm anm-heart-l" aria-hidden="true"></i> <span>Add to Wishlist</span></a>
                                        </div>
                                    </div>
                                    <div class="display-table-cell text-right">
                                        <div class="social-sharing">
                                            <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-facebook" title="Share on Facebook">
                                                <i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Share</span>
                                            </a>
                                            <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-twitter" title="Tweet on Twitter">
                                                <i class="fa fa-twitter" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Tweet</span>
                                            </a>
                                            <a href="#" title="Share on google+" class="btn btn--small btn--secondary btn--share" >
                                                <i class="fa fa-google-plus" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Google+</span>
                                            </a>
                                            <a target="_blank" href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Pin on Pinterest">
                                                <i class="fa fa-pinterest" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Pin it</span>
                                            </a>
                                            <a href="#" class="btn btn--small btn--secondary btn--share share-pinterest" title="Share by Email" target="_blank">
                                                <i class="fa fa-envelope" aria-hidden="true"></i> <span class="share-title" aria-hidden="true">Email</span>
                                            </a>
                                         </div>
                                    </div>
                                </div>
                                
                            <p id="freeShipMsg" class="freeShipMsg" data-price="199"><i class="fa fa-truck" aria-hidden="true"></i> GETTING CLOSER! ONLY <b class="freeShip"><span class="money" data-currency-usd="$199.00" data-currency="USD">$199.00</span></b> AWAY FROM <b>FREE SHIPPING!</b></p>
                            <p class="shippingMsg"><i class="fa fa-clock-o" aria-hidden="true"></i> ESTIMATED DELIVERY BETWEEN <b id="fromDate">Wed. May 1</b> and <b id="toDate">Tue. May 7</b>.</p>
                            <div class="userViewMsg" data-user="20" data-time="11000"><i class="fa fa-users" aria-hidden="true"></i> <strong class="uersView">14</strong> PEOPLE ARE LOOKING FOR THIS PRODUCT</div>
                        </div>
                </div>
            </div>
            <!--End-product-single-->
            <!--Product Fearure-->
            <div class="prFeatures">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('assets/images/credit-card.png')}}" alt="Safe Payment" title="Safe Payment" />
                        <div class="details"><h3>Safe Payment</h3>Pay with the world's most payment methods.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('assets/images/shield.png')}}" alt="Confidence" title="Confidence" />
                        <div class="details"><h3>Confidence</h3>Protection covers your purchase and personal data.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('assets/images/worldwide.png')}}" alt="Worldwide Delivery" title="Worldwide Delivery" />
                        <div class="details"><h3>Worldwide Delivery</h3>FREE &amp; fast shipping to over 200+ countries &amp; regions.</div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3 feature">
                        <img src="{{asset('assets/images/phone-call.png')}}" alt="Hotline" title="Hotline" />
                        <div class="details"><h3>Hotline</h3>Talk to help line for your question on 4141 456 789, 4125 666 888</div>
                    </div>
                </div>
            </div>
            <!--End Product Fearure-->
            <!--Product Tabs-->
            <div class="tabs-listing">
                <ul class="product-tabs">
                    <li rel="tab1"><a class="tablink">Product Details</a></li>
                    <li rel="tab2"><a class="tablink">Product Reviews</a></li>
                    {{-- <li rel="tab3"><a class="tablink">Size Chart</a></li> --}}
                    <li rel="tab4"><a class="tablink">Shipping &amp; Returns</a></li>
                </ul>
                <div class="tab-container">
                    <div id="tab1" class="tab-content">
                        <div class="product-description rte">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                            <ul>
                              <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                              <li>Sed ut perspiciatis unde omnis iste natus error sit</li>
                              <li>Neque porro quisquam est qui dolorem ipsum quia dolor</li>
                              <li>Lorem Ipsum is not simply random text.</li>
                              <li>Free theme updates</li>
                            </ul>
                            <h3>Sed ut perspiciatis unde omnis iste natus error sit voluptatem</h3>
                            <p>You can change the position of any sections such as slider, banner, products, collection and so on by just dragging and dropping.&nbsp;</p>
                            
                        </div>
                    </div>
                    
                    <div id="tab2" class="tab-content">
                        <div id="shopify-product-reviews">
                            <div class="spr-container">
                                <div class="spr-header clearfix">
                                    <div class="spr-summary">
                                        <span class="product-review"><a class="reviewLink"><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i> </a><span class="spr-summary-actions-togglereviews">Based on 6 reviews456</span></span>
                                        <span class="spr-summary-actions">
                                            <a href="#" class="spr-summary-actions-newreview btn">Write a review</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="spr-content">
                                    <div class="spr-form clearfix">
                                        <form method="post" action="#" id="new-review-form" class="new-review-form">
                                            <h3 class="spr-form-title">Write a review</h3>
                                            <fieldset class="spr-form-contact">
                                                <div class="spr-form-contact-name">
                                                  <label class="spr-form-label" for="review_author_10508262282">Name</label>
                                                  <input class="spr-form-input spr-form-input-text " id="review_author_10508262282" type="text" name="review[author]" value="" placeholder="Enter your name">
                                                </div>
                                                <div class="spr-form-contact-email">
                                                  <label class="spr-form-label" for="review_email_10508262282">Email</label>
                                                  <input class="spr-form-input spr-form-input-email " id="review_email_10508262282" type="email" name="review[email]" value="" placeholder="john.smith@example.com">
                                                </div>
                                            </fieldset>
                                            <fieldset class="spr-form-review">
                                              <div class="spr-form-review-rating">
                                                <label class="spr-form-label">Rating</label>
                                                <div class="spr-form-input spr-starrating">
                                                  <div class="product-review"><a class="reviewLink" href="#"><i class="fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i><i class="font-13 fa fa-star-o"></i></a></div>
                                                </div>
                                              </div>
                                        
                                              <div class="spr-form-review-title">
                                                <label class="spr-form-label" for="review_title_10508262282">Review Title</label>
                                                <input class="spr-form-input spr-form-input-text " id="review_title_10508262282" type="text" name="review[title]" value="" placeholder="Give your review a title">
                                              </div>
                                        
                                              <div class="spr-form-review-body">
                                                <label class="spr-form-label" for="review_body_10508262282">Body of Review <span class="spr-form-review-body-charactersremaining">(1500)</span></label>
                                                <div class="spr-form-input">
                                                  <textarea class="spr-form-input spr-form-input-textarea " id="review_body_10508262282" data-product-id="10508262282" name="review[body]" rows="10" placeholder="Write your comments here"></textarea>
                                                </div>
                                              </div>
                                            </fieldset>
                                            <fieldset class="spr-form-actions">
                                                <input type="submit" class="spr-button spr-button-primary button button-primary btn btn-primary" value="Submit Review">
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="spr-reviews">
                                        <div class="spr-review">
                                            <div class="spr-review-header">
                                                <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></span></span>
                                                <h3 class="spr-review-header-title">Lorem ipsum dolor sit amet</h3>
                                                <span class="spr-review-header-byline"><strong>dsacc</strong> on <strong>Apr 09, 2019</strong></span>
                                            </div>
                                            <div class="spr-review-content">
                                                <p class="spr-review-content-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                            </div>
                                        </div>
                                        <div class="spr-review">
                                          <div class="spr-review-header">
                                            <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></span></span>
                                            <h3 class="spr-review-header-title">Lorem Ipsum is simply dummy text of the printing</h3>
                                            <span class="spr-review-header-byline"><strong>larrydude</strong> on <strong>Dec 30, 2018</strong></span>
                                          </div>
                                    
                                          <div class="spr-review-content">
                                            <p class="spr-review-content-body">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                                            </p>
                                          </div>
                                        </div>
                                        <div class="spr-review">
                                          <div class="spr-review-header">
                                            <span class="product-review spr-starratings spr-review-header-starratings"><span class="reviewLink"><i class="fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i><i class="font-13 fa fa-star"></i></span></span>
                                            <h3 class="spr-review-header-title">Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...</h3>
                                            <span class="spr-review-header-byline"><strong>quoctri1905</strong> on <strong>Dec 30, 2018</strong></span>
                                          </div>
                                    
                                          <div class="spr-review-content">
                                            <p class="spr-review-content-body">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.<br>
                                            <br>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- <div id="tab3" class="tab-content">
                        <h3>WOMEN'S BODY SIZING CHART</h3>
                        <table>
                          <tbody>
                            <tr>
                              <th>Size</th>
                              <th>XS</th>
                              <th>S</th>
                              <th>M</th>
                              <th>L</th>
                              <th>XL</th>
                            </tr>
                            <tr>
                              <td>Chest</td>
                              <td>31" - 33"</td>
                              <td>33" - 35"</td>
                              <td>35" - 37"</td>
                              <td>37" - 39"</td>
                              <td>39" - 42"</td>
                            </tr>
                            <tr>
                              <td>Waist</td>
                              <td>24" - 26"</td>
                              <td>26" - 28"</td>
                              <td>28" - 30"</td>
                              <td>30" - 32"</td>
                              <td>32" - 35"</td>
                            </tr>
                            <tr>
                              <td>Hip</td>
                              <td>34" - 36"</td>
                              <td>36" - 38"</td>
                              <td>38" - 40"</td>
                              <td>40" - 42"</td>
                              <td>42" - 44"</td>
                            </tr>
                            <tr>
                              <td>Regular inseam</td>
                              <td>30"</td>
                              <td>30½"</td>
                              <td>31"</td>
                              <td>31½"</td>
                              <td>32"</td>
                            </tr>
                            <tr>
                              <td>Long (Tall) Inseam</td>
                              <td>31½"</td>
                              <td>32"</td>
                              <td>32½"</td>
                              <td>33"</td>
                              <td>33½"</td>
                            </tr>
                          </tbody>
                        </table>
                        <h3>MEN'S BODY SIZING CHART</h3>
                        <table>
                          <tbody>
                            <tr>
                              <th>Size</th>
                              <th>XS</th>
                              <th>S</th>
                              <th>M</th>
                              <th>L</th>
                              <th>XL</th>
                              <th>XXL</th>
                            </tr>
                            <tr>
                              <td>Chest</td>
                              <td>33" - 36"</td>
                              <td>36" - 39"</td>
                              <td>39" - 41"</td>
                              <td>41" - 43"</td>
                              <td>43" - 46"</td>
                              <td>46" - 49"</td>
                            </tr>
                            <tr>
                              <td>Waist</td>
                              <td>27" - 30"</td>
                              <td>30" - 33"</td>
                              <td>33" - 35"</td>
                              <td>36" - 38"</td>
                              <td>38" - 42"</td>
                              <td>42" - 45"</td>
                            </tr>
                            <tr>
                              <td>Hip</td>
                              <td>33" - 36"</td>
                              <td>36" - 39"</td>
                              <td>39" - 41"</td>
                              <td>41" - 43"</td>
                              <td>43" - 46"</td>
                              <td>46" - 49"</td>
                            </tr>
                          </tbody>
                        </table>
                        <div class="text-center">
                            <img src="assets/images/size.jpg" alt="" />
                        </div>
                  </div> --}}
                    
                    <div id="tab4" class="tab-content">
                        <h4>Returns Policy</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eros justo, accumsan non dui sit amet. Phasellus semper volutpat mi sed imperdiet. Ut odio lectus, vulputate non ex non, mattis sollicitudin purus. Mauris consequat justo a enim interdum, in consequat dolor accumsan. Nulla iaculis diam purus, ut vehicula leo efficitur at.</p>
                        <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. In blandit nunc enim, sit amet pharetra erat aliquet ac.</p>
                        <h4>Shipping</h4>
                        <p>Pellentesque ultrices ut sem sit amet lacinia. Sed nisi dui, ultrices ut turpis pulvinar. Sed fringilla ex eget lorem consectetur, consectetur blandit lacus varius. Duis vel scelerisque elit, et vestibulum metus.  Integer sit amet tincidunt tortor. Ut lacinia ullamcorper massa, a fermentum arcu vehicula ut. Ut efficitur faucibus dui Nullam tristique dolor eget turpis consequat varius. Quisque a interdum augue. Nam ut nibh mauris.</p>
                    </div>
                </div>
            </div>
            <!--End Product Tabs-->
            
            <!--Related Product Slider-->
            <div class="related-product grid-products">
                <header class="section-header">
                    <h2 class="section-header__title text-center h2"><span>Related Products</span></h2>
                    <p class="sub-heading">You can stop autoplay, increase/decrease aniamtion speed and number of grid to show and products from store admin.</p>
                </header>
                <div class="productPageSlider">
                    @foreach($related_items as $related_item)
                    <div class="col-12 item">
                        <!-- start product image -->
                        <div class="product-image">
                            <!-- start product image -->
                            <a href="{{route('detail',$related_item->id)}}">
                                <!-- image -->
                                <img class="primary blur-up lazyload" data-src="{{asset('storage/'.$related_item->photo)}}" src="{{asset('storage/'.$related_item->photo)}}" alt="image" title="product">
                                <!-- End image -->
                                <!-- Hover image -->
                                <img class="hover blur-up lazyload" data-src="{{asset('storage/'.$related_item->photo)}}" src="{{asset('storage/'.$related_item->photo)}}" alt="image" title="product">
                                <!-- End hover image -->
                                <!-- product label -->
                                {{-- <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div> --}}
                                <!-- End product label -->
                            </a>
                            <!-- end product image -->

                            <!-- Start product button -->
                            <form class="variants add" action="#" method="">
                                <button class="btn btn-addto-cart addtocartBtn" type="button" tabindex="0" data-id="{{$related_item->id}}" data-name="{{$related_item->name}}" data-price="{{$related_item->price}}" 
                                    data-discount="{{$related_item->discount}}" data-photo="{{$related_item->photo}}" data-codeno="{{$related_item->codeno}}">Add To Cart</button>
                            </form>
                            <div class="button-set">
                                <a href="#" title="Quick View" class="quick-view" tabindex="0">
                                    <i class="icon anm anm-search-plus-r"></i>
                                </a>
                                <div class="wishlist-btn">
                                    <a class="wishlist add-to-wishlist" href="wishlist.html">
                                        <i class="icon anm anm-heart-l"></i>
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
                                <a href="#">{{$related_item->name}}</a>
                            </div>
                            <!-- End product name -->
                            <!-- product price -->
                            <div class="product-price">
                                @if($related_item->discount)
                                <span class="old-price">${{$related_item->price}}</span>
                                <span class="price">${{$related_item->discount}}</span>
                                @else
                                <span class="price">${{$related_item->price}}</span>
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
                            <!-- Variant -->
                            {{-- <ul class="swatches">
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant1.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant2.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant3.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant4.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant5.jpg" alt="image" /></li>
                                <li class="swatch medium rounded"><img src="assets/images/product-images/variant6.jpg" alt="image" /></li>
                            </ul> --}}
                            <!-- End Variant -->
                        </div>
                        <!-- End product details -->
                    </div>
                    @endforeach
                </div>
            <!--End Related Product Slider-->
            
            <!--Recently Product Slider-->
            {{-- <div class="related-product grid-products">
                    <header class="section-header">
                        <h2 class="section-header__title text-center h2"><span>Recently Viewed Product</span></h2>
                        <p class="sub-heading">You can manage this section from store admin as describe in above section</p>
                    </header>
                    <div class="productPageSlider">
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image6.jpg" src="assets/images/product-images/product-image6.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image6-1.jpg" src="assets/images/product-images/product-image6-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                    <!-- product label -->
                                    <div class="product-labels rectangular"><span class="lbl on-sale">-16%</span> <span class="lbl pr-label1">new</span></div>
                                    <!-- End product label -->
                                </a>
                                <!-- end product image -->
                            </div>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Zipper Jacket</a>
                                </div>
                                <!-- End product name -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image7.jpg" src="assets/images/product-images/product-image7.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image7-1.jpg" src="assets/images/product-images/product-image7-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                            </div>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Zipper Jacket</a>
                                </div>
                                <!-- End product name -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image8.jpg" src="assets/images/product-images/product-image8.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image8-1.jpg" src="assets/images/product-images/product-image8-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                            </div>

                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Workers Shirt Jacket</a>
                                </div>
                                <!-- End product name -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image9.jpg" src="assets/images/product-images/product-image9.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image9-1.jpg" src="assets/images/product-images/product-image9-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                            </div>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Watercolor Sport Jacket in Brown/Blue</a>
                                </div>
                                <!-- End product name -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image10.jpg" src="assets/images/product-images/product-image10.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image10-1.jpg" src="assets/images/product-images/product-image10-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                            </div>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Washed Wool Blazer</a>
                                </div>
                                <!-- End product name -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image13.jpg" src="assets/images/product-images/product-image13.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image13-1.jpg" src="assets/images/product-images/product-image13-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                            </div>

                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Ashton Necklace</a>
                                </div>
                                <!-- End product name -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image14.jpg" src="assets/images/product-images/product-image14.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image14-1.jpg" src="assets/images/product-images/product-image14-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                            </div>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Ara Ring</a>
                                </div>
                                <!-- End product name -->
                            </div>
                            <!-- End product details -->
                        </div>
                        <div class="col-12 item">
                            <!-- start product image -->
                            <div class="product-image">
                                <!-- start product image -->
                                <a href="#">
                                    <!-- image -->
                                    <img class="primary blur-up lazyload" data-src="assets/images/product-images/product-image15.jpg" src="assets/images/product-images/product-image15.jpg" alt="image" title="product">
                                    <!-- End image -->
                                    <!-- Hover image -->
                                    <img class="hover blur-up lazyload" data-src="assets/images/product-images/product-image15-1.jpg" src="assets/images/product-images/product-image15-1.jpg" alt="image" title="product">
                                    <!-- End hover image -->
                                </a>
                                <!-- end product image -->
                            </div>
                            <!-- end product image -->

                            <!--start product details -->
                            <div class="product-details text-center">
                                <!-- product name -->
                                <div class="product-name">
                                    <a href="#">Ara Ring</a>
                                </div>
                                <!-- End product name -->
                            </div>
                            <!-- End product details -->
                        </div>
                    </div>
                </div>
            <!--End Recently Product Slider-->
            </div> --}}
        <!--#ProductSection-product-template-->
    </div>
    <!--MainContent-->
</div>
<!--End Body Content-->
    
@endsection

@section('script')


<script type="text/javascript" src="{{ asset('frontend/detail.js') }}"></script>


@endsection