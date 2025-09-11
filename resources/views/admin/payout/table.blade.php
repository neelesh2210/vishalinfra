<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Amount</th>
            @can('payout-released')
                <th>Action</th>
            @endcan
        </tr>
    </thead>
    <tbody>
        @forelse ($paginatedUsers as $key=>$paginatedUser)
            <tr>
                <td>{{($key+1) + ($paginatedUsers->currentPage() - 1)*$paginatedUsers->perPage()}}</td>
                <td>{{$paginatedUser['name']}}</td>
                <td>{{$paginatedUser['phone']}}</td>
                <td>{{$paginatedUser['remaining_amount']}}</td>
                <td>
                    <a class="btn btn-outline-success btn-sm mr-1 mb-1" onclick="payout({{$paginatedUser['user_id']}},{{$paginatedUser['remaining_amount']}},'{{$paginatedUser['name']}}','{{$paginatedUser['phone']}}')">
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
        <p><b>Showing {{($paginatedUsers->currentpage()-1)*$paginatedUsers->perpage()+1}} to {{(($paginatedUsers->currentpage()-1)*$paginatedUsers->perpage())+$paginatedUsers->count()}} of {{$paginatedUsers->total()}} Users</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $paginatedUsers->appends(['search_key'=>$search_key])->links() !!}
    </div>
</div>

@push('js')

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

@endpush
