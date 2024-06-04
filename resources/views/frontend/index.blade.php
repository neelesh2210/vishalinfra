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
                    <h1 class="big-header-capt mb-4">Unlock your dream home with us!</h1>
                    <div class="simple-search-wrap mb-3">
                        <div class="hero_search-2">
                            <form action="{{ route('properties') }}">
                                <div class="simple_tab_search">
                                    <div class="pk-input-group">
                                        <input type="text" name="search_key" class="email form-control" placeholder="Search By City, Locality, Project">
                                        <button class="pk-subscribe-submit" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
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
                                                    <option value="100000,6000000">From 1l To 60l</option>
                                                    <option value="200000,7000000">From 2l To 70l</option>
                                                    <option value="300000,8000000">From 3l To 80l</option>
                                                    <option value="400000,9000000">From 4l To 90l</option>
                                                    <option value="500000,10000000">From 5l To 1cr</option>
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
    <section class="min">
        <div class="container">
            <div class="row">
                <div class="col-9 col-md-9">
                    <div class="sec-heading">
                        <h2>Categories</h2>
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
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/balcony.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">2BHK Homes</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/appartment.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Deluxe Flats</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/beach-house.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Offices</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img text-shadow1"> <img src="{{ asset('frontend/assets/img/icon/building.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Apartments</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/cabin.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Budget House</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/farm.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Farm House</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light mb-xl-0">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/house.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">2BHK House</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light mb-xl-0">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/mansion.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Duplex House</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light mb-md-0">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/appartment.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">3BHK Flats</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light mb-md-0">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/cabin.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Single Houses</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3  col-xs-6">
                    <div class="card bg-card-light mb-sm-0">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/house.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Luxury Rooms</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-xs-6">
                    <div class="card bg-card-light mb-0">
                        <div class="card-body">
                            <div class="cat-item text-center">
                                <a href="#"></a>
                                <div class="cat-img"> <img src="{{ asset('frontend/assets/img/icon/beach-house.svg')}}" alt="img"> </div>
                                <div class="cat-desc">
                                    <h5 class="mb-1">Offices</h5> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                    <img src="{{ asset('frontend/assets/img/building.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="property_category_expand property_category_short-text">
                                    <h1>Flat/ Apartment</h1>
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
                                    <img src="{{ asset('frontend/assets/img/housing-area.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="property_category_expand property_category_short-text">
                                    <h1>Residential House</h1>
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
                                    <img src="{{ asset('frontend/assets/img/commercial-building.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="property_category_expand property_category_short-text">
                                    <h1>Commercial Space</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg col-md-4 col-xs-6">
                    <div class="property_cats_boxs">
                        <a href="{{ route('properties') }}?properties_type=plot" class="category-box">
                            <div class="property_category_short">
                                <div class="category-icon clip-3">
                                    <img src="{{ asset('frontend/assets/img/location-pin.png') }}" alt="" class="img-fluid">
                                </div>
                                <div class="property_category_expand property_category_short-text">
                                    <h1>Plot</h1>
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
                        <a href="{{route('properties')}}" class="default-btn border-radius">
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
                                        <div class="list-img-slide watermarked">
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
                                                <h1 class="listing-name verified">
                                                    <a href="{{ route('property.detail', $property->slug) }}" class="prt-link-detail">{{ $property->name }}</a>
                                                </h1>
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
                                        <div class="list-img-slide watermarked">
                                            <a href="{{route('project.details',$project->id)}}">
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
                                                <h1 class="listing-name verified">
                                                    <a href="{{route('project.details',$project->id)}}" class="prt-link-detail">{{ $project->name }}</a>
                                                </h1>
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
                                            <a href="{{route('project.details',$project->id)}}" class="prt-view">View Detail</a>
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
                                    <h1>{{ $city->name }}</h1>
                                    {{-- <span>{{ $city->property_count }} Properties</span> --}}
                                </div>
                                <div class="location_btn"><i class="fa fa-arrow-right"></i></div>
                            </div>
                            <div class="img-wrap-background" style="background-image: url({{ asset('frontend/assets/img/'.($key+1).'.webp') }});"></div>
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
                                        <div class="list-img-slide watermarked">
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
                                        <div class="list-img-slide watermarked">
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
                        <div class="wpk_thumb watermarked">
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
                            <div class="wpk_thumb_figure watermarked">
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
                            <div class="wpk_thumb_figure watermarked">
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
                                            <a href="{{route('project.details',$project->id)}}">
                                                <img src="{{ uploaded_asset($project->cover_image) }}" class="img-fluid mx-auto" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 pr-0">
                                        <div class="listing-detail-wrapper mt-1">
                                            <div class="listing-short-detail-wrap">
                                                <div class="_card_list_flex">
                                                    <div class="_card_flex_01">
                                                        <h1>
                                                            <a href="{{route('project.details',$project->id)}}" class="prt-link-detail">{{ $project->name }}</a>
                                                        </h1>
                                                    </div>
                                                </div>
                                                <div class="_card_list_flex">
                                                    <div class="_card_flex_01">
                                                        <h4 class="listing-name verified">
                                                            <a href="{{route('project.details',$project->id)}}" class="prt-link-detail">{{ $project->address }}</a>
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
                                                <a href="{{route('project.details',$project->id)}}" class="prt-view">View
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
    <section class="gray-simple">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="sec-heading center">
                        <h2>FAQ?</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10 m-auto">
                    <!-- Single Basics List -->
                    <div class="faq_wrap">
                        <div class="faq_wrap_body">
                            <div class="accordion" id="generalac">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            1. How do I search for properties on the portal?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#generalac">
                                      <div class="card-body">
                                        <p class="ac-para">You can use the search bar on the homepage to enter specific criteria such as location, price range, and property type. Additionally, you can use filters to refine your search further.</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            2. What information is available for each property listing?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#generalac">
                                      <div class="card-body">
                                        <p class="ac-para">Each listing includes details such as property type, location, price, number of bedrooms and bathrooms, square footage, and photos. Additional information may include amenities, property features, and contact details for the listing agent.</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            3. Can I save my favorite listings for future reference?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#generalac">
                                      <div class="card-body">
                                        <p class="ac-para">Yes, you can create an account on our portal and save your favorite listings. This allows you to easily revisit and compare properties at any time.</p>
                                      </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            4. How do I contact the property owner or real estate agent?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="collapseFour" data-parent="#generalac">
                                        <div class="card-body">
                                          <p class="ac-para">Contact information for the property owner or listing agent is provided on each listing page. You can use the provided email address or phone number to reach out and inquire about the property.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFive">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            5. Is there a fee for using the portal as a buyer or tenant?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="collapseFive" data-parent="#generalac">
                                        <div class="card-body">
                                          <p class="ac-para">No, our portal is free for users looking to buy or rent properties. There are no hidden fees for accessing property listings or using the search and contact features.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingSix">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            6. How can I list my property for sale or rent on the portal?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="collapseSix" data-parent="#generalac">
                                        <div class="card-body">
                                          <p class="ac-para">To list your property, you can create a seller or landlord account on our portal. Follow the step-by-step instructions to input property details, upload photos, and set your desired sale or rental terms.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            7. What are the benefits of creating an account on the portal?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseSeven" class="collapse" aria-labelledby="collapseSeven" data-parent="#generalac">
                                        <div class="card-body">
                                          <p class="ac-para">Creating an account allows you to save favorite listings, receive property alerts based on your preferences, and easily manage your own property listings if you are a seller or landlord.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingEight">
                                      <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                            8. How often are property listings updated on the portal?
                                        </button>
                                      </h2>
                                    </div>
                                    <div id="collapseEight" class="collapse" aria-labelledby="collapseEight" data-parent="#generalac">
                                        <div class="card-body">
                                          <p class="ac-para">Our listings are regularly updated to provide the latest information. However, the frequency may vary, and it's always a good idea to check back periodically for the most current listings.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer-banner">
        <img src="{{ asset('frontend/images/bg-footer.png') }}" alt="img">
    </div>
    {{-- <section class="theme-bg call_action_wrap-wrap">
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
    </section> --}}
@endsection
