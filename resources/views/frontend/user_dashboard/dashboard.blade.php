@extends('frontend.layouts.app')
@section('content')>
    <section class="gray pt-5 pb-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    @include('frontend.include.sidebar')
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="dashboard-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h4>Your Current Package: <span class="pc-title theme-cl">Gold Package</span></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-1">
                                    <div class="dashboard_stats_wrap_content"><h4>607</h4> <span>New Matching Leads</span></div>
                                    <div class="dashboard_stats_wrap-icon"><i class="ti-credit-card"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-3">
                                    <div class="dashboard_stats_wrap_content"><h4>540</h4> <span>MB Points Consumed</span></div>
                                    <div class="dashboard_stats_wrap-icon"><i class="ti-wallet"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-2">
                                    <div class="dashboard_stats_wrap_content"><h4>580</h4> <span>Leads Consumed</span></div>
                                    <div class="dashboard_stats_wrap-icon"><i class="ti-credit-card"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="dashboard_stats_wrap widget-2">
                                    <div class="dashboard_stats_wrap_content"><h4>580</h4> <span>Average Spend Per Lead</span></div>
                                    <div class="dashboard_stats_wrap-icon"><i class="ti-wallet"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-7 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="mb-0">Extra Area Chart</h4>
                                    </div>
                                    <div class="card-body">
                                        <ul class="list-inline text-center m-t-40">
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5 text-warning"></i>Website A</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5 text-danger"></i>Website B</h5>
                                            </li>
                                            <li>
                                                <h5><i class="fa fa-circle m-r-5 text-success"></i>Website C</h5>
                                            </li>
                                        </ul>
                                        <div class="chart" id="extra-area-chart" style="height: 300px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Notifications</h6>
                                    </div>
                                    <div class="ground-list ground-list-hove">
                                        <div class="ground ground-single-list">
                                            <a href="#">
                                                <div class="btn-circle-40 theme-cl theme-bg-light"><i class="ti-home"></i></div>
                                            </a>
                                            <div class="ground-content">
                                                <h6><a href="#">Your listing <strong>Azreal Modern</strong> has been approved!.</a></h6>
                                                <span class="small">Just Now</span>
                                            </div>
                                        </div>
                                        <div class="ground ground-single-list">
                                            <a href="#">
                                                <div class="btn-circle-40 theme-cl theme-bg-light"><i class="ti-comment-alt"></i></div>
                                            </a>
                                            <div class="ground-content">
                                                <h6><a href="#">Litha Lynes left a review on <strong>Renovated Apartment</strong></a></h6>
                                                <span class="small">20 min ago</span>
                                            </div>
                                        </div>
                                        <div class="ground ground-single-list">
                                            <a href="#">
                                                <div class="btn-circle-40 theme-cl theme-bg-light"><i class="ti-heart"></i></div>
                                            </a>
                                            <div class="ground-content">
                                                <h6><a href="#">Someone bookmark your View listing!<strong>Sargun Villa Bay</strong></a></h6>
                                                <span class="small">1 day ago</span>
                                            </div>
                                        </div>
                                        <div class="ground ground-single-list">
                                            <a href="#">
                                                <div class="btn-circle-40 theme-cl theme-bg-light"><i class="ti-home"></i></div>
                                            </a>
                                            <div class="ground-content">
                                                <h6><a href="#">Your listing <strong>Modern Family Home</strong> has been approved!.</a></h6>
                                                <span class="small">10 days ago</span>
                                            </div>
                                        </div>
                                        <div class="ground ground-single-list">
                                            <a href="#">
                                                <div class="btn-circle-40 theme-cl theme-bg-light"><i class="ti-comment-alt"></i></div>
                                            </a>

                                            <div class="ground-content">
                                                <h6><a href="#">Adam Brown left a review on <strong>Renovated Apartment</strong></a></h6>
                                                <span class="small">Just Now</span>
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
    </section>
    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal" aria-hidden="true">
        <div class="modal-dialog modal-xl login-pop-form" role="document">
            <div class="modal-content overli" id="registermodal">
                <div class="modal-body p-0">
                    <div class="resp_log_wrap">
                        <div class="resp_log_thumb" style="background:url({{ asset('frontend/assets/img/log.jpg')}})no-repeat;"></div>
                        <div class="resp_log_caption">
                            <span class="mod-close" data-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
                            <div class="edlio_152">
                                <ul class="nav nav-pills tabs_system center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                    <a class="nav-link active" id="pills-login-tab" data-toggle="pill" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true"><i class="fas fa-sign-in-alt mr-2"></i>Login</a>
                                    </li>
                                    <li class="nav-item">
                                    <a class="nav-link" id="pills-signup-tab" data-toggle="pill" href="#pills-signup" role="tab" aria-controls="pills-signup" aria-selected="false"><i class="fas fa-user-plus mr-2"></i>Register</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="pills-login-tab">
                                    <div class="login-form">
                                        <form>
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control">
                                                    <i class="ti-user"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="input-with-icon">
                                                    <input type="password" class="form-control">
                                                    <i class="ti-unlock"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="eltio_ol9">
                                                    <div class="eltio_k1">
                                                        <input id="dd" class="checkbox-custom" name="dd" type="checkbox">
                                                        <label for="dd" class="checkbox-custom-label">Remember Me</label>
                                                    </div>
                                                    <div class="eltio_k2">
                                                        <a href="#">Lost Your Password?</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md full-width pop-login">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-signup" role="tabpanel" aria-labelledby="pills-signup-tab">
                                    <div class="login-form">
                                        <form>
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <div class="input-with-icon">
                                                    <input type="text" class="form-control">
                                                    <i class="ti-user"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Email ID</label>
                                                <div class="input-with-icon">
                                                    <input type="email" class="form-control">
                                                    <i class="ti-user"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <div class="input-with-icon">
                                                    <input type="password" class="form-control">
                                                    <i class="ti-unlock"></i>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="eltio_ol9">
                                                    <div class="eltio_k1">
                                                        <input id="dds" class="checkbox-custom" name="dds" type="checkbox">
                                                        <label for="dds" class="checkbox-custom-label">By using the website, you accept the terms and conditions</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-md full-width pop-login">Register</button>
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
    </div>
    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

    <script src="{{ asset('frontend/assets/js/raphael.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/morris.min.js')}}"></script>
    <script src="{{ asset('frontend/assets/js/morris.js')}}"></script>

@endsection
