<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Invoice | {{config('app.name')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <style>
        @media print {
            .invoice-3 {
                background: #fff;
            }
        }
    </style>
</head>

<body>

    <!-- Invoice 3 start -->
    <div class="invoice-3 invoice-content">
        <div class="container">
            <div class="row">
                <div class="invoice-btn-section clearfix d-print-none mb-3">
                    <a onclick="window.print()" class="btn btn-lg btn-print">
                        <i class="fa fa-print"></i> Print Invoice
                    </a>
                </div>
                <div class="col-lg-12">
                    <div class="invoice-inner">
                        <div class="invoice-info" id="invoice_wrapper">
                            <div class="invoice-headar">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-name">
                                            <!-- logo started -->
                                            <div class="logo">
                                                <img src="{{ asset('backend/img/logo.png') }}" alt="logo">
                                            </div>
                                            <!-- logo ended -->
                                        </div>
                                    </div>
                                    @php
                                        $billing_info = App\Models\Admin\WebsiteData::whereIn('type',['billing_name','billing_phone','billing_gst','billing_address'])->pluck('data','type');
                                    @endphp
                                    <div class="col-sm-6">
                                        <div class="invoice">
                                            <h1 class="text-end inv-header-1 mb-0">Invoice No: #{{$installment->id}}</h1>
                                            @isset($billing_info['billing_gst'])
                                                <h6 class="text-end fw-bold mt-1 mb-1">GST NO. {{$billing_info['billing_gst']}}</h6>
                                            @endisset
                                            <p class="inv-from-1 mb-0 fw-bold text-end">Date : {{$installment->created_at->format('d-m-Y')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-sm-6 mb-30">
                                        <div class="invoice-number">
                                            <h4 class="inv-title-1 fw-bold">From</h4>
                                            <p class="invo-addr-1 mb-0">
                                                @isset($billing_info['billing_name'])
                                                    {{$billing_info['billing_name']}} <br />
                                                @endisset
                                                @isset($billing_info['billing_phone'])
                                                    {{$billing_info['billing_phone']}} <br />
                                                @endisset
                                                @isset($billing_info['billing_address'])
                                                    {{$billing_info['billing_address']}}<br />
                                                @endisset
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 mb-30">
                                        <div class="invoice-number text-end">
                                            <h4 class="inv-title-1 fw-bold">Bill To</h4>
                                            <p class="invo-addr-1 mb-0">
                                                {{$installment->booking->customer_name}} <br />
                                                {{$installment->booking->customer_phone}} <br />
                                                {{$installment->booking->customer_email}}

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="order-summary">
                                    <div class="table-outer">
                                        <table class="default-table invoice-table">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Particulars</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1.</td>
                                                    <td>{{$installment->booking->property->name}}</td>
                                                    <td>₹ {{$installment->final_amount}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-bottom">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="important-note mb-30">
                                            <h3 class="inv-title-1 fw-bold">Important Note</h3>
                                            <ul class="important-notes-list-1">
                                                <li>Once order done, money can't refund</li>
                                                <li>Delivery might delay due to some external dependency</li>
                                                <li>This is computer generated invoice and physical signature does not
                                                    require.</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-offsite">
                                        <div class="text-end payment-info mb-30">
                                            <h3 class="inv-title-1 fw-bold">Signature</h3>
                                            {{-- <img src="{{ asset('frontend/images/signature.png')}}" class="mt-2" style="height: 50px;"> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 3 end -->
    <script>
        $(function() {

            'use strict';

            /**
             * Generating PDF from HTML using jQuery
             */
            $(document).on('click', '#invoice_download_btn', function() {
                var contentWidth = $("#invoice_wrapper").width();
                var contentHeight = $("#invoice_wrapper").height();
                var topLeftMargin = 20;
                var pdfWidth = contentWidth + (topLeftMargin * 2);
                var pdfHeight = (pdfWidth * 1.5) + (topLeftMargin * 2);
                var canvasImageWidth = contentWidth;
                var canvasImageHeight = contentHeight;
                var totalPDFPages = Math.ceil(contentHeight / pdfHeight) - 1;

                html2canvas($("#invoice_wrapper")[0], {
                    allowTaint: true
                }).then(function(canvas) {
                    canvas.getContext('2d');
                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                    var pdf = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);
                    pdf.addImage(imgData, 'JPG', topLeftMargin, topLeftMargin, canvasImageWidth,
                        canvasImageHeight);
                    for (var i = 1; i <= totalPDFPages; i++) {
                        pdf.addPage(pdfWidth, pdfHeight);
                        pdf.addImage(imgData, 'JPG', topLeftMargin, -(pdfHeight * i) + (
                            topLeftMargin * 4), canvasImageWidth, canvasImageHeight);
                    }
                    pdf.save("sample-invoice.pdf");
                });
            });
        })
    </script>
</body>

</html>
