@extends('frontend.layouts.app')
@section('content')
    <section class="bg-gray-7">
        <div class="breadcrumbs-custom box-transform-wrap context-dark">
            <div class="container">
                <h3 class="breadcrumbs-custom-title">Properties</h3>
                <div class="breadcrumbs-custom-decor"></div>
            </div>
            <div class="box-transform" style="background-image: url(images/background/background-7.jpg);"></div>
        </div>
        <div class="container">
            <ul class="breadcrumbs-custom-path">
                <li><a href="{{route('index')}}">Home</a></li>
                <li class="active">Properties</li>
            </ul>
        </div>
    </section>

    <section class="property-section section section-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12 order-1 mb-sm-50 mb-xs-50">
                    @foreach ($properties as $property)
                        <div class="card p-3 mb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card__photo__fig">
                                        @if($property->photos)
                                        <span class="card__photo__fig--count">{{count(json_decode($property->photos))}}
                                            <span class="sign-plus">+</span>
                                        </span>
                                        @endif
                                        <img src="{{asset('backend/img/properies/'.$property->thumbnail_img)}}" onerror="this.onerror=null;this.src='{{asset('frontend/images/property.png')}}';">
                                        <div class="card__photo__fig--post">Posted: {{$property->created_at->diffForHumans()}}</div>
                                    </div>
                                    <div class="card__ads">
                                        {{-- <div class="card__ads__shield">
                                            <div class="card__ads__shield--item" data-shieldicon="agent-certified">Certified Agent</div>
                                            <div class="card__ads__shield--item" data-shieldicon="locality-superstar">Locality Superstar</div>
                                        </div> --}}
                                        <div class="card__ads__info">
                                            <div class="card__ads__info--right">
                                                <div class="card__ads__info--name">{{optional($property->project)->name}}</div>
                                                {{-- <div class="card__ads__info--served">{{optional($property->project)->state}}, {{optional($property->project)->country}} - {{optional($property->project)->pincode}}</div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- <div class="card__sort">
                                        <span class="card__sort--doat">
                                            <div class="card__tooltip" data-position="top-right" style="width: 178px;">
                                                <div class="card__tooltip__box">
                                                    <div class="card__tooltip__body">
                                                        <ul class="card__sort--doat__list">
                                                            <li class="card__sort--doat__list--item"><a href="javascript:void(0)" data-ico="ico-share-feedback">Share Feedback</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                    </div> --}}
                                    <h2 class="card--title">{{$property->name}}</h2>
                                    {{-- <span class="card__share--icon" data-ico="ico-share"></span>
                                    <span class="card__sort--icon"></span> --}}
                                    <div class="card__society">
                                        <a class="card__society--name" href="{{ route('property.detail',$property->slug) }}" target="_blank">
                                            <div class="card__ads__info--served">{{optional($property->project)->city}}, {{optional($property->project)->state}}, {{optional($property->project)->country}} - {{optional($property->project)->pincode}}</div>
                                        </a>
                                    </div>
                                    <div class="card__summary " id="propertiesAction42328207">
                                        <div class="card__summary__list">
                                            <div class="card__summary__list--item" data-summary="carpet-area">
                                                <div class="card__summary--label">Carpet Area</div>
                                                <div class="card__summary--value">{{$property->plot_area}} sqft</div>
                                            </div>
                                            <div class="card__summary__list--item" data-summary="status">
                                                <div class="card__summary--label">Status</div>
                                                <div class="card__summary--value">{{ucwords(str_replace('_',' ',$property->prossession_status))}}</div>
                                            </div>
                                            {{-- <div class="card__summary__list--item" data-summary="floor">
                                                <div class="card__summary--label">Floor</div>
                                                <div class="card__summary--value">4 out of 10</div>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="card--desc remove-truncated">
                                        <div class="card--desc--text">
                                            <p class="">
                                                {{$property->remark}}
                                            </p><span class="card--desc--readmore">Read more</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card__price">
                                        <div class="card__price--amount"><span class="rupees">₹</span>{{$property->booking_amount}}
                                            {{-- <span class="card__price--ico-info"></span> --}}
                                        </div>
                                        <div class="card__price--size"><span class="rupees">₹</span>{{$property->price}} per sqft</div>
                                    </div>
                                    <div class="action action--single card__action"><a href="#" class="action--btn medium btn-red">Enquire Now</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="col-lg-3 col-12 order-2 pl-30 pl-sm-15 pl-xs-15">
                    <div class="sidebar">
                        <h4 class="sidebar-title">
                            <span class="text">Feature Property</span>
                            <span class="shape"></span>
                        </h4>
                        <div class="sidebar-property-list">
                            <div class="sidebar-property">
                                <div class="image">
                                    <span class="type">For Rent</span>
                                    <a href="single-properties.html">
                                        <img src="{{ asset('/frontend/images/property-1.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-properties.html">Friuli-Venezia Giulia</a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt="">568 E 1st Ave, Miami</span>
                                    <span class="price">$550 <span>Month</span></span>
                                </div>
                            </div>
                            <div class="sidebar-property">
                                <div class="image">
                                    <span class="type">For Sale</span>
                                    <a href="single-properties.html">
                                        <img src="{{ asset('/frontend/images/property-1.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-properties.html">Marvel de Villa</a></h5>
                                    <span class="location"><img src="assets/images/icons/marker.png" alt="">450 E 1st Ave, New Jersey</span>
                                    <span class="price">$2550</span>
                                </div>
                            </div>
                            <div class="sidebar-property">
                                <div class="image">
                                    <span class="type">For Rent</span>
                                    <a href="single-properties.html">
                                        <img src="{{ asset('/frontend/images/property-1.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="content">
                                    <h5 class="title"><a href="single-properties.html">Ruposi Bangla Cottage</a></h5>
                                    <span class="location"><i class="fa fa-map-marker"></i> 215 L AH Rod, California</span>
                                    <span class="price">$550 <span>Month</span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Popular Tags</span>
                            <span class="shape"></span>
                        </h4>
                        <div class="sidebar-tags">
                            <a href="#">Houses</a>
                            <a href="#">Real Home</a>
                            <a href="#">Baths</a>
                            <a href="#">Beds</a>
                            <a href="#">Garages</a>
                            <a href="#">Family</a>
                            <a href="#">Real Estates</a>
                            <a href="#">Properties</a>
                            <a href="#">Location</a>
                            <a href="#">Price</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
