@extends('frontend.layouts.app')
@section('content')
<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>
            @foreach ($sliders as $slider)
                <li data-slotamount="7" data-transition="3dcurtain-horizontal" data-masterspeed="1000" data-saveperformance="on">
                    <img data-lazyload="{{asset('backend/img/sliders/'.$slider->image)}}">
                </li>
            @endforeach
        </ul>
    </div>
</div>
<section class="welcome-section section section-lg">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="main-heading">
                    <h2 class="section-title-dash">About <span class="section-title-dash-color"> Us</span>
                        <span class="section-title-dash-bottom">&nbsp;</span>
                    </h2>
                    <p>Vishalinfra Company Development Industry Welcomes You!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <p class="welcom_para">
                    The motive of our company is to help people turn their ideas on paper into reality and live in their dream houses .
                </p>
                <p>
                    Vishalinfra Company is well known in Varanasi as a commercial building contractor that aims to be the No.1
                    Construction Company in the country under the leadership of Mr Om Prakash Gautam. We at Vishalinfra Company
                    help try to provide our clients with their dream houses with the help of our expert team of
                    architects who have been working in the industry for years. It is our sole goal here to provide
                    clients with outstanding services at an affordable price so they can achieve what they are looking
                    for.
                </p>
                <p>
                    Our team consists of experienced Architects, Engineers, and Interior Designers who help us accomplish
                    the client’s task from the scratch till the handover. This team of experts is what has helped us
                    achieve the title of the Best residential and commercial building construction company in the state.
                </p>
                <div class="button-wrap oh-desktop">
                    <a class="button button-icon button-primary wow slideInUp" href="#">Read more <i class="fa fa-chevron-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-box-layout2">
                    <div class="item-img">
                        <div class="main-img">
                            <img src="{{ asset('frontend/images/about1.jpg') }}" alt="about">
                        </div>
                        <div class="sub-img">
                            <img src="{{ asset('frontend/images/main-gallery.jpg') }}" alt="about">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg bg-gray-100">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <div class="main-heading wow fadeInLeft">
                    <h2 class="section-title-dash">Our <span class="section-title-dash-color"> Services</span>
                        <span class="section-title-dash-bottom">&nbsp;</span>
                    </h2>
                    <p>
                        As the name suggests, Vishalinfra Company is all about bringing the fortune in life by turning dreams
                        into reality. From corporate and housing solution to entertainment and societal purpose
                        constructions, Vishalinfra Company believes in crafting perfection.
                    </p>
                </div>
            </div>
        </div>
        <div class="row row-xs justify-content-center">
            <div class="owl-carousel owl-style-3" data-items="1" data-sm-items="1" data-lg-items="3" data-margin="30" data-autoplay="true" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-pagination-class=".dots-custom">
                <div class="service_single_content text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service_img">
                        <img src="{{ asset('frontend/images/furnishing.jpg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Furnishing</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur posuere adipiscing elit. Nulla neque quam, maxi ut
                            accumsan ut, posuere sit Lorem ipsum
                        </p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More<i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="service_single_content text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service_img">
                        <img src="{{ asset('frontend/images/acp-and-false-ceiling-works.jpg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">A.C.P & false Ceiling Works</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur posuere sit posuere neque adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="service_single_content text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service_img">
                        <img src="{{ asset('frontend/images/electrical-work.jpg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Electric Work</h6>
                        <p>Among many electricity providers in deregulated states competing to get your service, we're the best.</p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="service_single_content text-center wow fadeInDown" data-wow-delay="0.2s">
                    <div class="service_img">
                        <img src="{{ asset('frontend/images/painting-and-putty.jpg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Painting & Putty</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur posuere sit posuere neque adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="service_single_content text-center wow fadeInDown" data-wow-delay="0.2s">
                    <div class="service_img">
                        <img src="{{ asset('frontend/images/tiles-fitting.jpg') }}" alt=""> </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Tiles Fitting</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur posuere adipiscing elit. Nulla neque quam, maxi ut
                            accumsan ut, posuere sit Lorem ipsum
                        </p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="service_single_content text-center wow fadeInDown" data-wow-delay="0.2s">
                    <div class="service_img">
                        <img src="{{ asset('frontend/images/exterior-decoration.jpg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Exterior Decoration & Much More</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur posuere sit posuere neque adipiscing elit. Nulla
                            neque quam, maxi ut accumsan ut, posuere sit Lorem ipsum
                        </p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="service_single_content text-center wow fadeInDown" data-wow-delay="0.2s">
                    <div class="service_img">
                        <img src="{{ asset('frontend/images/architectural-design.jpg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Architectural Design</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur posuere adipiscing elit. Nulla neque quam, maxi ut
                            accumsan ut, posuere sit Lorem ipsum
                        </p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="service_single_content text-center wow fadeInDown" data-wow-delay="0.2s">
                    <div class="service_img">
                        <img src="{{ asset('frontend/images/vda-drawing.jpg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">V.D.A Drawing site Supervision</h6>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur posuere adipiscing elit. Nulla neque quam, maxi ut
                            accumsan ut, posuere sit Lorem ipsum
                        </p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i
                                class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <!-- Services Creative-->
                <div class="service_single_content text-center wow fadeInDown" data-wow-delay="0.2s">
                    <div class="service_img"> <img
                            src="{{ asset('frontend/images/sstimate-&-valuation.jpg') }}"
                            alt=""> </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Estimate & Valuation</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur posuere adipiscing elit. Nulla neque quam, maxi ut
                            accumsan ut, posuere sit Lorem ipsum</p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i
                                class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <!-- Services Creative-->
                <div class="service_single_content text-center wow fadeInDown" data-wow-delay="0.2s">
                    <div class="service_img"> <img
                            src="{{ asset('frontend/images/construction.jpeg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Construction</h6>
                        <p>It is not the beauty of a building you should look at; its the construction of the foundation
                            that will stand the test of time.</p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i
                                class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
                <!-- Services Creative-->
                <div class="service_single_content text-center wow fadeInDown" data-wow-delay="0.2s">
                    <div class="service_img"> <img
                            src="{{ asset('frontend/images/boring-&-pumps.jpg') }}" alt="">
                    </div>
                    <div class="service_content">
                        <h6 class="d-blue bold">Boring & Pumps</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur posuere adipiscing elit. Nulla neque quam, maxi ut
                            accumsan ut, posuere sit Lorem ipsum</p>
                        <a class="ttm-btn ttm-btn-size-sm" href="#">View More <i
                                class="fa fa-chevron-circle-right"></i></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--======= Services end =======-->


