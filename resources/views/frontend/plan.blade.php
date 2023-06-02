@extends('frontend.layouts.app')
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
                @foreach ($plans as $key=>$plan)
                    <div class="col-lg-4 col-md-4 mb-3">
                        <div class="pricing_wrap">
                            <div class="prc_bg">
                                <div class="prt_head">
                                    <h4>{{$plan->name}}</h4>
                                </div>
                                <div class="prt_price">
                                    <del><span>₹</span>{{$plan->price}}</del>
                                    <h2><span>₹</span>{{$plan->discounted_price}}</h2>
                                    <span>{{$plan->duration_in_day}} Days Validity</span>
                                </div>
                            </div>
                            <div class="prt_body">
                                <ul>
                                    <li>Number of listings ({{$plan->number_of_property}})</li>
                                    {{-- <li>Upto 5x More</li>
                                    <li>High</li>
                                    <li class="none">Unlimited</li> --}}
                                </ul>
                            </div>
                            <div class="prt_footer">
                                <a class="btn choose_package" onclick="$('#form_{{$plan->id}}').submit()">Buy Now</a>
                                <form action="{{route('user.plan.purchase')}}" id="form_{{$plan->id}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col-lg-4 col-md-4 mb-3">
                    <div class="pricing_wrap">
                        <div class="prc_bg">
                            <div class="prt_head">
                                <div class="recommended">Recommended</div>
                                <h4>Certified Agent Plus</h4>
                            </div>
                            <div class="prt_price">
                                <h2><span>₹</span>5000</h2>
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
                </div> --}}
            </div>
        </div>
    </section>
@endsection
