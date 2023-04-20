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
                <li><a href="{{route('properties')}}">Property</a></li>
                <li class="active">{{$property_detail->name}}</li>
            </ul>
        </div>
    </section>

    <section class="property-section section section-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-12 order-1 mb-sm-50 mb-xs-50">
                    <section class="mb-ldp__section" id="details">
                        <div class="mb-ldp__dtls">
                            <div class="flex-row pad-b-4">
                                <div class="price"><span class="rupees">₹</span>{{$property_detail->booking_amount}}</div>
                                {{-- <div class="charges">See other charges
                                    <span class="ico-info pos-rel">
                                        <div class="mb-ldp__tooltip " data-position="top-center" style="width: 350px; left: calc(50% - 175px);">
                                            <span class="mb-ldp__tooltip--close"></span>
                                            <div class="mb-ldp__tooltip__box">
                                                <div class="mb-ldp__tooltip__body">
                                                    <div class="mb-ldp__tt-price-breakup">
                                                        <div class="mb-ldp__tt-price-breakup__row">
                                                            <div class="mb-ldp__tt-price-breakup--label">Rent</div>
                                                            <div class="mb-ldp__tt-price-breakup--value"><span class="rupees">₹</span>16,000</div>
                                                        </div>
                                                        <div class="mb-ldp__tt-price-breakup__row">
                                                            <div class="mb-ldp__tt-price-breakup--label">Monthly Maintenance</div>
                                                            <div class="mb-ldp__tt-price-breakup--value"><span class="rupees">₹</span>700</div>
                                                        </div>
                                                        <div class="mb-ldp__tt-price-breakup__row has-bdr text1">
                                                            <div class="mb-ldp__tt-price-breakup--label">Monthly Charges</div>
                                                            <div class="mb-ldp__tt-price-breakup--value"><span class="rupees">₹</span>16,700</div>
                                                        </div>
                                                        <div class="mb-ldp__tt-price-breakup__gray">
                                                            <div class="mb-ldp__tt-price-breakup__title">First Month Charges</div>
                                                            <div class="mb-ldp__tt-price-breakup__row">
                                                                <div class="mb-ldp__tt-price-breakup--label">Monthly Charges</div>
                                                                <div class="mb-ldp__tt-price-breakup--value"><span class="rupees">₹</span>16,700</div>
                                                            </div>
                                                            <div class="mb-ldp__tt-price-breakup__row">
                                                                <div class="mb-ldp__tt-price-breakup--label">Security Deposit</div>
                                                                <div class="mb-ldp__tt-price-breakup--value"><span class="rupees">₹</span>10,000</div>
                                                            </div>
                                                            <div class="mb-ldp__tt-price-breakup__row has-bdr text2">
                                                                <div class="mb-ldp__tt-price-breakup--label">Total First Month Amount</div>
                                                                <div class="mb-ldp__tt-price-breakup--value"><span class="rupees">₹</span>26,700</div>
                                                            </div>
                                                            <div class="mb-ldp__tt-price-breakup--notify">Electricity and water charges excluded</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </span>
                                </div> --}}
                                {{-- <div class="tags"><span class="tags--tick">Verified on Site</span></div> --}}
                            </div>
                            <div class="title">
                                <div class="title--text1">
                                    <span class="title--text1--text pad-r-4">{{$property_detail->name}} </span>
                                    <span class="title--text1--text">
                                        <a href="" target="_blank" class="title--link">{{optional($property_detail->project)->city}}, {{optional($property_detail->project)->state}}</a>
                                    </span>
                                </div>
                            </div>
                            <div class="grid">
                                <div class="photo">
                                    <div class="photo__fig">
                                        <img src="{{asset('backend/img/properies/'.$property_detail->thumbnail_img)}}" alt="{{$property_detail->name}} {{optional($property_detail->project)->city}}, {{optional($property_detail->project)->state}}" width="450" height="400" onerror="this.onerror=null;this.src='{{asset('frontend/images/property.png')}}';">
                                    </div>
                                </div>
                                <div class="body">
                                    <ul class="body__summary">
                                        @foreach (json_decode($property_detail->featuers) as $feature)
                                            <li class="body__summary--item">{{App\Models\Admin\Feature::where('id',$feature)->first()->name}}</li>
                                        @endforeach
                                        {{-- <li class="body__summary--item" data-icon="baths"><span class="body__summary--highlight">2</span>Baths</li>
                                        <li class="body__summary--item" data-icon="balconies"><span class="body__summary--highlight">2</span>Balconies</li>
                                        <li class="body__summary--item" data-icon="covered-parking"><span class="body__summary--highlight">1 </span>Covered Parking</li> --}}
                                    </ul>
                                    <ul class="body__list">
                                        <li class="body__list--item ">
                                            <div class="body__list--label">Plot Area</div>
                                            <div class="body__list--value body__list--flex body__list--flex-column">
                                                <div class="body__list">{{$property_detail->plot_area}} <span class="body__list--units"><span> &nbsp sqft</span></span></div>
                                                <div class="body__list--size"><span class="rupees">₹</span>{{$property_detail->price}}/sqft</div>
                                            </div>
                                        </li>
                                        <li class="body__list--item ">
                                            <div class="body__list--label">Facing</div>
                                            <div class="body__list--value">{{ucwords($property_detail->facing)}}</div>
                                        </li>
                                        <li class="body__list--item ">
                                            <div class="body__list--label">Plot Type</div>
                                            <div class="body__list--value">{{ucwords($property_detail->plot_type)}}</div>
                                        </li>
                                        <li class="body__list--item ">
                                            <div class="body__list--label">Status</div>
                                            <div class="body__list--value">{{ucwords(str_replace('_',' ',$property_detail->prossession_status))}}</div>
                                        </li>
                                        <li class="body__list--item ">
                                            <div class="body__list--label">Self / Tieup</div>
                                            <div class="body__list--value">{{ucwords($property_detail->self_tieup)}}</div>
                                        </li>
                                        <li class="body__list--item ">
                                            <div class="body__list--label">Booking Status</div>
                                            <div class="body__list--value">{{ucwords(str_replace('_',' ',$property_detail->booking_status))}}</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="flex-row"></div>
                            <div class="action">
                                <div class="mb-ldp__action action--inline ">
                                    <a class="mb-ldp__action--btn large btn-red">Contact Us</a>
                                    <a class="mb-ldp__action--btn large btn-white" href="{{route('user.property.detail',$property_detail->id)}}">Booking Request</a>
                                </div>
                                <ul class="updates">
                                    <li class="updates--item" data-icon="ico-last-contact">Posted: {{$property_detail->created_at->diffForHumans()}}</li>
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="col-lg-3 col-12 order-2 pl-30 pl-sm-15 pl-xs-15">
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Contact Us</span><span class="shape"></span></h4>
                        <div class="sidebar-agent-list mb-5">
                            <form action="#" method="post" class="sdw">
                                <div class="row row-20 gutters-20">
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <input class="form-input" id="name" type="text" name="name" required="">
                                            <label class="form-label vanguard-input-label" for="name">Your Name*</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <input class="form-input" id="phone" type="text" name="phone" required="">
                                            <label class="form-label vanguard-input-label" for="phone">Your Phone*</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-wrap">
                                            <input class="form-input" id="email" type="text" name="email" required="">
                                            <label class="form-label vanguard-input-label" for="email">Your Email*</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-wrap">
                                            <label class="form-label vanguard-input-label" for="message">Message</label>
                                            <textarea class="form-input textarea-lg" id="message" name="Address" required=""></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button class="button button-icon button-primary wow slideInUp" type="submit" name="submit" style="visibility: visible; animation-name: slideInUp;">Submit <i class="fa fa-chevron-circle-right"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar">
                        <h4 class="sidebar-title"><span class="text">Feature Property</span><span class="shape"></span></h4>
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
                </div>
            </div>
        </div>
    </section>
@endsection
