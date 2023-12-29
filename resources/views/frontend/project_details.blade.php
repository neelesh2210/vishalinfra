@extends('frontend.layouts.app')
@section('content')
<section class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="gg_single_part left">
                    <a href="{{uploaded_asset($project_detail->cover_image)}}" class="mfp-gallery">
                        <img src="{{uploaded_asset($project_detail->cover_image)}}" class="wh-100" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                    </a>
                </div>
                @foreach (explode(',',$project_detail->gallery_image) as $keyp=>$photo)
                    <div class="gg_single_part-right min  mb-2">
                        <a href="{{uploaded_asset($photo)}}" class="mfp-gallery">
                            <img src="{{uploaded_asset($photo)}}" class="img-fluid mx-auto" onerror="this.onerror=null;this.src='{{asset('backend/img/property_default.jpg')}}';">
                            @if(count(explode(',',$project_detail->gallery_image)) > 3)
                                <p class="vw_dtls"> <i class="fas fa-images"></i> <br> <span> +{{count(explode(',',$project_detail->gallery_image)) - 3}} Photos </span> </p>
                            @endif
                        </a>
                    </div>
                    @if($keyp == 3)
                        @php
                            break;
                        @endphp
                    @endif
                @endforeach
                <div class="property_info_detail_wrap mb-4 mt-4">
                    <div class="property_info_detail_wrap_first">
                        <div class="pr-price-into">
                            @if($project_detail->amenities)
                                <ul class="prs_lists mb-3">
                                    @foreach (json_decode($project_detail->amenities) as $amenity)
                                        <li><span class="bath"> {{$amenity}}</span></li>
                                    @endforeach
                                </ul>
                            @endif
                            <h2 class="mb-3">{{$project_detail->name}}</h2>
                            <span><i class="lni-map-marker"></i> {{$project_detail->address}} - {{$project_detail->pincode}}</span>
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
                            <p>Project Type</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{ucfirst($project_detail->project_type)}}</strong>
                        </div>
                        <div class="col-md-4">
                            <p>Project Area</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{$project_detail->project_area}} / sqft</strong>
                        </div>
                        <div class="col-md-4">
                            <p>Launch Date</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{$project_detail->launch_date}}</strong>
                        </div>
                        <div class="col-md-4">
                            <p>Completion Date</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{$project_detail->completion_date}} </strong>
                        </div>

                        <div class="col-md-4">
                            <p>Total Unit</p>
                        </div>
                        <div class="col-md-8">
                            <strong>{{$project_detail->total_unit}}</strong>
                        </div>

                    </div>
                </div>
                                    <div class="property_block_wrap">
                    <div class="property_block_wrap_header">
                        <h4 class="property_block_title">About</h4>
                        <hr>
                    </div>
                    <div class="block-body">
                        <div class="map-container">
                            {{$project_detail->about}}
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
