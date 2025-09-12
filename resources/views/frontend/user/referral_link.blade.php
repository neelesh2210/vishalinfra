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
                        <label for="referral" class="form-label">Associate Referrel Link</label>
                        <div class="row d-lg-flex d-block align-items-center">
                            <div class="col-md-6">
                                <input type="text" id="referral_link"
                                    value="{{ route('signup') }}?sponsor_code={{ Auth::guard('web')->user()->user_name }}"
                                    class="form-control">
                            </div>
                            <div class="col-md-6 mt-lg-0 mt-2">
                                <a class="btn btn-success text-white mt-3_5" onclick="copyText()">Copy Referral Code</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    <script>
        function copyText() {
            navigator.clipboard.writeText($('#referral_link').val());
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: "success",
                title: 'Referral Code Copied SuccessfullY!',
            });
        }
    </script>
@endsection
