@extends('frontend.layouts.app')
@section('content')
    <section class="gallery_parts pt-2 pb-2 d-none d-sm-none d-md-none d-lg-none d-xl-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7 col-sm-12 pr-1">
                    <div class="gg_single_part left">
                        <a href="{{uploaded_asset($property_detail->thumbnail_img)}}" class="mfp-gallery">
                            <img src="{{uploaded_asset($property_detail->thumbnail_img)}}" class="img-fluid mx-auto" alt="" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 pl-1">
                    @foreach (explode(',',$property_detail->photos) as $keyp=>$photo)
                        <div class="gg_single_part-right min  mb-2">
                            <a href="{{uploaded_asset($photo)}}" class="mfp-gallery">
                                <img src="{{uploaded_asset($photo)}}" class="img-fluid mx-auto" alt="" />
                                <p class="vw_dtls"> <i class="fas fa-images"></i> <br> <span> + {{count(explode(',',$property_detail->photos)) - 3}} Photos</span> </p>
                            </a>
                        </div>
                        @if($keyp == 2)
                            @php
                                break;
                            @endphp
                        @endif
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
                                <span><i class="lni-map-marker"></i> {{ $property_detail->landmark }}, {{$property_detail->cities->name}}</span>
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
                                <strong>{{ $property_detail->discounted_price }}</strong> <span><del>{{ $property_detail->final_price }}</del></span>
                            </div>
                            <div class="col-md-4">
                                <p>Booking Amount</p>
                            </div>
                            <div class="col-md-8">
                                <strong>{{ $property_detail->booking_amount }}</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Carpet Area</p>
                            </div>
                            <div class="col-md-8">
                                <strong>{{ $property_detail->carpet_area }}sqft | ₹{{ $property_detail->price }}/sqft </strong>
                            </div>

                            <div class="col-md-4">
                                <p>Address</p>
                            </div>
                            <div class="col-md-8">
                                <strong>{{ optional($property_detail->cities)->name }}, India</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Landmarks</p>
                            </div>
                            <div class="col-md-8">
                                <strong>{{ $property_detail->landmark }}</strong>
                            </div>
                            <div class="col-md-4">
                                <p>Furnishing</p>
                            </div>
                            <div class="col-md-8">
                                <strong>{{ $property_detail->furnished_status }}</strong>
                            </div>
                            {{-- <div class="col-md-4">
                                <p>Age of Construction</p>
                            </div>
                            <div class="col-md-8">
                                <strong>Above 20 years</strong>
                            </div> --}}
                            <div class="col-md-12">
                                <h6 class="property_block_title">Description :</h6>
                                <p class="more">{{ $property_detail->remark }}</p>
                            </div>
                        </div>
                    </div>
                    @if($property_detail->amenities && $property_detail->amenities != 'null')
                        <div class="property_block_wrap">
                            <div class="property_block_wrap_header">
                                <h4 class="property_block_title">Amenities</h4>
                                <hr />
                            </div>
                            <div class="block-body">
                                <ul class="row p-0 m-0">
                                    @foreach (json_decode($property_detail->amenities) as $amenity)
                                        @php
                                            $am = App\Models\Admin\Amenity::find($amenity);
                                        @endphp
                                        <li class="col-lg-4 col-md-6 mb-2 p-0"><i class="{{$am->icon}} mr-1"></i>{{$am->name}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
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
                                    @if(Session::has('success'))
                                        <span style="background: rgba(76, 175, 80,0.1);color: #4caf50;">{{Session::get('success')}}</span>
                                    @endif
                                    <form action="{{route('enquiry.store')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <input type="hidden" name="property_id" value="{{$property_detail->id}}">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <h5>Fill this one-time contact form</h5>
                                                 <p>Get Agent's details over email</p>
                                                <hr>
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <input type="text" class="form-control light" name ="name" placeholder="Enter Name">
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
                                                    <button class="btn book_btn theme-bg">Get Contact Details</button>
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

    <section class="pt-0">
        <div class="container">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="list_views">
                    <div class="single_items">
                        <div class="row">
                            @foreach ($similer_properties as $similer_property)
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12">
                                    <div class="property-listing list_view row m-0">
                                        <div class="col-md-4 p-0">
                                            {{-- <div class="_exlio_125">Sponsored</div> --}}
                                            <div class="list-img-slide">
                                                <a href="{{ route('property.detail',$similer_property->slug) }}"><img src="{{uploaded_asset($similer_property->thumbnail_img)}}" class="img-fluid mx-auto" alt="" /></a>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="listing-detail-wrapper mt-1">
                                                <div class="listing-short-detail-wrap">
                                                    <div class="_card_list_flex mb-2">
                                                        <div class="_card_flex_01">
                                                            <h5>
                                                                <a href="{{ route('property.detail',$similer_property->slug) }}" class="prt-link-detail">{{ $similer_property->name }}</a>
                                                            </h5>
                                                        </div>
                                                        <div class="_card_flex_last">
                                                            <h6 class="listing-card-info-price mb-0">₹{{ $similer_property->final_price }}</h6>
                                                            <span>₹{{ $similer_property->price }}/sqft</span>
                                                        </div>
                                                    </div>
                                                    <div class="_card_list_flex">
                                                        <div class="_card_flex_01">
                                                            <h4 class="listing-name verified">
                                                                <a href="{{ route('property.detail',$similer_property->slug) }}" class="prt-link-detail">
                                                                    @if ($similer_property->pincode)
                                                                        {{ $similer_property->city }}, {{ $similer_property->state }},
                                                                        {{ $similer_property->country }},{{ $similer_property->pincode }}
                                                                    @endif
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-features-wrapper">
                                                <div class="block-body">
                                                    <ul class="avl-features third">
                                                        @if($similer_property->bedroom)
                                                            <li class="active">{{$similer_property->bedroom}} BHK</li>
                                                            <li class="active">Balcony</li>
                                                            {{-- <li class="active">Corner Plot</li> --}}
                                                        @else
                                                            <li class="active">{{$similer_property->plot_length}} Length</li>
                                                            <li class="active">{{$similer_property->plot_breadth}} Breadth</li>
                                                        @endif
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
                                                    <a href="{{ route('property.detail',$similer_property->slug) }}" class="prt-view">View <i class="fas fa-chevron-right pl-1"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
                        <h2>Top Project</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="item-slide space">
                        @foreach ($projects as $project)
                            <div class="single_items">
                                <div class="property-listing property-2">
                                    <div class="listing-img-wrapper">
                                        <div class="list-img-slide">
                                            <a href="#"><img src="{{uploaded_asset($project->cover_image)}}" class="img-fluid mx-auto" alt="" /></a>
                                        </div>
                                    </div>
                                    <div class="listing-detail-wrapper">
                                        <div class="listing-short-detail-wrap">
                                            <div class="_card_list_flex mb-2">
                                                <div class="_card_flex_01">
                                                    <span class="_list_blickes _netork">{{$project->total_unit}} Unit</span>
                                                </div>
                                            </div>
                                            <div class="listing-short-detail">
                                                <h4 class="listing-name verified">
                                                    <a href="#" class="prt-link-detail">{{$project->name}}</a>
                                                </h4>
                                                <div class="foot-location">
                                                    <img src="{{ asset('frontend/assets/img/pin.svg') }}" width="18" alt="" />{{$project->address}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="listing-detail-footer">
                                        <div class="footer-first">
                                            <h6 class="listing-card-info-price mb-0 p-0">{{$project->project_area}} Area</h6>
                                        </div>
                                        <div class="footer-flex">
                                            <a href="#" class="prt-view">View Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
