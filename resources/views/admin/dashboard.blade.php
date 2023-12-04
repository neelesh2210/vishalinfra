@extends('admin.layouts.app')
@section('content')
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('backend/img/logo.png') }}" alt="{{env('APP_NAME')}} Logo">
    </div>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-left">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">
                                @isset($page_title)
                                    {{ $page_title }}
                                @endisset
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$properties}}</h3>
                                <p>Properties</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <a href="{{route('admin.property.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$users}}</h3>
                                <p>Users</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{route('admin.customer.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$enquiries}}</h3>
                                <p>Enquiry</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-question-circle"></i>
                            </div>
                            <a href="{{route('admin.enquiry.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$projects}}</h3>
                                <p>Project</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <a href="{{route('admin.project.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$agents}}</h3>
                                <p>Agent</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-secret"></i>
                            </div>
                            <a href="{{route('admin.customer.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$package_purchased}}</h3>
                                <p>Plan Purchased</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-rupee-sign"></i>
                            </div>
                            <a href="{{route('admin.purchase.plan.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header" style="background-color: #17a2b8;">
                                <h3 class="card-title">Last 6 Month Users</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header" style="background-color: #17a2b8;">
                                <h3 class="card-title">Last 6 Month Property</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header" style="background-color: #17a2b8;">
                                <h3 class="card-title">Last 6 Package Purchased</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header" style="background-color: #17a2b8;">
                                <h3 class="card-title">Last 6 Builder</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="barChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(function () {

            //Last 6 Month User
            var areaChartData = {
                labels  : [
                            @foreach ($month_names as $month_name)
                                '{{ $month_name }}',
                            @endforeach
                ],
                datasets: [
                    {
                        label               : 'Users',
                        backgroundColor     : 'rgba(60,141,188,0.9)',
                        borderColor         : 'rgba(60,141,188,0.8)',
                        pointRadius          : false,
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [
                                                @foreach ($month_users as $month_user)
                                                    '{{ $month_user }}',
                                                @endforeach
                        ]
                    },
                ]
            }

            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            barChartData.datasets[0] = temp0

            var barChartOptions = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })

            //Last 6 Month Property

            var areaChartData1 = {
                labels  : [
                            @foreach ($month_names as $month_name)
                                '{{ $month_name }}',
                            @endforeach
                ],
                datasets: [
                    {
                        label                :  'Property',
                        backgroundColor      :  '#28a745',
                        borderColor          :  'rgba(60,141,188,0.8)',
                        pointRadius          :  false,
                        pointColor           :  '#28a745',
                        pointStrokeColor     :  'rgba(60,141,188,1)',
                        pointHighlightFill   :  '#fff',
                        pointHighlightStroke :  '#28a745',
                        data                 :  [
                                                    @foreach ($month_properties as $month_property)
                                                        '{{ $month_property }}',
                                                    @endforeach
                                                ]
                    },
                ]
            }

            var barChartCanvas1 = $('#barChart1').get(0).getContext('2d')
            var barChartData1 = $.extend(true, {}, areaChartData1)
            var temp0 = areaChartData1.datasets[0]
            barChartData1.datasets[0] = temp0

            var barChartOptions1 = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

            new Chart(barChartCanvas1, {
                type: 'bar',
                data: barChartData1,
                options: barChartOptions1
            })

            //Last 6 Package Purchased

            var areaChartData2 = {
                labels  : [
                            @foreach ($month_names as $month_name)
                                '{{ $month_name }}',
                            @endforeach
                ],
                datasets: [
                    {
                        label                :  'Amount',
                        backgroundColor      :  '#28a745',
                        borderColor          :  'rgba(60,141,188,0.8)',
                        pointRadius          :  false,
                        pointColor           :  '#28a745',
                        pointStrokeColor     :  'rgba(60,141,188,1)',
                        pointHighlightFill   :  '#fff',
                        pointHighlightStroke :  '#28a745',
                        data                 :  [
                                                    @foreach ($month_package_purchaseds as $month_package_purchased)
                                                        '{{ $month_package_purchased }}',
                                                    @endforeach
                                                ]
                    },
                ]
            }

            var barChartCanvas2 = $('#barChart2').get(0).getContext('2d')
            var barChartData2 = $.extend(true, {}, areaChartData2)
            var temp0 = areaChartData2.datasets[0]
            barChartData2.datasets[0] = temp0

            var barChartOptions2 = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

            new Chart(barChartCanvas2, {
                type: 'bar',
                data: barChartData2,
                options: barChartOptions2
            })

            //Last 6 Builder

            var areaChartData3 = {
                labels  : [
                            @foreach ($month_names as $month_name)
                                '{{ $month_name }}',
                            @endforeach
                ],
                datasets: [
                    {
                        label                :  'Builder',
                        backgroundColor      :  '#28a745',
                        borderColor          :  'rgba(60,141,188,0.8)',
                        pointRadius          :  false,
                        pointColor           :  '#28a745',
                        pointStrokeColor     :  'rgba(60,141,188,1)',
                        pointHighlightFill   :  '#fff',
                        pointHighlightStroke :  '#28a745',
                        data                 :  [
                                                    @foreach ($month_builders as $month_builder)
                                                        '{{ $month_builder }}',
                                                    @endforeach
                                                ]
                    },
                ]
            }

            var barChartCanvas3 = $('#barChart3').get(0).getContext('2d')
            var barChartData3 = $.extend(true, {}, areaChartData3)
            var temp0 = areaChartData3.datasets[0]
            barChartData3.datasets[0] = temp0

            var barChartOptions3 = {
                responsive              : true,
                maintainAspectRatio     : false,
                datasetFill             : false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }

            new Chart(barChartCanvas3, {
                type: 'bar',
                data: barChartData3,
                options: barChartOptions3
            })
        })

    </script>
@endsection
