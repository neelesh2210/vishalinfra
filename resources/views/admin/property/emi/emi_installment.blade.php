@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-4">
                        <h4>Property Detail:</h4>
                        <b>Booking Id: </b>{{$book_property->id}} <br>
                        <b>Number: </b>{{$book_property->property->property_number}} <br>
                        <b>Name: </b>{{$book_property->property->name}} <br>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row m-1">
                    <div class="col-sm-12" id="emi_detail">

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
                                            <th class="text-center">EMI Date</th>
                                            <th class="text-center">EMI Amount</th>
                                            <th class="text-center">Discount Amount</th>
                                            <th class="text-center">Final Amount</th>
                                            <th class="text-center">Due Amount</th>
                                            <th class="text-center">Paid Amount</th>
                                            <th class="text-center">Paid Status</th>
                                            <th class="text-center">Paid Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $active_checkbox = null;
                                        @endphp
                                        @forelse ($property_emis as $key=>$property_emi)
                                            <tr>
                                                @php
                                                    if(!$active_checkbox){
                                                        if($property_emi->paid_status == '0'){
                                                            $active_checkbox = $property_emi->id;
                                                        }
                                                    }
                                                @endphp
                                                <td class="text-center">
                                                    @if($property_emi->paid_status == '0')
                                                        <input type="checkbox" id="emi_id_{{$property_emi->id}}" name="emi_ids[]" value="{{$property_emi->id}}" onclick="calculateEmi('{{$property_emi->id}}')" @if($active_checkbox != $property_emi->id) disabled @endif>
                                                    @endif
                                                </td>
                                                <td class="text-center">{{$property_emi->emi_date}}</td>
                                                <td class="text-center">{{$property_emi->emi_amount}}</td>
                                                <td class="text-center">{{$property_emi->discount_amount}}</td>
                                                <td class="text-center">{{$property_emi->final_amount}}</td>
                                                <td class="text-center">{{$property_emi->due_amount}}</td>
                                                <td class="text-center">{{$property_emi->final_amount - $property_emi->due_amount}}</td>
                                                <td class="text-center">
                                                    @if($property_emi->paid_status == '1')
                                                        <span class="badge bg-success">Paid</span>
                                                    @else
                                                        <span class="badge bg-danger">Unpaid</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    {{$property_emi->updated_at}}
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

    <script>

        function calculateEmi(emi_id){
            $("input[name='emi_ids[]']:checked").map(function(){
                if ($('#emi_id_'+emi_id).is(":checked")){
                    var next_id = parseInt(emi_id)+1;
                    $('#emi_id_'+next_id).attr('disabled',false);
                }else{
                    var un_emi_ids = $("input[name='emi_ids[]']").map(function(){
                        if(emi_id < $(this).val()){
                            $('#emi_id_'+$(this).val()).attr('disabled',true);
                            $('#emi_id_'+$(this).val()).prop('checked',false);
                        }
                    }).get();
                }
            }).get();

            var emi_ids = $("input[name='emi_ids[]']:checked").map(function(){
                return $(this).val();
            }).get();

            $.ajax({
                type: 'POST',
                url: "{{route('admin.calculate.emi')}}",
                data: {
                    _token:"{{csrf_token()}}",
                    emi_ids:emi_ids,
                    booking_id:"{{$book_property->id}}"
                },
                success: function(data) {
                    $('#emi_detail').html(data.view);
                },error: function (request, status, error) {
                    alert('You have Select Wrong Emi!');
                    location.reload();
                }
            });
        }

    </script>

@endsection
