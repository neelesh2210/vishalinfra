@extends('frontend.layouts.app')
@section('content')
    <section class="gallery_parts pt-2 pb-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 col-sm-12 pr-1">
                    <div class="gg_single_part left">
                        <a href="{{asset('backend/img/properies/'.$property_detail->thumbnail_img)}}" class="mfp-gallery">
                            <img src="{{asset('backend/img/properies/'.$property_detail->thumbnail_img)}}" class="img-fluid mx-auto" alt="" />
                        </a>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-5 col-sm-12 pl-1">
                    @foreach (json_decode($property_detail->photos) as $photo)
                        <div class="gg_single_part-right min">
                            <a href="{{asset('backend/img/properies/'.$photo)}}" class="mfp-gallery">
                                <img src="{{asset('backend/img/properies/'.$photo)}}" class="img-fluid mx-auto" alt="" />
                            </a>
                        </div>
                    @endforeach
                </div> --}}
            </div>
        </div>
    </section>
    <div class="featured_slick_gallery gray d-block d-md-block d-lg-block d-xl-none">
        <div class="featured_slick_gallery-slide">
            @foreach (json_decode($property_detail->photos) as $photo)
                <div class="featured_slick_padd">
                    <a href="{{asset('backend/img/properies/'.$photo)}}" class="mfp-gallery">
                        <img src="{{asset('backend/img/properies/'.$photo)}}" class="img-fluid mx-auto" alt="" />
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="property_info_detail_wrap mb-4">
                        <div class="property_info_detail_wrap_first">
                            <div class="pr-price-into">
                                <ul class="prs_lists">
                                    <li><span class="bed">{{$property_detail->bedroom}} Beds</span></li>
                                    <li><span class="bath">{{$property_detail->bathroom}} Bath</span></li>
                                    <li><span class="gar">{{$property_detail->balconies}} Balcony</span></li>
                                    <li><span class="sqft">{{$property_detail->price}} sqft</span></li>
                                </ul>
                                <h2>{{$property_detail->name}}</h2>
                                <span><i class="lni-map-marker"></i> {{optional($property_detail->project)->city}}, {{optional($property_detail->project)->state}}, {{optional($property_detail->project)->country}} - {{optional($property_detail->project)->pincode}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">About Property</h4>
                        </div>
                        <div class="block-body">
                            <p>{{$property_detail->remark}}</p>
                        </div>
                    </div>
                    {{-- <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Advance Features</h4>
                        </div>
                        <div class="block-body">
                            <ul class="row p-0 m-0">
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-bed mr-1"></i>4 Bedrooms</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-bath mr-1"></i>2 Bathrooms</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-expand-arrows-alt mr-1"></i>12400 sqft</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-house-damage mr-1"></i>1 Living Rooms</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-building mr-1"></i>Build 2007</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-utensils mr-1"></i>2 Kitchens </li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-car mr-1"></i>Car Parking</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-briefcase-medical mr-1"></i>Free Medical</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-fire mr-1"></i>Fireplace</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-layer-group mr-1"></i>Residential</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-tv mr-1"></i>TV Cable</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-spa mr-1"></i>Free Spa</li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="property-sidebar">
                        <div class="sidebar-widgets">
                            <h4>Similar Property</h4>
                            <div class="sidebar_featured_property">
                                @foreach ($similer_properties as $similer_property)
                                    <div class="sides_list_property">
                                        <div class="sides_list_property_thumb">
                                            <img src="{{asset('backend/img/properies/'.$similer_property->thumbnail_img)}}" class="img-fluid" alt="" />
                                        </div>
                                        <div class="sides_list_property_detail">
                                            <h4><a href="{{ route('property.detail',$similer_property->slug) }}">{{$similer_property->name}}</a></h4>
                                            <span><i class="ti-location-pin"></i>{{optional($similer_property->project)->city}}, {{optional($similer_property->project)->state}}, {{optional($similer_property->project)->country}} - {{optional($similer_property->project)->pincode}}</span>
                                            <div class="lists_property_price">
                                                <div class="lists_property_types">
                                                    <div class="property_types_vlix sale">{{ucfirst($similer_property->transaction_type)}}</div>
                                                </div>
                                                <div class="lists_property_price_value">
                                                    <h4>₹{{$similer_property->booking_amount}}</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
