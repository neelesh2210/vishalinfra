@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card mt-3">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="page-title-box">
                                            <h4 class="page-title">User Profile (Personal Information)</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('user.save.profile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" id="name" name="name" value="{{ $profile->name }}"
                                                class="form-control" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="phone" class="form-label">Phone <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" id="phone" name="phone"
                                                value="{{ $profile->phone }}" class="form-control" required>
                                            @error('phone')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" id="email" name="email"
                                                value="{{ $profile->email }}" class="form-control" placeholder="Email">
                                            @if ($errors->has('email'))
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
                                            <input type="text" id="pincode" name="pincode" class="form-control"
                                                value="{{ optional($profile->userAddress)->pincode }}" placeholder="Pincode"
                                                onkeyup="get_address()">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="landmark" class="form-label">Landmark</label>
                                            <input type="text" id="landmark" name="landmark" class="form-control"
                                                value="{{ optional($profile->userAddress)->landmark }}"
                                                placeholder="Landmark">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" id="city" name="city" class="form-control"
                                                placeholder="City" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="state" class="form-label">State</label>
                                            <input type="text" id="state" name="state" class="form-control"
                                                placeholder="State" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <input type="text" id="country" name="country" class="form-control"
                                                placeholder="country" readonly>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="images" class="form-label">Avatar</label>
                                            <input type="file" name="avatar" id="img_input1" class="form-control"
                                                accept="image/*">
                                            <div class="p-2">
                                                <img id="img1"
                                                    src="{{ asset('frontend/images/user/avatars/' . optional($profile->userProfile)->avatar) }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('user_dashboard/images/users/avatar-1.jpg') }}'"
                                                    height="100px" width="100px">
                                            </div>
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
    </div>

    <script>
        img_input1.onchange = evt => {
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }
        $(get_address())

        function get_address() {
            var pincode = $('#pincode').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('get.address') }}?pincode=" + pincode,
                success: function(data) {
                    if (data != '') {
                        $('#country').val(data.country.name);
                        $('#state').val(data.state.name);
                        $('#city').val(data.city.name);
                    } else {
                        $('#country').val('');
                        $('#state').val('');
                        $('#city').val('');
                    }
                }
            });
        }
    </script>
@endsection
