<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>GEO Code</th>
            <th>Address</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $key=>$project)
            <tr>
                <td>{{($key+1) + ($projects->currentPage() - 1)*$projects->perPage()}}</td>
                <td>{{$project->name}}</td>
                <td>
                    <b>Latitude:</b> {{$project->lat}} <br>
                    <b>Longitude:</b> {{$project->long}}
                </td>
                <td>
                    <b>Pincode:</b> {{$project->pincode}} <br>
                    <b>City:</b> {{$project->city}} <br>
                    <b>State:</b> {{$project->state}} <br>
                    <b>Country:</b> {{$project->country}}
                </td>
                <td>{!!$project->description!!}</td>
                <td>
                    <a href="{{route('admin.project.edit',$project->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
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
        <p><b>Showing {{($projects->currentpage()-1)*$projects->perpage()+1}} to {{(($projects->currentpage()-1)*$projects->perpage())+$projects->count()}} of {{$projects->total()}} projects</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $projects->appends(['search_key'=>$search_key])->links() !!}
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
