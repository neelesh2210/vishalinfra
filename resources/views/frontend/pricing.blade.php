@extends('frontend.layouts.app')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/bg.jpg')}});" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h2 class="breadcrumb-title">Pricing</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================ Pricing Start ================================== -->
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="reio_o9i text-center mb-5">
                        <h2>Choose the plan that's just right for you and your business</h2>
                        <p>Buy a pack and enjoy all agent benefits on Vishal Infra</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <!-- Single Package -->
                <div class="col-lg-4 col-md-4 mb-3">
                    <div class="pricing_wrap">
                    <div class="prc_bg">
                        <div class="prt_head">
                            <h4>Premium Plus</h4>
                        </div>
                        <div class="prt_price">
                            <h2><span>₹</span>7500</h2>
                            <span>180 Days Validity</span>
                        </div>
                    </div>
                        <div class="prt_body">
                            <ul>
                                <li>Number of listings (25)</li>
                                <li>Upto 5x More</li>
                                <li>High</li>
                                <li class="none">Unlimited</li>
                            </ul>
                        </div>
                        <div class="prt_footer">
                            <a href="#" class="btn choose_package">Buy Now</a>
                        </div>
                    </div>
                </div>

                <!-- Single Package -->
                <div class="col-lg-4 col-md-4 mb-3">
                    <div class="pricing_wrap">
                        <div class="prc_bg">
                        <div class="prt_head">
                            <div class="recommended">Recommended</div>
                            <h4>Certified Agent Plus</h4>
                        </div>
                        <div class="prt_price">
                            <h2><span>₹</span>5000</h2>
                            <span>90 Days Validity</span>
                        </div>
                        </div>
                        <div class="prt_body">
                            <ul>
                                <li>Number of listings (25)</li>
                                <li>Upto 5x More</li>
                                <li>High</li>
                                <li class="none">Unlimited</li>
                            </ul>
                        </div>
                        <div class="prt_footer">
                            <a href="#" class="btn choose_package active">Buy Now</a>
                        </div>
                    </div>
                </div>

                <!-- Single Package -->
                <div class="col-lg-4 col-md-4 mb-3">
                    <div class="pricing_wrap">
                        <div class="prc_bg">
                        <div class="prt_head">
                            <h4>Premium Plus</h4>
                        </div>
                        <div class="prt_price">
                            <h2><span>₹</span>2500</h2>
                            <span>90 Days Validity</span>
                        </div>
                        </div>
                        <div class="prt_body">
                            <ul>
                                <li>Number of listings (25)</li>
                                <li>Upto 5x More</li>
                                <li>High</li>
                                <li class="none">Unlimited</li>
                            </ul>
                        </div>
                        <div class="prt_footer">
                            <a href="#" class="btn choose_package">Buy Now</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- ============================ Pricing End ================================== -->
@endsection
