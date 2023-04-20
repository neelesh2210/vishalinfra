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
                                    <form class="form-example" action="{{route('admin.phase.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="project_id">Project <span class="text-danger">*</span> </label>
                                                    <select name="project_id" class="form-control select2" required>
                                                        <option value="">Select Project...</option>
                                                        @foreach (App\Models\Admin\Project::where('is_delete','0')->get() as $project)
                                                            <option value="{{$project->id}}">{{$project->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="name">Name <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name..." required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 form_div">
                                                <div class="form-group">
                                                    <label for="number_of_plot">Number of Plot <span class="text-danger">*</span> </label>
                                                    <input type="number" class="form-control" step="0" min="1" id="number_of_plot" name="number_of_plot" placeholder="Enter Number of Plot..." required>
                                                </div>
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
@endsection
