@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">@isset($page_title) {{$page_title}} @endisset</li>
                        </ol>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.faqs.create')}}" class="btn btn-primary float-right">Add FAQ <i class="fas fa-plus"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-outline card-primary">
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Question</th>
                                            <th class="text-center">Answer</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($faqs as $key=>$faq)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">{{$faq->question}}</td>
                                                <td>{!!$faq->answer!!}</td>
                                                <td class="text-center">
                                                    <a href="{{route('admin.faqs.edit',$faq->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-outline-danger btn-sm mr-1 mb-1" onclick="$('#delete_form_{{$faq->id}}').submit()">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <form action="{{route('admin.faqs.destroy',$faq->id)}}" method="POST" id="delete_form_{{$faq->id}}">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="footable-empty">
                                                <td colspan="11">
                                                    <center style="padding: 70px;"><i class="far fa-frown" style="font-size: 100px;"></i><br>
                                                        <h2>Nothing Found</h2>
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
