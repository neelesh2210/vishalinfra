<div class="property_dashboard_navbar">
    <div class="dash_user_avater">
        <img src="{{ asset('frontend/assets/img/profile.png') }}" class="img-fluid avater" alt="">
        <h4>{{ Auth::guard('web')->user()->name }}</h4>
        {{-- <span>Varanasi</span> --}}
    </div>
    <div class="dash_user_menues">
        <ul>
            <li class="active">
                <a href="{{ route('user.dashboard') }}">
                    <i class="fa fa-tachometer-alt"></i>Dashboard<span class="notti_coun style-1">4</span>
                </a>
            </li>
            <li><a href="{{ route('user.profile') }}"><i class="fa fa-user-tie"></i>My Profile</a></li>
            <li><a href="{{ route('user.property.index') }}"><i class="fa fa-tasks"></i>My Properties</a></li>
            <li><a href="#"><i class="fa fa-envelope"></i>Get Leads<span class="notti_coun style-3">3</span></a></li>
            <li><a href="#"><i class="fa fa-gift"></i> Subscription Status <span class="expiration">10 days left</span></a></li>
            <li><a href="{{route('user.property.listing')}}"><i class="fa fa-pen-nib"></i>Submit New Property</a></li>
            @if(Auth::guard('web')->user()->type == 'builder')
                <li><a href="{{route('user.add.project')}}"><i class="fa fa-pen-nib"></i>Add Project</a></li>
            @endif
        </ul>
    </div>
    <div class="dash_user_footer">
        <ul>
            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
    </div>
</div>
