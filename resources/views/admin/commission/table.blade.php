<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>User Detail</th>
            <th>Property Detail</th>
            <th class="text-center">Commission</th>
            <th class="text-center">Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($commissions as $key=>$commission)
            <tr>
                <td>{{($key+1) + ($commissions->currentPage() - 1)*$commissions->perPage()}}</td>
                <td>
                    <b>Name: </b>{{$commission->user->name}} <br>
                    <b>Email: </b>{{$commission->user->email}} <br>
                    <b>Phone: </b>{{$commission->user->phone}} <br>
                    <b>Referrer Code: </b>{{$commission->user->user_name}}
                </td>
                <td>
                    <b>Type: </b>{{ucwords(str_replace('_',' ',$commission->property->properties_type))}} <br>
                    <b>Project: </b>{{$commission->property->project->name}} <br>
                    <b>Name: </b>{{$commission->property->name}} <br>
                    <b>Number: </b>{{$commission->property->property_number}} <br>
                    <b>Price: </b>{{$commission->property->final_price}}
                </td>
                <td class="text-center">₹ {{$commission->commission_amount}}</td>
                <td class="text-center">{{$commission->created_at->format('d-m-Y h:i A')}}</td>
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
        <p><b>Showing {{($commissions->currentpage()-1)*$commissions->perpage()+1}} to {{(($commissions->currentpage()-1)*$commissions->perpage())+$commissions->count()}} of {{$commissions->total()}} commissions</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $commissions->links() !!}
    </div>
</div>

<script>
    $(function () {
        $('.page-link').on('click', function (event) {
            event.preventDefault()
            var url = $(this).attr('href');
            $.ajax({
                type: 'GET',
                url: url,
                success: function(data) {
                    $('#table').html(data)
                }
            });
        });
    });
</script>
