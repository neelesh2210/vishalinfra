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
                                    <form class="form-example" action="{{route('admin.project.update',$project->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{$project->name}}" placeholder="Enter Name..." required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="attachment">Gallery Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="images[]" class="custom-file-input" accept="image/*" multiple id="gallery-photo-add" onclick="gallery_image()">
                                                    <label class="custom-file-label" for="customFile">Choose file...</label>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 form-group">
                                                        <div class="gallery" id="gallery_image" style="padding-top:10px">
                                                            @if($project->images)
                                                                @foreach (json_decode($project->images) as $images)
                                                                    <img style="width: 100px;height: 100px;padding: 5px;" src="{{asset('backend/img/projects/'.$images)}}">
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="lat">Latitude </label>
                                                    <input type="text" class="form-control" id="lat" name="lat" value="{{$project->lat}}" placeholder="Enter Latitude...">
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="long">Longitude</label>
                                                    <input type="text" class="form-control" id="long" name="long" value="{{$project->long}}" placeholder="Enter Longitude...">
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="pincode">Pincode</label>
                                                    <input type="text" class="form-control" id="pincode" name="pincode" value="{{$project->pincode}}" placeholder="Enter Pincode..." onkeyup="get_address()">
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="city">City</label>
                                                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter City..." readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="state">State</label>
                                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State..." readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <input type="text" class="form-control" id="country" name="country" placeholder="Enter Country..." readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-8 form_div">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$project->address}}" placeholder="Enter Address...">
                                                </div>
                                            </div>
                                            <div class="col-md-12 form_div">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea name="description" id="summernote" class="form-control">{!!$project->description!!}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-success">Update</button>
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
        $(function() {
            var imagesPreview = function(input, placeToInsertImagePreview) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img style="width: 100px;height: 100px;padding: 5px;">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });

        function gallery_image()
        {
            $('#gallery_image').empty();
        }

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
