@extends('frontend.layouts.app')
<style>
    table.table tr th {
    font-weight: 600;
    text-transform: uppercase;
    font-size: 14px;
    letter-spacing: 0.5px;
    color: #004e9d;
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
                        <h2>Choose the plan that's just right for you and your business</h2>
                        <p>Buy a pack and enjoy all agent benefits on Vishal Infra</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 mb-3">
                        <div class="pricing_wrap">
                            <div class="prc_bg">
                                <div class="prt_head">
                                    <h4>Standard</h4>
                                </div>
                                <div class="prt_price">

                                    <h2>Rs. 5000 <del class="ml-2" style="color: #ff5f20; font-size:25px;"> 4500</del></h2>
                                    <span>180 Days Validity</span>
                                </div>
                            </div>
                            <div class="prt_body">
                                <ul>
                                    <li>Number of listings 50</li>
                                    {{-- <li>Upto 5x More</li>
                                    <li>High</li>
                                    <li class="none">Unlimited</li> --}}
                                </ul>
                            </div>
                            <div class="prt_footer">
                                <a class="btn choose_package">Buy Now</a>
                            </div>
                        </div>
                    </div>
                 <div class="col-lg-4 col-md-4 mb-3">
                    <div class="pricing_wrap">
                        <div class="ribbon">
                            <span>Recommended</span>
                        </div>
                        <div class="prc_bg">
                            <div class="prt_head">
                                <h4>Certified Agent Plus</h4>
                            </div>
                            <div class="prt_price">
                                <h2>Rs. 5000</h2>
                                <span>90 Days Validity</span>
                            </div>
                        </div>
                        <div class="prt_body">
                            <ul>
                                <li>Number of listings (25)</li>
                                <li>Upto 5x More</li>
                                <li>High</li>
                                <li class="none">Unlimited</li>
                            </ul>
                        </div>
                        <div class="prt_footer">
                            <a href="#" class="btn choose_package active">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                                <td>15000/-</td>
                                <td>25000/-</td>
                                <td>35000/-</td>
                                <td>50000/-</td>
                              </tr>
                              <tr class="text-center">
                                <th scope="row">Discount Rate</th>
                                <td>2800/-</td>
                                <td>5200/-</td>
                                <td>9500/-</td>
                                <td>20000/-</td>
                              </tr>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th scope="row"></th>
                                    <td><a href="#" class="btn choose_package active">Buy Now <i class="fas fa-chevron-right"></i></a></td>
                                    <td><a href="#" class="btn choose_package active">Buy Now <i class="fas fa-chevron-right"></i></a></td>
                                    <td><a href="#" class="btn choose_package active">Buy Now <i class="fas fa-chevron-right"></i></a></td>
                                    <td><a href="#" class="btn choose_package active">Buy Now <i class="fas fa-chevron-right"></i></a></td>
                                  </tr>
                              </tfoot>
                          </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
