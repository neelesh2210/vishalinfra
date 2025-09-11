<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Amount</th>
            <th class="text-center">Payment Detail</th>
            <th class="text-center">Date</th>
            <th class="text-center">Invoice</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($payouts as $key=>$payout)
            <tr>
                <td class="text-center">{{($key+1) + ($payouts->currentPage() - 1)*$payouts->perPage()}}</td>
                <td class="text-center">{{$payout->user->name}}</td>
                <td class="text-center">{{$payout->user->phone}}</td>
                <td>
                    @php
                        $service_amount = ($payout->amount*$payout->service_charge)/100;
                        $tds_amount = (($payout->amount - $service_amount)*$payout->tds_charge)/100;
                    @endphp
                    <b>Amount: </b>₹ {{$payout->amount}} <br>
                    <b>Service Charge: </b>₹ {{$service_amount}}<br>
                    <b>TDS Charge: </b>₹ {{$tds_amount}} <br>
                    <b>Final Amount: </b>₹ {{$payout->final_amount}}
                </td>
                <td>
                    <b>Payment Type: </b>{{ucfirst($payout->payment_type)}}
                    @if($payout->payment_detail)
                        <br>
                        <b>Payment ID: </b>{{$payout->payment_detail}}
                    @endif
                </td>
                <td class="text-center">{{$payout->created_at}}</td>
                <td class="text-center">
                    <a class="btn btn-outline-success btn-sm mr-1 mb-1" href="{{route('admin.payout.invoice',$payout->id)}}">
                        <i class="fas fa-money-bill "></i>
                    </a>
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
        <p><b>Showing {{($payouts->currentpage()-1)*$payouts->perpage()+1}} to {{(($payouts->currentpage()-1)*$payouts->perpage())+$payouts->count()}} of {{$payouts->total()}} Payouts</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $payouts->links() !!}
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
