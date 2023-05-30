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
                                    <form class="form-example" action="{{route('admin.plan.update',$plan->id)}}" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="name" name="name" value="{{$plan->name}}" placeholder="Enter Name..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 form_div">
                                                <div class="form-group">
                                                    <label for="priority">Priority</label>
                                                    <select name="priority" class="form-control">
                                                        @foreach (App\Models\Admin\Plan::orderBy('priority','asc')->get() as $priority)
                                                            <option value="{{$priority->priority}}" @if($priority->priority == $plan->priority) selected @endif>{{$priority->priority}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Image</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="image" id="img_input1" class="custom-file-input" accept="image/*">
                                                        <label class="custom-file-label" for="customFile">Choose file...</label>
                                                    </div>
                                                    <div class="p-2 mt-2">
                                                        <img id="img1" src="{{ asset('backend/img/plan/'.$plan->image) }}" height="100px" width="100px">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="price">Price <span class="text-danger">*</span> </label>
                                                    <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{$plan->price}}" placeholder="Enter Price..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="discounted_price">Discounted Price <span class="text-danger">*</span></label>
                                                    <input type="number" step="0.01" class="form-control" id="discounted_price" name="discounted_price" value="{{$plan->discounted_price}}" placeholder="Enter Discounted Price..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="number_of_property">Number Of Property <span class="text-danger">*</span></label>
                                                    <input type="number" step="1" class="form-control" id="number_of_property" name="number_of_property" value="{{$plan->number_of_property}}" placeholder="Enter Number Of Property..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="duration_in_day">Duration In Days <span class="text-danger">*</span></label>
                                                    <input type="number" step="1" class="form-control" id="duration_in_day" name="duration_in_day" value="{{$plan->duration_in_day}}" placeholder="Enter Duration In Day..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-20">
                                                <label class="col-from-label">Description</label>
                                                <textarea name="description" rows="8" class="form-control summernote">{!!$plan->description!!}</textarea>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-outline-warning">Update</button>
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
