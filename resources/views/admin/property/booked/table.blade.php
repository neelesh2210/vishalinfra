<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th>Booking Record</th>
            <th>Property</th>
            <th>Price</th>
            <th>Payments</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($booked_properties as $key=>$booked_property)
            <tr>
                <td class="text-center">{{($key+1) + ($booked_properties->currentPage() - 1)*$booked_properties->perPage()}}</td>
                <td>
                    <b>Booking Id: </b>{{$booked_property->id}} <br>
                    <b>Status: </b>{{ucwords(str_replace('_',' ',$booked_property->property->booking_status))}} <br>
                    <b>Date: </b>{{$booked_property->created_at->format('d-m-Y h:i A')}} <br>
                    <b>Customer Name: </b>{{$booked_property->customer_name}} <br>
                    <b>Customer Number: </b> {{$booked_property->customer_phone}} <br>
                    <b>Booked By: </b> {{$booked_property->associate?->name}} <br>
                </td>
                <td>
                    <b>Name: </b>{{$booked_property->property->name}} <br>
                    <b>Plot Number: </b>{{$booked_property->property->plot_number}} <br>
                    <b>Plot Area: </b>{{$booked_property->property->plot_area}} sqft. ({{$booked_property->property->plot_length}}X{{$booked_property->property->plot_breadth}}) <br>
                    <b>Project: </b>{{$booked_property->property->project->name}} <br>
                </td>
                <td>
                    <b>Price: </b>₹ {{$booked_property->property->final_price}} <br>
                    <b>sqft. Price: </b>₹ {{$booked_property->property->price}}
                </td>
                <td>
                    <b>Price: </b>₹ {{$booked_property->property->final_price}} <br>
                    <b>Paid: </b>₹  {{$booked_property->installments_sum_amount}}<br>
                    <b>Due Amount: </b>₹  {{$booked_property->property->final_price - $booked_property->installments_sum_amount}}<br>
                    <b>Commission: </b>₹ {{$booked_property->commissions_sum_commission_amount}}
                </td>
                <td class="text-center">
                    <a class="btn btn-outline-success btn-sm mr-1 mb-1" title="Installment" href="{{route('admin.booked.property.detail',encrypt($booked_property->id))}}"><i class="fas fa-money-bill"></i></a>
                    <a class="btn btn-outline-primary btn-sm mr-1 mb-1" title="Installment List" href="{{route('admin.property.installment',encrypt($booked_property->id))}}"><i class="fas fa-receipt"></i></a>
                    <a class="btn btn-outline-warning btn-sm mr-1 mb-1" title="Convert To Emi" href="{{route('admin.convert.to.emi',encrypt($booked_property->id))}}"><i class="fas fa-file-invoice"></i>
                    <a class="btn btn-outline-danger btn-sm mr-1 mb-1" title="Refund" href="{{route('admin.refund.property.index',$booked_property->book_property_id )}}"><img src="{{asset('backend/img/refund.png')}}" style="width: 100%;height: 18px;">
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
    <div class="col-md-4">
        <p><b>Showing {{($booked_properties->currentpage()-1)*$booked_properties->perpage()+1}} to {{(($booked_properties->currentpage()-1)*$booked_properties->perpage())+$booked_properties->count()}} of {{$booked_properties->total()}} Booked Properties</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $booked_properties->links() !!}
    </div>
</div>

<script>
    $(function () {
        $('.page-link').on('click', function (event) {
            $('tbody').addClass('loading')
            event.preventDefault()
            var url = $(this).attr('href');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('tbody').removeClass('loading')
                    $('#table').html(data)
                }
            });
        });
    });
</script>
