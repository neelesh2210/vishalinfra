@extends('frontend.layouts.app')
@section('content')

			<!-- ============================ User Dashboard ================================== -->
			<section class="gray pt-5 pb-5">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3 col-md-4">
                            @include('frontend.include.sidebar')
						</div>
						<div class="col-lg-9 col-md-8">
							<div class="dashboard-body">
								<div class="dashboard-wraper">
									<div class="row">
										<!-- Submit Form -->
										<div class="col-lg-12 col-md-12">
											<div class="submit-page">
												<!-- Basic Information -->
												<div class="frm_submit_block">
													<h3>Basic Information</h3>
													<div class="frm_submit_wrap">
														<div class="form-row">
															<div class="form-group col-md-12">
																<label>Project Name<a href="#" class="tip-topdata" data-tip="Project Name"><i class="ti-help"></i></a></label>
																<input type="text" class="form-control" placeholder="Project Name">
															</div>
															<div class="form-group col-md-6">
																<label>Status</label>
																<select id="status" class="form-control">
																	<option value="">&nbsp;</option>
																	<option value="1">For Rent</option>
																	<option value="2">For Sale</option>
																</select>
															</div>
															<div class="form-group col-md-6">
																<label>Project Type</label>
																<select id="ptypes" class="form-control">
																	<option value="">&nbsp;</option>
																	<option value="1">Houses</option>
																	<option value="2">Apartment</option>
																	<option value="3">Villas</option>
																	<option value="4">Commercial</option>
																	<option value="5">Offices</option>
																	<option value="6">Garage</option>
																</select>
															</div>
															<div class="form-group col-md-6">
																<label>Launch Date</label>
																<input type="date" class="form-control" placeholder="USD">
															</div>
                                                            <div class="form-group col-md-6">
																<label>Completed in</label>
																<input type="date" class="form-control" placeholder="USD">
															</div>
															<div class="form-group col-md-6">
																<label>Project Area</label>
																<input type="text" class="form-control" placeholder="Project Area">
															</div>
															<div class="form-group col-md-6">
																<label>Total Units</label>
																<select id="bedrooms" class="form-control">
																	<option value="">&nbsp;</option>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																</select>
															</div>
															<div class="form-group col-md-6">
																<label>Occupancy Certificate</label>
																<input type="text" class="form-control" placeholder="Occupancy Certificate">
															</div>
                                                            <div class="form-group col-md-6">
																<label>Commencement Certificate</label>
																<input type="text" class="form-control" placeholder="Commencement Certificate">
															</div>
                                                            <div class="form-group col-md-6">
																<label>Why Buy ?</label>
																<input type="text" class="form-control" placeholder="Why Buy ?">
															</div>
                                                            <div class="form-group col-md-6">
																<label>Floor plan - PDF</label>
																<input type="file" class="form-control" >
															</div>
                                                            <div class="form-group col-md-6">
																<label>Add videos</label>
																<input type="file" class="form-control" placeholder="Option to add videos">
															</div>
														</div>
													</div>
												</div>
												<!-- Gallery -->
												<div class="frm_submit_block">
													<h3>Gallery</h3>
													<div class="frm_submit_wrap">
														<div class="form-row">
															<div class="form-group col-md-6">
																<label>Gallery</label>
																<input type="file" class="form-control">
															</div>
															<div class="form-group col-md-6">
																<label>Cover Picture</label>
																<input type="file" class="form-control">
															</div>
														</div>
													</div>
												</div>
												<!-- Location -->
												<div class="frm_submit_block">
													<h3>Location</h3>
													<div class="frm_submit_wrap">
														<div class="form-row">
															<div class="form-group col-md-6">
																<label>Address</label>
																<input type="text" class="form-control" placeholder="Address">
															</div>
															<div class="form-group col-md-6">
																<label>City</label>
																<input type="text" class="form-control" placeholder="City">
															</div>
															<div class="form-group col-md-6">
																<label>State</label>
																<input type="text" class="form-control" placeholder="State">
															</div>
															<div class="form-group col-md-6">
																<label>Pin Code</label>
																<input type="text" class="form-control" placeholder="Pin Code">
															</div>
														</div>
													</div>
												</div>
												<!-- Detailed Information -->
												<div class="frm_submit_block">
													<h3>Detailed Information</h3>
													<div class="frm_submit_wrap">
														<div class="form-row">
															<div class="form-group col-md-12">
																<label>About</label>
																<textarea class="form-control h-120" placeholder="About"></textarea>
															</div>
															<div class="form-group col-md-12">
																<label>Amenties</label>
																<div class="o-features">
																	<ul class="no-ul-list third-row">
																		<li>
																			<input id="a-1" class="checkbox-custom" name="a-1" type="checkbox">
																			<label for="a-1" class="checkbox-custom-label">Air Condition</label>
																		</li>
																		<li>
																			<input id="a-2" class="checkbox-custom" name="a-2" type="checkbox">
																			<label for="a-2" class="checkbox-custom-label">Bedding</label>
																		</li>
																		<li>
																			<input id="a-3" class="checkbox-custom" name="a-3" type="checkbox">
																			<label for="a-3" class="checkbox-custom-label">Heating</label>
																		</li>
																		<li>
																			<input id="a-4" class="checkbox-custom" name="a-4" type="checkbox">
																			<label for="a-4" class="checkbox-custom-label">Internet</label>
																		</li>
																		<li>
																			<input id="a-5" class="checkbox-custom" name="a-5" type="checkbox">
																			<label for="a-5" class="checkbox-custom-label">Microwave</label>
																		</li>
																		<li>
																			<input id="a-6" class="checkbox-custom" name="a-6" type="checkbox">
																			<label for="a-6" class="checkbox-custom-label">Smoking Allow</label>
																		</li>
																		<li>
																			<input id="a-7" class="checkbox-custom" name="a-7" type="checkbox">
																			<label for="a-7" class="checkbox-custom-label">Terrace</label>
																		</li>
																		<li>
																			<input id="a-8" class="checkbox-custom" name="a-8" type="checkbox">
																			<label for="a-8" class="checkbox-custom-label">Balcony</label>
																		</li>
																		<li>
																			<input id="a-9" class="checkbox-custom" name="a-9" type="checkbox">
																			<label for="a-9" class="checkbox-custom-label">Icon</label>
																		</li>
																		<li>
																			<input id="a-10" class="checkbox-custom" name="a-10" type="checkbox">
																			<label for="a-10" class="checkbox-custom-label">Wi-Fi</label>
																		</li>
																		<li>
																			<input id="a-11" class="checkbox-custom" name="a-11" type="checkbox">
																			<label for="a-11" class="checkbox-custom-label">Beach</label>
																		</li>
																		<li>
																			<input id="a-12" class="checkbox-custom" name="a-12" type="checkbox">
																			<label for="a-12" class="checkbox-custom-label">Parking</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="form-group col-lg-12 col-md-12">
													<label>GDPR Agreement *</label>
													<ul class="no-ul-list">
														<li>
															<input id="aj-1" class="checkbox-custom" name="aj-1" type="checkbox">
															<label for="aj-1" class="checkbox-custom-label">I consent to having this website store my submitted information so they can respond to my inquiry.</label>
														</li>
													</ul>
												</div>
												<div class="form-group col-lg-12 col-md-12">
													<button class="btn btn-theme" type="submit">Submit & Preview</button>
												</div>
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

@endsection
