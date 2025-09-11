@isset($number_of_emi)
    @if($number_of_emi != 0)
        <h4>EMI Detail:</h4>
        <form action="{{route('admin.final.emi')}}" method="POST">
            @csrf
            <input type="hidden" name="booking_id" value="{{$booking_id}}">
            <input type="hidden" name="emi_ids" value="{{json_encode($emi_ids)}}">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th class="text-center">EMI Date</th>
                        <th class="text-center">EMI Amount</th>
                        <th class="text-center">Discount Amount</th>
                        <th class="text-center">Final Amount</th>
                        <th class="text-center">Due Amount</th>
                        <th class="text-center">Paid Amount</th>
                        <th class="text-center">Discount</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($property_emis as $property_emi)
                        <tr>
                            <td class="text-center">{{$property_emi->emi_date}}</td>
                            <td class="text-center">
                                ₹ {{$property_emi->emi_amount}}
                            </td>
                            <td class="text-center">
                                ₹ {{$property_emi->discount_amount}}
                            </td>
                            <td class="text-center">
                                ₹ {{$property_emi->final_amount}}
                            </td>
                            <td class="text-center">
                                ₹ {{$property_emi->due_amount}}
                            </td>
                            <td class="text-center">
                                ₹ {{$property_emi->final_amount - $property_emi->due_amount}}
                            </td>
                            <td class="text-center">
                                <input type="number" name="discount[]" class="form-control discount" onchange="calculateTotalDiscount()">
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
            <b>Number of EMI: </b> @isset($number_of_emi) {{$number_of_emi}} @else 0 @endisset<br>
            <b>Total EMI Amount: </b>₹  @isset($total_emi_amount) {{$total_emi_amount}} @else 0 @endisset <br>
            <b>Total Discount Amount: </b>₹  <span id="total_discount_amount">0</span> <br>
            <div class="row">
                {{-- <div class="col-md-6">
                    <label for="extra_discount">Extra Discount</label>
                    <input type="number" name="extra_discount" class="form-control discount" onchange="calculateTotalDiscount()">
                </div> --}}
                <div class="col-md-3">
                    <label for="paid_amount">Paid Amount</label>
                    <input type="number" step="0.01" name="paid_amount" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="payment_type">Payment Type</label>
                    <select name="payment_type" id="payment_type" class="form-control" required="">
                        <option value="cash">Cash</option>
                        <option value="online">Online</option>
                        <option value="rtgs_neft">RTGS/NEFT</option>
                        <option value="cheque">Cheque</option>
                        <option value="upi">UPI</option>
                        <option value="dd">DD</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="payment_date">Payment Date</label>
                    <input type="date" name="payment_date" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="refrence_number">Refrence Number</label>
                    <input type="text" name="refrence_number" class="form-control">
                </div>
                <div class="col-md-12">
                    <label for="remark">Remark</label>
                    <textarea name="remark" class="form-control"></textarea>
                </div>
                <div class="col-md-12 text-center mt-2">
                    <button class="btn btn-outline-success btn-sm">Pay</a>
                </div>
            </div>
        </form>

        <script>

            function calculateTotalDiscount(){
                var discounts = $(".discount").map(function(){
                    return $(this).val();
                }).get();

                var sum = discounts.reduce(function(a, b){
                    if(!b){
                        b = 0;
                    }
                    return parseFloat(a) + parseFloat(b);
                }, 0);

                $('#total_discount_amount').text(sum);
            }

        </script>

    @endif
@endisset
