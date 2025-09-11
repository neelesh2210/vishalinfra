@extends('frontend.layouts.app')
@section('content')
    <section class="gray pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="dashboard-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="dashboard-body">
                                    <div class="dashboard-wraper">
                                        <h5 class="mb-3 text-uppercase bg-light p-2">Property Information ({{$property->booking_amount}})</h5>
                                        <hr>
                                        <form action="{{route('user.book.property', encrypt($property->id))}}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="property_number" class="form-label">Property Number</label>
                                                    <input type="text" id="property_number" class="form-control" name="property_number" value="{{$property->property_number}}" placeholder="Property Number..." readonly>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="property_name" class="form-label">Property Name</label>
                                                    <input type="text" id="property_name" class="form-control" value="{{$property->name}}" placeholder="Property Name..." readonly>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="payment_type" class="form-label">Payment Type</label>
                                                    <select name="payment_type" id="payment_type" class="form-control" required>
                                                        <option value="cash" @if(old('payment_type') == 'cash') selected @endif>Cash</option>
                                                        <option value="online" @if(old('payment_type') == 'online') selected @endif>Online</option>
                                                        <option value="rtgs_neft" @if(old('payment_type') == 'rtgs_neft') selected @endif>RTGS/NEFT</option>
                                                        <option value="cheque" @if(old('payment_type') == 'cheque') selected @endif>Cheque</option>
                                                        <option value="upi" @if(old('payment_type') == 'upi') selected @endif>UPI</option>
                                                        <option value="dd" @if(old('payment_type') == 'dd') selected @endif>DD</option>
                                                    </select>
                                                    @error('payment_type')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                @if(!$property_installment || $property_installment->status === 'cancel')
                                                    <div class="col-md-4 mb-3">
                                                        <label for="customer_name" class="form-label">Customer Name</label>
                                                        <input class="form-control" name="customer_name" value="{{old('customer_name')}}" placeholder="Customer Name...">
                                                        @error('customer_name')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="customer_email" class="form-label">Customer Email</label>
                                                        <input class="form-control" name="customer_email" value="{{old('customer_email')}}" placeholder="Customer Email...">
                                                        @error('customer_email')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="customer_phone" class="form-label">Customer Phone</label>
                                                        <input class="form-control" name="customer_phone" value="{{old('customer_phone')}}" placeholder="Customer Phone...">
                                                        @error('customer_phone')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                @elseif($property_installment->status === 'success')
                                                    <div class="col-md-4 mb-3">
                                                        <label for="customer_name" class="form-label">Customer Name</label>
                                                        <input class="form-control" value="{{old('customer_name', $property_installment->customer_name)}}" placeholder="Customer Name..." readonly>
                                                        @error('customer_name')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="customer_email" class="form-label">Customer Email</label>
                                                        <input class="form-control" value="{{old('customer_email', $property_installment->customer_email)}}" placeholder="Customer Email..." readonly>
                                                        @error('customer_email')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="customer_phone" class="form-label">Customer Phone</label>
                                                        <input class="form-control" value="{{old('customer_phone', $property_installment->customer_phone)}}" placeholder="Customer Phone..." readonly>
                                                        @error('customer_phone')
                                                            <small class="text-danger">{{$message}}</small>
                                                        @enderror
                                                    </div>
                                                @endif
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Total Amount</label>
                                                    <input class="form-control" value="{{$property->final_price}}" readonly>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="amount" class="form-label">Amount</label>
                                                    <input type="text" id="amount" class="form-control" name="amount" @if($property_installment) @else value="{{old('amount', $property->booking_amount)}}" @endif placeholder="Enter Amount..." onkeyup="integerToWord()">
                                                    <span id="amount_in_word"></span>
                                                    @error('amount')
                                                        <small class="text-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12 mb-3 text-center">
                                                    <button class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')

    <script>

        $(integerToWord());

        function integerToWord(){
            $('#amount_in_word').text(numberToWords($('#amount').val()));
        }

        function numberToWords(price) {
            var sglDigit = ["Zero", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"],
                dblDigit = ["Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"],
                tensPlace = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"],
                handle_tens = function(dgt, prevDgt) {
                return 0 == dgt ? "" : " " + (1 == dgt ? dblDigit[prevDgt] : tensPlace[dgt])
                },
                handle_utlc = function(dgt, nxtDgt, denom) {
                return (0 != dgt && 1 != nxtDgt ? " " + sglDigit[dgt] : "") + (0 != nxtDgt || dgt > 0 ? " " + denom : "")
                };

            var str = "",
                digitIdx = 0,
                digit = 0,
                nxtDigit = 0,
                words = [];
            if (price += "", isNaN(parseInt(price))) str = "";
            else if (parseInt(price) > 0 && price.length <= 10) {
                for (digitIdx = price.length - 1; digitIdx >= 0; digitIdx--) switch (digit = price[digitIdx] - 0, nxtDigit = digitIdx > 0 ? price[digitIdx - 1] - 0 : 0, price.length - digitIdx - 1) {
                case 0:
                    words.push(handle_utlc(digit, nxtDigit, ""));
                    break;
                case 1:
                    words.push(handle_tens(digit, price[digitIdx + 1]));
                    break;
                case 2:
                    words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] && 0 != price[digitIdx + 2] ? " and" : "") : "");
                    break;
                case 3:
                    words.push(handle_utlc(digit, nxtDigit, "Thousand"));
                    break;
                case 4:
                    words.push(handle_tens(digit, price[digitIdx + 1]));
                    break;
                case 5:
                    words.push(handle_utlc(digit, nxtDigit, "Lakh"));
                    break;
                case 6:
                    words.push(handle_tens(digit, price[digitIdx + 1]));
                    break;
                case 7:
                    words.push(handle_utlc(digit, nxtDigit, "Crore"));
                    break;
                case 8:
                    words.push(handle_tens(digit, price[digitIdx + 1]));
                    break;
                case 9:
                    words.push(0 != digit ? " " + sglDigit[digit] + " Hundred" + (0 != price[digitIdx + 1] || 0 != price[digitIdx + 2] ? " and" : " Crore") : "")
                }
                str = words.reverse().join("")
            } else str = "";
            return str

        }

    </script>

@endpush

