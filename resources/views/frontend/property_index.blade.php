@extends('frontend.layouts.app')
@section('content')
    <section class="gray pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="_prt_filt_dash">
                                    <div class="_prt_filt_dash_flex">
                                        <div class="foot-news-last">
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Search Here..">
                                                <div class="input-group-append">
                                                    <span type="button" class="input-group-text theme-bg b-0 text-light"><i class="fas fa-search"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="_prt_filt_dash_last m2_hide">
                                        <div class="_prt_filt_radius"></div>
                                        <div class="_prt_filt_add_new">
                                            <a href="{{ route('user.property.listing') }}" class="prt_submit_link">
                                                <i class="fas fa-plus-circle"></i>
                                                <span class="d-none d-lg-block d-md-block">List New Property</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="dashboard_property">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th scope="col">Property</th>
                                                    <th scope="col" class="m2_hide">Leads</th>
                                                    <th scope="col" class="m2_hide">Stats</th>
                                                    <th scope="col" class="m2_hide">Posted On</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($properties as $key=>$property)
                                                    <tr>
                                                        <td>
                                                            <div class="dash_prt_wrap">
                                                                <div class="dash_prt_thumb">
                                                                    <img src="{{ asset('frontend/assets/img/p-1.png') }}" class="img-fluid" alt="" />
                                                                </div>
                                                                <div class="dash_prt_caption">
                                                                    <h5>{{ $property->name }}</h5>
                                                                    <div class="prt_dashb_lot">5682 Brown River Suit 18</div>
                                                                    <div class="prt_dash_rate"><span>₹ {{ $property->expected_price }}</span></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="m2_hide">
                                                            <div class="prt_leads"><span>27 till now</span></div>
                                                            <div class="prt_leads_list">
                                                                <ul>
                                                                    <li>
                                                                        <a href="#">
                                                                            <img src="{{ asset('frontend/assets/img/team-1.jpg') }}" class="img-fluid mg-circle" alt="" />
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <img src="{{ asset('frontend/assets/img/team-1.jpg') }}" class="img-fluid img-circle" alt="" />
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#" class="_leads_name style-1">K</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#">
                                                                            <img src="{{ asset('frontend/assets/img/team-1.jpg') }}" class="img-fluid img-circle" alt="" />
                                                                        </a>
                                                                    </li>
                                                                    <li><a href="#" class="leades_more">10+</a></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                        <td class="m2_hide">
                                                            <div class="_leads_view">
                                                                <h5 class="up">816</h5>
                                                            </div>
                                                            <div class="_leads_view_title"><span>Total Views</span></div>
                                                        </td>
                                                        <td class="m2_hide">
                                                            <div class="_leads_posted">
                                                                <h5>{{$property->created_at}}</h5>
                                                            </div>
                                                            <div class="_leads_view_title"><span>{{$property->created_at->diffForHumans()}}</span></div>
                                                        </td>
                                                        <td>
                                                            <div class="_leads_status">
                                                                @if($property->is_status == '1')
                                                                    <span class="active">Active</span>
                                                                @else
                                                                    <span class="active">Inactive</span>
                                                                @endif
                                                            </div>
                                                            <div class="_leads_view_title"><span>Till {{$property->planPurchase?$property->planPurchase->created_at->addDays($property->planPurchase->duration_in_day):'FREE'}}</span></div>
                                                        </td>
                                                        <td>
                                                            <div class="_leads_action">
                                                                <a href="#"><i class="fas fa-edit"></i></a>
                                                                <a href="#"><i class="fas fa-trash"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            <tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
