@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title) {{ $page_title }} @endisset</h5>
                            </div>
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">From</th>
                                            <th class="text-center">City</th>
                                            <th class="text-center">Image</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($banners as $key=>$banner)
                                            <tr>
                                                <td class="text-center">{{($key+1)}}</td>
                                                <td class="text-center">{{ucwords(str_replace('_',' ',$banner->from)) }}</td>
                                                <td class="text-center">{{ $banner->city->name }}</td>
                                                <td class="text-center">
                                                    <img src="{{ asset('backend/img/banners/' . $banner->image) }}" onerror="this.onerror=null;this.src='{{ asset('backend/img/no-image.png') }}'" style="height: 50px;width: 100px;">
                                                </td>
                                                <td class="d-flex justify-content-center">
                                                    <form id="delete-form" action="{{ route('admin.banners.destroy', encrypt($banner->id)) }}" method="POST" onsubmit="return confirm('Are you want delete this slider!');">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-outline-danger btn-sm mb-1" style="width:32px;">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
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
                    <div class="col-4">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">Add Banner</h5>
                            </div>
                            <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="from">From</label>
                                                <select name="from" class="form-control" required>
                                                    <option value="search">Search</option>
                                                    <option value="product_detail">Product Detail</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="city_id">City</label>
                                                <select name="city_id" class="form-control select2" required>
                                                    <option value="">Select City...</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" id="img_input1" class="custom-file-input" accept="image/*" @isset($edit_banner) @else required @endisset>
                                                    <label class="custom-file-label" for="customFile">Choose file...</label>
                                                </div>
                                                <div class="p-2 mt-2">
                                                    <img id="img1" src="{{ asset('backend/img/no-image.png') }}" height="100px" width="200px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center">
                                    <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Submit?');"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                                </div>
                            </form>
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
