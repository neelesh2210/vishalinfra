<table>
    <thead>
        <tr>
            <th><b>Name</b></th>
            <th><b>Phone</b></th>
            <th><b>Amount</b></th>
            <th><b>Service Charge</b></th>
            <th><b>TDS Charge</b></th>
            <th><b>Final Amount</b></th>
            <th><b>Payment Type</b></th>
            <th><b>Payment Id</b></th>
            <th><b>Date</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payouts as $key=>$payout)
            <tr>
                <td>{{$payout->user->name}}</td>
                <td>{{$payout->user->phone}}</td>
                @php
                    $service_amount = ($payout->amount*$payout->service_charge)/100;
                    $tds_amount = (($payout->amount - $service_amount)*$payout->tds_charge)/100;
                @endphp
                <td>{{round($payout->amount,2)}}</td>
                <td>{{round($service_amount,2)}}</td>
                <td>{{round($tds_amount,2)}}</td>
                <td>{{round($payout->final_amount,2)}}</td>
                <td>{{ucfirst($payout->payment_type)}}</td>
                <td>
                    @if($payout->payment_detail)
                        {{$payout->payment_detail}}
                    @endif
                </td>
                <td>{{$payout->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
