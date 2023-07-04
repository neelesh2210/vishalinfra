<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>User Detail</th>
            <th>Address</th>
            <th>Launch Date</th>
            <th>Completion Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $key=>$project)
            <tr>
                <td>{{($key+1) + ($projects->currentPage() - 1)*$projects->perPage()}}</td>
                <td>{{$project->name}}</td>
                <td>
                    <b>Name:</b> {{$project->user->name}} <br>
                    <b>Phone:</b> {{$project->user->phone}}
                </td>
                <td>{{$project->address}}</td>
                <td>{{$project->launch_date}}</td>
                <td>{{$project->completion_date}}</td>
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
        {!! $projects->links() !!}
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
