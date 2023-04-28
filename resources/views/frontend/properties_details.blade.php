@extends('frontend.layouts.app')
@section('content')

			<!-- ============================ Hero Banner  Start================================== -->
			<!-- Gallery Part Start -->
			<section class="gallery_parts pt-2 pb-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-8 col-md-7 col-sm-12 pr-1">
							<div class="gg_single_part left"><a href="{{ asset('frontend/assets/img/p-2.png')}}" class="mfp-gallery"><img src="{{ asset('frontend/assets/img/p-2.png')}}" class="img-fluid mx-auto" alt="" /></a></div>
						</div>
						<div class="col-lg-4 col-md-5 col-sm-12 pl-1">
							<div class="gg_single_part-right min"><a href="{{ asset('frontend/assets/img/p-5.png')}}" class="mfp-gallery"><img src="{{ asset('frontend/assets/img/p-5.png')}}" class="img-fluid mx-auto" alt="" /></a></div>
							<div class="gg_single_part-right min mt-2 mb-2"><a href="{{ asset('frontend/assets/img/p-3.png')}}" class="mfp-gallery"><img src="{{ asset('frontend/assets/img/p-3.png')}}" class="img-fluid mx-auto" alt="" /></a></div>
							<div class="gg_single_part-right min"><a href="{{ asset('frontend/assets/img/p-4.png')}}" class="mfp-gallery"><img src="{{ asset('frontend/assets/img/p-4.png')}}" class="img-fluid mx-auto" alt="" /></a></div>
						</div>
					</div>
				</div>
			</section>

			<div class="featured_slick_gallery gray d-block d-md-block d-lg-block d-xl-none">
				<div class="featured_slick_gallery-slide">
					<div class="featured_slick_padd"><a href="{{ asset('frontend/assets/img/slider-2.jpg')}}" class="mfp-gallery"><img src="{{ asset('frontend/assets/img/slider-2.jpg')}}" class="img-fluid mx-auto" alt="" /></a></div>
					<div class="featured_slick_padd"><a href="{{ asset('frontend/assets/img/slider-3.jpg')}}" class="mfp-gallery"><img src="{{ asset('frontend/assets/img/slider-3.jpg')}}" class="img-fluid mx-auto" alt="" /></a></div>
					<div class="featured_slick_padd"><a href="{{ asset('frontend/assets/img/slider-4.jpg')}}" class="mfp-gallery"><img src="{{ asset('frontend/assets/img/slider-4.jpg')}}" class="img-fluid mx-auto" alt="" /></a></div>
					<div class="featured_slick_padd"><a href="{{ asset('frontend/assets/img/slider-5.jpg')}}" class="mfp-gallery"><img src="{{ asset('frontend/assets/img/slider-5.jpg')}}" class="img-fluid mx-auto" alt="" /></a></div>
				</div>
			</div>
			<!-- ============================ Hero Banner End ================================== -->

			<!-- ============================ Property Detail Start ================================== -->
			<section class="pt-4">
				<div class="container">
					<div class="row">

						<!-- property main detail -->
						<div class="col-lg-8 col-md-12 col-sm-12">

							<div class="property_info_detail_wrap mb-4">

								<div class="property_info_detail_wrap_first">
									<div class="pr-price-into">
										<ul class="prs_lists">
											<li><span class="bed">3 Beds</span></li>
											<li><span class="bath">2 Bath</span></li>
											<li><span class="gar">1 Garage</span></li>
											<li><span class="sqft">800 sqft</span></li>
										</ul>
										<h2>5689 Resot Relly Market, Montreal Canada, HAQC445</h2>
										<span><i class="lni-map-marker"></i> 778 Country St. Panama City, FL</span>
									</div>
								</div>
							</div>

							<!-- Single Block Wrap -->
							<div class="property_block_wrap">
								<div class="property_block_wrap_header">
									<h4 class="property_block_title">About Property</h4>
								</div>
								<div class="block-body">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
								</div>
							</div>

							<!-- Single Block Wrap -->
							<div class="property_block_wrap">

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
							</div>
						</div>

						<!-- property Sidebar -->
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="property-sidebar">
								<!-- Similar Property -->
								<div class="sidebar-widgets">
									<h4>Similar Property</h4>
									<div class="sidebar_featured_property">
										<!-- List Sibar Property -->
										<div class="sides_list_property">
											<div class="sides_list_property_thumb">
												<img src="{{ asset('frontend/assets/img/p-1.png')}}" class="img-fluid" alt="" />
											</div>
											<div class="sides_list_property_detail">
												<h4><a href="#">Loss vengel New Apartment</a></h4>
												<span><i class="ti-location-pin"></i>Sans Fransico</span>
												<div class="lists_property_price">
													<div class="lists_property_types">
														<div class="property_types_vlix sale">For Sale</div>
													</div>
													<div class="lists_property_price_value">
														<h4>₹4,240</h4>
													</div>
												</div>
											</div>
										</div>

										<!-- List Sibar Property -->
										<div class="sides_list_property">
											<div class="sides_list_property_thumb">
												<img src="{{ asset('frontend/assets/img/p-4.png')}}" class="img-fluid" alt="" />
											</div>
											<div class="sides_list_property_detail">
												<h4><a href="#">Montreal Quriqe Apartment</a></h4>
												<span><i class="ti-location-pin"></i>Liverpool, London</span>
												<div class="lists_property_price">
													<div class="lists_property_types">
														<div class="property_types_vlix">For Rent</div>
													</div>
													<div class="lists_property_price_value">
														<h4>₹7,380</h4>
													</div>
												</div>
											</div>
										</div>

										<!-- List Sibar Property -->
										<div class="sides_list_property">
											<div class="sides_list_property_thumb">
												<img src="{{ asset('frontend/assets/img/p-7.png')}}" class="img-fluid" alt="" />
											</div>
											<div class="sides_list_property_detail">
												<h4><a href="#">Curmic Studio For Office</a></h4>
												<span><i class="ti-location-pin"></i>Montreal, Canada</span>
												<div class="lists_property_price">
													<div class="lists_property_types">
														<div class="property_types_vlix buy">For Buy</div>
													</div>
													<div class="lists_property_price_value">
														<h4>₹8,730</h4>
													</div>
												</div>
											</div>
										</div>

										<!-- List Sibar Property -->
										<div class="sides_list_property">
											<div class="sides_list_property_thumb">
												<img src="{{ asset('frontend/assets/img/p-5.png')}}" class="img-fluid" alt="" />
											</div>
											<div class="sides_list_property_detail">
												<h4><a href="#">Montreal Quebec City</a></h4>
												<span><i class="ti-location-pin"></i>Sreek View, New York</span>
												<div class="lists_property_price">
													<div class="lists_property_types">
														<div class="property_types_vlix">For Rent</div>
													</div>
													<div class="lists_property_price_value">
														<h4>₹6,240</h4>
													</div>
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
			<!-- ============================ Property Detail End ================================== -->

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
