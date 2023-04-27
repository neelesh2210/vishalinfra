			<!-- ============================ Footer Start ================================== -->
			<footer class="dark-footer skin-dark-footer style-2">
				<div class="footer-middle">
					<div class="container">
						<div class="row">

							<div class="col-lg-4 col-md-4">
								<div class="footer_widget">
                                    <h4 class="widget_title">About Vishal Infra</h4>
									<p>The motive of our company is to help people turn their ideas on paper into reality and live in their dream houses.</p>
								</div>
							</div>

							<div class="col-lg-8 col-md-8 ml-auto">
								<div class="row">
									<div class="col-lg-4 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">Properties in India</h4>
											<ul class="footer-menu">
												<li><a href="#">Property in New Delhi</a></li>
												<li><a href="#">Property in New Delhi</a></li>
												<li><a href="#">Property in New Delhi</a></li>
												<li><a href="#">Property in New Delhi</a></li>
												<li><a href="#">Property in New Delhi</a></li>
												<li><a href="#">Property in New Delhi</a></li>
											</ul>
										</div>
									</div>

									<div class="col-lg-4 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">All Sections</h4>
											<ul class="footer-menu">
												<li><a href="#">Headers</a></li>
												<li><a href="#">Features</a></li>
												<li><a href="#">Attractive</a></li>
												<li><a href="#">Testimonials</a></li>
												<li><a href="#">Videos</a></li>
												<li><a href="#">Footers</a></li>
											</ul>
										</div>
									</div>

									<div class="col-lg-4 col-md-4">
										<div class="footer_widget">
											<h4 class="widget_title">Company</h4>
											<ul class="footer-menu">
												<li><a href="#">About</a></li>
												<li><a href="#">Blog</a></li>
												<li><a href="#">Pricing</a></li>
												<li><a href="#">Affiliate</a></li>
												<li><a href="#">Login</a></li>
												<li><a href="#">Changelog</a></li>
											</ul>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="footer-bottom">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-12 col-md-12 text-center">
								<p class="mb-0">© 2023 all right reserved. Developed By <a href="#">Techup Technologies</a>.</p>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- ============================ Footer End ================================== -->

			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-xl login-pop-form" role="document">
					<div class="modal-content overli" id="registermodal">
						<div class="modal-body p-0">
							<div class="resp_log_wrap">
								<div class="resp_log_thumb" style="background:url({{ asset('frontend/assets/img/log.jpg')}})no-repeat;"></div>
								<div class="resp_log_caption">
									<span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
									<div class="edlio_152">
										<ul class="nav nav-pills tabs_system center" id="pills-tab" role="tablist">
										  <li class="nav-item">
											<a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
										  </li>
										  <li class="nav-item">
											<a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false"><i class="fas fa-user-plus mr-2"></i>Register</a>
										  </li>
										</ul>
									</div>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
											<div class="login-form">
												<form>

													<div class="form-group">
														<label>User Name</label>
														<div class="input-with-icon">
															<input type="text" class="form-control">
															<i class="ti-user"></i>
														</div>
													</div>

													<div class="form-group">
														<label>Password</label>
														<div class="input-with-icon">
															<input type="password" class="form-control">
															<i class="ti-unlock"></i>
														</div>
													</div>

													<div class="form-group">
														<div class="eltio_ol9">
															<div class="eltio_k1">
																<input id="dd" class="checkbox-custom" name="dd" type="checkbox">
																<label for="dd" class="checkbox-custom-label">Remember Me</label>
															</div>
															<div class="eltio_k2">
																<a href="#">Lost Your Password?</a>
															</div>
														</div>
													</div>

													<div class="form-group">
														<button type="submit" class="btn btn-md full-width pop-login">Login</button>
													</div>

												</form>
											</div>
										</div>
										<div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
											<div class="login-form">
												<form>

													<div class="form-group">
														<label>Full Name</label>
														<div class="input-with-icon">
															<input type="text" class="form-control">
															<i class="ti-user"></i>
														</div>
													</div>

													<div class="form-group">
														<label>Email ID</label>
														<div class="input-with-icon">
															<input type="email" class="form-control">
															<i class="ti-user"></i>
														</div>
													</div>

													<div class="form-group">
														<label>Password</label>
														<div class="input-with-icon">
															<input type="password" class="form-control">
															<i class="ti-unlock"></i>
														</div>
													</div>

													<div class="form-group">
														<div class="eltio_ol9">
															<div class="eltio_k1">
																<input id="dds" class="checkbox-custom" name="dds" type="checkbox">
																<label for="dds" class="checkbox-custom-label">By using the website, you accept the terms and conditions</label>
															</div>
														</div>
													</div>

													<div class="form-group">
														<button type="submit" class="btn btn-md full-width pop-login">Register</button>
													</div>

												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->

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
										<label>Subject</label>
										<div class="input-with-icons">
											<input type="text" class="form-control" placeholder="Message Title">
										</div>
									</div>

									<div class="form-group">
										<label>Messages</label>
										<div class="input-with-icons">
											<textarea class="form-control ht-80"></textarea>
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

			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


		</div>

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{ asset('frontend/assets/js/jquery.min.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/popper.min.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/ion.rangeSlider.min.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/select2.min.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/slick.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/slider-bg.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/lightbox.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/imagesloaded.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/daterangepicker.js')}}"></script>
		<script src="{{ asset('frontend/assets/js/custom.js')}}"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>
</html>
