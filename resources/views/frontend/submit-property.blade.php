@extends('frontend.layouts.app')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/bg.jpg') }});" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h2 class="breadcrumb-title">Submit Your Property</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ User Dashboard ================================== -->
    <section class="gray pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="dashboard-body">
                        <div class="dashboard-wraper">
                            <div class="row">
                                <!-- Submit Form -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="submit-page">
                                        <!-- Basic Information -->
                                        <div class="frm_submit_block">
                                            <div class="frm_submit_wrap">
                                                <h3>Sell or Rent your Property</h3>
                                                <p>You are posting this property for <span class="badge badge-pill badge-warning">FREE !</span></p>
                                                <div class="form-row">
                                                    <h5 class="ml-3">Personal Details</h5>
                                                    <div class="form-group col-md-12">
                                                        <div class="input-group"> <span class="mr-2">I am</span>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="Owner" value="Owner">
                                                                <label class="form-check-label" for="Owner">Owner
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="Agent" value="Agent">
                                                                <label class="form-check-label" for="Agent">Agent
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="Builder"
                                                                    value="Builder">
                                                                <label class="form-check-label" for="Builder">Builder
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="frm_submit_block">
                                            <h5 class="ml-2">Propery Details</h5>
                                            <div class="frm_submit_wrap">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <div class="input-group"> <span class="mr-2">For</span>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="Sale" value="Sale">
                                                                <label class="form-check-label" for="Sale">Sale </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="Rent" value="Rent">
                                                                <label class="form-check-label" for="Rent">Rent/Lease
                                                                </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                    name="inlineRadioOptions" id="PG/Hostel"
                                                                    value="PG/Hostel">
                                                                <label class="form-check-label" for="PG/Hostel">PG/Hostel
                                                                </label> </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Property Type</label>
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
                                                </div>
                                            </div>
                                        </div>
                                    <div class="frm_submit_block">
                                        <h5 class="ml-2">Propery Location</h5>
                                        <div class="frm_submit_wrap">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>City</label>
                                                    <input type="text" class="form-control">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>State</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <ul class="no-ul-list">
                                            <li>
                                                <input id="aj-1" class="checkbox-custom" name="aj-1"
                                                    type="checkbox">
                                                <label for="aj-1" class="checkbox-custom-label">I am posting this property 'exclusively' on Vishal Infra
                                                </label>
                                            </li>
                                        </ul>
                                        <ul class="no-ul-list">
                                            <li>
                                                <input id="aj-2" class="checkbox-custom" name="aj-2"
                                                    type="checkbox">
                                                <label for="aj-2" class="checkbox-custom-label">I agree to Magicbricks T&C, Privacy Policy, & Cookie Policy
                                                </label>
                                            </li>
                                        </ul>
                                        <ul class="no-ul-list">
                                            <li>
                                                <input id="aj-3" class="checkbox-custom" name="aj-3"
                                                    type="checkbox">
                                                <label for="aj-3" class="checkbox-custom-label">I want to receive responses on  Whatsapp
                                                </label>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="btn btn-theme" type="submit">Login & Post Property <i class="fas fa-chevron-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="single_widgets widget_thumb_post">
                    <h4 class="title">How to find the right Buyer?</h4>
                    <hr>
                    <ul>
                        <li>
                            <span class="left">
                                <img src="{{ asset('frontend/assets/img/add-user.png') }}" alt="" class="">
                            </span>
                            <span class="right">
                                <a class="feed-title" href="#">Respond to Buyer Enquiries</a>
                                <span class="post-date">Connect with Buyers when they contact on your property.</span>
                            </span>
                        </li>
                        <li>
                            <span class="left">
                                <img src="{{ asset('frontend/assets/img/telephone-call.png') }}" alt="" class="">
                            </span>
                            <span class="right">
                                <a class="feed-title" href="#">Connect with Matching Buyers</a>
                                <span class="post-date">Actively check for matching Buyers & connect.</span>
                            </span>
                        </li>
                        <li>
                            <span class="left">
                                <img src="{{ asset('frontend/assets/img/cloud.png') }}" alt="" class="">
                            </span>
                            <span class="right">
                                <a class="feed-title" href="#">Download the App</a>
                                <span class="post-date">Get notified on all new Buyer enquiries and connect
                                    instantly.</span>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- ============================ User Dashboard End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    <section class="theme-bg call_action_wrap-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="call_action_wrap">
                        <div class="call_action_wrap-head">
                            <h3>Do You Have Questions ?</h3>
                            <span>We'll help you to grow your career and growth.</span>
                        </div>
                        <a href="{{ route('contact') }}" class="btn btn-call_action_wrap">Contact Us <i
                                class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Call To Action End ================================== -->
@endsection
