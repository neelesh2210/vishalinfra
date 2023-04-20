@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">User Profile</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3 text-uppercase bg-light p-2">Sponsor Information</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="sponsor_name" class="form-label">Name</label>
                                    <input type="text" id="sponsor_name" class="form-control" value="{{optional($profile->sponserDetail)->name}}" placeholder="Sponsor Name..." readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sponsor_email" class="form-label">Email</label>
                                    <input type="email" id="sponsor_email" class="form-control" value="{{optional($profile->sponserDetail)->email}}" placeholder="Sponsor Email..." readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="sponsor_phone" class="form-label">Phone</label>
                                    <input type="number" id="sponsor_phone" class="form-control" value="{{optional($profile->sponserDetail)->phone}}" placeholder="Sponsor Phone..." readonly>
                                </div>
                            </div>
                            <h5 class="mb-3 text-uppercase bg-light p-2">Personal Information</h5>
                            <hr>
                            <form action="{{route('user.save.profile')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                        <input type="text" id="name" name="name" value="{{$profile->name}}" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                        <input type="number" id="phone" value="{{$profile->phone}}" class="form-control" readonly required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" value="{{$profile->email}}" class="form-control" placeholder="Email">
                                        @if($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    {{-- <div class="col-md-6 mb-3">
                                        <label for="gender" class="form-label">Gender <span  class="text-danger">*</span></label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="male"> Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" value="female"> Female
                                        </label>
                                    </div> --}}
                                    <div class="col-md-6 mb-3">
                                        <label for="pincode" class="form-label">Pincode</label>
                                        <input type="text" id="pincode" name="pincode" class="form-control" value="{{optional($profile->userAddress)->pincode}}" placeholder="Pincode" onkeyup="get_address()">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="landmark" class="form-label">Landmark</label>
                                        <input type="text" id="landmark" name="landmark" class="form-control" value="{{optional($profile->userAddress)->landmark}}" placeholder="Landmark">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" id="city" name="city" class="form-control" placeholder="City" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="state" class="form-label">State</label>
                                        <input type="text" id="state" name="state" class="form-control" placeholder="State" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <input type="text" id="country" name="country" class="form-control" placeholder="country" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="images" class="form-label">Avatar</label>
                                        <input type="file" name="avatar" id="img_input1" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img1" src="{{asset('frontend/images/user/avatars/'.optional($profile->userProfile)->avatar)}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" height="100px" width="100px">
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                            <h5 class="mb-3 text-uppercase bg-light p-2">Bank Account Information</h5>
                            <hr>
                            <form action="{{route('user.save.bank.detail')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="holder_name" class="form-label">Holder Name</label>
                                        <input type="text" id="holder_name" name="holder_name" value="{{optional($profile->bankDetail)->holder_name}}" class="form-control" placeholder="Holder Name...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="account_number" class="form-label">Account Number</label>
                                        <input type="text" id="account_number" name="account_number" value="{{optional($profile->bankDetail)->account_number}}" class="form-control" placeholder="Account Number...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="ifsc_code" class="form-label">IFSC Code</label>
                                        <input type="text" id="ifsc_code" name="ifsc_code" value="{{optional($profile->bankDetail)->ifsc_code}}" class="form-control" placeholder="IFSC Code...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="bank_name" class="form-label">Bank Name</label>
                                        <input type="text" id="bank_name" name="bank_name" value="{{optional($profile->bankDetail)->bank_name}}" class="form-control" placeholder="Bank Name...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="branch_name" class="form-label">Branch Name</label>
                                        <input type="text" id="branch_name" name="branch_name" value="{{optional($profile->bankDetail)->branch_name}}" class="form-control" placeholder="Branch Name...">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="upi_id" class="form-label">UPI Id</label>
                                        <input type="text" id="upi_id" name="upi_id" value="{{optional($profile->bankDetail)->upi_id}}" class="form-control" placeholder="UPI Id...">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        img_input1.onchange = evt =>{
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }
        $(get_address())
        function get_address(){
            var pincode = $('#pincode').val();
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
