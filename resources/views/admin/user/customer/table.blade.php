<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>User Detail</th>
            <th>Sponsor Details</th>
            <th>Associates</th>
            <th>Is Verified</th>
            <th>Is Kyced</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($customers as $key=>$customer)
            <tr>
                <td>{{($key+1) + ($customers->currentPage() - 1)*$customers->perPage()}}</td>
                <td>
                    <b>Name: </b>{{$customer->name}} <br>
                    <b>Email: </b>{{$customer->email}} <br>
                    <b>Phone: </b>{{$customer->phone}} <br>
                    <b>Referrer Code: </b>{{$customer->referrer_code}}
                </td>
                <td>
                    <b>Name: </b>{{optional($customer->sponserDetail)->name}} <br>
                    <b>Referrer Code: </b>{{optional($customer->sponserDetail)->referrer_code}} <br>
                </td>
                <td class="text-center">
                    <a href="#">{{$customer->associate_detail_count}}</a>
                </td>
                <td>
                    @if($customer->is_verified == '0')
                        <a class="btn" onclick="changeVerifyStatus('{{$customer->id}}','1')"><span class="badge bg-danger">Not Verified</span></a>
                    @else
                        <a class="btn" onclick="changeVerifyStatus('{{$customer->id}}','0')"><span class="badge bg-success">Verified</span></a>
                    @endif
                </td>
                <td>
                    @if($customer->is_kyced == '0')
                    <a class="btn" onclick="changeKycStatus('{{$customer->id}}','1')"><span class="badge bg-danger">Not Verified</span></a>
                @else
                    <a class="btn" onclick="changeKycStatus('{{$customer->id}}','0')"><span class="badge bg-success">Verified</span></a>
                @endif
                </td>
                <td>
                    <a href="{{route('admin.edit.customer',$customer->id)}}" class="btn btn-outline-primary btn-sm mr-1 mb-1">
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
        <p><b>Showing {{($customers->currentpage()-1)*$customers->perpage()+1}} to {{(($customers->currentpage()-1)*$customers->perpage())+$customers->count()}} of {{$customers->total()}} Customers</b></p>
    </div>
    <div class="col-md-8 d-flex justify-content-end">
        {!! $customers->appends(['search_date'=>$search_date,'search_verify_status'=>$search_verify_status,'search_kyc_status'=>$search_kyc_status,'search_key'=>$search_key])->links() !!}
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
