<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">Priority</th>
            <th class="text-center">Name</th>
            <th class="text-center">Price</th>
            <th class="text-center">Number Of Property</th>
            <th class="text-center">Duration(In Day)</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($plans as $key=>$plan)
            <tr>
                <td class="text-center">{{$plan->priority}}</td>
                <td>
                    <img src="{{asset('backend/img/plan/'.$plan->image)}}" height="100px" width="100px">
                    {{$plan->name}}
                </td>
                <td class="text-center">
                    ₹ {{$plan->price}}
                    @if($plan->price != $plan->discounted_price)
                        <del>₹ {{$plan->discounted_price}}</del>
                    @endif
                </td>
                <td class="text-center">{{$plan->number_of_property}}</td>
                <td class="text-center">{{$plan->duration_in_day}} Days</td>
                <td class="text-center">
                    <a href="{{route('admin.plan.edit',$plan->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
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
