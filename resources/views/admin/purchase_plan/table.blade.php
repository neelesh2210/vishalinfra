<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">User Detail</th>
            <th class="text-center">Plan Detail</th>
            <th class="text-center">Payment Detail</th>
            <th class="text-center">Expiry Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($purchase_plans as $key=>$purchase_plan)
            <tr>
                <td class="text-center">{{($key+1) + ($purchase_plans->currentPage() - 1)*$purchase_plans->perPage()}}</td>
                <td>
                    <b>User Name: </b> {{$purchase_plan->user->user_name}} <br>
                    <b>Email: </b> {{$purchase_plan->user->email}} <br>
                    <b>Phone: </b> {{$purchase_plan->user->phone}} <br>
                </td>
                <td>
                    <b>Name: </b>{{$purchase_plan->plan->name}} <br>
                    <b>Price: </b>₹ {{$purchase_plan->price}} <br>
                    <b>Discounted Price: </b>₹ {{$purchase_plan->discounted_price}} <br>
                </td>
                <td>
                    <b>Payment Id: </b>{{json_decode($purchase_plan->payment_detail)->id}} <br>
                    <b>Date: </b>{{$purchase_plan->created_at}} <br>
                </td>
                <td>{{$purchase_plan->created_at->addDays($purchase_plan->duration_in_day)}}</td>
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
        <p><b>Showing {{($purchase_plans->currentpage()-1)*$purchase_plans->perpage()+1}} to {{(($purchase_plans->currentpage()-1)*$purchase_plans->perpage())+$purchase_plans->count()}} of {{$purchase_plans->total()}} purchase_plans</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $purchase_plans->links() !!}
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
