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
                                            <form action="">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="search_key"
                                                        value="{{ $search_key }}" placeholder="Search Here..">
                                                    <div class="input-group-append">
                                                        <button type="submit"
                                                            class="input-group-text theme-bg b-0 text-light"><i
                                                                class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
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
                                                                    <img src="{{ uploaded_asset($property->thumbnail_img) }}"
                                                                        class="img-fluid"
                                                                        onerror="this.onerror=null;this.src='{{ asset('backend/img/property_default.jpg') }}';">
                                                                </div>
                                                                <div class="dash_prt_caption">
                                                                    <h5>{{ $property->name }}</h5>
                                                                    <div class="prt_dashb_lot">5682 Brown River Suit 18
                                                                    </div>
                                                                    <div class="prt_dash_rate"><span>₹
                                                                            {{ $property->final_price }}</span></div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="m2_hide">
                                                            <div class="_leads_view">
                                                                <h5 class="up">Views : 0</h5>
                                                            </div>
                                                            <div class="_leads_view_title"><span></span></div>
                                                        </td>
                                                        <td class="m2_hide">
                                                            <div class="_leads_posted">
                                                                <h5>{{ $property->created_at }}</h5>
                                                            </div>
                                                            <div class="_leads_view_title">
                                                                <span>{{ $property->created_at->diffForHumans() }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="_leads_status">
                                                                @if ($property->is_status == '1')
                                                                    <a
                                                                        href="{{ route('user.property.listing.status', [$property->id, '0']) }}"><span
                                                                            class="active">Active</span></a>
                                                                @else
                                                                    <a
                                                                        href="{{ route('user.property.listing.status', [$property->id, '1']) }}"><span
                                                                            class="expire">Inactive</span></a>
                                                                @endif
                                                            </div>
                                                            <div class="_leads_view_title"><span class="till">Till
                                                                    {{ $property->planPurchase ? $property->planPurchase->expiry_at : 'FREE' }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @if ($property->bookProperty)
                                                                <a href="{{ route('user.property.installment', encrypt($property->bookProperty->id)) }}"
                                                                    class="btn btn-warning">Booked</a>
                                                                <a href="{{ route('user.property.installment', encrypt($property->bookProperty->id)) }}"
                                                                    class="btn btn-info">View Detail</a>
                                                            @else
                                                                <div class="_leads_action">
                                                                    <a
                                                                        href="{{ route('user.property.listing.edit', encrypt($property->id)) }}"><i
                                                                            class="fas fa-edit"></i></a>
                                                                    {{-- <a href="#"><i class="fas fa-trash"></i></a> --}}
                                                                </div>
                                                            @endif
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
