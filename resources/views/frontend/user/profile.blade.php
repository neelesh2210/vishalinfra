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
                        <div class="dashboard-wraper">
                            <div class="frm_submit_block">
                                <h4>User Profile (Personal Information)</h4>
                                <hr>
                                <div class="frm_submit_wrap">
                                    <form action="{{route('user.save.profile')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{$profile->name}}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone *</label>
                                                <input type="text" class="form-control" name="phone" value="{{$profile->phone}}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Email *</label>
                                                <input type="email" class="form-control" name="email" value="{{$profile->email}}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Pincode *</label>
                                                <input type="text" class="form-control" name="pincode" id="pincode" value="{{optional($profile->userAddress)->pincode}}" onkeyup="getAddress()" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Landmark *</label>
                                                <input type="text" class="form-control" name="landmark" id="landmark" value="{{optional($profile->userAddress)->landmark}}" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>City *</label>
                                                <input type="text" class="form-control" name="city" id="city" value="{{optional($profile->userAddress)->city}}" required readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>State *</label>
                                                <input type="text" class="form-control" name="state" id="state" value="{{optional($profile->userAddress)->state}}" required readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Country *</label>
                                                <input type="text" class="form-control" name="country" id="country" value="{{optional($profile->userAddress)->country}}" required readonly>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Profile</label>
                                                <input type="file" name="avatar" class="form-control">
                                            </div>
                                            <div class="form-group col-md-6 mt-20">
                                                <button class="btn btn-theme" type="submit">Update & Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>

        function getAddress(){
            var pincode = $('#pincode').val()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{route('get.address')}}?pincode="+pincode,
                success: function(data) {
                    if(data != ''){
                        $('#country').val(data.country.name);
                        $('#state').val(data.state.name);
                        $('#city').val(data.city.name);
                    }else{
                        $('#country').val('');
                        $('#state').val('');
                        $('#city').val('');
                    }
                }
            });
        }

    </script>

@endsection
