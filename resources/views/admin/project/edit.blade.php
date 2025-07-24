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
                                    <form action="{{route('admin.project.update',encrypt($project->id))}}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="submit-page">
                                            <div class="frm_submit_block">
                                                <div class="frm_submit_wrap">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Project Name</label>
                                                            <input type="text" class="form-control" name="name" value="{{$project->name}}" placeholder="Enter Project Name..." required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Commission (in percentage)</label>
                                                            <input type="number" step="0.01" class="form-control" name="commission" min="0" max="100" value="{{$project->commission}}" placeholder="Enter Commission (in percentage)..." required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Status</label>
                                                            <select name="is_active" class="form-control">
                                                                <option value="1" @if($project->is_active == '1') selected @endif>Active</option>
                                                                <option value="0" @if($project->is_active == '0') selected @endif>Not Active</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Project Type</label>
                                                            <select name="project_type" class="form-control">
                                                                <option value="">Select Project Type...</option>
                                                                <option value="house" @if($project->project_type == 'house') selected @endif>Houses</option>
                                                                <option value="apartment" @if($project->project_type == 'apartment') selected @endif>Apartment</option>
                                                                <option value="villas" @if($project->project_type == 'villas') selected @endif>Villas</option>
                                                                <option value="commercial" @if($project->project_type == 'commercial') selected @endif>Commercial</option>
                                                                <option value="offices" @if($project->project_type == 'offices') selected @endif>Offices</option>
                                                                <option value="garage" @if($project->project_type == 'garage') selected @endif>Garage</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Launch Date</label>
                                                            <input type="date" class="form-control" value="{{$project->launch_date}}" name="launch_date">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Completed in</label>
                                                            <input type="date" class="form-control" value="{{$project->completion_date}}" name="completion_date">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Project Area</label>
                                                            <input type="text" class="form-control" name="project_area" value="{{$project->project_area}}" placeholder="Project Area">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Total Units</label>
                                                            <select class="form-control" name="total_unit">
                                                                <option value="">Select Total Unit...</option>
                                                                @for ($i=1;$i<=100;$i++)
                                                                    <option value="{{$i}}" @if($project->total_unit == $i) selected @endif>{{$i}}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Why Buy ?</label>
                                                            <textarea name="why_buy" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-row vidiv">
                                                        @foreach (json_decode($project->videos) as $vkey=>$video)
                                                            <div class="form-group col-md-4 @if($vkey != 0) remdiv{{$vkey}} @endif">
                                                                <label>Add videos</label>
                                                                <input type="text" class="form-control" name="videos[]" value="{{$video}}" placeholder="Option to add videos">
                                                            </div>
                                                            @if($vkey == 0)
                                                                <div class="form-group col-md-2">
                                                                    <a class="btn btn-success" style="margin-top: 31px;" onclick="addVideoDiv()"><i class="fas fa-plus"></i></a>
                                                                </div>
                                                            @else
                                                                <div class="form-group col-md-2 remdiv{{$vkey}}">
                                                                    <a class="btn btn-danger" style="margin-top: 31px;" onclick="removeVideoDiv({{$vkey}})"><i class="fas fa-minus"></i></a>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="frm_submit_block">
                                                <h3>Location</h3>
                                                <div class="frm_submit_wrap">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" name="address" value="{{$project->address}}" placeholder="Address">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Pin Code</label>
                                                            <input type="text" class="form-control" name="pincode" value="{{$project->pincode}}" id="pincode" placeholder="Pin Code" onchange="getCityState()">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city_id" id="city" placeholder="City" readonly>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>State</label>
                                                            <input type="text" class="form-control" name="state_id" id="state" placeholder="State" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="frm_submit_block">
                                                <h3>Detailed Information</h3>
                                                <div class="frm_submit_wrap">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>About</label>
                                                            <textarea class="form-control h-120" name="about" placeholder="About"></textarea>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label>Amenties</label>
                                                            <div class="o-features">
                                                                <ul class="no-ul-list third-row">
                                                                    <li>
                                                                        <input id="a-1" class="checkbox-custom" name="amenity[]" value="Air Condition" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Air Condition',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-1" class="checkbox-custom-label">Air Condition</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-2" class="checkbox-custom" name="amenity[]" value="Bedding" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Bedding',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-2" class="checkbox-custom-label">Bedding</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-3" class="checkbox-custom" name="amenity[]" value="Heating" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Heating',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-3" class="checkbox-custom-label">Heating</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-4" class="checkbox-custom" name="amenity[]" value="Internet" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Internet',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-4" class="checkbox-custom-label">Internet</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-5" class="checkbox-custom" name="amenity[]" value="Microwave" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Microwave',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-5" class="checkbox-custom-label">Microwave</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-6" class="checkbox-custom" name="amenity[]" value="Smoking Allow" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Smoking Allow',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-6" class="checkbox-custom-label">Smoking Allow</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-7" class="checkbox-custom" name="amenity[]" value="Terrace" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Terrace',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-7" class="checkbox-custom-label">Terrace</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-8" class="checkbox-custom" name="amenity[]" value="Balcony" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Balcony',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-8" class="checkbox-custom-label">Balcony</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-9" class="checkbox-custom" name="amenity[]" value="Icon" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Icon',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-9" class="checkbox-custom-label">Icon</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-10" class="checkbox-custom" name="amenity[]" value="Wi-Fi" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Wi-Fi',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-10" class="checkbox-custom-label">Wi-Fi</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-11" class="checkbox-custom" name="amenity[]" value="Beach" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Beach',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-11" class="checkbox-custom-label">Beach</label>
                                                                    </li>
                                                                    <li>
                                                                        <input id="a-12" class="checkbox-custom" name="amenity[]" value="Parking" type="checkbox" @if(is_array(json_decode($project->amenities))) @if(in_array('Parking',json_decode($project->amenities))) checked @endif @endif>
                                                                        <label for="a-12" class="checkbox-custom-label">Parking</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn btn-outline-warning">Update</button>
                                            </div>
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
        var x = "{{count(json_decode($project->videos))}}";
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
