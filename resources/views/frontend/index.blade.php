@extends('frontend.layouts.app')
@section('content')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================ Hero Banner  Start================================== -->
    <div class="image-cover hero_banner" style="background:url({{ asset('frontend/assets/img/banner-3.png') }}) no-repeat;"
        data-overlay="0">
        <div class="container">

            <h1 class="big-header-capt mb-0">Search Your Next Home</h1>
            <p class="text-center mb-4">Welcome back! Let’s continue your search</p>
            <!-- Type -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-12">
                    <div class="full_search_box nexio_search lightanic_search hero_search-radius modern">
                        <div class="search_hero_wrapping">

                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="location" class="form-control">
                                                <option value="">Select City</option>
                                                <option value="1">New Delhi</option>
                                                <option value="2">Kolkata</option>
                                                <option value="3">Varanasi</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="ptypes" class="form-control">
                                                <option value="">Property Type</option>
                                                <option value="1">All categories</option>
                                                <option value="2">Apartment</option>
                                                <option value="3">Villas</option>
                                                <option value="4">Commercial</option>
                                                <option value="5">Offices</option>
                                                <option value="6">Garage</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-12 d-md-none d-lg-block">
                                    <div class="form-group">
                                        <div class="input-with-icon">
                                            <select id="price" class="form-control">
                                                <option value="">Price Range</option>
                                                <option value="1">From 40,000 To 10m</option>
                                                <option value="2">From 60,000 To 20m</option>
                                                <option value="3">From 70,000 To 30m</option>
                                                <option value="3">From 80,000 To 40m</option>
                                                <option value="3">From 90,000 To 50m</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-12 small-padd">
                                    <div class="form-group none">
                                        <a href="#" class="btn search-btn"><i class="fa fa-search"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Property Type Start ================================== -->
    <section class="gray-simple min">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading center">
                        <h2>Featured Property Types</h2>
                        <p>Find All Type of Property.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg col-md-4">
                    <!-- Single Category -->
                    <div class="property_cats_boxs">
                        <a href="grid-layout-with-sidebar.html" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-1">
                                    <i class="flaticon-beach-house-2"></i>
                                </div>

                                <div class="property_category_expand property_category_short-text">
                                    <h4>Family House</h4>
                                    <p>122 Property</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg col-md-4">
                    <!-- Single Category -->
                    <div class="property_cats_boxs">
                        <a href="grid-layout-with-sidebar.html" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-2">
                                    <i class="flaticon-cabin"></i>
                                </div>

                                <div class="property_category_expand property_category_short-text">
                                    <h4>House & Villa</h4>
                                    <p>155 Property</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg col-md-4">
                    <!-- Single Category -->
                    <div class="property_cats_boxs">
                        <a href="grid-layout-with-sidebar.html" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-3">
                                    <i class="flaticon-apartments"></i>
                                </div>

                                <div class="property_category_expand property_category_short-text">
                                    <h4>Apartment</h4>
                                    <p>300 Property</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg col-md-4">
                    <!-- Single Category -->
                    <div class="property_cats_boxs">
                        <a href="grid-layout-with-sidebar.html" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-4">
                                    <i class="flaticon-student-housing"></i>
                                </div>

                                <div class="property_category_expand property_category_short-text">
                                    <h4>Office & Studio</h4>
                                    <p>80 Property</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg col-md-4">
                    <!-- Single Category -->
                    <div class="property_cats_boxs">
                        <a href="grid-layout-with-sidebar.html" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-5">
                                    <i class="flaticon-modern-house-4"></i>
                                </div>

                                <div class="property_category_expand property_category_short-text">
                                    <h4>Villa & Condo</h4>
                                    <p>80 Property</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ============================ Property Type End ================================== -->

    <!-- ============================ Recent Property Start ================================== -->
    <section class="min">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Recent Property Listed</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <!-- Single Property -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="property-listing property-2">

                        <div class="listing-img-wrapper">
                            <div class="list-img-slide">
                                <a href="single-property-1.html"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
                                        class="img-fluid mx-auto" alt="" /></a>
                            </div>
                        </div>

                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail-wrap">
                                <div class="_card_list_flex mb-2">
                                    <div class="_card_flex_01">
                                        <span class="property-type elt_rent">For Rent</span>
                                    </div>
                                    <div class="_card_flex_last">
                                        <div class="prt_saveed_12lk">
                                            <label class="toggler toggler-danger"><input type="checkbox"><i
                                                    class="fas fa-heart"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-short-detail">
                                    <h4 class="listing-name verified"><a href="single-property-1.html"
                                            class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                    <div class="foot-location"><img src="{{ asset('frontend/assets/img/pin.svg') }}"
                                            width="18" alt="" />Varanasi, Uttar Pradesh, India</div>
                                </div>
                            </div>
                        </div>

                        <div class="listing-detail-footer">
                            <div class="footer-first">
                                <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft</div>
                            </div>
                            <div class="footer-flex">
                                <span>Apartment</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Single Property -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="property-listing property-2">

                        <div class="listing-img-wrapper">
                            <div class="list-img-slide">
                                <a href="single-property-1.html"><img src="{{ asset('frontend/assets/img/p-2.png') }}"
                                        class="img-fluid mx-auto" alt="" /></a>
                            </div>
                        </div>

                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail-wrap">
                                <div class="_card_list_flex mb-2">
                                    <div class="_card_flex_01">
                                        <span class="property-type elt_sale">For Sale</span>
                                    </div>
                                    <div class="_card_flex_last">
                                        <div class="prt_saveed_12lk">
                                            <label class="toggler toggler-danger"><input type="checkbox"><i
                                                    class="fas fa-heart"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-short-detail">
                                    <h4 class="listing-name verified"><a href="single-property-1.html"
                                            class="prt-link-detail">Fairmount Properties</a></h4>
                                    <div class="foot-location"><img src="{{ asset('frontend/assets/img/pin.svg') }}"
                                            width="18" alt="" />Varanasi, Uttar Pradesh, India</div>
                                </div>
                            </div>
                        </div>

                        <div class="listing-detail-footer">
                            <div class="footer-first">
                                <div class="foot-location"><span class="pric_lio theme-bg">₹9,750</span>/sqft</div>
                            </div>
                            <div class="footer-flex">
                                <span>Condos</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Single Property -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="property-listing property-2">

                        <div class="listing-img-wrapper">
                            <div class="list-img-slide">
                                <a href="single-property-1.html"><img src="{{ asset('frontend/assets/img/p-4.png') }}"
                                        class="img-fluid mx-auto" alt="" /></a>
                            </div>
                        </div>

                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail-wrap">
                                <div class="_card_list_flex mb-2">
                                    <div class="_card_flex_01">
                                        <span class="property-type elt_rent">For Rent</span>
                                    </div>
                                    <div class="_card_flex_last">
                                        <div class="prt_saveed_12lk">
                                            <label class="toggler toggler-danger"><input type="checkbox"><i
                                                    class="fas fa-heart"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-short-detail">
                                    <h4 class="listing-name verified"><a href="single-property-1.html"
                                            class="prt-link-detail">The Real Estate Corner</a></h4>
                                    <div class="foot-location"><img src="{{ asset('frontend/assets/img/pin.svg') }}"
                                            width="18" alt="" />Varanasi, Uttar Pradesh, India</div>
                                </div>
                            </div>
                        </div>

                        <div class="listing-detail-footer">
                            <div class="footer-first">
                                <div class="foot-location"><span class="pric_lio theme-bg">₹5,860</span>/sqft</div>
                            </div>
                            <div class="footer-flex">
                                <span>Offices</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Single Property -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="property-listing property-2">

                        <div class="listing-img-wrapper">
                            <div class="list-img-slide">
                                <a href="single-property-1.html"><img src="{{ asset('frontend/assets/img/p-5.png') }}"
                                        class="img-fluid mx-auto" alt="" /></a>
                            </div>
                        </div>

                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail-wrap">
                                <div class="_card_list_flex mb-2">
                                    <div class="_card_flex_01">
                                        <span class="property-type elt_sale">For Sale</span>
                                    </div>
                                    <div class="_card_flex_last">
                                        <div class="prt_saveed_12lk">
                                            <label class="toggler toggler-danger"><input type="checkbox"><i
                                                    class="fas fa-heart"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-short-detail">
                                    <h4 class="listing-name verified"><a href="single-property-1.html"
                                            class="prt-link-detail">Herringbone Realty</a></h4>
                                    <div class="foot-location"><img src="{{ asset('frontend/assets/img/pin.svg') }}"
                                            width="18" alt="" />Varanasi, Uttar Pradesh, India</div>
                                </div>
                            </div>
                        </div>

                        <div class="listing-detail-footer">
                            <div class="footer-first">
                                <div class="foot-location"><span class="pric_lio theme-bg">₹7,540</span>/sqft</div>
                            </div>
                            <div class="footer-flex">
                                <span>Homes & Villas</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Single Property -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="property-listing property-2">

                        <div class="listing-img-wrapper">
                            <div class="list-img-slide">
                                <a href="single-property-1.html"><img src="{{ asset('frontend/assets/img/p-6.png') }}"
                                        class="img-fluid mx-auto" alt="" /></a>
                            </div>
                        </div>

                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail-wrap">
                                <div class="_card_list_flex mb-2">
                                    <div class="_card_flex_01">
                                        <span class="property-type elt_rent">For Rent</span>
                                    </div>
                                    <div class="_card_flex_last">
                                        <div class="prt_saveed_12lk">
                                            <label class="toggler toggler-danger"><input type="checkbox"><i
                                                    class="fas fa-heart"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-short-detail">
                                    <h4 class="listing-name verified"><a href="single-property-1.html"
                                            class="prt-link-detail">Brick Lane Realty</a></h4>
                                    <div class="foot-location"><img src="{{ asset('frontend/assets/img/pin.svg') }}"
                                            width="18" alt="" />Varanasi, Uttar Pradesh, India</div>
                                </div>
                            </div>
                        </div>

                        <div class="listing-detail-footer">
                            <div class="footer-first">
                                <div class="foot-location"><span class="pric_lio theme-bg">₹4,850</span>/sqft</div>
                            </div>
                            <div class="footer-flex">
                                <span>Commercial</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Single Property -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="property-listing property-2">

                        <div class="listing-img-wrapper">
                            <div class="list-img-slide">
                                <a href="single-property-1.html"><img src="{{ asset('frontend/assets/img/p-7.png') }}"
                                        class="img-fluid mx-auto" alt="" /></a>
                            </div>
                        </div>

                        <div class="listing-detail-wrapper">
                            <div class="listing-short-detail-wrap">
                                <div class="_card_list_flex mb-2">
                                    <div class="_card_flex_01">
                                        <span class="property-type elt_sale">For Sale</span>
                                    </div>
                                    <div class="_card_flex_last">
                                        <div class="prt_saveed_12lk">
                                            <label class="toggler toggler-danger"><input type="checkbox"><i
                                                    class="fas fa-heart"></i></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-short-detail">
                                    <h4 class="listing-name verified"><a href="single-property-1.html"
                                            class="prt-link-detail">Banyon Tree Realty</a></h4>
                                    <div class="foot-location"><img src="{{ asset('frontend/assets/img/pin.svg') }}"
                                            width="18" alt="" />Varanasi, Uttar Pradesh, India</div>
                                </div>
                            </div>
                        </div>

                        <div class="listing-detail-footer">
                            <div class="footer-first">
                                <div class="foot-location"><span class="pric_lio theme-bg">₹2,742</span>/sqft</div>
                            </div>
                            <div class="footer-flex">
                                <span>Apartment</span>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Property End ================================== -->

    <!-- ============================ Our Counter Start ================================== -->
    <section class="image-cover"
        style="background:#122947 url({{ asset('frontend/assets/img/pattern.png') }}) no-repeat;">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">
                    <div class="text-center mb-5">
                        <span class="theme-cl">Our Awards</span>
                        <h2 class="font-weight-normal text-light">Over 1,24,000+ Happy User Bieng with us Still they Love
                            Our Services</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="_morder_counter">
                        <div class="_morder_counter_thumb"><i class="ti-cup"></i></div>
                        <div class="_morder_counter_caption">
                            <h5 class="text-light"><span>32</span> M</h5>
                            <span>Blue Burmin Award</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="_morder_counter">
                        <div class="_morder_counter_thumb"><i class="ti-briefcase"></i></div>
                        <div class="_morder_counter_caption">
                            <h5 class="text-light"><span>43</span> M</h5>
                            <span>Mimo X11 Award</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="_morder_counter">
                        <div class="_morder_counter_thumb"><i class="ti-light-bulb"></i></div>
                        <div class="_morder_counter_caption">
                            <h5 class="text-light"><span>51</span> M</h5>
                            <span>Australian UGC Award</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="_morder_counter">
                        <div class="_morder_counter_thumb"><i class="ti-heart"></i></div>
                        <div class="_morder_counter_caption">
                            <h5 class="text-light"><span>42</span> M</h5>
                            <span>IITCA Green Award</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Our Counter End ================================== -->

    <!-- ============================ Property Location ================================== -->
    <section class="min">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Explore By Location</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <!-- Single Location -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="grid-layout-with-sidebar.html" class="img-wrap style-2">
                        <div class="location_wrap_content visible">
                            <div class="location_wrap_content_first">
                                <h4>New Orleans, Louisiana</h4>
                                <ul>
                                    <li><span>12 Villas</span></li>
                                    <li><span>10 Apartments</span></li>
                                    <li><span>07 Offices</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="img-wrap-background"
                            style="background-image: url({{ asset('frontend/assets/img/city-1.png') }});"></div>
                    </a>
                </div>

                <!-- Single Location -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="grid-layout-with-sidebar.html" class="img-wrap style-2">
                        <div class="location_wrap_content visible">
                            <div class="location_wrap_content_first">
                                <h4>Jerrsy, United State</h4>
                                <ul>
                                    <li><span>12 Villas</span></li>
                                    <li><span>10 Apartments</span></li>
                                    <li><span>07 Offices</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="img-wrap-background"
                            style="background-image: url({{ asset('frontend/assets/img/city-2.png') }});"></div>
                    </a>
                </div>

                <!-- Single Location -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="grid-layout-with-sidebar.html" class="img-wrap style-2">
                        <div class="location_wrap_content visible">
                            <div class="location_wrap_content_first">
                                <h4>Liverpool, London</h4>
                                <ul>
                                    <li><span>12 Villas</span></li>
                                    <li><span>10 Apartments</span></li>
                                    <li><span>07 Offices</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="img-wrap-background"
                            style="background-image: url({{ asset('frontend/assets/img/city-3.png') }});"></div>
                    </a>
                </div>

                <!-- Single Location -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="grid-layout-with-sidebar.html" class="img-wrap style-2">
                        <div class="location_wrap_content visible">
                            <div class="location_wrap_content_first">
                                <h4>Varanasi, Uttar Pradesh, India</h4>
                                <ul>
                                    <li><span>12 Villas</span></li>
                                    <li><span>10 Apartments</span></li>
                                    <li><span>07 Offices</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="img-wrap-background"
                            style="background-image: url({{ asset('frontend/assets/img/city-4.png') }});"></div>
                    </a>
                </div>

                <!-- Single Location -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="grid-layout-with-sidebar.html" class="img-wrap style-2">
                        <div class="location_wrap_content visible">
                            <div class="location_wrap_content_first">
                                <h4>Varanasi, Uttar Pradesh, India</h4>
                                <ul>
                                    <li><span>12 Villas</span></li>
                                    <li><span>10 Apartments</span></li>
                                    <li><span>07 Offices</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="img-wrap-background"
                            style="background-image: url({{ asset('frontend/assets/img/city-5.png') }});"></div>
                    </a>
                </div>

                <!-- Single Location -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <a href="grid-layout-with-sidebar.html" class="img-wrap style-2">
                        <div class="location_wrap_content visible">
                            <div class="location_wrap_content_first">
                                <h4>Varanasi, Uttar Pradesh, India</h4>
                                <ul>
                                    <li><span>12 Villas</span></li>
                                    <li><span>10 Apartments</span></li>
                                    <li><span>07 Offices</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="img-wrap-background"
                            style="background-image: url({{ asset('frontend/assets/img/city-6.png') }});"></div>
                    </a>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Property Location End ================================== -->

    <!-- ============================ Top Agents ================================== -->
    <section class="gray-simple min">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Our Featured Agents</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">

                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="grid_agents">
                                <div class="elio_mx_list theme-bg-2">102 Listings</div>
                                <div class="grid_agents-wrap">

                                    <div class="fr-grid-thumb">
                                        <a href="#">
                                            <span class="verified"><img
                                                    src="{{ asset('frontend/assets/img/verified.svg') }}"
                                                    class="verify mx-auto" alt=""></span>
                                            <img src="{{ asset('frontend/assets/img/team-1.jpg') }}"
                                                class="img-fluid mx-auto" alt="">
                                        </a>
                                    </div>

                                    <div class="fr-grid-deatil">
                                        <span><i class="ti-location-pin mr-1"></i>Varanasi, Uttar Pradesh, India</span>
                                        <h5 class="fr-can-name"><a href="#">Adam K. Jollio</a></h5>
                                        <ul class="inline_social">
                                            <li><a href="#" class="fb"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#" class="ln"><i class="ti-linkedin"></i></a></li>
                                            <li><a href="#" class="ins"><i class="ti-instagram"></i></a></li>
                                            <li><a href="#" class="tw"><i class="ti-twitter"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="fr-infos-deatil">
                                        <a href="#" data-toggle="modal" data-target="#autho-message"
                                            class="btn agent-btn theme-bg"><i class="fa fa-envelope mr-2"></i>Message</a>
                                        <a href="#" class="btn agent-btn theme-black"><i
                                                class="fa fa-phone"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="grid_agents">
                                <div class="elio_mx_list theme-bg-2">72 Listings</div>
                                <div class="grid_agents-wrap">

                                    <div class="fr-grid-thumb">
                                        <a href="#">
                                            <span class="verified"><img
                                                    src="{{ asset('frontend/assets/img/verified.svg') }}"
                                                    class="verify mx-auto" alt=""></span>
                                            <img src="{{ asset('frontend/assets/img/team-2.jpg') }}"
                                                class="img-fluid mx-auto" alt="">
                                        </a>
                                    </div>

                                    <div class="fr-grid-deatil">
                                        <span><i class="ti-location-pin mr-1"></i>Varanasi, Uttar Pradesh, India</span>
                                        <h5 class="fr-can-name"><a href="#">Sargam S. Singh</a></h5>
                                        <ul class="inline_social">
                                            <li><a href="#" class="fb"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#" class="ln"><i class="ti-linkedin"></i></a></li>
                                            <li><a href="#" class="ins"><i class="ti-instagram"></i></a></li>
                                            <li><a href="#" class="tw"><i class="ti-twitter"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="fr-infos-deatil">
                                        <a href="#" data-toggle="modal" data-target="#autho-message"
                                            class="btn agent-btn theme-bg"><i class="fa fa-envelope mr-2"></i>Message</a>
                                        <a href="#" class="btn agent-btn theme-black"><i
                                                class="fa fa-phone"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="grid_agents">
                                <div class="elio_mx_list theme-bg-2">22 Listings</div>
                                <div class="grid_agents-wrap">

                                    <div class="fr-grid-thumb">
                                        <a href="#">
                                            <span class="verified"><img
                                                    src="{{ asset('frontend/assets/img/verified.svg') }}"
                                                    class="verify mx-auto" alt=""></span>
                                            <img src="{{ asset('frontend/assets/img/team-3.jpg') }}"
                                                class="img-fluid mx-auto" alt="">
                                        </a>
                                    </div>

                                    <div class="fr-grid-deatil">
                                        <span><i class="ti-location-pin mr-1"></i>Varanasi, Uttar Pradesh, India</span>
                                        <h5 class="fr-can-name"><a href="#">Harijeet M. Siller</a></h5>
                                        <ul class="inline_social">
                                            <li><a href="#" class="fb"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#" class="ln"><i class="ti-linkedin"></i></a></li>
                                            <li><a href="#" class="ins"><i class="ti-instagram"></i></a></li>
                                            <li><a href="#" class="tw"><i class="ti-twitter"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="fr-infos-deatil">
                                        <a href="#" data-toggle="modal" data-target="#autho-message"
                                            class="btn agent-btn theme-bg"><i class="fa fa-envelope mr-2"></i>Message</a>
                                        <a href="#" class="btn agent-btn theme-black"><i
                                                class="fa fa-phone"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="grid_agents">
                                <div class="elio_mx_list theme-bg-2">50 Listings</div>
                                <div class="grid_agents-wrap">

                                    <div class="fr-grid-thumb">
                                        <a href="#">
                                            <span class="verified"><img
                                                    src="{{ asset('frontend/assets/img/verified.svg') }}"
                                                    class="verify mx-auto" alt=""></span>
                                            <img src="{{ asset('frontend/assets/img/team-4.jpg') }}"
                                                class="img-fluid mx-auto" alt="">
                                        </a>
                                    </div>

                                    <div class="fr-grid-deatil">
                                        <span><i class="ti-location-pin mr-1"></i>Varanasi, Uttar Pradesh, India</span>
                                        <h5 class="fr-can-name"><a href="#">Anna K. Young</a></h5>
                                        <ul class="inline_social">
                                            <li><a href="#" class="fb"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#" class="ln"><i class="ti-linkedin"></i></a></li>
                                            <li><a href="#" class="ins"><i class="ti-instagram"></i></a></li>
                                            <li><a href="#" class="tw"><i class="ti-twitter"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="fr-infos-deatil">
                                        <a href="#" data-toggle="modal" data-target="#autho-message"
                                            class="btn agent-btn theme-bg"><i class="fa fa-envelope mr-2"></i>Message</a>
                                        <a href="#" class="btn agent-btn theme-black"><i
                                                class="fa fa-phone"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="grid_agents">
                                <div class="elio_mx_list theme-bg-2">42 Listings</div>
                                <div class="grid_agents-wrap">

                                    <div class="fr-grid-thumb">
                                        <a href="#">
                                            <span class="verified"><img
                                                    src="{{ asset('frontend/assets/img/verified.svg') }}"
                                                    class="verify mx-auto" alt=""></span>
                                            <img src="{{ asset('frontend/assets/img/team-5.jpg') }}"
                                                class="img-fluid mx-auto" alt="">
                                        </a>
                                    </div>

                                    <div class="fr-grid-deatil">
                                        <span><i class="ti-location-pin mr-1"></i>Varanasi, Uttar Pradesh, India</span>
                                        <h5 class="fr-can-name"><a href="#">Michael P. Grimaldo</a></h5>
                                        <ul class="inline_social">
                                            <li><a href="#" class="fb"><i class="ti-facebook"></i></a></li>
                                            <li><a href="#" class="ln"><i class="ti-linkedin"></i></a></li>
                                            <li><a href="#" class="ins"><i class="ti-instagram"></i></a></li>
                                            <li><a href="#" class="tw"><i class="ti-twitter"></i></a></li>
                                        </ul>
                                    </div>

                                    <div class="fr-infos-deatil">
                                        <a href="#" data-toggle="modal" data-target="#autho-message"
                                            class="btn agent-btn theme-bg"><i class="fa fa-envelope mr-2"></i>Message</a>
                                        <a href="#" class="btn agent-btn theme-black"><i
                                                class="fa fa-phone"></i></a>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- ============================ Top Agents End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <section class="theme-bg call_action_wrap-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="call_action_wrap">
                        <div class="call_action_wrap-head">
                            <h3>Do You Have Questions ?</h3>
                            <span>We'll help you to grow your career and growth.</span>
                        </div>
                        <a href="#" class="btn btn-call_action_wrap">Contact Us Today</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->
@endsection
