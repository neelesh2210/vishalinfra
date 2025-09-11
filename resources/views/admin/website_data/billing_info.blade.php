@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title){{ $page_title }}@endisset
                                </h5>
                            </div>
                            <div class="card-body p-0">
                                <div class="modal-body">
                                    <form class="form-example" action="{{route('admin.billing.info.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="billing_name">Billing Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="billing_name" name="billing_name" @isset($billing_info['billing_name']) value="{{$billing_info['billing_name']}}" @endisset placeholder="Enter Billing Name...">
                                                    @error('billing_name')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="billing_phone">Billing Phone</label>
                                                    <input type="text" class="form-control" id="billing_phone" name="billing_phone" @isset($billing_info['billing_phone']) value="{{$billing_info['billing_phone']}}" @endisset placeholder="Enter Billing Phone...">
                                                    @error('billing_phone')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="billing_gst">Billing GST</label>
                                                    <input type="text" class="form-control" id="billing_gst" name="billing_gst" @isset($billing_info['billing_gst']) value="{{$billing_info['billing_gst']}}" @endisset placeholder="Enter Billing GST...">
                                                    @error('billing_gst')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="billing_address">Billing Address</label>
                                                    <input type="text" class="form-control" id="billing_address" name="billing_address" @isset($billing_info['billing_address']) value="{{$billing_info['billing_address']}}" @endisset placeholder="Enter Billing Address...">
                                                    @error('billing_address')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-success">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
