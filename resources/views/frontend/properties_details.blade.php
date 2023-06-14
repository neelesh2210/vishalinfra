@extends('frontend.layouts.app')
@section('content')
    <section class="gallery_parts pt-2 pb-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7 col-sm-12 pr-1">
                    <div class="gg_single_part left">
                        <a href="{{ asset('backend/img/properies/' . $property_detail->thumbnail_img) }}" class="mfp-gallery">
                            <img src="{{ asset('backend/img/properies/' . $property_detail->thumbnail_img) }}" class="img-fluid mx-auto" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 pl-1">
                    @foreach (explode(',',$property_detail->photos) as $photo)
                        <div class="gg_single_part-right min  mb-2">
                            <a href="{{uploaded_asset($photo)}}" class="mfp-gallery">
                                <img src="{{uploaded_asset($photo)}}" class="img-fluid mx-auto" alt="" />
                                <p class="vw_dtls"> <i class="fas fa-images"></i> <br> <span> + 19 Photos</span> </p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <div class="featured_slick_gallery gray d-block d-md-block d-lg-block d-xl-none">
        <div class="featured_slick_gallery-slide">
            <div class="featured_slick_padd">
                <a href="{{uploaded_asset($photo)}}" class="mfp-gallery">
                    <img src="{{uploaded_asset($photo)}}" class="img-fluid mx-auto" alt="" />
                </a>
            </div>
                @foreach (explode(',',$property_detail->photos) as $photo)
                    <div class="featured_slick_padd">
                        <a href="{{uploaded_asset($photo)}}" class="mfp-gallery">
                            <img src="{{uploaded_asset($photo)}}" class="img-fluid mx-auto" alt="" />
                        </a>
                    </div>
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
                                    <li><span class="sqft">{{ $property_detail->price }}/sqft</span></li>
                                </ul>
                                <h2 class="mb-3">{{ $property_detail->name }}</h2>
                                <span><i class="lni-map-marker"></i> </span>
                            </div>
                        </div>
                    </div>
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h3 class="property_block_title">More Details</h3>
                            <hr />
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Price</p>
                            </div>
                            <div class="col-md-8">
                                <strong>10000000</strong> <span><del>12000000</del></span>
                            </div>
                            <div class="col-md-4">
                                <p>Booking Amount</p>
                            </div>
                            <div class="col-md-8">
                                <strong>100000</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Carpet Area</p>
                            </div>
                            <div class="col-md-8">
                                <strong>1000sqft | ₹7,500/sqft </strong>
                            </div>

                            <div class="col-md-4">
                                <p>Address</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Varanasi, India</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Landmarks</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Near Sai Temple</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Furnishing</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Semi-Furnished</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Age of Construction</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Above 20 years</strong>
                            </div>
                            <div class="col-md-12">
                                <h6 class="property_block_title">Description :</h6>
                                <p class="more">{{ $property_detail->remark }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Amenities</h4>
                            <hr />
                        </div>
                        <div class="block-body">
                            <ul class="row p-0 m-0">
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-building mr-1"></i>Club House</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-bed mr-1"></i>4 Bedrooms</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-expand-arrows-alt mr-1"></i>Kids Play Area</li>
                                <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="fa fa-car mr-1"></i>Car Parking</li>
                            </ul>
                        </div>
                    </div>
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Popular Landmarks Nearby</h4>
                            <hr />
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
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <h5>Fill this one-time contact form</h5>
                                             <p>Get Agent's details over email</p>
                                            <hr>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <input type="text" class="form-control light" placeholder="Enter Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Contact Number</label>
                                                <input type="text" class="form-control light" placeholder="Enter Phone No.">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <input type="text" class="form-control light" placeholder="Enter Email">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <button class="btn book_btn theme-bg">Get Contact Details</button>
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
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="list_views">
                    <div class="single_items">
                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                <div class="property-listing list_view row m-0">
                                    <div class="col-md-4 p-0">
                                        <div class="_exlio_125">Sponsored</div>
                                        <div class="list-img-slide">
                                            <a href="#"><img src="{{ asset('frontend/assets/img/p-1.png') }}" class="img-fluid mx-auto" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="listing-detail-wrapper mt-1">
                                            <div class="listing-short-detail-wrap">
                                                <div class="_card_list_flex mb-2">
                                                    <div class="_card_flex_01">
                                                        <h5>
                                                            <a href="#" class="prt-link-detail">Red Carpet Real Estate</a>
                                                        </h5>
                                                    </div>
                                                    <div class="_card_flex_last">
                                                        <h6 class="listing-card-info-price mb-0">₹1000</h6>
                                                        <span>₹100/sqft</span>
                                                    </div>
                                                </div>
                                                <div class="_card_list_flex">
                                                    <div class="_card_flex_01">
                                                        <h4 class="listing-name verified">
                                                            <a href="#" class="prt-link-detail">Varanasi, Uttar Pradesh, India</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-features-wrapper">
                                            <div class="block-body">
                                                <ul class="avl-features third">
                                                    <li class="active">3 BHK</li>
                                                    <li class="active">Balcony</li>
                                                    <li class="active">Corner Plot</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="listing-detail-footer">
                                            <div class="footer-first">
                                                <div class="foot-rates">
                                                    <span class="elio_rate good">4.4</span>
                                                    <div class="_rate_stio">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer-flex">
                                                <a href="#" class="prt-view">View <i class="fas fa-chevron-right pl-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                <div class="property-listing list_view row m-0">
                                    <div class="col-md-4 p-0">
                                        <div class="_exlio_125">Sponsored</div>
                                        <div class="list-img-slide">
                                            <a href="#">
                                                <img src="{{ asset('frontend/assets/img/p-1.png') }}" class="img-fluid mx-auto" alt="" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="listing-detail-wrapper mt-1">
                                            <div class="listing-short-detail-wrap">
                                                <div class="_card_list_flex mb-2">
                                                    <div class="_card_flex_01">
                                                        <h5>
                                                            <a href="#" class="prt-link-detail">Red Carpet Real Estate</a>
                                                        </h5>
                                                    </div>
                                                    <div class="_card_flex_last">
                                                        <h6 class="listing-card-info-price mb-0">₹1000</h6>
                                                        <span>₹100/sqft</span>
                                                    </div>
                                                </div>
                                                <div class="_card_list_flex">
                                                    <div class="_card_flex_01">
                                                        <h4 class="listing-name verified">
                                                            <a href="#" class="prt-link-detail">Varanasi, Uttar Pradesh, India</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="price-features-wrapper">
                                            <div class="block-body">
                                                <ul class="avl-features third">
                                                    <li class="active">3 BHK</li>
                                                    <li class="active">Balcony</li>
                                                    <li class="active">Corner Plot</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="listing-detail-footer">
                                            <div class="footer-first">
                                                <div class="foot-rates">
                                                    <span class="elio_rate good">4.4</span>
                                                    <div class="_rate_stio">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="footer-flex">
                                                <a href="#" class="prt-view">View <i class="fas fa-chevron-right pl-1"></i></a>
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
