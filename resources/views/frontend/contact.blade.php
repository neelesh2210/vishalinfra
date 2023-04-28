@extends('frontend.layouts.app')
@section('content')
    <!-- End Navigation -->
    <div class="clearfix"></div>
			<!-- ============================ Page Title Start================================== -->
			<div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/slider-3.jpg')}});" data-overlay="5">
				<div class="ht-80"></div>
				<div class="ht-120"></div>
			</div>
			<!-- ============================ Page Title End ================================== -->

			<!-- ============================ Agency List Start ================================== -->
			<section class="pt-0">
				<div class="container">
					<div class="row align-items-center pretio_top">
						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="contact-box">
								<i class="ti-shopping-cart theme-cl"></i>
								<h4>Contact Sales</h4>
								<p>sales@rikadahelp.co.uk</p>
								<span>+01 215 245 6258</span>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="contact-box">
								<i class="ti-user theme-cl"></i>
								<h4>Contact Sales</h4>
								<p>sales@rikadahelp.co.uk</p>
								<span>+01 215 245 6258</span>
							</div>
						</div>

						<div class="col-lg-4 col-md-4 col-sm-12">
							<div class="contact-box">
								<i class="ti-comment-alt theme-cl"></i>
								<h4>Start Live Chat</h4>
								<span>+01 215 245 6258</span>
								<span class="live-chat">Live Chat</span>
							</div>
						</div>

					</div>

					<!-- row Start -->
					<div class="row">
						<div class="col-lg-8 col-md-7">
							<div class="property_block_wrap">

								<div class="property_block_wrap_header">
									<h4 class="property_block_title">Enquiry Now -</h4>
								</div>

								<div class="block-body">
									<div class="row">
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Name</label>
												<input type="text" class="form-control simple">
											</div>
										</div>
										<div class="col-lg-6 col-md-12">
											<div class="form-group">
												<label>Email</label>
												<input type="email" class="form-control simple">
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>Subject</label>
										<input type="text" class="form-control simple">
									</div>

									<div class="form-group">
										<label>Message</label>
										<textarea class="form-control simple"></textarea>
									</div>

									<div class="form-group">
										<button class="btn btn-theme" type="submit">Submit Request</button>
									</div>
								</div>

							</div>

						</div>

						<div class="col-lg-4 col-md-5">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30766912.422177866!2d60.95728322188994!3d19.72426012689727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1682661381672!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>

					</div>
					<!-- /row -->
				</div>
			</section>
			<!-- ============================ Agency List End ================================== -->

			<!-- ============================ Our Partner Start ================================== -->
			<section class="gray-simple">
				<div class="container">

					<div class="row justify-content-center">
						<div class="col-lg-8 col-md-10 col-sm-12">
							<div class="reio_o9i text-center mb-5">
								<h2>Less work, meet our partner.</h2>
								<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias</p>
							</div>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-lg-9 col-md-10 col-sm-12 flex-wrap justify-content-center text-center">
							<div class="pertner_flexio">
								<img src="{{ asset('frontend/assets/img/c-1.png')}}" class="img-fluid" alt="" />
								<h5>Google Inc</h5>
							</div>
							<div class="pertner_flexio">
								<img src="{{ asset('frontend/assets/img/c-2.png')}}" class="img-fluid" alt="" />
								<h5>Dribbbdio</h5>
							</div>
							<div class="pertner_flexio">
								<img src="{{ asset('frontend/assets/img/c-3.png')}}" class="img-fluid" alt="" />
								<h5>Lio Vission</h5>
							</div>
							<div class="pertner_flexio">
								<img src="{{ asset('frontend/assets/img/c-4.png')}}" class="img-fluid" alt="" />
								<h5>Alzerra</h5>
							</div>
							<div class="pertner_flexio">
								<img src="{{ asset('frontend/assets/img/c-5.png')}}" class="img-fluid" alt="" />
								<h5>Skyepio</h5>
							</div>
							<div class="pertner_flexio">
								<img src="{{ asset('frontend/assets/img/c-6.png')}}" class="img-fluid" alt="" />
								<h5>Twikller</h5>
							</div>
							<div class="pertner_flexio">
								<img src="{{ asset('frontend/assets/img/c-7.png')}}" class="img-fluid" alt="" />
								<h5>Sincherio</h5>
							</div>
						</div>
					</div>

				</div>
			</section>
			<!-- ============================ Our Partner End ================================== -->

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
