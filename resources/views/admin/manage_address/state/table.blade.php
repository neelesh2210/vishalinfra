<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Country</th>
            <th class="text-center">Name</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($states as $key=>$state)
            <tr>
                <td class="text-center">{{($key+1) + ($states->currentPage() - 1)*$states->perPage()}}</td>
                <td class="text-center">{{ $state->country->name }}</td>
                <td class="text-center">{{ $state->name }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{route('admin.states.edit',encrypt($state->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form id="delete-form" action="{{ route('admin.states.destroy', encrypt($state->id)) }}" method="POST" onsubmit="return confirm('Are you want delete this state!');">
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
    <div class="col-md-4">
        <p><b>Showing {{($states->currentpage()-1)*$states->perpage()+1}} to {{(($states->currentpage()-1)*$states->perpage())+$states->count()}} of {{$states->total()}} States</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $states->appends(['search_country'=>$search_country,'search_key'=>$search_key])->links() !!}
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
