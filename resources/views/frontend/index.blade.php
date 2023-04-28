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
    <section class="gray-simple min">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading">
                        <h2>Popular Owner Properties</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg col-md-4">
                    <!-- Single Category -->
                    <div class="property_cats_boxs">
                        <a href="#" class="category-box">
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
                        <a href="#" class="category-box">
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
                        <a href="#" class="category-box">
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
                        <a href="#" class="category-box">
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
                        <a href="#" class="category-box">
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
    <section class="min">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading">
                        <h2>Popular Owner Properties</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">

                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="min gray-simple">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading">
                        <h2>Top Projects</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">

                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="min ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading">
                        <h2>Recent Property Listed</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="property-listing property-2">
                            <div class="listing-img-wrapper">
                                <div class="list-img-slide">
                                    <a href="#">
                                        <img src="{{ asset('backend/img/properies/' . $property->thumbnail_img) }}"
                                            class="img-fluid mx-auto" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="listing-detail-wrapper">
                                <div class="listing-short-detail-wrap">
                                    <div class="_card_list_flex mb-2">
                                        <div class="_card_flex_01">
                                            <span
                                                class="property-type elt_rent">{{ ucfirst($property->transaction_type) }}</span>
                                        </div>
                                        <div class="_card_flex_last">
                                            <div class="prt_saveed_12lk">
                                                <label class="toggler toggler-danger">
                                                    <input type="checkbox">
                                                    <i class="fas fa-heart"></i>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listing-short-detail">
                                        <h4 class="listing-name verified">
                                            <a href="#" class="prt-link-detail">{{ $property->name }}</a>
                                        </h4>
                                        <div class="foot-location">
                                            <img src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                alt="" />{{ optional($property->project)->city }},
                                            {{ optional($property->project)->state }},
                                            {{ optional($property->project)->country }} -
                                            {{ optional($property->project)->pincode }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="listing-detail-footer">
                                <div class="footer-first">
                                    <div class="foot-location"><span
                                            class="pric_lio theme-bg">₹{{ $property->price }}</span>/sqft</div>
                                </div>
                                <div class="footer-flex">
                                    <span>{{ ucwords(str_replace('_', ' ', $property->properties_type)) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                    <a href="{{ route('property.detail', $property->slug) }}"
                        class="btn btn-theme-light-2 rounded">Explore More Properties</a>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="image-cover"
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
    </section> --}}

    <section class="min gray-simple">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>How It Works?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="wpk_process">
                        <div class="wpk_thumb">
                            <div class="wpk_thumb_figure">
                                <img src="{{ asset('frontend/assets/img/account-cl.svg') }}" class="img-fluid"
                                    alt="" />
                            </div>
                        </div>
                        <div class="wpk_caption">
                            <h4>Create An Account</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum
                                available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="wpk_process active">
                        <div class="wpk_thumb">
                            <div class="wpk_thumb_figure">
                                <img src="{{ asset('frontend/assets/img/search.svg') }}" class="img-fluid"
                                    alt="" />
                            </div>
                        </div>
                        <div class="wpk_caption">
                            <h4>Find & Search Property</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum
                                available.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="wpk_process">
                        <div class="wpk_thumb">
                            <div class="wpk_thumb_figure">
                                <img src="{{ asset('frontend/assets/img/booking-cl.svg') }}" class="img-fluid"
                                    alt="" />
                            </div>
                        </div>
                        <div class="wpk_caption">
                            <h4>Book Your Property</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum
                                available.</p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <div class="clearfix"></div>
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
                    <a href="#" class="img-wrap style-2">
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
                    <a href="#" class="img-wrap style-2">
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
                    <a href="#" class="img-wrap style-2">
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
                    <a href="#" class="img-wrap style-2">
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
                    <a href="#" class="img-wrap style-2">
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
                    <a href="#" class="img-wrap style-2">
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
    <section class="min gray-simple">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading">
                        <h2>Top Projects</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">

                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
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
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
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

@endsection
