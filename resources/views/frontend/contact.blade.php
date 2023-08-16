@extends('frontend.layouts.app')
@section('content')
    <!-- ============================ Page Title Start================================== -->
    <div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/bg.jpg')}});" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h2 class="breadcrumb-title">Contact Us</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================ Agency List Start ================================== -->
    <section>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="fas fa-phone-alt theme-cl"></i>
                        <h4>Contact</h4>
                        <p>+91-9453777525</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="fas fa-envelope theme-cl"></i>
                        <h4>Email</h4>
                        <p>info@reframerealestate.com</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="contact-box">
                        <i class="fas fa-map-marker-alt theme-cl"></i>
                        <h4>Address</h4>
                        <p>Lane No. 6, Krishnapuri Colony, Manduadih Varanasi (221103)</p>
                    </div>
                </div>
            </div>

            <!-- row Start -->
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="property_block_wrap">
                        <div class="property_block_wrap_header">
                            <h4 class="property_block_title">Enquiry Now -</h4>
                        </div>
                        <div class="block-body">
                            <form >
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" placeholder="Enter Name" class="form-control simple">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" placeholder="Enter Email" class="form-control simple">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Subject</label>
                                    <input type="text" placeholder="Enter Subject" class="form-control simple">
                                </div>
                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea placeholder="Enter Message" class="form-control simple"></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-theme" type="submit">Submit Request <i class="fas fa-chevron-right"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4 col-md-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d115408.09799694136!2d82.90870601301123!3d25.320894921383157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398e2db76febcf4d%3A0x68131710853ff0b5!2sVaranasi%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1685345708805!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
            <!-- /row -->
        </div>
    </section>
@endsection
