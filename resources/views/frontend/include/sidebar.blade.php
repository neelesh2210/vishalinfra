<div class="property_dashboard_navbar">
    <div class="dash_user_avater">
        <img src="{{ asset('frontend/images/user/avatars/'.optional(Auth::guard('web')->user()->userProfile)->avatar) }}" class="img-fluid avater" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/img/profile.png') }}';">
        <h4>{{ Auth::guard('web')->user()->name }}</h4>
    </div>
    <div class="dash_user_menues">
        <ul>
            <li @if(in_array(Route::currentRouteName(), ['user.dashboard'])) class="active" @endif>
                <a href="{{ route('user.dashboard') }}">
                    <i class="fa fa-th"></i>Dashboard
                </a>
            </li>
            @if (Auth::guard('web')->user()->type == 'builder')
                <li @if(in_array(Route::currentRouteName(), ['user.project.list'])) class="active" @endif>
                    <a href="{{ route('user.project.list') }}"><i class="fa fa-building"></i>My Projects</a>
                </li>
            @endif
            <li @if(in_array(Route::currentRouteName(), ['user.property.index'])) class="active" @endif>
                <a href="{{ route('user.property.index') }}">
                    <i class="fa fa-building"></i>My Properties
                    <span class="notti_coun style-1">
                        {{ App\Models\Admin\Property::where('added_by', Auth::guard('web')->user()->id)->get()->count() }}
                    </span>
                </a>
            </li>
            <li @if(in_array(Route::currentRouteName(), ['user.property.listing'])) class="active" @endif>
                <a href="{{ route('user.property.listing') }}">
                    <i class="fa fa-plus-circle"></i>Add New Property
                </a>
            </li>
            @if (Auth::guard('web')->user()->type == 'agent')
                <li @if(in_array(Route::currentRouteName(), ['user.team.index'])) class="active" @endif>
                    <a href="{{ route('user.team.index') }}">
                        <i class="fas fa-user-friends"></i>My Team
                    </a>
                </li>
                <li @if(in_array(Route::currentRouteName(), ['user.tree'])) class="active" @endif>
                    <a href="{{ route('user.tree') }}">
                        <i class="fas fa-user-friends"></i>Tree
                    </a>
                </li>
                <li @if(in_array(Route::currentRouteName(), ['user.customer.index', 'user.customer.create', 'user.customer.edit'])) class="active" @endif>
                    <a href="{{ route('user.customer.index') }}">
                        <i class="fa fa-users"></i>My Customers
                    </a>
                </li>
                <li @if(in_array(Route::currentRouteName(), ['user.associates'])) class="active" @endif>
                    <a href="{{ route('user.associates') }}">
                        <i class="fa fa-users"></i>My Associates
                    </a>
                </li>
                <li @if(in_array(Route::currentRouteName(), ['user.referral.link'])) class="active" @endif>
                    <a href="{{ route('user.referral.link') }}">
                        <i class="fa fa-link"></i>Referral Link
                    </a>
                </li>
                <li @if(in_array(Route::currentRouteName(), ['user.sell.property.index'])) class="active" @endif>
                    <a href="{{ route('user.sell.property.index') }}">
                        <i class="fas fa-hand-holding-usd"></i>Sell Property
                    </a>
                </li>
            @endif
            <li @if(in_array(Route::currentRouteName(), ['user.enquiry.index'])) class="active" @endif>
                <a href="{{ route('user.enquiry.index') }}">
                    <i class="fas fa-chart-line"></i>My Leads
                    <span class="notti_coun style-3">
                        {{ App\Models\Enquiry::whereHas('property', function ($q) {
                            $q->where('added_by', Auth::guard('web')->user()->id);
                        })->get()->count() }}
                    </span>
                </a>
            </li>
            <li @if(in_array(Route::currentRouteName(), ['user.profile'])) class="active" @endif>
                <a href="{{ route('user.profile') }}">
                    <i class="fas fa-user-cog"></i>My Profile
                </a>
            </li>
            <li @if(in_array(Route::currentRouteName(), ['user.subscription.list'])) class="active" @endif>
                <a href="{{ route('user.subscription.list') }}">
                    <i class="fa fa-bell"></i> Subscription Status
                    <span class="expiration">
                        @php
                            $date = App\Models\Admin\PlanPurchase::where('user_id', Auth::guard('web')->user()->id)->where('expiry_at', '>=', \Carbon\Carbon::now())->orderBy('expiry_at','asc')->first();
                            if($date){
                                $diff = \Carbon\Carbon::now()->diffInDays($date->expiry_at);
                            }else{
                                $diff = 0;
                            }
                        @endphp
                        {{ $diff }} days left
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <div class="dash_user_footer">
        <ul>
            <li><a onclick="$('#logout-form').submit()" href="#"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
    </div>
</div>
