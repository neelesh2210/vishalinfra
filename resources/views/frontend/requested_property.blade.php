@extends('frontend.layouts.app')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/slider-5.jpg')}});" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h2 class="breadcrumb-title">My Activity</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Agency List Start ================================== -->
    <section>
        <div class="container">
            <!-- row Start -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h4 class="mb-3">My Activity</h4>
                    <div class="custom-tab style-1">
                        <ul class="nav nav-tabs b-0" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">All Requests</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contacted</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Shortlisted</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                               <div class="text-center">
                                <img src="{{ asset('frontend/assets/img/not-found.svg') }}" class="img-fluid m-auto">
                                <h5>You've not sent any request yet.</h5>
                                <h6><a href="#" style="color: #ff572e;">Start connecting with the Owners</a></h6>
                            </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="text-center">
                                    <h5 class="mt-3 mb-3">You've not sent any request yet.</h5>
                                    <a href="#" class="btn theme-bg rounded" type="submit">Go to Search <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <div class="text-center">
                                    <h5 class="mt-3 mb-3">You've not sent any request yet.</h5>
                                    <a href="#" class="btn theme-bg rounded" type="submit">Go to Search <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
    </section>
    <!-- ============================ Agency List End ================================== -->

@endsection
