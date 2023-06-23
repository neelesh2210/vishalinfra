<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('admin.dashboard')}}" class="brand-link">
        <img src="{{asset('backend/img/logo.png')}}" alt="{{env('APP_NAME')}} Logo" class="brand-image">
    </a>
    <div class="sidebar">
        <nav class="">
            <ul class="nav nav-pills nav-sidebar side-nav-second-level flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link @if(Route::currentRouteName() == 'admin.dashboard') active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item @if(in_array(Route::currentRouteName(), ['admin.property.index','admin.property.create','admin.property.edit','admin.amenities.index','admin.amenities.create','admin.amenities.edit'])) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.property.index','admin.property.create','admin.property.edit','admin.amenities.index','admin.amenities.create','admin.amenities.edit'])) active @endif">
                        <i class="nav-icon fa fa-building" aria-hidden="true"></i>
                        <p>Propertie Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.property.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.property.index','admin.property.create','admin.property.edit'])) active @endif">
                                <p>Properties</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.amenities.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.amenities.index','admin.amenities.create','admin.amenities.edit'])) active @endif">
                                <p>Amenity</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.customer.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.customer.index'])) active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.plan.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.plan.index','admin.plan.create','admin.plan.edit'])) active @endif">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Plan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.purchase.plan.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.purchase.plan.index'])) active @endif">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>Plan Purchase</p>
                    </a>
                </li>
                <li class="nav-item @if(in_array(Route::currentRouteName(), ['admin.countries.index','admin.countries.edit','admin.states.index','admin.states.edit','admin.cities.index','admin.cities.edit','admin.pincodes.index','admin.pincodes.edit'])) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.countries.index','admin.countries.edit','admin.states.index','admin.states.edit','admin.cities.index','admin.cities.edit','admin.pincodes.index','admin.pincodes.edit'])) active @endif">
                        <i class="nav-icon fa fa-map-marker-alt" aria-hidden="true"></i>
                        <p>Manage Address
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.countries.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.countries.index','admin.countries.edit'])) active @endif">
                                <p>Countries</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.states.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.states.index','admin.states.edit'])) active @endif">
                                <p>States</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.cities.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.cities.index','admin.cities.edit'])) active @endif">
                                <p>Cities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.pincodes.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.pincodes.index','admin.pincodes.edit'])) active @endif">
                                <p>Pincodes</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if(in_array(Route::currentRouteName(), ['admin.sliders.index','admin.sliders.edit'])) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.sliders.index','admin.sliders.edit'])) active @endif">
                        <i class="nav-icon fas fa-cogs" aria-hidden="true"></i>
                        <p>Website Setting
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.sliders.index')}}" class="nav-link @if(in_array(Route::currentRouteName(), ['admin.sliders.index','admin.sliders.edit'])) active @endif">
                                <p>Sliders</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
