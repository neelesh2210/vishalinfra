@extends('frontend.layouts.app')
@section('content')
    <section class="gray pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="dashboard-body">
                        <div class="dashboard-wraper">
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <form action="{{route('user.store.project')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="submit-page">
                                            <div class="frm_submit_block">
                                                <h3>Project Details</h3>
                                                <div class="frm_submit_wrap">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Project Name</label>
                                                            <input type="text" class="form-control" name="name" placeholder="Enter Project Name..." required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Status</label>
                                                            <select name="is_active" class="form-control">
                                                                <option value="1">Active</option>
                                                                <option value="0">Not Active</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Project Type</label>
                                                            <select name="project_type" class="form-control">
                                                                <option value="">Select Project Type...</option>
                                                                <option value="house">Houses</option>
                                                                <option value="apartment">Apartment</option>
                                                                <option value="villas">Villas</option>
                                                                <option value="commercial">Commercial</option>
                                                                <option value="offices">Offices</option>
                                                                <option value="garage">Garage</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Launch Date</label>
                                                            <input type="date" class="form-control" name="launch_date">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Completion Date</label>
                                                            <input type="date" class="form-control" name="completion_date">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Project Area (in Sqft.)</label>
                                                            <input type="text" class="form-control" name="project_area" placeholder="Project Area (in Sqft.)">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Total Units</label>
                                                            <select class="form-control" name="total_unit">
                                                                <option value="">Select Total Unit...</option>
                                                                @for ($i=1;$i<=100;$i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Occupancy Certificate</label>
                                                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                                                <div class="form-control file-amount">Choose Occupancy Certificate</div>
                                                                <input type="hidden" name="occupancy_certificated" class="selected-files">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                                </div>
                                                            </div>
                                                            <div class="file-preview box sm"></div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Commencement Certificate</label>
                                                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                                                <div class="form-control file-amount">Choose Commencement Certificate</div>
                                                                <input type="hidden" name="commencement_certificated" class="selected-files">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                                </div>
                                                            </div>
                                                            <div class="file-preview box sm"></div>
                                                        </div>

                                                        <div class="form-group col-md-6">
                                                            <label>Floor plan - PDF</label>
                                                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                                                <div class="form-control file-amount">Choose Floor plan - PDF</div>
                                                                <input type="hidden" name="floor_plan" class="selected-files">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                                </div>
                                                            </div>
                                                            <div class="file-preview box sm"></div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Add video URL (Youtube Embedd URL)</label>
                                                            <input type="text" class="form-control" name="videos[]" placeholder="Option to add videos">
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <a class="btn btn-success" style="margin-top: 31px;" onclick="addVideoDiv()"><i class="fas fa-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="form-row vidiv">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="frm_submit_block">
                                                <h3>Gallery</h3>
                                                <hr />
                                                <div class="frm_submit_wrap">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Gallery Images</label>

                                                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="true">
                                                                <div class="form-control file-amount">Choose Gallery</div>
                                                                <input type="hidden" name="gallery_image" class="selected-files">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                                </div>
                                                            </div>
                                                            <div class="file-preview box sm"></div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Cover Picture</label>
                                                            <div class="input-group" data-toggle="aizuploader" data-type="image" data-multiple="false">
                                                                <div class="form-control file-amount">Choose Cover Picture</div>
                                                                <input type="hidden" name="cover_image" class="selected-files">
                                                                <div class="input-group-prepend">
                                                                    <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                                </div>
                                                            </div>
                                                            <div class="file-preview box sm"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="frm_submit_block">
                                                <h4>Location</h4>
                                                <hr />
                                                <div class="frm_submit_wrap">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" name="address" placeholder="Address" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Pincode</label>
                                                            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" onchange="getCityState()" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city_id" id="city" placeholder="City" required readonly>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>State</label>
                                                            <input type="text" class="form-control" name="state_id" id="state" placeholder="State" required readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="frm_submit_block">
                                                <div class="frm_submit_wrap">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Project Description</label>
                                                            <textarea class="form-control h-120" name="about" placeholder="Project description.."></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Why Customer should buy this project ?</label>
                                                            <textarea name="why_buy" class="form-control"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Amenties</label>
                                                            <div class="o-features">
                                                                <ul class="no-ul-list third-row">
                                                                    <li>
                                                                        <input id="a-1" class="checkbox-custom" name="amenity[]" value="Air Condition" type="checkbox">
                                                                        <label for="a-1" class="checkbox-custom-label">Air Condition</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-2" class="checkbox-custom" name="amenity[]" value="Bedding" type="checkbox">
                                                                        <label for="a-2" class="checkbox-custom-label">Bedding</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-3" class="checkbox-custom" name="amenity[]" value="Heating" type="checkbox">
                                                                        <label for="a-3" class="checkbox-custom-label">Heating</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-4" class="checkbox-custom" name="amenity[]" value="Internet" type="checkbox">
                                                                        <label for="a-4" class="checkbox-custom-label">Internet</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-5" class="checkbox-custom" name="amenity[]" value="Microwave" type="checkbox">
                                                                        <label for="a-5" class="checkbox-custom-label">Microwave</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-6" class="checkbox-custom" name="amenity[]" value="Smoking Allow" type="checkbox">
                                                                        <label for="a-6" class="checkbox-custom-label">Smoking Allow</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-7" class="checkbox-custom" name="amenity[]" value="Terrace" type="checkbox">
                                                                        <label for="a-7" class="checkbox-custom-label">Terrace</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-8" class="checkbox-custom" name="amenity[]" value="Balcony" type="checkbox">
                                                                        <label for="a-8" class="checkbox-custom-label">Balcony</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-9" class="checkbox-custom" name="amenity[]" value="Icon" type="checkbox">
                                                                        <label for="a-9" class="checkbox-custom-label">Icon</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-10" class="checkbox-custom" name="amenity[]" value="Wi-Fi" type="checkbox">
                                                                        <label for="a-10" class="checkbox-custom-label">Wi-Fi</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-11" class="checkbox-custom" name="amenity[]" value="Beach" type="checkbox">
                                                                        <label for="a-11" class="checkbox-custom-label">Beach</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-12" class="checkbox-custom" name="amenity[]" value="Parking" type="checkbox">
                                                                        <label for="a-12" class="checkbox-custom-label">Parking</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12">
                                                <label>GDPR Agreement *</label>
                                                <ul class="no-ul-list">
                                                    <li>
                                                        <input id="aj-1" class="checkbox-custom" name="aj-1" type="checkbox">
                                                        <label for="aj-1" class="checkbox-custom-label">After clicking on Save Project you agree to our <a href="">Terms & Conditions</a></label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="form-group col-lg-12 col-md-12">
                                                <button class="btn btn-theme" type="submit">Save Project</button>
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
        var x = 1;
        function addVideoDiv(){
            x++;
            $('.vidiv').append('<div class="form-group col-md-4 remdiv'+x+'">'+
                                '<label>Add videos</label>'+
                                '<input type="text" class="form-control" name="videos[]" placeholder="Option to add videos">'+
                            '</div>'+
                            '<div class="form-group col-md-2 remdiv'+x+'">'+
                                '<a class="btn btn-danger" style="margin-top: 31px;" onclick="removeVideoDiv('+x+')"><i class="fas fa-minus"></i></a>'+
                            '</div>');
        }

        function removeVideoDiv(a){
            $('.remdiv'+a).remove();
            x--;
        }

        function getCityState(){
            var pincode = $('#pincode').val();

            $.ajax({
                type: 'POST',
                url: "{{route('get.address')}}",
                data: {
                    _token: "{{csrf_token()}}",
                    pincode:pincode
                },
                success: function(data) {
                    if(data){
                        $('#city').val(data.city.name)
                        $('#state').val(data.state.name)
                    }
                }
            });
        }

    </script>

@endsection
