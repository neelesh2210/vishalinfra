@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-7">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">@isset($page_title) {{ $page_title }} @endisset</h5>
                            </div>
                            <div class="card-body table-responsive p-2" id="table">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Level</th>
                                            <th class="text-center">Percent</th>
                                            <th class="text-center">Amount</th>
                                            <th class="text-center" style="width:300px">Reward</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($level_percents as $key=>$level_percent)
                                            <tr>
                                                <td class="text-center">{{$level_percent->level}}</td>
                                                <td class="text-center">{{ $level_percent->percent }} %</td>
                                                <td class="text-center">₹ {{ $level_percent->amount }}</td>
                                                <td class="text-center">{{ $level_percent->reward }}</td>
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
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="card card-outline card-primary mt-4">
                            <div class="card-header">
                                <h5 class="mb-0">Level Percent</h5>
                            </div>
                            <form action="{{ route('admin.level-percent.store') }}"method="POST">
                                @csrf
                                <div class="card-body p-2">
                                    <div class="row">
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="level">Level</label>
                                                <select name="level" class="form-control" id="level" required onchange="get_percent()">
                                                    <option value="">Select Level...</option>
                                                    @for ($i=0;$i<=13;$i++)
                                                        <option value="{{$i}}">{{$i}}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="percent">Percent</label>
                                                <input type="number" step="0.01" min="0.00" value="0.00" name="percent" id="percent" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <input type="number" step="0.01" min="0.00" value="0.00" name="amount" id="amount" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 form_div">
                                            <div class="form-group">
                                                <label for="reward">Reward</label>
                                                <textarea name="reward" id="reward" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-header text-center">
                                    <button type="submit" class="btn btn-outline-success mt-1 mb-1" onclick="return confirm('Are you sure you want to Submit?');"><i class="fa fa-check" aria-hidden="true"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        function get_percent(){
            var level = $('#level').val();

            $.ajax({
                type: 'GET',
                url: "{{route('admin.level-percent.show','')}}/"+level,
                success: function(data) {
                    if(data){
                        $('#percent').val(data.percent);
                        $('#amount').val(data.amount);
                        $('#reward').text(data.reward);
                    }else{
                        $('#percent').val('0.00');
                    }
                }
            });
        }
    </script>

@endsection
