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
            <th class="text-center">Booking Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($booked_properties as $key=>$booked_property)
            <tr>
                <td class="text-center">{{($key+1) + ($booked_properties->currentPage() - 1)*$booked_properties->perPage()}}</td>
                <td class="text-center">{{ucwords(str_replace('_',' ',$booked_property->property->properties_type))}}</td>
                <td>
                    <b>Name: </b>{{$booked_property->property->project->name}} <br>
                    <b>Address: </b>{{$booked_property->property->project->address}} {{$booked_property->property->project->city}}, {{$booked_property->property->project->state}}, {{$booked_property->property->project->country}},{{$booked_property->property->project->pincode}}
                </td>
                <td class="text-center">{{$booked_property->property->phase->name}}</td>
                <td>
                    <b>Name: </b>{{$booked_property->property->name}} <br>
                    <b>Plot Number: </b>{{$booked_property->property->plot_number}} <br>
                    <b>Plot Area: </b>{{$booked_property->property->plot_area}} sqft. ({{$booked_property->property->plot_length}}X{{$booked_property->property->plot_breadth}})
                </td>
                <td>
                    <b>Price: </b>{{$booked_property->property->expected_price}} <br>
                    <b>sqft. Price: </b>{{$booked_property->property->price}}
                </td>
                <td class="text-center">
                    {{ucwords(str_replace('_',' ',$booked_property->property->booking_status))}}
                </td>
                <td class="text-center">{{$booked_property->created_at->format('d-m-Y h:i A')}}</td>
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
        <p><b>Showing {{($booked_properties->currentpage()-1)*$booked_properties->perpage()+1}} to {{(($booked_properties->currentpage()-1)*$booked_properties->perpage())+$booked_properties->count()}} of {{$booked_properties->total()}} Booked Properties</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $booked_properties->appends(['search_key'=>$search_key,'search_project'=>$search_project,'search_price'=>$search_price,'search_bedroom'=>$search_bedroom,'search_room_type'=>$search_room_type,'search_city'=>$search_city,'search_property'=>$search_property])->links() !!}
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
