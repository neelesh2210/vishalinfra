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
                    <i class="fa fa-tachometer-alt"></i>Dashboard
                    {{-- <span class="notti_coun style-1">4</span> --}}
                </a>
            </li>

            @if(Auth::guard('web')->user()->type == 'builder')
                <li><a href="{{route('user.project.list')}}"><i class="fa fa-building"></i>My Projects</a></li>
            @endif
            <li>
                <a href="{{ route('user.property.index') }}">
                    <i class="fa fa-tasks"></i>My Properties
                    <span class="notti_coun style-1">
                        {{App\Models\Admin\Property::where('added_by',Auth::guard('web')->user()->id)->get()->count()}}
                    </span>
                </a>
            </li>
            <li>
                <a href="{{route('user.property.listing')}}">
                    <i class="fa fa-plus-circle"></i>Add New Property
                </a>
            </li>
            <li>
                <a href="{{route('user.enquiry.index')}}">
                    <i class="fa fa-envelope"></i>My Leads
                    <span class="notti_coun style-3">
                        {{App\Models\Enquiry::whereHas('property',function($q){
                            $q->where('added_by',Auth::guard('web')->user()->id);
                        })->get()->count()}}
                    </span>
                </a>
            </li>
            <li><a href="{{ route('user.profile') }}"><i class="fa fa-user-tie"></i>My Profile</a></li>
            <li>
                <a href="{{route('user.subscription.list')}}">
                    <i class="fa fa-gift"></i> Subscription Status
                    <span class="expiration">
                        @php
                            $date = App\Models\Admin\PlanPurchase::where('user_id',Auth::guard('web')->user()->id)->whereRaw('DATE_ADD(`created_at`, INTERVAL `duration_in_day` DAY) >= NOW()')->orderBy('duration_in_day','desc')->first();
                            if($date){
                                $start = Carbon\Carbon::parse($date->created_at->addDays($date->duration_in_day)->format('Y-m-d'));
                                $end = Carbon\Carbon::parse(Carbon\Carbon::now()->format('Y-m-d'));
                                $diff = $start->diffInDays($end);
                            }
                        @endphp
                        @if($date)
                            {{$diff}}
                        @else
                            0
                        @endif
                        days left
                    </span>
                </a>
            </li>


        </ul>
    </div>
    <div class="dash_user_footer">
        <ul>
            <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
        </ul>
    </div>
</div>
