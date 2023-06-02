        <!-- Start Navigation -->
        <div class="header header-light">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{route('index')}}">
                            <img src="{{ asset('frontend/assets/img/logo.png')}}" class="logo" alt="" />
                        </a>
                        <div class="nav-toggle"></div>
                        <div class="mobile_nav">
                            <ul>
                                <li><a href="{{route('signin')}}"><i class="fas fa-user-circle fa-lg"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-menus-wrapper nav-style-separated" style="transition-property: none;">
                        <ul class="nav-menu">

                            <li class="active"><a href="{{route('index')}}">Home</a></li>

                            <li><a href="#">Buy<span class="submenu-indicator"></span></a>
                                {{-- <ul class="nav-dropdown nav-submenu">
                                    <li><a href="#">Listing Grid<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="grid-layout-with-sidebar.html">Grid Style 1</a></li>
                                            <li><a href="grid-layout-2.html">Grid Style 2</a></li>
                                            <li><a href="grid-layout-3.html">Grid Style 3</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Listing List<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="list-layout-with-sidebar.html">List Style 1</a></li>
                                            <li><a href="list-layout-with-map-2.html">List Style 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Listing Map<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="half-map.html">Half Map</a></li>
                                            <li><a href="half-map-2.html">Half Map 2</a></li>
                                            <li><a href="classical-layout-with-map.html">Classical With Sidebar</a></li>
                                            <li><a href="list-layout-with-map.html">List Sidebar Map</a></li>
                                            <li><a href="grid-layout-with-map.html">Grid Sidebar Map</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Agents View<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="agents.html">Agent Grid Style</a></li>
                                            <li><a href="agents-2.html">Agent Grid 2</a></li>
                                            <li><a href="agent-page.html">Agent Detail Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Agency View<span class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="agencies.html">Agency Grid Style</a></li>
                                            <li><a href="agency-page.html">Agency Detail Page</a></li>
                                        </ul>
                                    </li>
                                </ul> --}}
                            </li>
                            <li><a href="#">Rent</a></li>
                            <li><a href="#">Sell</a></li>
                            <li><a href="{{route('properties')}}">Property Services</a> </li>
                            <li><a href="{{route('about')}}">About</a></li>
                            <li><a href="{{route('plan')}}">Pricing</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">
                            @if(!Auth::guard('web')->user())
                                <li class="_my_prt_list"><a href="{{route('signin')}}"><i class="fas fa-sign-in-alt mr-1"></i>Sign in</a></li>
                            @else
                            <li>
                                <div class="btn-group account-drop">
                                    <button type="button" class="btn btn-order-by-filt" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('frontend/assets/img/profile.png')}}" class="avater-img" alt="">
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <div class="drp_menu_headr">
                                            <h4>Hi, {{Auth::guard('web')->user()->name}}</h4>
                                        </div>
                                        <ul>
                                            <li><a href="{{route('user.profile')}}"><i class="fa fa-user-tie"></i>My Profile</a></li>
                                            <li><a onclick="$('#logout-form').submit()" href="#"><i class="fa fa-unlock-alt"></i>Logout</a></li>
                                            <form id="logout-form" action="{{route('user.logout')}}" method="POST">
                                                @csrf
                                            </form>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endif
                            <li class="add-listing">
                                <a href="{{route('user.property.listing')}}" class="theme-cl">
                                    <i class="fas fa-plus-circle mr-1"></i>Post Property<small>(Free)</small>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