<section class="call-to-action-style-one section section-lg">
    <div class="inner">
        <div class="main-heading wow fadeInLeft">
            <h2 class="section-title-dash" style="color:#fff;">Our <span class="section-title-dash-color">
                    Services</span><span class="section-title-dash-bottom">&nbsp;</span> </h2>
        </div>
        <div class="thm-container text-center">
            <p class="text-center">We believe that our success won’t thrive unless we earn your trust and complete
                satisfaction through our delivery of products and services.</p>
            <p class="text-center"><b>Vishalinfra Company</b> are continuously monitored <b>24x7</b> under watchful eyes of a
                Central Control unit. The quality checks of <b>Vishalinfra Company</b> thereby ensures the best of Customers.
            </p>
            <br>
            <a href="#" class="button button-icon button-primary wow slideInUp">Contact Us <i
                    class="fa fa-chevron-circle-right"></i></a>
        </div>
    </div>
</section>

<!--======= experience-section start=======-->

<section class="section section-lg">
    <div class="services-3 bg-grea-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 align-self-center">
                    <div class="oh-desktop">
                        <div class="main-heading wow fadeInLeft">
                            <h2>Why <span class="section-title-dash-color">Choose </span> Us </h2>
                        </div>
                    </div>
                    <p style="text-align:left;">Our clients have praised construction plans for houses, apartments, and
                        commercial spaces in the real estate market because of our aggregate experience. We provide 1
                        BHK, 2 BHK, and 3 BHK flats and villas at all of Varanasi most prime locations for residential
                        properties.</p>
                </div>
                <div class="col-lg-8 wow fadeInRight delay-04s"
                    style="visibility: visible; animation-name: fadeInRight;">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="service-info-2">
                                <div class="number">1</div>
                                <div class="icon">
                                    <i class="fa fa-building-o" aria-hidden="true"></i>
                                </div>
                                <div class="service-info-2-ditels">
                                    <h3>Affordable Housing</h3>
                                    <p>Vishalinfra Company is aware of the needs of its customers. From a 1 BHK apartment to an
                                        entire villa, we've got it all for you at the most excellent pricing.<br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="service-info-2">
                                <div class="number">2</div>
                                <div class="icon">
                                    <i class="fa fa-home" aria-hidden="true"></i>
                                </div>
                                <div class="service-info-2-ditels">
                                    <h3>Fittings of the Highest Quality</h3>
                                    <p>We at Vishalinfra Company care about your lifestyle, which is why we provide you with the
                                        most significant fittings and fixtures available, regardless of the size and
                                        capacity of your house.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="service-info-2">
                                <div class="number">3</div>
                                <div class="icon">
                                    <i class="fa fa-cogs" aria-hidden="true"></i>
                                </div>
                                <div class="service-info-2-ditels">
                                    <h3>Assurance of safety</h3>
                                    <p>A large number of delighted clients can attest to the fact that Vishalinfra Company
                                        delivers quality homes for more than a decade. So don't worry, we've got your
                                        life savings covered.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="service-info-2">
                                <div class="number">4</div>
                                <div class="icon">
                                    <i class="fa fa-comments-o" aria-hidden="true"></i>
                                </div>
                                <div class="service-info-2-ditels">
                                    <h3>Support for Home Loans</h3>
                                    <p>Are you having financial difficulties? Relax! In addition to home loan support,
                                        Vishalinfra Company offers a full range of financial services to help you with your
                                        finances.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--======= experience-section end =======-->

