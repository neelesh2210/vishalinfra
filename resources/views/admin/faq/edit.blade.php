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
                                    <form class="form-example" action="{{route('admin.faqs.update',$faq->id)}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 form_div">
                                                <div class="form-group">
                                                    <label for="question">Question <span class="text-danger">*</span> </label>
                                                    <input type="text" class="form-control" id="question" name="question" value="{{old('question',$faq->question)}}" placeholder="Enter Question..." required>
                                                    @error('question')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 pt-20">
                                                <label class="col-from-label">Answer</label>
                                                <textarea name="answer" rows="8" class="form-control summernote" required>{{old('answer',$faq->answer)}}</textarea>
                                                @error('answer')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
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

@endsection
