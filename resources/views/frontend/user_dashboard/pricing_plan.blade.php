@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <!-- Plans -->
                        <div class="row mt-3">
                            <div class="col-xl-4 col-md-6">
                                <div class="card card-pricing">
                                    <div class="card-body text-center">
                                        <p class="card-pricing-plan-name fw-bold text-uppercase">Premium Plus</p>
                                        <span class="card-pricing-icon text-primary">
                                            <i class="uil-book-open"></i>
                                        </span>
                                        <h2 class="card-pricing-price">₹7500 <span>/ 180 Days Validity</span></h2>
                                        <ul class="card-pricing-features">
                                            <li>Number of listings (25)</li>
                                            <li>Upto 5x More</li>
                                            <li>High</li>
                                        </ul>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary waves-effect waves-light mt-4">Buy Now</a>
                                        </div>
                                    </div>
                                </div> <!-- end Pricing_card -->
                            </div> <!-- end col -->

                            <div class="col-xl-4 col-md-6">
                                <div class="card card-pricing ribbon-box">
                                    <div class="ribbon-two ribbon-two-danger"><span>Recommended</span></div>
                                    <div class="card-body text-center">
                                        <p class="card-pricing-plan-name fw-bold text-uppercase">Certified Agent Plus</p>
                                        <span class="card-pricing-icon bg-danger text-white">
                                            <i class="uil-book-open"></i>
                                        </span>
                                        <h2 class="card-pricing-price">₹5000 <span>/ 90 Days Validity</span></h2>
                                        <ul class="card-pricing-features">
                                            <li>Number of listings (25)</li>
                                            <li>Upto 5x More</li>
                                            <li>High</li>
                                        </ul>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary waves-effect waves-light mt-4">Buy Now</a>
                                        </div>
                                    </div>
                                </div> <!-- end Pricing_card -->
                            </div> <!-- end col -->

                            <div class="col-xl-4 col-md-6">
                                <div class="card card-pricing">
                                    <div class="card-body text-center">
                                        <p class="card-pricing-plan-name fw-bold text-uppercase">Premium Plus</p>
                                        <span class="card-pricing-icon text-primary">
                                            <i class="uil-book-open"></i>
                                        </span>
                                        <h2 class="card-pricing-price">₹2500 <span>/ 90 Days Validity</span></h2>
                                        <ul class="card-pricing-features">
                                            <li>Number of listings (25)</li>
                                            <li>Upto 5x More</li>
                                            <li>High</li>
                                        </ul>
                                        <div class="d-grid">
                                            <a href="#" class="btn btn-primary waves-effect waves-light mt-4">Buy Now</a>
                                        </div>
                                    </div>
                                </div> <!-- end Pricing_card -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col-->
                </div>
            </div>
        </div>
    </div>
@endsection
