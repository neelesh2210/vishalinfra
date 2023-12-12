@extends('frontend.layouts.app')
@section('content')
<style>
    .watermarked {
  position: relative;
}

.watermarked:after {
    content: "";
    display: block;
    width: 100%;
    height: 100%;
    position: absolute;
    top: 120px;
    left: 150px;
    background-image: url(http://127.0.0.1:8000/frontend/assets/img/logo.png);
    background-size: 80px 30px;
    background-position: 30px 30px;
    background-repeat: no-repeat;
    opacity: 0.7;
}
</style>
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
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    {{-- <div class="page-sidebar p-0">
                            <!-- Find New Property -->
                            <div class="sidebar-widgets p-4 mb-0">
                                <div class="form-group mb-0">
                                    <div class="input-with-icon">
                                        <input type="text" class="form-control" placeholder="Search Keywords">
                                        <i class="ti-search"></i>
                                    </div>
                                </div>
                            </div>
                    </div> --}}

                    <div class="p-0">
                        <div class="sider_blocks_wrap">
                            <div class="side-booking-body">
                                <div class="agent-_blocks_title">
                                    <div class="agent-_blocks_thumb"><img src="{{ asset('frontend/assets/img/profile.png')}}" alt=""></div>
                                    <div class="agent-_blocks_caption">
                                        <h4><a href="#">Customer Support</a></h4>
                                        <span class="approved-agent"><i class="ti-check"></i>approved</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <a href="#" class="agent-btn-contact" data-toggle="modal" data-target="#autho-message"><i class="ti-comment-alt"></i>Message</a>
                                <span id="number" data-last="+91-9453777525">
                                    <span><a href="tel:+91-9453777525">+91-9453777525</a></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <form action="{{ route('properties') }}">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <select id="location" name="location" class="form-control">
                                        <option value="">Select City</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <select id="ptypes" name="properties_type" class="form-control">
                                        <option value="">All categories</option>
                                        <option value="flat_apartment">Flat/ Apartment</option>
                                        <option value="residental_house">Residential House</option>
                                        <option value="commerical_space">Commercial Space</option>
                                        <option value="plot">Plot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 d-md-none d-lg-block">
                                <div class="form-group">
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
                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="search_key" value="{{$search_key}}" class="form-control" placeholder="Search Property">
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-2 col-sm-12 small-padd">
                                <div class="form-group none">
                                    <button class="btn search-btn"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row justify-content-center">
                        @if($city_banner)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <img src="{{asset('backend/img/banners/'.$city_banner)}}" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/img/bg.jpg') }}'" class="img-fluid">
                            </div>
                        @endif
                        @foreach($properties as $property)
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-3">
                                <div class="property-listing list_view row m-0">
                                    <div class="col-md-4 p-0">
                                        @if($property->is_featured)
                                            <div class="_exlio_125">Verified on Site</div>
                                        @endif
                                        @if($property->is_trust_seal)
                                            <div class="trusted_img">
                                                <img src="{{ asset('frontend/assets/img/trusted.png')}}" alt="">
                                            </div>
                                        @endif
                                        <div class="list-img-slide">
                                            <div class="click watermarked">
                                                    <a href="{{uploaded_asset($property->thumbnail_img)}}">
                                                        <img src="{{uploaded_asset($property->thumbnail_img)}}" class=" img-fluid mx-auto" alt="{{$property->name}}" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                                                    </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8 phn-pd-0">
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
                                                    @if($property->bedroom)
                                                        <li class="active">{{$property->bedroom}} BHK</li>
                                                        <li class="active">Balcony</li>
                                                        {{-- <li class="active">Corner Plot</li> --}}
                                                        <li class="active">{{ucwords(str_replace('-',' ',$property->furnished_status))}}</li>
                                                    @else
                                                        <li class="active">{{$property->plot_length}} Length</li>
                                                        <li class="active">{{$property->plot_breadth}} Breadth</li>
                                                    @endif
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
                    <div class="row justify-content-center pt-3 m-0">
                        <div class="short_wraping mb-3">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-md-12 col-sm-12 order-lg-2 order-md-3 col-sm-12">
                                    <div class="shorting_pagination">
                                        <div class="shorting_pagination_laft">
                                            <h5>Showing {{($properties->currentpage()-1)*$properties->perpage()+1}}-{{(($properties->currentpage()-1)*$properties->perpage())+$properties->count()}} of {{$properties->total()}} results</h5>
                                        </div>
                                        <div class="shorting_pagination_right">
                                            {!! $properties->links() !!}
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

    			<!-- Send Message -->
			<div class="modal fade" id="autho-message" tabindex="-1" role="dialog" aria-labelledby="authomessage" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
					<div class="modal-content" id="authomessage">
						<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
						<div class="modal-body">
							<h4 class="modal-header-title">Drop Message</h4>
							<div class="login-form">
								<form>
                                    <div class="form-group">
										<div class="input-with-icons">
											<input type="text" class="form-control" placeholder="Enter Name">
										</div>
									</div>
                                    <div class="form-group">
										<div class="input-with-icons">
											<input type="text" class="form-control" placeholder="Enter Phone No.">
										</div>
									</div>
									<div class="form-group">
										<div class="input-with-icons">
											<input type="text" class="form-control" placeholder="Message Title">
										</div>
									</div>

									<div class="form-group">
										<div class="input-with-icons">
											<textarea class="form-control ht-80" placeholder="Message"></textarea>
										</div>
									</div>

									<div class="form-group">
										<button type="submit" class="btn btn-md full-width pop-login">Send Message</button>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->
@endsection
