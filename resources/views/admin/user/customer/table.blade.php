<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Type</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Date</th>
            <th class="text-center">Is Verified</th>
            <th class="text-center">Is Blocked</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($customers as $key=>$customer)
            <tr>
                <td class="text-center">{{($key+1) + ($customers->currentPage() - 1)*$customers->perPage()}}</td>
                <td class="text-center">{{ucwords(str_replace('_',' ',$customer->type))}}</td>
                <td class="text-center">{{$customer->name}} ({{$customer->user_name}})</td>
                <td class="text-center">{{$customer->email}}</td>
                <td class="text-center">{{$customer->phone}}</td>
                <td class="text-center">{{$customer->created_at->format('d-M-Y')}}</td>
                <td class="text-center">
                    @if($customer->is_verified == '1')
                        <a href="{{route('admin.customer.verify.status',[encrypt($customer->id),encrypt('0')])}}"><span class="badge bg-success">Yes</span></a>
                    @else
                        <a href="{{route('admin.customer.verify.status',[encrypt($customer->id),encrypt('1')])}}"><span class="badge bg-danger">No</span></a>
                    @endif
                </td>
                <td class="text-center">
                    @if($customer->is_blocked == '1')
                        <a href="{{route('admin.customer.block.status',[encrypt($customer->id),encrypt('0')])}}"><span class="badge bg-danger">Yes</span></a>
                    @else
                        <a href="{{route('admin.customer.block.status',[encrypt($customer->id),encrypt('1')])}}"><span class="badge bg-success">No</span></a>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{route('admin.customer.edit',encrypt($customer->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1" title="Edit">
                        <i class="fas fa-edit "></i>
                    </a>
                    <a href="{{route('admin.customer.plan.purchase',encrypt($customer->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1" title="Plan Purchase">
                        <i class="fas fa-file-alt "></i>
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
        <p><b>Showing {{($customers->currentpage()-1)*$customers->perpage()+1}} to {{(($customers->currentpage()-1)*$customers->perpage())+$customers->count()}} of {{$customers->total()}} Customers</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $customers->appends(['search_date'=>$search_date,'search_key'=>$search_key,'search_user_type'=>$search_user_type])->links() !!}
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
