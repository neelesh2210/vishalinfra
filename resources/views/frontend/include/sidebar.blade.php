<div class="property_dashboard_navbar">
    <div class="dash_user_avater">
        <img src="{{ asset('frontend/images/user/avatars/'.optional(Auth::guard('web')->user()->userProfile)->avatar) }}" class="img-fluid avater" onerror="this.onerror=null;this.src='{{ asset('frontend/assets/img/profile.png') }}';">
        <h4>{{ Auth::guard('web')->user()->name }}</h4>
    </div>
    <div class="dash_user_menues">
        <ul>
            <li @if(in_array(Route::currentRouteName(), ['user.dashboard'])) class="active" @endif>
                <a href="{{ route('user.dashboard') }}">
                    <i class="fa fa-tachometer-alt"></i>Dashboard
                </a>
            </li>
            @if (Auth::guard('web')->user()->type == 'builder')
                <li @if(in_array(Route::currentRouteName(), ['user.project.list'])) class="active" @endif>
                    <a href="{{ route('user.project.list') }}"><i class="fa fa-building"></i>My Projects</a>
                </li>
            @endif
            <li @if(in_array(Route::currentRouteName(), ['user.property.index'])) class="active" @endif>
                <a href="{{ route('user.property.index') }}">
                    <i class="fa fa-tasks"></i>My Properties
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
            <li @if(in_array(Route::currentRouteName(), ['user.enquiry.index'])) class="active" @endif>
                <a href="{{ route('user.enquiry.index') }}">
                    <i class="fa fa-envelope"></i>My Leads
                    <span class="notti_coun style-3">
                        {{ App\Models\Enquiry::whereHas('property', function ($q) {
                            $q->where('added_by', Auth::guard('web')->user()->id);
                        })->get()->count() }}
                    </span>
                </a>
            </li>
            <li @if(in_array(Route::currentRouteName(), ['user.profile'])) class="active" @endif>
                <a href="{{ route('user.profile') }}">
                    <i class="fa fa-user-tie"></i>My Profile
                </a>
            </li>
            <li @if(in_array(Route::currentRouteName(), ['user.subscription.list'])) class="active" @endif>
                <a href="{{ route('user.subscription.list') }}">
                    <i class="fa fa-gift"></i> Subscription Status
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
