@extends('admin.layouts.app')
@section('content')
<style>
    .lbl_msg {
        padding-top: 2px;
        font-size: 13px !important;
    }
</style>
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
                                    <form class="form-example" action="{{route('admin.customer.update',encrypt($user->id))}}" enctype="multipart/form-data" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}" placeholder="Enter Name..." required>
                                                </div>
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="phone">Phone <span class="text-danger">*</span> </label>
                                                    <input type="number" class="form-control" id="phone" name="phone" value="{{old('phone',$user->phone)}}" placeholder="Enter Phone..." required>
                                                </div>
                                                @error('phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="email">Email <span class="text-danger">*</span> </label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{old('email',$user->email)}}" placeholder="Enter Email..." required>
                                                </div>
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="type">Type <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" value="{{ucwords(str_replace('_',' ',$user->type))}}" readonly>
                                                    {{-- <select name="type" class="form-control">
                                                        <option value="buyer_owner" @if($user->type == 'buyer_owner') selected @endif>Buyer/Owner</option>
                                                        <option value="agent" @if($user->type == 'agent') selected @endif>Agent</option>
                                                        <option value="builder" @if($user->type == 'builder') selected @endif>Builder</option>
                                                    </select> --}}
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
