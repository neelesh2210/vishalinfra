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
                                            <form>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="search_key" value="{{$search_key}}" placeholder="Search Here..">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="input-group-text theme-bg b-0 text-light"><i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="_prt_filt_dash_last m2_hide">
                                        <div class="_prt_filt_radius"></div>
                                        <div class="_prt_filt_add_new">
                                            <a href="{{route('user.customer.create')}}" class="prt_submit_link">
                                                <i class="fas fa-plus-circle"></i>
                                                <span class="d-none d-lg-block d-md-block">Add New Customer</span>
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
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">User Code</th>
                                                    <th class="text-center">Name</th>
                                                    <th class="text-center">Phone</th>
                                                    <th class="text-center">Email</th>
                                                    <th class="text-center">Date</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($customers as $key=>$customer)
                                                    <tr>
                                                        <td class="text-center">{{($key+1) + ($customers->currentPage() - 1)*$customers->perPage()}}</td>
                                                        <td class="text-center">{{$customer->user_name}}</td>
                                                        <td class="text-center">{{$customer->name}}</td>
                                                        <td class="text-center">{{$customer->phone}}</td>
                                                        <td class="text-center">{{$customer->email}}</td>
                                                        <td class="text-center">{{$customer->created_at}}</td>
                                                        <td class="text-center">
                                                            <div class="_leads_action">
                                                                <a href="{{route('user.customer.edit', $customer->user_name)}}"><i class="fas fa-edit"></i></a>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            <tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                            {!! $customers->links() !!}
                                        </div>
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
