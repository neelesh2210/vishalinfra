<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Property Type</th>
            <th class="text-center">Project</th>
            <th class="text-center">Phase</th>
            <th class="text-center">Property</th>
            <th class="text-center">Price</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($properties as $key=>$property)
            <tr>
                <td class="text-center">{{($key+1) + ($properties->currentPage() - 1)*$properties->perPage()}}</td>
                <td class="text-center">{{ucwords(str_replace('_',' ',$property->properties_type))}}</td>
                <td>
                    <b>Name: </b>{{$property->project->name}} <br>
                    <b>Address: </b>{{$property->project->address}} {{$property->project->city}}, {{$property->project->state}}, {{$property->project->country}},{{$property->project->pincode}}
                </td>
                <td class="text-center">{{optional($property->phase)->name}}</td>
                <td>
                    <b>Name: </b>{{$property->name}} <br>
                    <b>Plot Number: </b>{{$property->plot_number}} <br>
                    <b>Plot Area: </b>{{$property->plot_area}} sqft. ({{$property->plot_length}}X{{$property->plot_breadth}})
                </td>
                <td>
                    <b>Price: </b>{{$property->expected_price}} <br>
                    <b>sqft. Price: </b>{{$property->price}}
                </td>
                <td class="text-center">
                    {{ucwords(str_replace('_',' ',$property->booking_status))}}
                </td>
                <td class="text-center">
                    <a href="{{route('admin.property.edit',encrypt($property->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit "></i>
                    </a>
                    <a href="{{route('admin.duplicate.property',$property->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-copy "></i>
                    </a>
                    {{-- <form id="delete-form" action="{{ route('admin.property.destroy', encrypt($property->id)) }}" method="POST" onsubmit="return confirm('Are you want delete this Property!');">
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
        <p><b>Showing {{($properties->currentpage()-1)*$properties->perpage()+1}} to {{(($properties->currentpage()-1)*$properties->perpage())+$properties->count()}} of {{$properties->total()}} Properties</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $properties->appends(['search_key'=>$search_key,'search_project'=>$search_project,'search_price'=>$search_price,'search_bedroom'=>$search_bedroom,'search_room_type'=>$search_room_type,'search_city'=>$search_city,'search_property'=>$search_property])->links() !!}
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
