<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                </form>
            </div>
        </li>
        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="{{asset('frontend/images/user/avatars/'.optional(auth()->guard('web')->user()->userProfile)->avatar)}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{auth()->guard('web')->user()->user_name}}</span>
                    <span class="account-user-name text-center">{{str_replace('_','/',auth()->guard('web')->user()->type)}}</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <span>View Response</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <span>Manage Properties</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <span>Manage Alert</span>
                </a>

                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <span>Manage Subscription </span>
                </a>

                <!-- item-->
                <a href="{{route('user.profile')}}" class="dropdown-item notify-item">
                    <span>Manage Profile</span>
                </a>

                <div class="dropdown-divider m-0"></div>
                <!-- item-->
                <form id="delete-form" action="{{route('user.logout')}}" method="POST">
                    @csrf
                    <button href="{{route('user.logout')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>Sign Out</span>
                    </button>
                </form>
            </div>
        </li>
    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
</div>