<!--======= Gallery start=======-->
<section class="section section-lg bg-default bg-gray-100 isotope-wrap">
    <div class="container">
        <!--section-title start-->
        <div class="row text-center">
            <div class="col-md-12">
                <div class="main-heading wow fadeInLeft">
                    <h2 class="section-title-dash">Our <span class="section-title-dash-color"> Project</span><span
                            class="section-title-dash-bottom">&nbsp;</span> </h2>
                    <p>Have a look at some of the recent projects we have undertaken!</p>
                </div>
            </div>
            <!-- Col end -->
        </div>
        <!--section-title end-->
    </div>
    <div class="container-fluid container-inset-0">
        <div class="row row-10 row-desktop-8 gutters-8 isotope hoverdir" data-lightgallery="group">
        </div>
    </div>
</section>
<!--======= Gallery end =======-->
<!--======= testimonialWrap start=======-->
<section class="section swiper-container swiper-slider swiper-slider-8 testimonialWrap" data-loop="true"
    data-autoplay="5000" data-simulate-touch="false" data-slide-effect="fade">
    <div class="swiper-wrapper text-left">
        <div class="swiper-slide context-dark">
            <div class="swiper-slide-caption section-lg">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-between">
                        <div class="col-5 d-none d-md-block position-static">
                            <div class="quote-classic-figure"><img src="{{ asset('frontend/images/about-2.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-11 col-md-7 col-xl-6">
                            <div class="inset-left-xl-70">
                                <div class="main-heading wow fadeInLeft">
                                    <h2 class="section-title-dash">What <span
                                            class="section-title-dash-color">clients</span> say <span
                                            class="section-title-dash-bottom">&nbsp;</span> </h2>
                                </div>

                                <!-- Quote Classic-->
                                <article class="quote-classic quote-classic-2 quote-classic-4"
                                    data-caption-animate="fadeInLeft" data-caption-delay="0">
                                    <div class="quote-classic-text">
                                        <h6 class="q">I wanted to acknowledge the satisfaction we experienced
                                            after the Vishalinfra Company work of our Marriage Lawn. I must give a 100%
                                            satisfied mark as you not only finished the job early and under budget, but
                                            with great sub-contractors and excellent workmanship.</h6>
                                    </div>
                                    <p class="quote-classic-author">Ashutosh Singh (Varanasi)</p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide context-dark">
            <div class="swiper-slide-caption section-lg">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-between">
                        <div class="col-5 d-none d-md-block position-static">
                            <div class="quote-classic-figure"><img
                                    src="{{ asset('frontend/images/about-2.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-11 col-md-7 col-xl-6">
                            <div class="inset-left-xl-70">
                                <div class="main-heading wow fadeInLeft">
                                    <h2 class="section-title-dash">What <span
                                            class="section-title-dash-color">clients</span> say <span
                                            class="section-title-dash-bottom">&nbsp;</span> </h2>
                                </div>

                                <!-- Quote Classic-->
                                <article class="quote-classic quote-classic-2 quote-classic-4"
                                    data-caption-animate="fadeInLeft" data-caption-delay="0">
                                    <div class="quote-classic-text">
                                        <h6 class="q">I wanted to acknowledge the satisfaction we experienced
                                            after the Vishalinfra Company work of our Marriage Lawn. I must give a 100%
                                            satisfied mark as you not only finished the job early and under budget, but
                                            with great sub-contractors and excellent workmanship.</h6>
                                    </div>
                                    <p class="quote-classic-author">Ashutosh Singh (Varanasi)</p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide context-dark">
            <div class="swiper-slide-caption section-lg">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-between">
                        <div class="col-5 d-none d-md-block position-static">
                            <div class="quote-classic-figure"><img
                                    src="{{ asset('frontend/images/about-2.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-11 col-md-7 col-xl-6">
                            <div class="inset-left-xl-70">
                                <div class="main-heading wow fadeInLeft">
                                    <h2 class="section-title-dash">What <span
                                            class="section-title-dash-color">clients</span> say <span
                                            class="section-title-dash-bottom">&nbsp;</span> </h2>
                                </div>

                                <!-- Quote Classic-->
                                <article class="quote-classic quote-classic-2 quote-classic-4"
                                    data-caption-animate="fadeInLeft" data-caption-delay="0">
                                    <div class="quote-classic-text">
                                        <h6 class="q">I wanted to acknowledge the satisfaction we experienced
                                            after the Vishalinfra Company work of our Marriage Lawn. I must give a 100%
                                            satisfied mark as you not only finished the job early and under budget, but
                                            with great sub-contractors and excellent workmanship.</h6>
                                    </div>
                                    <p class="quote-classic-author">Ashutosh Singh (Varanasi)</p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-slide context-dark">
            <div class="swiper-slide-caption section-lg">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-between">
                        <div class="col-5 d-none d-md-block position-static">
                            <div class="quote-classic-figure"><img
                                    src="{{ asset('frontend/images/about-2.jpg') }}" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-11 col-md-7 col-xl-6">
                            <div class="inset-left-xl-70">
                                <div class="main-heading wow fadeInLeft">
                                    <h2 class="section-title-dash">What <span
                                            class="section-title-dash-color">clients</span> say <span
                                            class="section-title-dash-bottom">&nbsp;</span> </h2>
                                </div>

                                <!-- Quote Classic-->
                                <article class="quote-classic quote-classic-2 quote-classic-4"
                                    data-caption-animate="fadeInLeft" data-caption-delay="0">
                                    <div class="quote-classic-text">
                                        <h6 class="q">I wanted to acknowledge the satisfaction we experienced
                                            after the Vishalinfra Company work of our Marriage Lawn. I must give a 100%
                                            satisfied mark as you not only finished the job early and under budget, but
                                            with great sub-contractors and excellent workmanship.</h6>
                                    </div>
                                    <p class="quote-classic-author">Ashutosh Singh (Varanasi)</p>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--======= testimonialWrap end =======-->
