<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Name</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($countries as $key=>$country)
            <tr>
                <td class="text-center">{{($key+1) + ($countries->currentPage() - 1)*$countries->perPage()}}</td>
                <td class="text-center">{{ $country->name }}</td>
                <td class="d-flex justify-content-center">
                    <a href="{{route('admin.countries.edit',encrypt($country->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form id="delete-form" action="{{ route('admin.countries.destroy', encrypt($country->id)) }}" method="POST" onsubmit="return confirm('Are you want delete this country!');">
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
        <p><b>Showing {{($countries->currentpage()-1)*$countries->perpage()+1}} to {{(($countries->currentpage()-1)*$countries->perpage())+$countries->count()}} of {{$countries->total()}} Countries</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $countries->links() !!}
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
