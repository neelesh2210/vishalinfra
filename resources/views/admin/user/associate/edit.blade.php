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
                                    <form class="form-example" id="form_id">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}" placeholder="Enter Name..." required>
                                                </div>
                                                <span id="error_name" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="phone">Phone <span class="text-danger">*</span> </label>
                                                    <input type="number" class="form-control" id="phone" name="phone" value="{{$customer->phone}}" placeholder="Enter Phone..." required>
                                                </div>
                                                <span id="error_phone" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="{{$customer->email}}" placeholder="Enter Email...">
                                                </div>
                                                <span id="error_email" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="pincode">Pincode</label>
                                                    <input type="number" class="form-control" id="pincode" name="pincode" value="{{($customer->userAddress)->pincode}}" placeholder="Enter Pincode..." onkeyup="get_address()">
                                                </div>
                                                <span id="error_pincode" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="landmark">Landmark</label>
                                                    <input type="text" class="form-control" id="landmark" name="landmark" value="{{($customer->userAddress)->landmark}}" placeholder="Enter Landmark...">
                                                </div>
                                                <span id="error_landmark" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City..." readonly>
                                                </div>
                                                <span id="error_city" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State..." readonly>
                                                </div>
                                                <span id="error_state" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country..." readonly>
                                                </div>
                                                <span id="error_country" class="lbl_msg"></span>
                                            </div>
                                            {{-- <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password...">
                                                </div>
                                                <span id="error_country" class="lbl_msg"></span>
                                            </div> --}}
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="referral_code">Referral Code</label>
                                                    <input type="text" class="form-control" id="referral_code" name="referral_code" value="{{$customer->referral_code}}" placeholder="Enter Referral Code..." readonly>
                                                </div>
                                                <span id="error_referral_code" class="lbl_msg"></span>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="level">Level</label>
                                                    <select name="level" id="level" class="form-control">
                                                        @for ($i=0;$i<=12;$i++)
                                                            <option value="{{$i}}" @if(optional($customer->userProfile)->level == $i) selected @endif>{{$i}}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                <span id="error_level" class="lbl_msg"></span>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-outline-success" onclick="submit_form()">Save</button>
                                    </div>
                                    <hr>
                                    <center><u><h3>Profile Detail</h3></u></center>
                                    <form action="{{route('admin.update.profile')}}?user_id={{$customer->id}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Avatar</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="avatar" id="img_input1" class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose file...</label>
                                                    </div>
                                                    <div class="p-2 mt-2">
                                                        <img id="img1" src="{{asset('frontend/images/user/avatars/'.optional($customer->userProfile)->avatar)}}" onerror="this.onerror=null;this.src='{{asset('user_dashboard/images/users/avatar-1.jpg')}}'" height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="img_input6" class="form-label">Adhar Front</label>
                                                <input type="file" name="adhar_front" id="img_input6" class="form-control" accept="image/*">
                                                <div class="p-2">
                                                    <img id="img6" src="{{asset('frontend/images/user/documents/'.optional($customer->userProfile)->adhar_front)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/aadhar_front.png')}}'" height="100px" width="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="img_input2" class="form-label">Adhar Back</label>
                                                <input type="file" name="adhar_back" id="img_input2" class="form-control" accept="image/*">
                                                <div class="p-2">
                                                    <img id="img2" src="{{asset('frontend/images/user/documents/'.optional($customer->userProfile)->adhar_back)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/aadhar_back.png')}}'" height="100px" width="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="img_input1" class="form-label">Pan Front</label>
                                                <input type="file" name="pan_front" id="img_input3" class="form-control" accept="image/*">
                                                <div class="p-2">
                                                    <img id="img3" src="{{asset('frontend/images/user/documents/'.optional($customer->userProfile)->pan_front)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/pan_front.png')}}'" height="100px" width="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="img_input4" class="form-label">Pan Back</label>
                                                <input type="file" name="pan_back" id="img_input4" class="form-control" accept="image/*">
                                                <div class="p-2">
                                                    <img id="img4" src="{{asset('frontend/images/user/documents/'.optional($customer->userProfile)->pan_back)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/pan_back.png')}}'" height="100px" width="200px">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="img_input5" class="form-label">Passbook/Cancelled Cheque</label>
                                                <input type="file" name="passbook_cheque" id="img_input5" class="form-control" accept="image/*">
                                                <div class="p-2">
                                                    <img id="img5" src="{{asset('frontend/images/user/documents/'.optional($customer->userProfile)->passbook_cheque)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/passbook.jpg')}}'" height="100px" width="200px">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-outline-success">Save</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <center><u><h3>Bank Detail</h3></u></center>
                                    <form action="{{route('admin.update.bank.detail')}}?user_id={{$customer->id}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="holder_name" class="form-label">Holder Name</label>
                                                <input type="text" id="holder_name" name="holder_name" value="{{optional($customer->bankDetail)->holder_name}}" class="form-control" placeholder="Holder Name...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="account_number" class="form-label">Account Number</label>
                                                <input type="text" id="account_number" name="account_number" value="{{optional($customer->bankDetail)->account_number}}" class="form-control" placeholder="Account Number...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="ifsc_code" class="form-label">IFSC Code</label>
                                                <input type="text" id="ifsc_code" name="ifsc_code" value="{{optional($customer->bankDetail)->ifsc_code}}" class="form-control" placeholder="IFSC Code...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="bank_name" class="form-label">Bank Name</label>
                                                <input type="text" id="bank_name" name="bank_name" value="{{optional($customer->bankDetail)->bank_name}}" class="form-control" placeholder="Bank Name...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="branch_name" class="form-label">Branch Name</label>
                                                <input type="text" id="branch_name" name="branch_name" value="{{optional($customer->bankDetail)->branch_name}}" class="form-control" placeholder="Branch Name...">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="upi_id" class="form-label">UPI Id</label>
                                                <input type="text" id="upi_id" name="upi_id" value="{{optional($customer->bankDetail)->upi_id}}" class="form-control" placeholder="UPI Id...">
                                            </div>
                                        </div>
                                        <div class="text-center">
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

    <script>

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

        function submit_form(){
            $.ajax({
                type: 'POST',
                url: "{{route('admin.update.associate')}}",
                data: $('#form_id').serialize()+"&user_id="+"{{$customer->id}}",
                success: function(data) {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                    Toast.fire({
                        icon: 'success',
                        title: 'Customer Updated Successfully!'
                    })
                    window.location.replace("{{route('admin.associates')}}");
                },error: function (request, status, error) {
                    $(window).scrollTop(0);
                    if(request.responseJSON.errors.name){
                        $('#error_name').show();
                        $('#error_name').addClass('text-danger');
                        $('#error_name').removeClass('text-success');
                        $('#error_name').text('✖ '+request.responseJSON.errors.name);
                    }else{
                        $('#error_name').show();
                        $('#error_name').addClass('text-success');
                        $('#error_name').removeClass('text-danger');
                        $('#error_name').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.phone){
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-danger');
                        $('#error_phone').removeClass('text-success');
                        $('#error_phone').text('✖ '+request.responseJSON.errors.phone);
                    }else{
                        $('#error_phone').show();
                        $('#error_phone').addClass('text-success');
                        $('#error_phone').removeClass('text-danger');
                        $('#error_phone').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.email){
                        $('#error_email').show();
                        $('#error_email').addClass('text-danger');
                        $('#error_email').removeClass('text-success');
                        $('#error_email').text('✖ '+request.responseJSON.errors.email);
                    }else{
                        if($('#email').val() != ''){
                            $('#error_email').show();
                            $('#error_email').addClass('text-success');
                            $('#error_email').removeClass('text-danger');
                            $('#error_email').text('✔ Correct');
                        }
                    }
                    if(request.responseJSON.errors.pincode){
                        $('#error_pincode').show();
                        $('#error_pincode').addClass('text-danger');
                        $('#error_pincode').removeClass('text-success');
                        $('#error_pincode').text('✖ '+request.responseJSON.errors.pincode);
                    }else{
                        if($('#pincode').val() != ''){
                            $('#error_pincode').show();
                            $('#error_pincode').addClass('text-success');
                            $('#error_pincode').removeClass('text-danger');
                            $('#error_pincode').text('✔ Correct');
                        }
                    }
                    if(request.responseJSON.errors.password){
                        $('#error_password').show();
                        $('#error_password').addClass('text-danger');
                        $('#error_password').removeClass('text-success');
                        $('#error_password').text('✖ '+request.responseJSON.errors.password);
                    }else{
                        $('#error_password').show();
                        $('#error_password').addClass('text-success');
                        $('#error_password').removeClass('text-danger');
                        $('#error_password').text('✔ Correct');
                    }
                    if(request.responseJSON.errors.referral_code){
                        $('#error_referral_code').show();
                        $('#error_referral_code').addClass('text-danger');
                        $('#error_referral_code').removeClass('text-success');
                        $('#error_referral_code').text('✖ '+request.responseJSON.errors.referral_code);
                    }else{
                        if($('#referral_code').val() != ''){
                            $('#error_referral_code').show();
                            $('#error_referral_code').addClass('text-success');
                            $('#error_referral_code').removeClass('text-danger');
                            $('#error_referral_code').text('✔ Correct');
                        }
                    }
                }
            });
        }
    </script>

@endsection
