<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Property Type</th>
            <th class="text-center">Property</th>
            <th class="text-center">Price</th>
            <th class="text-center">Date</th>
            <th class="text-center">Trust Seal</th>
            <th class="text-center">Is Featured</th>
            <th class="text-center">Most Demanded</th>
            <th class="text-center">Is Trending</th>
            <th class="text-center">Is Published</th>
            <th class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($properties as $key=>$property)

            <tr>
                <td class="text-center">{{($key+1) + ($properties->currentPage() - 1)*$properties->perPage()}}</td>
                <td class="text-center">
                    {{ucwords(str_replace('_',' ',$property->properties_type))}} <br>
                    <b>User Type:</b> {{ucwords(str_replace('_',' ',$property->addedBy->type))}}
                </td>
                <td>
                    <b>Name: </b>{{$property->name}} <br>
                    <b>Plot Area: </b>{{$property->plot_area}} sqft. ({{$property->plot_length}}X{{$property->plot_breadth}})
                </td>
                <td>
                    <b>Price: </b>{{$property->expected_price}} <br>
                    <b>sqft. Price: </b>{{$property->price}}
                </td>
                <td class="text-center">{{$property->created_at}}</td>
                <td class="text-center">
                    @if($property->is_trust_seal == '1')
                        <a href="{{route('admin.property.trust.seal.status',[$property->id,'0'])}}"><span class="badge bg-success">Trusted</span></a>
                    @else
                        <a href="{{route('admin.property.trust.seal.status',[$property->id,'1'])}}"><span class="badge bg-danger">Not Trusted</span></a>
                    @endif
                </td>
                <td class="text-center">
                    @if($property->is_featured == '1')
                        <a href="{{route('admin.property.featured.status',[$property->id,'0'])}}"><span class="badge bg-success">Featured</span></a>
                    @else
                        <a href="{{route('admin.property.featured.status',[$property->id,'1'])}}"><span class="badge bg-danger">Not Featured</span></a>
                    @endif
                </td>
                <td class="text-center">
                    @if($property->is_demanded == '1')
                        <a href="{{route('admin.property.demanded.status',[$property->id,'0'])}}"><span class="badge bg-success">Yes</span></a>
                    @else
                        <a href="{{route('admin.property.demanded.status',[$property->id,'1'])}}"><span class="badge bg-danger">No</span></a>
                    @endif
                </td>
                <td class="text-center">
                    @if($property->is_trending == '1')
                        <a href="{{route('admin.property.trending.status',[$property->id,'0'])}}"><span class="badge bg-success">Yes</span></a>
                    @else
                        <a href="{{route('admin.property.trending.status',[$property->id,'1'])}}"><span class="badge bg-danger">No</span></a>
                    @endif
                </td>
                <td class="text-center">
                    @if($property->is_status == '1')
                        <a href="{{route('admin.property.published.status',[$property->id,'0'])}}"><span class="badge bg-success">Published</span></a>
                    @else
                        <a href="{{route('admin.property.published.status',[$property->id,'1'])}}"><span class="badge bg-danger">Not Published</span></a>
                    @endif
                </td>
                <td class="text-center">
                    {{ucwords(str_replace('_',' ',$property->booking_status))}}
                </td>
                <td class="text-center">
                    <a href="{{route('admin.property.edit',encrypt($property->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-edit "></i>
                    </a>
                    <a href="{{route('admin.property.enquiry',encrypt($property->id))}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="far fa-question-circle"></i>
                    </a>
                    {{-- <a href="{{route('admin.duplicate.property',$property->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
                        <i class="fas fa-copy "></i>
                    </a> --}}
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
        {!! $properties->appends(['search_key'=>$search_key,'search_price'=>$search_price,'search_bedroom'=>$search_bedroom,'search_room_type'=>$search_room_type,'search_city'=>$search_city,'search_property'=>$search_property,'search_user_type'=>$search_user_type])->links() !!}
    </div>
</div>

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
