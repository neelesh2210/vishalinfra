@extends('frontend.layouts.app')
@section('content')
    <!-- Gallery Part Start -->
    <section class="gallery_parts pt-2 pb-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7 col-sm-12 pr-1">
                    <div class="gg_single_part left"><a
                            href="{{ asset('backend/img/properies/' . $property_detail->thumbnail_img) }}"
                            class="mfp-gallery"><img
                                src="{{ asset('backend/img/properies/' . $property_detail->thumbnail_img) }}"
                                class="img-fluid mx-auto" alt="" /></a></div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 pl-1">
                    @foreach (json_decode($property_detail->photos) as $photo)
                        <div class="gg_single_part-right min  mb-2"><a href="{{ asset('backend/img/properies/' . $photo) }}"
                                class="mfp-gallery"><img src="{{ asset('backend/img/properies/' . $photo) }}"
                                    class="img-fluid mx-auto" alt="" />
                                <p class="vw_dtls"> <i class="fas fa-images"></i> <br> <span> + 19 Photos</span> </p>
                            </a></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="featured_slick_gallery gray d-block d-md-block d-lg-block d-xl-none">
        <div class="featured_slick_gallery-slide">
            <div class="featured_slick_padd"><a
                    href="{{ asset('backend/img/properies/' . $property_detail->thumbnail_img) }}" class="mfp-gallery"><img
                        src="{{ asset('backend/img/properies/' . $property_detail->thumbnail_img) }}"
                        class="img-fluid mx-auto" alt="" /></a></div>
            @foreach (json_decode($property_detail->photos) as $photo)
                <div class="featured_slick_padd"><a href="{{ asset('backend/img/properies/' . $photo) }}"
                        class="mfp-gallery"><img src="{{ asset('backend/img/properies/' . $photo) }}"
                            class="img-fluid mx-auto" alt="" /></a></div>
            @endforeach
        </div>
    </div>

    <section class="pt-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="property_info_detail_wrap mb-4 mt-4">
                        <div class="property_info_detail_wrap_first">
                            <div class="pr-price-into">
                                <ul class="prs_lists mb-3">
                                    <li><span class="bed">{{ $property_detail->bedroom }} Beds</span></li>
                                    <li><span class="bath">{{ $property_detail->bathroom }} Bath</span></li>
                                    <li><span class="gar">{{ $property_detail->balconies }} Balcony</span></li>
                                    <li><span class="sqft">{{ $property_detail->price }} sqft</span></li>
                                </ul>
                                <h2 class="mb-3">{{ $property_detail->name }}</h2>
                                <span><i class="lni-map-marker"></i> {{ optional($property_detail->project)->city }},
                                    {{ optional($property_detail->project)->state }},
                                    {{ optional($property_detail->project)->country }} -
                                    {{ optional($property_detail->project)->pincode }}</span>
                            </div>
                        </div>
                    </div>
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h3 class="property_block_title">More Details</h3><hr/>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Rental Value</p>
                            </div>
                            <div class="col-md-8">
                                <strong>₹16,000 | ₹1,000</strong> <span>Monthly Maintenance</span>
                            </div>
                            <div class="col-md-4">
                                <p>Security Deposit</p>
                            </div>
                            <div class="col-md-8">
                                <strong>₹50,000</strong>
                            </div>

                            <div class="col-md-4">
                                <p>Address</p>
                            </div>
                            <div class="col-md-8">
                                <strong>129, Confident Lilian, Halehalli, TC Palya, KR Puram, Bangalore. Opposite to
                                    CasaGrand Luxus Villas, K R Puram, Bangalore - East, Karnataka</strong>
                            </div>

                            <div class="col-md-4">
                                <p>Landmarks</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Birla Open Minds International School, Diamond college, CasagrandLuxus</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Furnishing</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Semi-Furnished</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Flooring</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Ceramic Tiles</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Overlooking</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Main Road</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Age of Construction</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Less than 5 years</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Water Availability</p>
                            </div>
                            <div class="col-md-8">
                                <strong>24 Hours Available</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Status of Electricity</p>
                            </div>
                            <div class="col-md-8">
                                <strong>No/Rare Powercut</strong>
                            </div>
                            <div class="col-md-12">
                                <h6 class="property_block_title">Description :</h6>
                                <p class="more">BHK flat available for rent. Spacious hall with Dining area, puja room.
                                    Modular kitchen with a laundry area,2 bedrooms with attached bath rooms.
                                    Solar connection is available for hotBHK flat available for rent .Spacious hall with
                                    Dining
                                    area, puja room.Modular kitchen with a laundry area, 2 bedrooms with attached bath
                                    rooms.Solar connection is available for hot water. <br /> Gated community with 247
                                    Security, Kids Play area, Swimming pool, Clubhouse, walking tracks and wide cement
                                    roads. Schools Colleges nearbyBirla Open Minds, New Baldwin, DonBosco, Diamond
                                    CollegeThis is a quiet home in a beautiful neighbourhood.This East facing 1400 sqft.
                                    home comes with a convenient parking facility for bike and open parking for Car.</p>
                            </div>
                        </div>
                    </div>
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Amenities</h4><hr/>
                        </div>
                        <div class="block-body">
                            <ul class="row p-0 m-0">
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-bed mr-1"></i>4 Bedrooms</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-bath mr-1"></i>2 Bathrooms</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-expand-arrows-alt mr-1"></i>12400
                                    sqft</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-house-damage mr-1"></i>1 Living Rooms
                                </li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-building mr-1"></i>Build 2007</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-utensils mr-1"></i>2 Kitchens </li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-car mr-1"></i>Car Parking</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-briefcase-medical mr-1"></i>Free
                                    Medical</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-fire mr-1"></i>Fireplace</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-layer-group mr-1"></i>Residential
                                </li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-tv mr-1"></i>TV Cable</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-spa mr-1"></i>Free Spa</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Block Wrap -->
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Popular Landmarks Nearby</h4><hr/>
                        </div>
                        <div class="block-body">
                            <div class="map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115408.09799694136!2d82.90870601301123!3d25.320894921383157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2db76febcf4d%3A0x68131710853ff0b5!2sVaranasi%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1683535825071!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">About Property</h4>
                        </div>
                        <div class="block-body">
                            <p>{{ $property_detail->remark }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="property-sidebar side_stiky">
                        <div class="sider_blocks_wrap shadows">
                            <div class="sidetab-content">
                                <!-- Appointment Now Tab -->
                                <div class="sider-block-body p-3">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h5>Fill this one-time contact form</h5>
                                            <hr>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control light"
                                                    placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <input type="text" class="form-control light"
                                                    placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control light"
                                                    placeholder="Enter Phone No.">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Message</label>
                                                <textarea class="form-control light" placeholder="Explain Query"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button class="btn book_btn theme-bg">Submit</button>
                                            </div>
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
    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12">
                    <div class="sec-heading">
                        <h2>Related Properties</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">

                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
                                                class="img-fluid mx-auto" alt="" /></a>
                                    </div>
                                </div>
                                <div class="listing-detail-wrapper">
                                    <div class="listing-short-detail-wrap">
                                        <div class="_card_list_flex mb-2">
                                            <div class="_card_flex_01">
                                                <span class="property-type elt_rent">For Rent</span>
                                            </div>
                                            <div class="_card_flex_last">
                                                <div class="prt_saveed_12lk">
                                                    <label class="toggler toggler-danger"><input type="checkbox"><i
                                                            class="fas fa-heart"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-short-detail">
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">
                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
                                                class="img-fluid mx-auto" alt="" /></a>
                                    </div>
                                </div>
                                <div class="listing-detail-wrapper">
                                    <div class="listing-short-detail-wrap">
                                        <div class="_card_list_flex mb-2">
                                            <div class="_card_flex_01">
                                                <span class="property-type elt_rent">For Rent</span>
                                            </div>
                                            <div class="_card_flex_last">
                                                <div class="prt_saveed_12lk">
                                                    <label class="toggler toggler-danger"><input type="checkbox"><i
                                                            class="fas fa-heart"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-short-detail">
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">
                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
                                                class="img-fluid mx-auto" alt="" /></a>
                                    </div>
                                </div>
                                <div class="listing-detail-wrapper">
                                    <div class="listing-short-detail-wrap">
                                        <div class="_card_list_flex mb-2">
                                            <div class="_card_flex_01">
                                                <span class="property-type elt_rent">For Rent</span>
                                            </div>
                                            <div class="_card_flex_last">
                                                <div class="prt_saveed_12lk">
                                                    <label class="toggler toggler-danger"><input type="checkbox"><i
                                                            class="fas fa-heart"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-short-detail">
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">
                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
                                                class="img-fluid mx-auto" alt="" /></a>
                                    </div>
                                </div>
                                <div class="listing-detail-wrapper">
                                    <div class="listing-short-detail-wrap">
                                        <div class="_card_list_flex mb-2">
                                            <div class="_card_flex_01">
                                                <span class="property-type elt_rent">For Rent</span>
                                            </div>
                                            <div class="_card_flex_last">
                                                <div class="prt_saveed_12lk">
                                                    <label class="toggler toggler-danger"><input type="checkbox"><i
                                                            class="fas fa-heart"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-short-detail">
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Item -->
                        <div class="single_items">
                            <div class="property-listing property-2">
                                <div class="listing-img-wrapper">
                                    <div class="list-img-slide">
                                        <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}"
                                                class="img-fluid mx-auto" alt="" /></a>
                                    </div>
                                </div>
                                <div class="listing-detail-wrapper">
                                    <div class="listing-short-detail-wrap">
                                        <div class="_card_list_flex mb-2">
                                            <div class="_card_flex_01">
                                                <span class="property-type elt_rent">For Rent</span>
                                            </div>
                                            <div class="_card_flex_last">
                                                <div class="prt_saveed_12lk">
                                                    <label class="toggler toggler-danger"><input type="checkbox"><i
                                                            class="fas fa-heart"></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="listing-short-detail">
                                            <h4 class="listing-name verified"><a href="#"
                                                    class="prt-link-detail">Red Carpet Real Estate</a></h4>
                                            <div class="foot-location"><img
                                                    src="{{ asset('frontend/assets/img/pin.svg') }}" width="18"
                                                    alt="" />Varanasi, Uttar Pradesh, India</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="listing-detail-footer">
                                    <div class="footer-first">
                                        <div class="foot-location"><span class="pric_lio theme-bg">₹3,700</span>/sqft
                                        </div>
                                    </div>
                                    <div class="footer-flex">
                                        <span>Apartment</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            // Configure/customize these variables.
            var showChar = 87; // How many characters are shown by default
            var ellipsestext = "";
            var moretext = "Read More";
            var lesstext = "Read Less";


            $('.more').each(function() {
                var content = $(this).html();
                if (content.length > showChar) {
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);
                    var html = c + '<span class="moreellipses">' + ellipsestext +
                        '&nbsp;</span><span class="morecontent"><span> ' + h +
                        '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
                    $(this).html(html);
                }
            });
            $(".morelink").click(function() {
                if ($(this).hasClass("less")) {
                    $(this).removeClass("less");
                    $(this).html(moretext);
                } else {
                    $(this).addClass("less");
                    $(this).html(lesstext);
                }
                $(this).parent().prev().toggle();
                $(this).prev().toggle();
                return false;
            });
        });
    </script>
@endsection
