<div class="header header-light">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('index') }}">
                    <img src="{{ asset('frontend/assets/img/logo.png') }}" class="logo">
                </a>
                <div class="nav-toggle"></div>
                <div class="mobile_nav">
                    <ul>
                        @if (!Auth::guard('web')->user())
                            <li>
                                <a href="{{ route('signin') }}"><i class="fas fa-user-circle fa-lg"></i></a>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('user.dashboard') }}">
                                    <i class="fas fa-user-circle fa-lg"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="nav-menus-wrapper nav-style-separated" style="transition-property: none;">
                <ul class="nav-menu">
                    <li class="active">
                        <a href="{{ route('index') }}">Home</a>
                    </li>
                    <li>
                        <a href="#">Buy<span class="submenu-indicator"></span></a>
                    </li>
                    <li>
                        <a href="#">Rent</a>
                    </li>
                    <li>
                        <a href="#">Sell</a>
                    </li>
                    <li>
                        <a href="{{ route('properties') }}">Property Services</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li>
                        <a href="{{ route('plan') }}">Pricing</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
                <ul class="nav-menu nav-menu-social align-to-right">
                    @if (!Auth::guard('web')->user())
                        <li class="_my_prt_list">
                            <a href="{{ route('signin') }}">
                                <i class="fas fa-sign-in-alt mr-1"></i>Sign in
                            </a>
                        </li>
                    @else
                        <li>
                            <div class="btn-group account-drop">
                                <button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('frontend/images/user/avatars/'.Auth::guard('web')->user()->userProfile->avatar) }}" class="img-fluid avater" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/img/profile.png') }}';" style="height: 40px;width: 40px;">
                                </button>
                                <div class="dropdown-menu pull-right animated flipInX">
                                    <div class="drp_menu_headr">
                                        <h4>Hi, {{ Auth::guard('web')->user()->name }}</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="{{ route('requested_property') }}">
                                                <i class="fa fa-user-tie"></i>Requested Properties
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user-tie"></i>View Response
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user-tie"></i>Manage Properties
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user-tie"></i>iAdvantage
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user-tie"></i>Manage Subscriptions
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.dashboard') }}">
                                                <i class="fa fa-user-tie"></i>PG Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.profile') }}">
                                                <i class="fa fa-user-tie"></i>My Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a onclick="$('#logout-form').submit()" href="#">
                                                <i class="fa fa-unlock-alt"></i>Logout
                                            </a>
                                        </li>
                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
                                            @csrf
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    @endif
                    <li class="add-listing">
                        <a href="{{ route('user.property.listing') }}" class="theme-cl">
                            <i class="fas fa-plus-circle mr-1"></i>Post Property<small>(Free)</small>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="clearfix"></div>
