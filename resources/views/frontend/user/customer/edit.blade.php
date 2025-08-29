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
                                <div class="dashboard-body">
                                    <div class="dashboard-wraper">
                                        <form class="form form-horizontal mar-top" action="{{ route('user.customer.update', $user->user_name) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4 class="card-title">Update Customer</h4>
                                                </div>
                                                <div class="p-2">
                                                    <div class="form-group row">
                                                        <div class="col-md-6 form_div">
                                                            <div class="form-group">
                                                                <label>Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $user->name)}}" placeholder="Name...">
                                                                @error('name')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form_div">
                                                            <div class="form-group">
                                                                <label>Email <span class="text-danger">*</span></label>
                                                                <input type="email" name="email" class="form-control" value="{{old('email', $user->email)}}" placeholder="Enter Email... ">
                                                                @error('email')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 form_div">
                                                            <div class="form-group">
                                                                <label>Phone <span class="text-danger">*</span></label>
                                                                <input type="number" name="phone" class="form-control" value="{{old('phone', $user->phone)}}" placeholder="Enter Phone... ">
                                                                @error('phone')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-outline-warning">Update</button>
                                            </div>
                                        </form>
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
