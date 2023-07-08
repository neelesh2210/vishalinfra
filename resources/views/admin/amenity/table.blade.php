<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Image</th>
            <th class="text-center">Icon</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($amenities as $key=>$amenity)
            <tr>
                <td class="text-center">{{($key+1) + ($amenities->currentPage() - 1)*$amenities->perPage()}}</td>
                <td class="text-center">{{$amenity->name}}</td>
                <td class="text-center">
                    <img src="{{asset('backend/img/amenity/'.$amenity->image)}}" height="100px" width="100px">
                </td>
                <td class="text-center">
                    <i class="{{$amenity->icon}}"></i>
                </td>
                <td class="text-center">
                    <a href="{{route('admin.amenities.edit',$amenity->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit "></i>
                    </a>
                    <a onclick="$('#delete_form').submit()" class="btn btn-outline-danger btn-sm mr-1 mb-1">
                        <i class="fas fa-trash "></i>
                    </a>
                    <form action="{{route('admin.amenities.destroy',$amenity->id)}}" method="POST" id="delete_form">
                        @method('DELETE')
                        @csrf
                    </form>
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
        <p><b>Showing {{($amenities->currentpage()-1)*$amenities->perpage()+1}} to {{(($amenities->currentpage()-1)*$amenities->perpage())+$amenities->count()}} of {{$amenities->total()}} Amenities</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $amenities->appends(['search_key'=>$search_key])->links() !!}
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
