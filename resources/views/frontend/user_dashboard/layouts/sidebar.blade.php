<div class="wrapper">
    <div class="leftside-menu">
        <a href="{{route('index')}}" class="logo text-center logo-light">
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
                    <a href="{{route('user.profile')}}" class="side-nav-link">
                        <i class="uil-user"></i>
                        <span> Profile </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.kyc')}}" class="side-nav-link">
                        <i class="uil uil-user-square"></i>
                        <span> KYC </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.customer.index')}}?user_type=customer" class="side-nav-link">
                        <i class="uil uil-users-alt"></i>
                        <span> Customers </span>
                    </a>
                </li>
                <li class="side-nav-item">
                    <a href="{{route('user.property.index')}}" class="side-nav-link">
                        <i class="uil uil-building"></i>
                        <span> Property </span>
                    </a>
                </li>
                @if(Auth::guard('web')->user()->type == 'associate')
                    <li class="side-nav-item">
                        <a href="{{route('user.property.booking.request.list')}}" class="side-nav-link">
                            <i class="uil uil-building"></i>
                            <span> Booking Request </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{route('user.customer.index')}}?user_type=associate" class="side-nav-link">
                            <i class="uil uil-users-alt"></i>
                            <span> Associates </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{route('user.associate.wallet.transaction.index')}}" class="side-nav-link">
                            <i class="uil-money-insert"></i>
                            <span> Wallet Transaction </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{route('user.referral.link')}}" class="side-nav-link">
                            <i class="uil uil-link"></i>
                            <span> Referral Link </span>
                        </a>
                    </li>
                @endif
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
