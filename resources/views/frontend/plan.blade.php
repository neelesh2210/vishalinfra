@extends('frontend.layouts.app')
@section('content')
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
                        <h2>Listing Fee For Companies</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="pricing_wrap p-4 table-responsive">
                        <table class="table table-bordered table-striped ">
                            <tbody>
                                <tr>
                                    <th scope="col"></th>
                                    @foreach ($plans as $key=>$plan)
                                        <th scope="col" class="text-center @if($key == 0) pln-ylw @elseif($key == 1) pln-grn @elseif($key == 2) pln-blu @elseif($key == 3) pln-red @endif">{{$plan->name}}</th>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Number of Listings</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>{{$plan->number_of_property}}</td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Soft copy of brochure</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            <i class="fas fa-check"></i>
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Duration of classified</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>{{$plan->duration_in_day}} days</td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Buyers will be notified</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            @if($plan->buyer_notification == '1')
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Top listing Property</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            @if($plan->top_listing == '1')
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Trust Seal of RRE on Property*</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            @if($plan->trust_seal == '1')
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Verified Inquiries</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            @if($plan->verified_enquiry == '1')
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Classified by RRE</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            @if($plan->classified == '1')
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Banner on search page</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            @if($plan->search_banner == '1')
                                                <i class="fas fa-check"></i>
                                            @else
                                                <i class="fas fa-times"></i>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                                <tr class="text-center">
                                    <th scope="row">Amount</th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            <strong>{{$plan->discounted_price}}</strong>
                                            @if($plan->price != $plan->discounted_price)
                                                <del>{{$plan->price}}</del>/-
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th scope="row"></th>
                                    @foreach ($plans as $key=>$plan)
                                        <td>
                                            {{-- <a href="#" class="btn choose_package pln-ylw">Buy Now <i class="fas fa-chevron-right"></i></a> --}}
                                            <a class="btn choose_package @if($key == 0) pln-ylw @elseif($key == 1) pln-grn @elseif($key == 2) pln-blu @elseif($key == 3) pln-red @endif" onclick="$('#form_{{$plan->id}}').submit()">Buy Now <i class="fas fa-chevron-right"></i></a>
                                            <form action="{{route('user.attempt.plan.purchase')}}" id="form_{{$plan->id}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                            </form>
                                        </td>
                                    @endforeach
                                  </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
