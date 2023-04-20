@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">KYC</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-3 text-uppercase bg-light p-2">KYC Information</h5>
                            <hr>
                            <form action="{{route('user.save.kyc')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="img_input1" class="form-label">Adhar Front</label>
                                        <input type="file" name="adhar_front" id="img_input1" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img1" src="{{asset('frontend/images/user/documents/'.optional(Auth::guard('web')->user()->userProfile)->adhar_front)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/aadhar_front.png')}}'" height="100px" width="200px">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="img_input2" class="form-label">Adhar Back</label>
                                        <input type="file" name="adhar_back" id="img_input2" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img2" src="{{asset('frontend/images/user/documents/'.optional(Auth::guard('web')->user()->userProfile)->adhar_back)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/aadhar_back.png')}}'" height="100px" width="200px">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="img_input1" class="form-label">Pan Front</label>
                                        <input type="file" name="pan_front" id="img_input3" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img3" src="{{asset('frontend/images/user/documents/'.optional(Auth::guard('web')->user()->userProfile)->pan_front)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/pan_front.png')}}'" height="100px" width="200px">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="img_input4" class="form-label">Pan Back</label>
                                        <input type="file" name="pan_back" id="img_input4" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img4" src="{{asset('frontend/images/user/documents/'.optional(Auth::guard('web')->user()->userProfile)->pan_back)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/pan_back.png')}}'" height="100px" width="200px">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="img_input5" class="form-label">Passbook/Cancelled Cheque</label>
                                        <input type="file" name="passbook_cheque" id="img_input5" class="form-control" accept="image/*">
                                        <div class="p-2">
                                            <img id="img5" src="{{asset('frontend/images/user/documents/'.optional(Auth::guard('web')->user()->userProfile)->passbook_cheque)}}" onerror="this.onerror=null;this.src='{{asset('backend/img/passbook.jpg')}}'" height="100px" width="200px">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
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
        img_input2.onchange = evt =>{
            const [file] = img_input2.files
            if (file) {
                img2.src = URL.createObjectURL(file)
            }
        }
        img_input3.onchange = evt =>{
            const [file] = img_input3.files
            if (file) {
                img3.src = URL.createObjectURL(file)
            }
        }
        img_input4.onchange = evt =>{
            const [file] = img_input4.files
            if (file) {
                img4.src = URL.createObjectURL(file)
            }
        }
        img_input5.onchange = evt =>{
            const [file] = img_input5.files
            if (file) {
                img5.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
