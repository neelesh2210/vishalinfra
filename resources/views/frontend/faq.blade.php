@extends('frontend.layouts.app')
@section('content')
			<!-- ============================ Page Title Start================================== -->
			<div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/bg.jpg')}});" data-overlay="5">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="breadcrumbs-wrap">
								<h2 class="breadcrumb-title">FAQ</h2>
							</div>
						</div>
					</div>
				</div>
			</div>

            <section>
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12">
							<!-- Single Basics List -->
							<div class="faq_wrap">
								<div class="faq_wrap_body mb-5">
									<div class="accordion" id="generalac">
										<div class="card">
											<div class="card-header" id="headingOne">
											  <h2 class="mb-0">
												<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    1. How do I search for properties on the portal?
												</button>
											  </h2>
											</div>
											<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#generalac">
											  <div class="card-body">
												<p class="ac-para">You can use the search bar on the homepage to enter specific criteria such as location, price range, and property type. Additionally, you can use filters to refine your search further.</p>
											  </div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingTwo">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													2. What information is available for each property listing?
												</button>
											  </h2>
											</div>
											<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#generalac">
											  <div class="card-body">
												<p class="ac-para">Each listing includes details such as property type, location, price, number of bedrooms and bathrooms, square footage, and photos. Additional information may include amenities, property features, and contact details for the listing agent.</p>
											  </div>
											</div>
										</div>
										<div class="card">
											<div class="card-header" id="headingThree">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
													3. Can I save my favorite listings for future reference?
												</button>
											  </h2>
											</div>
											<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#generalac">
											  <div class="card-body">
												<p class="ac-para">Yes, you can create an account on our portal and save your favorite listings. This allows you to easily revisit and compare properties at any time.</p>
											  </div>
											</div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingFour">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
													4. How do I contact the property owner or real estate agent?
												</button>
											  </h2>
											</div>
                                            <div id="collapseFour" class="collapse" aria-labelledby="collapseFour" data-parent="#generalac">
                                                <div class="card-body">
                                                  <p class="ac-para">Contact information for the property owner or listing agent is provided on each listing page. You can use the provided email address or phone number to reach out and inquire about the property.</p>
                                                </div>
                                            </div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingFive">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
													5. Is there a fee for using the portal as a buyer or tenant?
												</button>
											  </h2>
											</div>
                                            <div id="collapseFive" class="collapse" aria-labelledby="collapseFive" data-parent="#generalac">
                                                <div class="card-body">
                                                  <p class="ac-para">No, our portal is free for users looking to buy or rent properties. There are no hidden fees for accessing property listings or using the search and contact features.</p>
                                                </div>
                                            </div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingSix">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
													6. How can I list my property for sale or rent on the portal?
												</button>
											  </h2>
											</div>
                                            <div id="collapseSix" class="collapse" aria-labelledby="collapseSix" data-parent="#generalac">
                                                <div class="card-body">
                                                  <p class="ac-para">To list your property, you can create a seller or landlord account on our portal. Follow the step-by-step instructions to input property details, upload photos, and set your desired sale or rental terms.</p>
                                                </div>
                                            </div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingSeven">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
													7. What are the benefits of creating an account on the portal?
												</button>
											  </h2>
											</div>
                                            <div id="collapseSeven" class="collapse" aria-labelledby="collapseSeven" data-parent="#generalac">
                                                <div class="card-body">
                                                  <p class="ac-para">Creating an account allows you to save favorite listings, receive property alerts based on your preferences, and easily manage your own property listings if you are a seller or landlord.</p>
                                                </div>
                                            </div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingEight">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
													8. How often are property listings updated on the portal?
												</button>
											  </h2>
											</div>
                                            <div id="collapseEight" class="collapse" aria-labelledby="collapseEight" data-parent="#generalac">
                                                <div class="card-body">
                                                  <p class="ac-para">Our listings are regularly updated to provide the latest information. However, the frequency may vary, and it's always a good idea to check back periodically for the most current listings.</p>
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
			<!-- ============================ Call To Action End ================================== -->
            @endsection
