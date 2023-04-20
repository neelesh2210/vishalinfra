<footer class="section section-lg footer-creative context-dark">
    <div class="container">
        <div class="row row-60 justify-content-center justify-content-md-between">
            <div class="col-md-6 col-lg-4">
                <div class="oh-desktop">
                    <div class="inset-left-xl-20 wow slideInLeft">
                        <h5 class="footer-creative-title oh-desktop"><span class="d-inline-block wow slideInDown">ABOUT
                            Vishalinfra COMPANY</span></h5>
                        <p>The motive of our company is to help people turn their ideas on paper into reality and live
                            in their dream houses.</p>
                        <hr />
                        <ul class="list-inline footer-social-list footer-social-list-2">
                            <li><a class="icon fa fa-facebook" href="#"></a></li>
                            <li><a class="icon fa fa-instagram" href="#"></a></li>
                            <li><a class="icon fa fa-twitter" href="#"></a></li>
                            <li><a class="icon fa fa-youtube" href="#"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="bg-footer-creative"></div>
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="oh-desktop">
                    <div class="inset-left-xl-20 wow slideInLeft">
                        <h5 class="footer-creative-title oh-desktop"><span
                                class="d-inline-block wow slideInDown">Usefull Links</span></h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="footer-creative-list d-inline-block d-sm-block">
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Furnishing</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> A.C.P & false Ceiling
                                            Works</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Electric Work</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Painting & Putty</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Tiles Fitting</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="footer-creative-list d-inline-block d-sm-block">
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Exterior Decoration &
                                            Much More</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Architectural
                                            Design</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> V.D.A Drawing site
                                            Supervision</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Estimate &
                                            Valuation</a></li>
                                    <li><a href="#"><i class="fa fa-angle-double-right"></i> Construction</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <h5 class="footer-creative-title oh-desktop"><span class="d-inline-block wow slideInDown">Get in
                        touch</span></h5>
                <ul class="footer-creative-contacts d-inline-block d-md-block">
                    <li class="wow fadeInRight">
                        <a class="phone" href="tel:1234567890"><i class="fa fa-phone" href="#"></i> :
                            +91-1234567890</a>
                    </li>
                    <li class="wow fadeInRight" data-wow-delay=".1s">
                        <a class="mail" href="mailto:#"><i class="fa fa-envelope-o" aria-hidden="true"></i> :
                            info@vishalinfra.com</a>
                    </li>
                    <li class="wow fadeInRight" data-wow-delay=".05s">
                        <h5 class="footer-creative-title oh-desktop"><span class="d-inline-block wow slideInDown mb-3"
                                style="visibility: visible; animation-name: slideInDown;">Branch Office</span></h5>
                        <a class="address" href="#"></a> Varanasi, Uttar Pradesh, India (221010)
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyrighttext">
        <div class="container">
            <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span><span>&nbsp;</span><span>All
                    rights reserved. Developed By</span> <a href="https://www.techuptechnologies.com/"> Techup
                    Technologies.</a></p>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="snackbars" id="form-output-global"></div>
<script src="{{ asset('frontend/js/core.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.themepunch.revolution.min.js') }}"></script>
<script>
    $(function() {
        var current_page_URL = location.href;
        if (current_page_URL == 'https://construction.techuptechnologies.com/') {} else {
            $("a").each(function() {
                if ($(this).attr("href") !== "#") {
                    var target_URL = $(this).prop("href");
                    if (target_URL == current_page_URL) {
                        $(' a').parents('li, ul').removeClass('active');
                        $(this).parent('li').addClass('active');
                        return false;
                    }
                }
            });
        }
    });
</script>
<script>
    if ($('.tp-banner').length > 0) {
        $('.tp-banner').show().revolution({
            delay: 6000,
            startheight: 525,
            startwidth: 1140,
            hideThumbs: 1000,
            navigationType: 'none',
            touchenabled: 'on',
            onHoverStop: 'on',
            navOffsetHorizontal: 0,
            navOffsetVertical: 0,
            dottedOverlay: 'none',
            fullWidth: 'on'
        });
    }
    if ($('.tp-banner-full').length > 0) {
        $('.tp-banner-full').show().revolution({
            delay: 6000,
            hideThumbs: 1000,
            navigationType: 'none',
            touchenabled: 'on',
            onHoverStop: 'on',
            navOffsetHorizontal: 0,
            navOffsetVertical: 0,
            dottedOverlay: 'none',
            fullScreen: 'on'
        });
    }
</script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
