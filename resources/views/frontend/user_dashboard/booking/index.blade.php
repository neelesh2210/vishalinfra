@extends('frontend.user_dashboard.layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="page-title-box">
                            <h4 class="page-title">Booking Request List</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id="table">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Property Detail</th>
                                                <th class="text-center">User Type</th>
                                                <th class="text-center">Token Detail</th>
                                                <th class="text-center">Property Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($property_booking_requests as $key=>$property_booking_request)
                                                <tr>
                                                    <td class="text-center">{{($key+1) + ($property_booking_requests->currentPage() - 1)*$property_booking_requests->perPage()}}</td>
                                                    <td>
                                                        <b>Number: </b>{{$property_booking_request->property->property_number}} <br>
                                                        <b>Name: </b>{{$property_booking_request->property->name}} <br>
                                                        <b>Type: </b>{{ucwords(str_replace('_',' ',$property_booking_request->property->properties_type))}}
                                                    </td>
                                                    <td>
                                                        <b>Name: </b>{{$property_booking_request->user->name}} <br>
                                                        <b>Phone: </b>{{$property_booking_request->user->phone}} <br>
                                                        <b>Email: </b>{{$property_booking_request->user->email}} <br>
                                                    </td>
                                                    <td class="text-center">{{$property_booking_request->token_amount}}</td>
                                                    <td class="text-center">{{ucwords(str_replace('_',' ',$property_booking_request->property->booking_status))}}</td>
                                                    <td class="text-center" id="action_div_{{$property_booking_request->id}}">
                                                        @if($property_booking_request->request_status == 'pending')
                                                            <select name="request_status" id="request_status_{{$property_booking_request->id}}" class="form-control" onchange="changeStatus({{$property_booking_request->id}})">
                                                                <option value="pending" @if($property_booking_request->request_status == 'pending') selected @endif>Pending</option>
                                                                <option value="confirm" @if($property_booking_request->request_status == 'confirm') selected @endif>Confirm</option>
                                                                <option value="cancel" @if($property_booking_request->request_status == 'cancel') selected @endif>Cancel</option>
                                                            </select>
                                                        @else
                                                            {{ucwords($property_booking_request->request_status)}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr class="footable-empty">
                                                    <td colspan="11">
                                                        <center style="padding: 70px;"><i class="uil-frown" style="font-size: 100px;"></i><br>
                                                            <h2>Nothing Found</h2>
                                                        </center>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><b>Showing {{($property_booking_requests->currentpage()-1)*$property_booking_requests->perpage()+1}} to {{(($property_booking_requests->currentpage()-1)*$property_booking_requests->perpage())+$property_booking_requests->count()}} of {{$property_booking_requests->total()}} Booking Requests</b></p>
                                        </div>
                                        <div class="col-md-8 d-flex justify-content-end">
                                            {!! $property_booking_requests->links() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function changeStatus(id){
            var status = $('#request_status_'+id).val();

            $.ajax({
                type: 'GET',
                url: "{{route('user.property.booking.change.status',['',''])}}/"+id+"/"+status,
                success: function(data) {
                    console.log(data);
                    $('#request_status_'+id).addClass('d-none');
                    $('#action_div_'+id).text(status);
                    $('#action_div_'+id).css('textTransform','capitalize');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: "success",
                        title: 'Request Status Changed Successfully!',
                    });
                },error: function (request, status, error) {
                    $('#request_status_'+id).val('pending');
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: "error",
                        title: request.responseJSON.msg,
                    });
                }
            });
        }

    </script>

@endsection
