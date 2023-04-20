<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Country</th>
            <th class="text-center">State</th>
            <th class="text-center">City</th>
            <th class="text-center">Pincode</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pincodes as $key=>$pincode)
            <tr>
                <td class="text-center">{{($key+1) + ($pincodes->currentPage() - 1)*$pincodes->perPage()}}</td>
                <td class="text-center">{{ $pincode->country->name }}</td>
                <td class="text-center">{{ $pincode->state->name }}</td>
                <td class="text-center">{{ $pincode->city->name }}</td>
                <td class="text-center">{{ $pincode->pincode }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{route('admin.pincodes.edit',encrypt($pincode->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form id="delete-form" action="{{ route('admin.pincodes.destroy', encrypt($pincode->id)) }}" method="POST" onsubmit="return confirm('Are you want delete this pincode!');">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm mb-1"
                            style="width:32px;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr class="footable-empty">
                <td colspan="11">
                    <center style="padding: 70px;"><i class="far fa-frown"
                            style="font-size: 100px;"></i><br>
                        <h2>Nothing Found</h2>
                    </center>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
<hr>
<div class="row">
    <div class="col-md-6">
        <p><b>Showing {{($pincodes->currentpage()-1)*$pincodes->perpage()+1}} to {{(($pincodes->currentpage()-1)*$pincodes->perpage())+$pincodes->count()}} of {{$pincodes->total()}} Pincodes</b></p>
    </div>
    <div class="col-md-6 d-flex justify-content-end">
        {!! $pincodes->appends(['search_country'=>$search_country,'search_state'=>$search_state,'search_city'=>$search_city,'search_key'=>$search_key])->links() !!}
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
