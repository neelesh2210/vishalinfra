<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Project</th>
            <th class="text-center">Name</th>
            <th class="text-center">Number of Plot</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($phases as $key=>$phase)
            <tr>
                <td class="text-center">{{($key+1) + ($phases->currentPage() - 1)*$phases->perPage()}}</td>
                <td class="text-center">{{$phase->project->name}}</td>
                <td class="text-center">{{$phase->name}}</td>
                <td class="text-center">{{$phase->number_of_plot}}</td>
                <td class="text-center">
                    <a href="{{route('admin.phase.edit',$phase->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit "></i>
                    </a>
                    {{-- <form id="delete-form" action="{{ route('admin.phase.destroy', $phase->id) }}" method="POST" onsubmit="return confirm('Are you want delete this Phase!');">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-outline-danger btn-sm mb-1" style="width:34px;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form> --}}
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
        <p><b>Showing {{($phases->currentpage()-1)*$phases->perpage()+1}} to {{(($phases->currentpage()-1)*$phases->perpage())+$phases->count()}} of {{$phases->total()}} Phases</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $phases->appends(['search_key'=>$search_key,'search_project'=>$search_project])->links() !!}
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