<!--======= faqwrap start=======-->
<section class="section section-lg bg-default text-md-left faqwrap">
    <div class="container">
        <div class="row row-xxl row-50 justify-content-lg-between">
            <div class="col-md-6">
                <div class="main-heading wow fadeInLeft">
                    <h2 class="section-title-dash">F <span class="section-title-dash-color">A</span> Q<span
                            class="section-title-dash-bottom">&nbsp;</span> </h2>
                </div>
                <!-- Bootstrap collapse-->
                <div class="card-group-classic" id="accordion6" role="tablist" aria-multiselectable="false">
                    <!--Bootstrap card-->
                    <article class="card card-custom card-classic card-classic-2 wow fadeInLeft">
                        <div class="card-header" role="tab">
                            <h6 class="card-title"><a id="accordion6-card-head-ckebbdjx" data-toggle="collapse"
                                    data-parent="#accordion6" href="#accordion6-card-body-nqsdivvf"
                                    aria-controls="accordion6-card-body-nqsdivvf" aria-expanded="true"
                                    role="button">Lorem Ipsum is simply printing. <span class="card-arrow"></span>
                                </a></h6>
                        </div>
                        <div class="collapse show" id="accordion6-card-body-nqsdivvf"
                            aria-labelledby="accordion6-card-head-ckebbdjx" data-parent="#accordion6"
                            role="tabpanel">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer essentially unchanged. </p>
                            </div>
                        </div>
                    </article>
                    <!--Bootstrap card-->
                    <article class="card card-custom card-classic card-classic-2 wow fadeInLeft"
                        data-wow-delay=".05s">
                        <div class="card-header" role="tab">
                            <h6 class="card-title"><a class="collapsed" id="accordion6-card-head-sxpeyhxv"
                                    data-toggle="collapse" data-parent="#accordion6"
                                    href="#accordion6-card-body-pclffkth"
                                    aria-controls="accordion6-card-body-pclffkth" aria-expanded="false"
                                    role="button">Lorem Ipsum is simply printing. <span class="card-arrow"></span>
                                </a></h6>
                        </div>
                        <div class="collapse" id="accordion6-card-body-pclffkth"
                            aria-labelledby="accordion6-card-head-sxpeyhxv" data-parent="#accordion6"
                            role="tabpanel">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer essentially unchanged. </p>
                            </div>
                        </div>
                    </article>
                    <!--Bootstrap card-->
                    <article class="card card-custom card-classic card-classic-2 wow fadeInLeft" data-wow-delay=".1s">
                        <div class="card-header" role="tab">
                            <h6 class="card-title"><a class="collapsed" id="accordion6-card-head-iqdknafw"
                                    data-toggle="collapse" data-parent="#accordion6"
                                    href="#accordion6-card-body-nwgfdwng"
                                    aria-controls="accordion6-card-body-nwgfdwng" aria-expanded="false"
                                    role="button">Lorem Ipsum is simply printing. <span class="card-arrow"></span>
                                </a></h6>
                        </div>
                        <div class="collapse" id="accordion6-card-body-nwgfdwng"
                            aria-labelledby="accordion6-card-head-iqdknafw" data-parent="#accordion6"
                            role="tabpanel">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer essentially unchanged. </p>
                            </div>
                        </div>
                    </article>
                    <!--Bootstrap card-->
                    <article class="card card-custom card-classic card-classic-2 wow fadeInLeft"
                        data-wow-delay=".15s">
                        <div class="card-header" role="tab">
                            <h6 class="card-title"><a class="collapsed" id="accordion6-card-head-miiayuqb"
                                    data-toggle="collapse" data-parent="#accordion6"
                                    href="#accordion6-card-body-gqqphbuh"
                                    aria-controls="accordion6-card-body-gqqphbuh" aria-expanded="false"
                                    role="button">Lorem Ipsum is simply printing. <span class="card-arrow"></span>
                                </a></h6>
                        </div>
                        <div class="collapse" id="accordion6-card-body-gqqphbuh"
                            aria-labelledby="accordion6-card-head-miiayuqb" data-parent="#accordion6"
                            role="tabpanel">
                            <div class="card-body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer essentially unchanged. </p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-md-6 col-lg-5 bg-sd">
                <article class="team-classic">
                    <div class="unit flex-column flex-sm-row align-items-start align-items-sm-center">
                        <div class="unit-left"><a class="team-classic-figure-3" href="#"><img
                                    src="{{ asset('frontend/images/client1.jpg') }}"
                                    alt="" /></a></div>
                        <div class="unit-body">
                            <h5 class="team-classic-title-2">Contact Us! We'll get in touch as soon as possible.</h5>
                            <div class="team-classic-name"><a href="#">Vishalinfra Company</a>, <span>Manager</span>
                            </div>
                        </div>
                    </div>
                </article>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{ $message }}
                    </div>
                @endif
                <form action="" method="post">
                    @csrf
                    <div class="form-wrap wow fadeInRight">
                        <input class="form-input" id="contact-name-6" type="text" name="name" required>
                        <label class="form-label" for="contact-name-6">Name*</label>
                    </div>
                    <div class="form-wrap wow fadeInRight" data-wow-delay=".2s">
                        <input class="form-input" id="contact-phone-6" type="text" name="phone" required>
                        <label class="form-label" for="contact-phone-6">Phone*</label>
                    </div>
                    <div class="form-wrap wow fadeInRight" data-wow-delay=".15s">
                        <!--Select 2-->
                        <select class="form-input" data-minimum-results-for-search="Infinity"
                            data-constraints="@Required" name="purpose">
                            <option value="Furnishing">Furnishing</option>
                            <option value="ACP">A.C.P & false Ceiling Works</option>
                            <option value="Electric">Electric Work</option>
                            <option value="Painting">Painting & Putty</option>
                            <option value="Tiles">Tiles Fitting</option>
                            <option value="Exterior Decoration & Much More">Exterior Decoration & Much More</option>
                            <option value="Architectural">Architectural Design</option>
                            <option value="VDA">V.D.A Drawing site Supervision</option>
                            <option value="Estimate">Estimate & Valuation</option>
                            <option value="Construction">Construction</option>
                            <option value="Boring & Pumps">Boring & Pumps</option>
                        </select>
                    </div>
                    <div class="form-wrap wow fadeInRight" data-wow-delay=".05s">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-input textarea-lg" id="message" name="Address" required=""></textarea>
                    </div>
                    <button class="button button-icon button-primary wow slideInUp" type="submit" name="submit"
                        data-wow-delay=".25s">Get in touch <i class="fa fa-chevron-circle-right"></i></button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
