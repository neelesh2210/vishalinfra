@extends('admin.layouts.app')
@section('content')
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
                                    <form class="form-example" action="{{route('admin.plan.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="price">Price <span class="text-danger">*</span> </label>
                                                    <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Enter Price..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="discounted_price">Discounted Price <span class="text-danger">*</span></label>
                                                    <input type="number" step="0.01" class="form-control" id="discounted_price" name="discounted_price" placeholder="Enter Discounted Price..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="number_of_property">Number Of Property <span class="text-danger">*</span></label>
                                                    <input type="number" step="1" class="form-control" id="number_of_property" name="number_of_property" placeholder="Enter Number Of Property..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="duration_in_day">Duration In Days <span class="text-danger">*</span></label>
                                                    <input type="number" step="1" class="form-control" id="duration_in_day" name="duration_in_day" placeholder="Enter Duration In Day..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="img_input1" class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose file...</label>
                                                    </div>
                                                    <div class="p-2 mt-2">
                                                        <img id="img1" src="{{ asset('backend/img/no-image.png') }}" height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 card text-center">
                                                <div class="form-group">
                                                    <div class="card-head">
                                                        <label class="mt-2">Buyer Notification</label>
                                                    </div>
                                                    <hr>
                                                    <div class="row card-body">
                                                        <div class="col-md-6">
                                                            <label for="buyer_notification_yes">Yes</label>
                                                            <input type="radio" name="buyer_notification" value="1" id="buyer_notification_yes" class="form-control" checked>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="buyer_notification_no">No</label>
                                                            <input type="radio" name="buyer_notification" value="0" id="buyer_notification_no" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 card text-center">
                                                <div class="form-group">
                                                    <div class="card-head">
                                                        <label class="mt-2">Top Listing</label>
                                                    </div>
                                                    <hr>
                                                    <div class="row card-body">
                                                        <div class="col-md-6">
                                                            <label for="top_listing_yes">Yes</label>
                                                            <input type="radio" name="top_listing" value="1" id="top_listing_yes" class="form-control" checked>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="top_listing_no">No</label>
                                                            <input type="radio" name="top_listing" value="0" id="top_listing_no" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 card text-center">
                                                <div class="form-group">
                                                    <div class="card-head">
                                                        <label class="mt-2">Trust Seal</label>
                                                    </div>
                                                    <hr>
                                                    <div class="row card-body">
                                                        <div class="col-md-6">
                                                            <label for="trust_seal_yes">Yes</label>
                                                            <input type="radio" name="trust_seal" value="1" id="trust_seal_yes" class="form-control" checked>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="trust_seal_no">No</label>
                                                            <input type="radio" name="trust_seal" value="0" id="trust_seal_no" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 card text-center">
                                                <div class="form-group">
                                                    <div class="card-head">
                                                        <label class="mt-2">Verified Enquiry</label>
                                                    </div>
                                                    <hr>
                                                    <div class="row card-body">
                                                        <div class="col-md-6">
                                                            <label for="verified_enquiry_yes">Yes</label>
                                                            <input type="radio" name="verified_enquiry" value="1" id="verified_enquiry_yes" class="form-control" checked>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="verified_enquiry_no">No</label>
                                                            <input type="radio" name="verified_enquiry" value="0" id="verified_enquiry_no" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 card text-center">
                                                <div class="form-group">
                                                    <div class="card-head">
                                                        <label class="mt-2">Classified</label>
                                                    </div>
                                                    <hr>
                                                    <div class="row card-body">
                                                        <div class="col-md-6">
                                                            <label for="classified_yes">Yes</label>
                                                            <input type="radio" name="classified" value="1" id="classified_yes" class="form-control" checked>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="classified_no">No</label>
                                                            <input type="radio" name="classified" value="0" id="classified_no" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4 card text-center">
                                                <div class="form-group">
                                                    <div class="card-head">
                                                        <label class="mt-2">Search Banner</label>
                                                    </div>
                                                    <hr>
                                                    <div class="row card-body">
                                                        <div class="col-md-6">
                                                            <label for="search_banner_yes">Yes</label>
                                                            <input type="radio" name="search_banner" value="1" id="search_banner_yes" class="form-control" checked>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="search_banner_no">No</label>
                                                            <input type="radio" name="search_banner" value="0" id="search_banner_no" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-20">
                                                <label class="col-from-label">Description</label>
                                                <textarea name="description" rows="8" class="form-control summernote"></textarea>
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

    <script>
        img_input1.onchange = evt => {
            const [file] = img_input1.files
            if (file) {
                img1.src = URL.createObjectURL(file)
            }
        }
    </script>

@endsection
