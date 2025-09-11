<table>
    <thead>
        <tr>
            <th><b>Booking Id</b></th>
            <th><b>Project Name</b></th>
            <th><b>Property Name</b></th>
            <th><b>Amount</b></th>
            <th><b>Discount Amount</b></th>
            <th><b>Final Amount</b></th>
            <th><b>Associate</b></th>
            <th><b>Payment Type</b></th>
            <th><b>Date</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($installments as $key=>$installment)
            <tr>
                <td>{{$installment->booking->book_property_id}}</td>
                <td>{{$installment->booking->property->project->name}}</td>
                <td>{{$installment->booking->property->name}}</td>
                <td>{{round($installment->amount,2)}}</td>
                <td>{{round($installment->discount_amount,2)}}</td>
                <td>{{round($installment->final_amount,2)}}</td>
                <td>{{App\Models\User::where('id',$installment->taken_by)->first()->name}}</td>
                <td>{{ucfirst($installment->payment_detail)}}</td>
                <td>{{$installment->created_at}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
