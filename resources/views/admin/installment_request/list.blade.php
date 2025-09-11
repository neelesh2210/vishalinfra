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
                                            <th class="text-center">Property</th>
                                            <th class="text-center">Booking Detail</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center">Payment Type</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($installment_requests as $key=>$installment_request)
                                            <tr>
                                                <td class="text-center">{{($key+1) + ($installment_requests->currentPage() - 1)*$installment_requests->perPage()}}</td>
                                                <td>
                                                    <b>Property Number: </b>{{$installment_request->property->property_number}} <br>
                                                    <b>Name: </b>{{$installment_request->property->name}}
                                                </td>
                                                <td>
                                                    <b>ID:  </b>{{$installment_request->bookProperty?$installment_request->bookProperty->book_property_id:"New Booking"}} <br>
                                                    <b>By:  </b>{{$installment_request->bookedBy->name}} <br>
                                                    <b>User:  </b>{{$installment_request->customer_name}} <br>
                                                    <b>Email:  </b>{{$installment_request->customer_email}} <br>
                                                    <b>Phone:  </b>{{$installment_request->customer_phone}}
                                                </td>
                                                <td class="text-center">₹ {{$installment_request->amount}}</td>
                                                <td class="text-center">{{$installment_request->payment_type}}</td>
                                                <td class="text-center">{{$installment_request->created_at}}</td>
                                                <td class="text-center">
                                                    @if($installment_request->status == 'success')
                                                        Confirm
                                                    @elseif($installment_request->status == 'cancel')
                                                        Cancel
                                                    @else
                                                        <select id="status_{{$installment_request->id}}" class="form-control" onchange="changeStatus({{$installment_request->id}})">
                                                            <option value="Pending">Pending</option>
                                                            <option value="Confirm">Confirm</option>
                                                            <option value="Cancel">Cancel</option>
                                                        </select>
                                                    @endif
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
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-end">
                                        {!! $installment_requests->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @push('js')

        <script>

            function changeStatus(id){
                var status = $('#status_'+id).val();
                $.ajax({
                    type: 'POST',
                    url: "{{route('admin.installment.request.status')}}",
                    data: {
                        _token:"{{csrf_token()}}",
                        id:id,
                        status:status
                    },
                    success: function(data) {
                        // console.log(data);
                        // return false;
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                        location.reload();
                    },error: function (request, status, error) {
                        var Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        Toast.fire({
                            icon: 'error',
                            title: request.responseJSON.message
                        })
                       location.reload();
                    }
                });
            }

        </script>

    @endpush

@endsection
