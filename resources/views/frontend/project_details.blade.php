@extends('frontend.layouts.app')
@section('content')
<section class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="gg_single_part left mt-2">
                    <a href="#" class="mfp-gallery">
                        <img src="{{asset('backend/img/property_default.jpg')}}" class="wh-100" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}">
                    </a>
                </div>
                <div class="property_info_detail_wrap mb-4 mt-4">
                    <div class="property_info_detail_wrap_first">
                        <div class="pr-price-into">
                            <ul class="prs_lists mb-3">
                                <li><span class="bed"> Beds</span></li>
                                <li><span class="bath">5 Bath</span></li>
                                <li><span class="gar">4 Balcony</span></li>
                                <li><span class="sqft">1500/sqft</span></li>
                            </ul>
                            <h2 class="mb-3">Manland</h2>
                            <span><i class="lni-map-marker"></i> near airport, PUNE</span>
                        </div>
                    </div>
                </div>
                <div class="property_block_wrap">
                    <div class="property_block_wrap_header">
                        <h4 class="property_block_title">More Details</h4>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <p>Owner Type</p>
                        </div>
                        <div class="col-md-8">
                            <strong>Agent</strong>
                        </div>
                        <div class="col-md-4">
                            <p>Price</p>
                        </div>
                        <div class="col-md-8">
                            <strong>30000</strong> <span><del>30000000</del></span>
                        </div>
                        <div class="col-md-4">
                            <p>Booking Amount</p>
                        </div>
                        <div class="col-md-8">
                            <strong>200000</strong>
                        </div>
                        <div class="col-md-4">
                            <p>Carpet Area</p>
                        </div>
                        <div class="col-md-8">
                            <strong>15000sqft | ₹1500/sqft </strong>
                        </div>

                        <div class="col-md-4">
                            <p>Address</p>
                        </div>
                        <div class="col-md-8">
                            <strong>PUNE, India</strong>
                        </div>
                        <div class="col-md-4">
                            <p>Landmarks</p>
                        </div>
                        <div class="col-md-8">
                            <strong>near airport</strong>
                        </div>
                        <div class="col-md-4">
                            <p>Furnishing</p>
                        </div>
                        <div class="col-md-8">
                            <strong>semi-unfurnished</strong>
                        </div>

                        <div class="col-md-12">
                            <h6 class="property_block_title">Description :</h6>
                            <p class="more">Commercial Project</p>
                        </div>
                    </div>
                </div>
                                    <div class="property_block_wrap">
                    <div class="property_block_wrap_header">
                        <h4 class="property_block_title">Popular Landmarks Nearby</h4>
                        <hr>
                    </div>
                    <div class="block-body">
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115408.09799694136!2d82.90870601301123!3d25.320894921383157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2db76febcf4d%3A0x68131710853ff0b5!2sVaranasi%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1683535825071!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="property-sidebar side_stiky">
                    <div class="sider_blocks_wrap shadows">
                        <div class="sidetab-content">
                            <div class="sider-block-body p-3">

                                                                    <form action="http://127.0.0.1:8000/enquiry-store" method="POST">
                                    <input type="hidden" name="_token" value="mTzxw5JLGBskOY7Opv6UGVr5d5WSBQ5K8AwusRjs">                                        <div class="row">
                                        <input type="hidden" name="property_id" value="15">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h5>Fill This Enquiry Form</h5>

                                            <hr>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control light" name="name" placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="number" minlength="10" maxlength="10" class="form-control light" name="phone" placeholder="Enter Phone No.">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <input type="email" class="form-control light" name="email" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button class="btn book_btn theme-bg">Get Contact Details <i class="fas fa-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
