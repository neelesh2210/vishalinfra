@extends('frontend.layouts.app')
@section('content')

			<!-- ============================ User Dashboard ================================== -->
			<section class="gray pt-5 pb-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-12">
                            @include('frontend.include.sidebar')
						</div>
						<div class="col-lg-9 col-md-8 col-sm-12">
							<div class="dashboard-body">
								<div class="dashboard-wraper">
									<!-- Basic Information -->
									<div class="frm_submit_block">
										<h4>User Profile (Personal Information)</h4><hr>
										<div class="frm_submit_wrap">
											<div class="form-row">
												<div class="form-group col-md-6">
													<label>Name *</label>
													<input type="text" class="form-control" value="Vikas Sharma">
												</div>
                                                <div class="form-group col-md-6">
													<label>Phone *</label>
													<input type="text" class="form-control" value="9454528015">
												</div>
												<div class="form-group col-md-6">
													<label>Email</label>
													<input type="email" class="form-control" value="vikas@gmail.com">
												</div>
												<div class="form-group col-md-6">
													<label>Pincode</label>
													<input type="text" class="form-control" value="221010">
												</div>

												<div class="form-group col-md-6">
													<label>Landmark</label>
													<input type="text" class="form-control" value="Near Rampur Gate">
												</div>
												<div class="form-group col-md-6">
													<label>City</label>
													<input type="text" class="form-control" value="Varanasi">
												</div>
												<div class="form-group col-md-6">
													<label>State</label>
													<input type="text" class="form-control" value="UP">
												</div>
												<div class="form-group col-md-6">
													<label>Country</label>
													<input type="text" class="form-control" value="India">
												</div>
                                                <div class="form-group col-md-6">
													<label>Profile</label>
													<input type="file" class="form-control">
												</div>
                                                <div class="form-group col-md-6 mt-20">
													<button class="btn btn-theme" type="submit">Update & Submit</button>
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
			<!-- ============================ User Dashboard End ================================== -->

			<!-- Log In Modal -->
			<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
				<div class="modal-dialog modal-xl login-pop-form" role="document">
					<div class="modal-content overli" id="registermodal">
						<div class="modal-body p-0">
							<div class="resp_log_wrap">
								<div class="resp_log_thumb" style="background:url(assets/img/log.jpg)no-repeat;"></div>
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
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->
        @endsection
