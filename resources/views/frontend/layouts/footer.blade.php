<footer class="dark-footer skin-dark-footer style-2">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="footer_widget">
                        <h4 class="widget_title">About Reframe Enterprises</h4>
                        <p>The Reframe Enterprises is an online marketplace to deal with every aspect of the consumers’ needs in the real estate industry. It is an online forum where buyers and sellers can exchange information about real estate properties quickly.</p>
                        <h6 class="widget_title text-white">Follow us: </h6>
                        <ul class="social-link">
                            <li>
                                <a href="https://www.facebook.com/reframerealestate/" target="_blank"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/ReframeE" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/reframerealestate/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/vishal-singh-2b65aa1a3/" target="_blank"><i class="fab fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCbGYFcKKlaQDLBYCLT35H7g/" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 ml-auto">
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="footer_widget">
                                <h4 class="widget_title">Properties in India</h4>
                                <ul class="footer-menu">
                                    @foreach (App\Models\Admin\City::whereHas('property')->get() as $city)
                                        <li>
                                            <a href="{{ route('properties') }}?location={{$city->id}}">Property in {{$city->name}}
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-6">
                            <div class="footer_widget">
                                <h4 class="widget_title">Our Policies</h4>
                                <ul class="footer-menu">
                                    <li>
                                        <a href="{{route('privacy_policy')}}">Privacy Policy
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('term_and_condition')}}">Term & Condition
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('cancel_and_refund_policy')}}">Cancel & Refund Policy
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('faq')}}">FAQ
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{route('about')}}">About Us
                                            <i class="fas fa-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-xs-6">
                            <div class="footer_widget">
                                <h4 class="widget_title">Get In Touch</h4>
                                <ul class="footer-contact-list">
                                    <li>
                                        <a href="tel:+91-9453777525">
                                            <i class="fas fa-phone-alt"></i> +91-9453777525
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@reframerealstate.com">
                                            <i class="fas fa-envelope"></i> info@reframerealstate.com
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-map-marker-alt">
                                            </i> Registered Office :  Lane No. 6, Krishnapuri Colony, Manduadih Varanasi (221103)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-map-marker-alt">
                                            </i> Branch Office :  Kadipur, Bari bazar, Amara Khaira Chak, Lathiya, Varanasi, Uttar Pradesh 221003, India
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 text-center">
                    <p class="mb-0">© 2023 all right reserved. Developed By
                        <a href="https://www.techuptechnologies.com/" style="color:#ff5f20;" target="_blank">Techup Technologies</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

<script src="{{ asset('assets/image/js/vendors.js') }}"></script>
<script src="{{ asset('assets/image/js/aiz-core.js') }}"></script>
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/select2.min.js') }}">-</script>
<script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slider-bg.js') }}"></script>
<script src="{{ asset('frontend/assets/js/lightbox.js') }}"></script>
<script src="{{ asset('frontend/assets/js/imagesloaded.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>
