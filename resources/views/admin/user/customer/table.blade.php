<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($customers as $key=>$customer)
            <tr>
                <td class="text-center">{{($key+1) + ($customers->currentPage() - 1)*$customers->perPage()}}</td>
                <td class="text-center">{{$customer->name}}</td>
                <td class="text-center">{{$customer->email}}</td>
                <td class="text-center">{{$customer->phone}}</td>
                <td class="text-center">{{$customer->created_at->format('d-M-Y')}}</td>
                <td class="text-center">
                    <a href="#" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit "></i>
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
        {!! $customers->appends(['search_date'=>$search_date,'search_key'=>$search_key])->links() !!}
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
