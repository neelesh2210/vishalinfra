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
                                                    1. What the first step of the home buying process?
												</button>
											  </h2>
											</div>
											{{-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#generalac">
											  <div class="card-body">
												<p class="ac-para"></p>
											  </div>
											</div> --}}
										</div>
										<div class="card">
											<div class="card-header" id="headingTwo">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
													2. How long does it take to buy a home?
												</button>
											  </h2>
											</div>
											{{-- <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#generalac">
											  <div class="card-body">
												<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
											  </div>
											</div> --}}
										</div>
										<div class="card">
											<div class="card-header" id="headingThree">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
													3. What is a seller's market?
												</button>
											  </h2>
											</div>
											{{-- <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#generalac">
											  <div class="card-body">
												<p class="ac-para">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
											  </div>
											</div> --}}
										</div>
                                        <div class="card">
											<div class="card-header" id="headingFour">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
													4. What is a buyer's market?
												</button>
											  </h2>
											</div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingFive">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
													5. What is a stratified market?
												</button>
											  </h2>
											</div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingSix">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
													6. How much do I have to pay an agent to help me buy a house?
												</button>
											  </h2>
											</div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingSeven">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
													7. What kind of credit score do I need to buy a home?
												</button>
											  </h2>
											</div>
										</div>
                                        <div class="card">
											<div class="card-header" id="headingEight">
											  <h2 class="mb-0">
												<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
													8. How much do I need for a down payment?
												</button>
											  </h2>
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
