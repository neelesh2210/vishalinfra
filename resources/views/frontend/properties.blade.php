@extends('frontend.layouts.app')
@section('content')
    <div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/bg.jpg') }});" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h2 class="breadcrumb-title">All Property</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="gray pt-4">
        <div class="container">
            <div class="row m-0">
                <div class="short_wraping">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12 col-sm-12 order-lg-2 order-md-3 col-sm-12">
                            <div class="shorting_pagination">
                                <div class="shorting_pagination_laft">
                                    <h5>Showing {{($properties->currentpage()-1)*$properties->perpage()+1}}-{{(($properties->currentpage()-1)*$properties->perpage())+$properties->count()}} of {{$properties->total()}} results</h5>
                                </div>
                                <div class="shorting_pagination_right">
                                    {!! $properties->links() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-6 col-sm-12 order-lg-3 order-md-2 col-sm-6">
                            <div class="shorting-right">
                                <label>Short By:</label>
                                <div class="dropdown show">
                                    <a class="btn btn-filter dropdown-toggle" href="#" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <span class="selection">Most Rated</span>
                                    </a>
                                    <div class="drp-select dropdown-menu">
                                        <a class="dropdown-item" href="JavaScript:Void(0);">Most Rated</a>
                                        <a class="dropdown-item" href="JavaScript:Void(0);">Most Viewd</a>
                                        <a class="dropdown-item" href="JavaScript:Void(0);">News Listings</a>
                                        <a class="dropdown-item" href="JavaScript:Void(0);">High Rated</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="page-sidebar p-0">
                        <div class="sidebar-widgets p-4">
                            <h4>Fillter Property</h4>
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Search Here">
                                    <i class="ti-search"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-with-icon">
                                    <input type="text" class="form-control" placeholder="Location">
                                    <i class="ti-location-pin"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="simple-input">
                                    <select id="ptype" class="form-control">
                                        <option value="">Property Type</option>
                                        <option value="1">Apartment</option>
                                        <option value="3">Family</option>
                                        <option value="4">Houses</option>
                                        <option value="5">Villa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="simple-input">
                                            <input type="text" class="form-control" placeholder="Min Area">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <div class="simple-input">
                                            <input type="text" class="form-control" placeholder="Max Area">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-4 pb-4">
                                    <h6>Choose Price</h6>
                                    <div class="rg-slider">
                                        <input type="text" class="js-range-slider" name="my_range" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                    <h6>Advance Features</h6>
                                    <ul class="row p-0 m-0">
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <input id="a-1" class="checkbox-custom" name="a-1" type="checkbox">
                                            <label for="a-1" class="checkbox-custom-label">Air Condition</label>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <input id="a-2" class="checkbox-custom" name="a-2" type="checkbox">
                                            <label for="a-2" class="checkbox-custom-label">Bedding</label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 pt-4">
                                    <button class="btn theme-bg rounded full-width">Find New Home <i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="row justify-content-center">
                        @foreach($properties as $property)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="property-listing list_view row m-0">
                                    <div class="col-md-4 p-0">
                                        <div class="_exlio_125">Verified on Site</div>
                                        <div class="list-img-slide">
                                            <div class="click">
                                                    <a href="{{ route('property.detail',$property->slug) }}">
                                                        <img src="{{asset('uploads/all/1.jpg')}}" class="img-fluid mx-auto" alt="{{$property->name}}" />
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="listing-detail-wrapper mt-1">
                                            <div class="listing-short-detail-wrap">
                                                <div class="_card_list_flex mb-2">
                                                    <div class="_card_flex_01">
                                                    <h5><a href="{{ route('property.detail',$property->slug) }}" class="prt-link-detail">{{$property->name}} </a></h5>
                                                    </div>
                                                    <div class="_card_flex_last">
                                                        <h6 class="listing-card-info-price mb-0">₹{{$property->booking_amount}}</h6>
                                                        <span>₹{{$property->price}}/sqft</span>
                                                    </div>
                                                </div>
                                                @if($property->pincode)
                                                    <div class="_card_list_flex">
                                                        <div class="_card_flex_01">
                                                            <h4 class="listing-name verified">
                                                                <i class="ti-location-pin"></i> <a href="{{ route('property.detail',$property->slug) }}" class="prt-link-detail">{{optional($property->project)->city}}, {{optional($property->project)->state}}, {{optional($property->project)->country}} - {{optional($property->project)->pincode}}</a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="price-features-wrapper">
                                            <div class="block-body">
                                                <ul class="avl-features third">
                                                    <li class="active">3 BHK</li>
                                                    <li class="active">Balcony</li>
                                                    <li class="active">Corner Plot</li>
                                                    <li class="active">Semi-Furnished</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="listing-detail-footer">
                                            <div class="footer-first">
                                                <div class="foot-rates">
                                                    <span class="elio_rate good">4.2</span>
                                                    <div class="_rate_stio">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer-flex">
                                                <a href="{{ route('property.detail',$property->slug) }}" class="prt-view">View Detail  <i class="fas fa-chevron-right pl-1"></i></a>
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
                        <a href="{{route('contact')}}" class="btn btn-call_action_wrap">Contact Us <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
