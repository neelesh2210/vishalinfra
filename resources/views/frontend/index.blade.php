@extends('frontend.layouts.app')
@section('content')
    <style>
        .tab-content>.active {
            display: block;
            border: 0;
        }
    </style>
    <div class="clearfix"></div>
    <div class="image-cover hero_banner" style="background:url({{ asset('frontend/assets/img/banner-1.jpg') }}) no-repeat;" data-overlay="0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-9 col-md-12">
                    <h1 class="big-header-capt mb-4">Welcome back! Let’s continue your search</h1>
                    <div class="simple-search-wrap mb-3">
                        <div class="hero_search-2">
                            <div class="simple_tab_search">
                                <div class="pk-input-group">
                                    <input type="text" name="email" class="email form-control" placeholder="Search By City, Locality, Project">
                                    <button class="pk-subscribe-submit" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="full_search_box nexio_search lightanic_search hero_search-radius modern">
                        <div class="search_hero_wrapping">
                            <form action="{{ route('properties') }}">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <select id="location" name="location" class="form-control">
                                                    <option value="">Select City</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <select id="ptypes" name="properties_type" class="form-control">
                                                    <option value="">All categories</option>
                                                    <option value="flat_apartment">Flat/ Apartment</option>
                                                    <option value="residental_house">Residential House</option>
                                                    <option value="commerical_space">Commercial Space</option>
                                                    <option value="plot">Plot</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-12 d-md-none d-lg-block">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <select id="price" name="price_range" class="form-control">
                                                    <option value="">Price Range</option>
                                                    <option value="40000,1000000">From 40,000 To 10l</option>
                                                    <option value="60000,2000000">From 60,000 To 20l</option>
                                                    <option value="70000,3000000">From 70,000 To 30l</option>
                                                    <option value="80000,4000000">From 80,000 To 40l</option>
                                                    <option value="90000,5000000">From 90,000 To 50l</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-12 small-padd">
                                        <div class="form-group none">
                                            <button class="btn search-btn"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-lg-3 col-md-9">
                    <div class="modern-testimonial">
                        @foreach ($sliders as $slider)
                            <div class="single_items">
                                @if($slider->link)
                                    <a href="{{$slider->link}}">
                                        <img src="{{asset('backend/img/sliders/'.$slider->image)}}" class="img-fluid br_red">
                                    </a>
                                @else
                                    <img src="{{asset('backend/img/sliders/'.$slider->image)}}" class="img-fluid br_red">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <section class="gray-simple min">
        <div class="container">
            <div class="row">
                <div class="col-9 col-md-9">
                    <div class="sec-heading">
                        <h2>Get Started With Exploring Real Estate Options</h2>
                    </div>
                </div>
                <div class="col-3 col-md-3">
                    <div class="float-end mt-2">
                        <a href="#" class="default-btn border-radius"> View All
                            <i class="fas fa-chevron-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg col-md-4 col-xs-6">
                    <div class="property_cats_boxs">
                        <a href="{{ route('properties') }}?properties_type=flat_apartment" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-3">
                                    <i class="flaticon-apartments"></i>
                                </div>
                                <div class="property_category_expand property_category_short-text">
                                    <h4>Flat/ Apartment</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-xs-6">
                    <div class="property_cats_boxs">
                        <a href="{{ route('properties') }}?properties_type=residental_house" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-5">
                                    <i class="flaticon-modern-house-4"></i>
                                </div>
                                <div class="property_category_expand property_category_short-text">
                                    <h4>Residential House</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-xs-6">
                    <div class="property_cats_boxs">
                        <a href="{{ route('properties') }}?properties_type=commerical_space" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-4">
                                    <i class="flaticon-student-housing"></i>
                                </div>
                                <div class="property_category_expand property_category_short-text">
                                    <h4>Commercial Space</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-xs-6">
                    <div class="property_cats_boxs">
                        <a href="{{ route('properties') }}?properties_type=plot" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-1">
                                    <i class="flaticon-beach-house-2"></i>
                                </div>
                                <div class="property_category_expand property_category_short-text">
                                    <h4>Plot</h4>
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
                <div class="col-9 col-md-9">
                    <div class="sec-heading">
                        <h2>Popular Properties</h2>
                    </div>
                </div>
                <div class="col-3 col-md-3">
                    <div class="float-end mt-2">
                        <a href="#" class="default-btn border-radius">
                            View All <i class="fas fa-chevron-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">
                        @foreach ($properties as $property)
                            <div class="single_items">
                                <div class="property-listing property-2">
                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <a href="{{ route('property.detail', $property->slug) }}">
                                                <img src="{{ uploaded_asset($property->thumbnail_img) }}" class="img-fluid mx-auto" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="_card_list_flex mb-2">
                                                <div class="_card_flex_01">
                                                    <span class="property-type elt_rent">{{ ucwords(str_replace('_', ' ', $property->properties_type)) }}</span>
                                                </div>
                                                <div class="_card_flex_last">
                                                    <div class="prt_saveed_12lk">
                                                        <span class="latest_new_post hot">{{ $property->carpet_area }} sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="listing-short-detail">
                                                <h4 class="listing-name verified">
                                                    <a href="{{ route('property.detail', $property->slug) }}" class="prt-link-detail">{{ $property->name }}</a>
                                                </h4>
                                                @if ($property->pincode || $property->address)
                                                    <div class="foot-location">
                                                        <img src="{{ asset('frontend/assets/img/pin.svg') }}" width="18" alt="" />{{ $property->address }}
                                                        @if ($property->pincode)
                                                            {{ $property->city }}, {{ $property->state }},
                                                            {{ $property->country }},{{ $property->pincode }}
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                            <h6 class="listing-card-info-price mb-0 p-0">
                                                ₹{{ abreviateTotalCount($property->final_price) }}
                                            </h6>
                                        </div>
                                        <div class="footer-flex">
                                            <a href="{{ route('property.detail', $property->slug) }}" class="prt-view">View Detail</a>
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
    <section class="min gray-simple">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9 col-md-9">
                    <div class="sec-heading">
                        <h2>Top Projects</h2>
                    </div>
                </div>
                <div class="col-3 col-md-3">
                    <div class="float-end mt-2">
                        <a href="#" class="default-btn border-radius"> View All
                            <i class="fas fa-chevron-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">
                        @foreach ($projects as $project)
                            <div class="single_items">
                                <div class="property-listing property-2">
                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <a href="#">
                                                <img src="{{ uploaded_asset($project->cover_image) }}" class="img-fluid mx-auto" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="_card_list_flex mb-2">
                                                <div class="_card_flex_01">
                                                    <span class="_list_blickes _netork">{{ $project->total_unit }} Unit</span>
                                                </div>
                                            </div>
                                            <div class="listing-short-detail">
                                                <h4 class="listing-name verified">
                                                    <a href="#" class="prt-link-detail">{{ $project->name }}</a>
                                                </h4>
                                                <div class="foot-location">
                                                    <img src="{{ asset('frontend/assets/img/pin.svg') }}" width="18" alt="" />{{ $project->address }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                            <h6 class="listing-card-info-price mb-0 p-0">{{ $project->project_area }} Area</h6>
                                        </div>
                                        <div class="footer-flex">
                                            <a href="#" class="prt-view">View Detail</a>
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
    <section class="min">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>Top Property Places</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($cities as $key => $city)
                    <div class="@if ($key < 3) col-lg-4 col-md-4 col-sm-6 @else col-lg-6 col-md-6 col-sm-6 @endif">
                        <a href="{{ route('properties') }}?location={{ $city->id }}" class="img-wrap">
                            <div class="location_wrap_content visible">
                                <div class="location_wrap_content_first">
                                    <h4>{{ $city->name }}</h4>
                                    <span>{{ $city->property_count }} Properties</span>
                                </div>
                                <div class="location_btn"><i class="fa fa-arrow-right"></i></div>
                            </div>
                            <div class="img-wrap-background" style="background-image: url({{ asset('frontend/assets/img/city-6.png') }});"></div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="min gray-simple">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9 col-md-9">
                    <div class="sec-heading">
                        <h2>Featured Properties</h2>
                    </div>
                </div>
                <div class="col-3 col-md-3">
                    <div class="float-end mt-2">
                        <a href="#" class="default-btn border-radius"> View All
                            <i class="fas fa-chevron-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">
                        @foreach ($featured_properties as $featured_property)
                            <div class="single_items">
                                <div class="property-listing property-2">
                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <a href="{{ route('property.detail', $featured_property->slug) }}">
                                                <img src="{{ uploaded_asset($featured_property->thumbnail_img) }}" class="img-fluid mx-auto" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="_card_list_flex mb-2">
                                                <div class="_card_flex_01">
                                                    <span class="property-type elt_rent">{{ ucwords(str_replace('_', ' ', $featured_property->properties_type)) }}</span>
                                                </div>
                                                <div class="_card_flex_last">
                                                    <div class="prt_saveed_12lk">
                                                        <span class="latest_new_post hot">{{ $featured_property->carpet_area }} sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="listing-short-detail">
                                                <h4 class="listing-name verified">
                                                    <a href="{{ route('property.detail', $featured_property->slug) }}" class="prt-link-detail">{{ $featured_property->name }}</a>
                                                </h4>
                                                @if($featured_property->pincode || $featured_property->address)
                                                    <div class="foot-location">
                                                        <img src="{{ asset('frontend/assets/img/pin.svg') }}" width="18" alt="" />{{ $featured_property->address }}
                                                        @if ($featured_property->pincode)
                                                            {{ $featured_property->city }},
                                                            {{ $featured_property->state }},
                                                            {{ $featured_property->country }},{{ $featured_property->pincode }}
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                            <h6 class="listing-card-info-price mb-0 p-0">
                                                ₹{{ abreviateTotalCount($featured_property->final_price) }}
                                            </h6>
                                        </div>
                                        <div class="footer-flex">
                                            <a href="{{ route('property.detail', $featured_property->slug) }}" class="prt-view">View Detail</a>
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
    <section class="min">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-9 col-md-9">
                    <div class="sec-heading">
                        <h2>Most Demanded Properties</h2>
                    </div>
                </div>
                <div class="col-3 col-md-3">
                    <div class="float-end mt-2">
                        <a href="#" class="default-btn border-radius"> View All
                            <i class="fas fa-chevron-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">
                        @foreach ($most_demanded_properties as $most_demanded_property)
                            <div class="single_items">
                                <div class="property-listing property-2">
                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <a href="{{ route('property.detail', $most_demanded_property->slug) }}">
                                                <img src="{{ uploaded_asset($most_demanded_property->thumbnail_img) }}" class="img-fluid mx-auto" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="_card_list_flex mb-2">
                                                <div class="_card_flex_01">
                                                    <span class="property-type elt_rent">{{ ucwords(str_replace('_', ' ', $most_demanded_property->properties_type)) }}</span>
                                                </div>
                                                <div class="_card_flex_last">
                                                    <div class="prt_saveed_12lk">
                                                        <span class="latest_new_post hot">{{ $most_demanded_property->carpet_area }} sqft</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="listing-short-detail">
                                                <h4 class="listing-name verified">
                                                    <a href="{{ route('property.detail', $most_demanded_property->slug) }}" class="prt-link-detail">{{ $most_demanded_property->name }}</a>
                                                </h4>
                                                @if ($most_demanded_property->pincode || $most_demanded_property->address)
                                                    <div class="foot-location">
                                                        <img src="{{ asset('frontend/assets/img/pin.svg') }}" width="18" alt="" />{{ $most_demanded_property->address }}
                                                        @if ($most_demanded_property->pincode)
                                                            {{ $most_demanded_property->city }},
                                                            {{ $most_demanded_property->state }},
                                                            {{ $most_demanded_property->country }},{{ $most_demanded_property->pincode }}
                                                        @endif
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                            <h6 class="listing-card-info-price mb-0 p-0">
                                                ₹{{ abreviateTotalCount($most_demanded_property->final_price) }}
                                            </h6>
                                        </div>
                                        <div class="footer-flex">
                                            <a href="{{ route('property.detail', $most_demanded_property->slug) }}" class="prt-view">View Detail</a>
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
    <section class="min gray-simple">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>How It Works?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="wpk_process">
                        <div class="wpk_thumb">
                            <div class="wpk_thumb_figure">
                                <img src="{{ asset('frontend/assets/img/account-cl.svg') }}" class="img-fluid" alt="" />
                            </div>
                        </div>
                        <div class="wpk_caption">
                            <h4>Create An Account</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="wpk_process active">
                        <div class="wpk_thumb">
                            <div class="wpk_thumb_figure">
                                <img src="{{ asset('frontend/assets/img/search.svg') }}" class="img-fluid" alt="" />
                            </div>
                        </div>
                        <div class="wpk_caption">
                            <h4>Find & Search Property</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="wpk_process">
                        <div class="wpk_thumb">
                            <div class="wpk_thumb_figure">
                                <img src="{{ asset('frontend/assets/img/booking-cl.svg') }}" class="img-fluid" alt="" />
                            </div>
                        </div>
                        <div class="wpk_caption">
                            <h4>Book Your Property</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have Ipsum available.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="min">
        <div class="container">
            <div class="row">
                <div class="col-9 col-md-9">
                    <div class="sec-heading">
                        <h2>New Project Gallery</h2>
                    </div>
                </div>
                <div class="col-3 col-md-3">
                    <div class="float-end mt-2">
                        <a href="#" class="default-btn border-radius"> View All
                            <i class="fas fa-chevron-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide-custom space">
                        @foreach ($projects as $project)
                            <div class="single_items">
                                <div class="property-listing list_view row m-0">
                                    <div class="col-md-4 p-0">
                                        <div class="_exlio_125">Sponsored</div>
                                        <div class="project">
                                            <a href="#">
                                                <img src="{{ uploaded_asset($project->cover_image) }}" class="img-fluid mx-auto" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 pr-0">
                                        <div class="listing-detail-wrapper mt-1">
                                            <div class="listing-short-detail-wrap">
                                                <div class="_card_list_flex">
                                                    <div class="_card_flex_01">
                                                        <h5>
                                                            <a href="#" class="prt-link-detail">{{ $project->name }}</a>
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="_card_list_flex">
                                                    <div class="_card_flex_01">
                                                        <h4 class="listing-name verified">
                                                            <a href="#" class="prt-link-detail">{{ $project->address }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                {{-- <div class="_card_flex_last">
                                                    <h6 class="listing-card-info-price mb-0">₹3,700
                                                        <span><del>4000</del></span></spa>
                                                    </h6>
                                                </div> --}}
                                            </div>
                                        </div>
                                        <div class="listing-detail-footer">
                                            {{-- <div class="footer-first">
                                                <div class="foot-rate">
                                                    <span>Marketed by VHV Builders Pvt. Ltd.</span>
                                                </div>
                                            </div> --}}
                                            <div class="footer-flex">
                                                <a href="#" class="prt-view">View
                                                    <i class="fas fa-chevron-right pl-1"></i>
                                                </a>
                                            </div>
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
    <section class="theme-bg call_action_wrap-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call_action_wrap">
                        <div class="call_action_wrap-head">
                            <h3>Do You Have Questions ?</h3>
                            <span>We'll help you to grow your career and growth.</span>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-call_action_wrap">Contact Us
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
