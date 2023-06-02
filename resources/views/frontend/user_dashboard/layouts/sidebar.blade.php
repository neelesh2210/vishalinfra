<div class="wrapper">
    <div class="leftside-menu">
        <a href="#" class="logo text-center logo-light">
            <span class="logo-lg">
                <img src="{{ asset('backend/img/logo.png') }}" alt="" height="50">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('backend/img/logo.png') }}" alt="" height="16">
            </span>
        </a>
        <div class="h-100" id="leftside-menu-container" data-simplebar>
            <ul class="side-nav">
                <li class="side-nav-item">
                    <a href="{{route('user.dashboard')}}" class="side-nav-link active">
                        <i class="uil-home-alt"></i>
                        <span> Dashboard </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.property.index')}}" class="side-nav-link">
                        <i class="uil-building"></i>
                        <span> Property </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.pricing_plan')}}" class="side-nav-link">
                        <i class="uil-book-open"></i>
                        <span> Subscription Status </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.leads')}}" class="side-nav-link">
                        <i class="uil-book-open"></i>
                        <span>Get Leads </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-building"></i>
                        <span> Manage Payment</span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="#" class="side-nav-link">
                        <i class="uil-building"></i>
                        <span> Property Alert</span>
                    </a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
