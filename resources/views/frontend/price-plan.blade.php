@extends('frontend.layouts.app')
<style>
    table.table tr th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 0.5px;
    color: #004e9d;
}
strong {
    font-weight: 600;
    letter-spacing: .5px;
    color: #ff5f20;
    font-size: 20px;
}
.fa-check{
    color: green;
}
.fa-times{
    color: red;
}
</style>
@section('content')
    <div class="page-title" style="background:#f4f4f4 url({{ asset('frontend/assets/img/bg.jpg') }});" data-overlay="5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="breadcrumbs-wrap">
                        <h2 class="breadcrumb-title">Pricing</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <div class="reio_o9i text-center mb-5">
                        <h2>Listing Fee For Companies</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                 <div class="col-lg-12 col-md-12 mb-3">
                    <div class="pricing_wrap p-4 table-responsive">
                        <table class="table table-bordered table-striped ">
                            <thead>
                              <tr>
                                <th scope="col"></th>
                                <th scope="col" class="text-center pln-ylw">Start up</th>
                                <th scope="col" class="text-center pln-grn">Standard</th>
                                <th scope="col" class="text-center pln-blu">Professional</th>
                                <th scope="col" class="text-center pln-red">Enterprise</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="text-center">
                                <th scope="row">Number of Listings</th>
                                <td>20</td>
                                <td>50</td>
                                <td>150</td>
                                <td>450</td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Soft copy of brochure</th>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Duration of classified</th>
                                <td>90 days</td>
                                <td>180 days</td>
                                <td>270 days</td>
                                <td>360 days</td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Buyers will be notified</th>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Top listing Property</th>
                                <td><i class="fas fa-times"></i></td>
                                <td><i class="fas fa-times"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Trust Seal of RRE on Property*</th>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Verified Inquiries</th>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Classified by RRE</th>
                                <td>No</td>
                                <td>No</td>
                                <td><i class="fas fa-check"></i></td>
                                <td><i class="fas fa-check"></i></td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Banner on search page</th>
                                <td>No</td>
                                <td>No</td>
                                <td>No</td>
                                <td><i class="fas fa-check"></i></td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Amount</th>
                                <td><strong>2800</strong> <del>15000</del>/-</td>
                                <td><strong>5200</strong> <del>25000</del>/-</td>
                                <td><strong>9500</strong> <del>35000</del>/-</td>
                                <td><strong>20000</strong> <del>50000</del>/-</td>
                              </tr>
                              {{-- <tr class="text-center">
                                <th scope="row">Discount Rate</th>
                                <td>2800/-</td>
                                <td>5200/-</td>
                                <td>9500/-</td>
                                <td>20000/-</td>
                              </tr> --}}
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th scope="row"></th>
                                    <td><a href="#" class="btn choose_package pln-ylw">Buy Now <i class="fas fa-chevron-right"></i></a></td>
                                    <td><a href="#" class="btn choose_package pln-grn">Buy Now <i class="fas fa-chevron-right"></i></a></td>
                                    <td><a href="#" class="btn choose_package pln-blu">Buy Now <i class="fas fa-chevron-right"></i></a></td>
                                    <td><a href="#" class="btn choose_package pln-red">Buy Now <i class="fas fa-chevron-right"></i></a></td>
                                  </tr>
                              </tfoot>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
