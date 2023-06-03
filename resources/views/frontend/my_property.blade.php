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
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="_prt_filt_dash">
											<div class="_prt_filt_dash_flex">
												<div class="foot-news-last">
													<div class="input-group">
													  <input type="text" class="form-control" placeholder="Search Here..">
														<div class="input-group-append">
															<span type="button" class="input-group-text theme-bg b-0 text-light"><i class="fas fa-search"></i></span>
														</div>
													</div>
												</div>
											</div>
											<div class="_prt_filt_dash_last m2_hide">
												<div class="_prt_filt_radius">
												</div>
												<div class="_prt_filt_add_new">
													<a href="#" class="prt_submit_link"><i class="fas fa-plus-circle"></i><span class="d-none d-lg-block d-md-block">List New Property</span></a>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="dashboard_property">
											<div class="table-responsive">
												<table class="table">
													<thead class="thead-dark">
														<tr>
														  <th scope="col">Property</th>
														  <th scope="col" class="m2_hide">Leads</th>
														  <th scope="col" class="m2_hide">Stats</th>
														  <th scope="col" class="m2_hide">Posted On</th>
														  <th scope="col">Status</th>
														  <th scope="col">Action</th>
														</tr>
													</thead>
													<tbody>
														<!-- tr block -->
														<tr>
															<td>
																<div class="dash_prt_wrap">
																	<div class="dash_prt_thumb">
																		<img src="{{ asset('frontend/assets/img/p-1.png')}}" class="img-fluid" alt="" />
																	</div>
																	<div class="dash_prt_caption">
																		<h5>4 Bhk Luxury Villa</h5>
																		<div class="prt_dashb_lot">5682 Brown River Suit 18</div>
																		<div class="prt_dash_rate"><span>₹ 2,200,000</span></div>
																	</div>
																</div>
															</td>
															<td class="m2_hide">
																<div class="prt_leads"><span>27 till now</span></div>
																<div class="prt_leads_list">
																	<ul>
																		<li><a href="#"><img src="{{ asset('frontend/assets/img/team-1.jpg')}}" class="img-fluid img-circle" alt="" /></a></li>
																		<li><a href="#"><img src="{{ asset('frontend/assets/img/team-1.jpg')}}" class="img-fluid img-circle" alt="" /></a></li>
																		<li><a href="#" class="_leads_name style-1">K</a></li>
																		<li><a href="#"><img src="{{ asset('frontend/assets/img/team-1.jpg')}}" class="img-fluid img-circle" alt="" /></a></li>
																		<li><a href="#" class="leades_more">10+</a></li>
																	</ul>
																</div>
															</td>
															<td class="m2_hide">
																<div class="_leads_view"><h5 class="up">816</h5></div>
																<div class="_leads_view_title"><span>Total Views</span></div>
															</td>
															<td class="m2_hide">
																<div class="_leads_posted"><h5>16 Aug - 12:40</h5></div>
																<div class="_leads_view_title"><span>16 Days ago</span></div>
															</td>
															<td>
																<div class="_leads_status"><span class="active">Active</span></div>
																<div class="_leads_view_title"><span>Till 12 Oct</span></div>
															</td>
															<td>
																<div class="_leads_action">
																	<a href="#"><i class="fas fa-edit"></i></a>
																	<a href="#"><i class="fas fa-trash"></i></a>
																</div>
															</td>
														</tr>

														<!-- tr block -->
														<tr>
															<td>
																<div class="dash_prt_wrap">
																	<div class="dash_prt_thumb">
																		<img src="{{ asset('frontend/assets/img/p-2.png')}}" class="img-fluid" alt="" />
																	</div>
																	<div class="dash_prt_caption">
																		<h5>4 Bhk Luxury Villa</h5>
																		<div class="prt_dashb_lot">5682 Brown River Suit 18</div>
																		<div class="prt_dash_rate"><span>₹ 2,200,000</span></div>
																	</div>
																</div>
															</td>
															<td class="m2_hide">
																<div class="prt_leads"><span>27 till now</span></div>
																<div class="prt_leads_list">
																	<ul>
																		<li><a href="#"><img src="{{ asset('frontend/assets/img/team-1.jpg')}}" class="img-fluid img-circle" alt="" /></a></li>
																		<li><a href="#"><img src="{{ asset('frontend/assets/img/team-1.jpg')}}" class="img-fluid img-circle" alt="" /></a></li>
																		<li><a href="#" class="_leads_name style-1">K</a></li>
																		<li><a href="#"><img src="{{ asset('frontend/assets/img/team-1.jpg')}}" class="img-fluid img-circle" alt="" /></a></li>
																		<li><a href="#" class="leades_more">10+</a></li>
																	</ul>
																</div>
															</td>
															<td class="m2_hide">
																<div class="_leads_view"><h5 class="up">816</h5></div>
																<div class="_leads_view_title"><span>Total Views</span></div>
															</td>
															<td class="m2_hide">
																<div class="_leads_posted"><h5>16 Aug - 12:40</h5></div>
																<div class="_leads_view_title"><span>16 Days ago</span></div>
															</td>
															<td>
																<div class="_leads_status"><span class="expire">Expired</span></div>
																<div class="_leads_view_title"><span>Till 12 Oct</span></div>
															</td>
															<td>
																<div class="_leads_action">
																	<a href="#"><i class="fas fa-edit"></i></a>
																	<a href="#"><i class="fas fa-trash"></i></a>
																</div>
															</td>
														</tr>

													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<!-- row -->


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

			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

        @endsection
