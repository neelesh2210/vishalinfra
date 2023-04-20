<section class="section swiper-custom-container-3">
    <header class="section page-header">
        <div class="vanguard-navbar-wrap">
            <nav class="vanguard-navbar vanguard-navbar-corporate" data-layout="vanguard-navbar-fixed" data-sm-layout="vanguard-navbar-fixed" data-md-layout="vanguard-navbar-fixed" data-md-device-layout="vanguard-navbar-fixed" data-lg-layout="vanguard-navbar-static" data-lg-device-layout="vanguard-navbar-fixed" data-xl-layout="vanguard-navbar-static" data-xl-device-layout="vanguard-navbar-static" data-xxl-layout="vanguard-navbar-static" data-xxl-device-layout="vanguard-navbar-static" data-lg-stick-up-offset="80px" data-xl-stick-up-offset="80px" data-xxl-stick-up-offset="80px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                <div class="vanguard-navbar-collapse-toggle vanguard-navbar-fixed-element-1" data-vanguard-navbar-toggle=".vanguard-navbar-collapse"><span></span></div>
                <div class="vanguard-navbar-main-outer">
                    <div class="vanguard-navbar-main">
                        <div class="vanguard-navbar-panel">
                            <button class="vanguard-navbar-toggle" data-vanguard-navbar-toggle=".vanguard-navbar-nav-wrap"><span></span></button>
                            <div class="vanguard-navbar-brand">
                                <img src="{{asset('backend/img/logo.png')}}" style="height: 50px;width: 130px;">
                            </div>
                        </div>
                        <div class="vanguard-navbar-main-element">
                            <div class="vanguard-navbar-nav-wrap nav-style-separated">
                                <ul class="vanguard-navbar-nav">
                                    <li class="vanguard-nav-item active"><a class="vanguard-nav-link" href="/">Home</a></li>
                                    <li class="vanguard-nav-item"><a class="vanguard-nav-link" href="#">About Us</a> </li>
                                    <li class="vanguard-nav-item"><a class="vanguard-nav-link" href="#">Gallery</a></li>
                                    <li class="vanguard-nav-item"><a class="vanguard-nav-link" href="#">Services</a></li>
                                    <li class="vanguard-nav-item"><a class="vanguard-nav-link" href="{{route('properties')}}">Properties</a></li>
                                    <li class="vanguard-nav-item"><a class="vanguard-nav-link" href="#">Contact Us</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="vanguard-navbar-collapse">
                            <ul class="vanguard-navbar-contacts-4">
                                <li><i class="icon fa fa-user"></i>
                                    @if(auth()->guard('web')->user())
                                        <a href="{{route('user.dashboard')}}">{{Auth::guard('web')->user()->name}}</a>
                                    @else
                                        <a href="{{route('login')}}"> Login</a>
                                    @endguest
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</section>
