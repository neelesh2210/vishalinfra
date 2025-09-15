@extends('frontend.layouts.app')
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<style>
    .google-visualization-orgchart-table {
        border: 0;
        text-align: center;
    }
    .google-visualization-orgchart-table * {
        margin: 0;
        padding: 2px;
    }
    .google-visualization-orgchart-space-small {
        width: 4px;
        height: 1px;
        border: 0;
    }
    .google-visualization-orgchart-space-medium {
        width: 10px;
        height: 1px;
        border: 0;
    }
    .google-visualization-orgchart-space-large {
        width: 16px;
        height: 1px;
        border: 0;
    }
    .google-visualization-orgchart-noderow-small {
        height: 12px;
        border: 0;
    }
    .google-visualization-orgchart-noderow-medium {
        height: 30px;
        border: 0;
    }
    .google-visualization-orgchart-noderow-large {
        height: 46px;
        border: 0;
    }
    .google-visualization-orgchart-connrow-small {
        height: 2px;
        font-size: 1px;
    }
    .google-visualization-orgchart-connrow-medium {
        height: 6px;
        font-size: 4px;
    }
    .google-visualization-orgchart-connrow-large {
        height: 10px;
        font-size: 8px;
    }
    .google-visualization-orgchart-node {
        text-align: center;
        vertical-align: middle;
        font-family: arial, helvetica;
        cursor: default;
        border: 0;
        -moz-border-radius: 5px;
        -webkit-border-radius: 5px;
        -webkit-box-shadow:none;
        -moz-box-shadow: none;
        background: transparent;
    }
    .google-visualization-orgchart-nodesel {
        /* border: 2px solid #E3CA4B;
        background-color: #FFF7AE;
        background: -webkit-gradient(linear, left top, left bottom, from(#FFF7AE), to(#EEE79E)); */
    }
    .google-visualization-orgchart-node-small {
        font-size: 0.6em;
    }
    .google-visualization-orgchart-node-medium {
        font-size: 0.8em;
    }
    .google-visualization-orgchart-node-large {
        font-size: 1.2em;
        font-weight: bold;
    }
    .google-visualization-orgchart-linenode {
        border: 0;
    }
    .google-visualization-orgchart-lineleft {
        border-left: 1px solid #3388DD;
    }
    .google-visualization-orgchart-lineright {
        border-right: 1px solid #3388DD;
    }
    .google-visualization-orgchart-linebottom {
        border-bottom: 1px solid #3388DD;
    }
    .mytooltip {
        position: relative;
        display: inline-block;
    }
    .mytooltip .mytext {
        visibility: hidden;
        width: 220px;
        background-color: #1B2064;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;
        position: absolute;
        z-index: 1;
        bottom: 75%;
        left: -35%;
        margin-left: -60px;
        opacity: 0;
        transition: opacity 0.3s;
        z-index: 9999;
    }
    .mytooltip .mytext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }
    .mytooltip:hover .mytext {
        visibility: visible;
        opacity: 1;
    }
    @media(min-width: 320px) and (max-width:767px) {
        .mytooltip .mytext {
            margin-left: 0;
        }
        .mytooltip .mytext::after {
            left: 25%;
        }
    }
    .rspnsv {
        height: 71vh;
        width: 100%;
        overflow: scroll;
    }
    ::-webkit-scrollbar {
        width: 5px;
        border: 1px solid #D5D5D5;
    }
    ::-webkit-scrollbar-track {
        border-radius: 0;
        background: #EEEEEE;
    }
    ::-webkit-scrollbar-thumb {
        border-radius: 0;
        background: #5E5959;
    }
    ::-webkit-scrollbar:horizontal {
        height: 5px;
        border: 1px solid #D5D5D5;
    }
    ::-webkit-scrollbar-thumb:horizontal {
        background: #5E5959;
        border-radius: 0;
    }
    .brdr-class{
        margin-top: 10px;
        border: 1px solid #008ad9;
        padding: 2px 5px;
        font-weight: 600;
        border-radius: 3px;
        color: #000;
    }
    .mbb-3{
        margin-bottom: 5px;
    }
</style>
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
                                <div class="dashboard_property">

<div id="orgchart_div"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function fetchMLMTree() {
            return fetch("{{route('user.get.mlm.tree')}}?user_name={{ $user_name }}").then((response) => response.json()).catch((error) => console.error('Error fetching MLM tree:', error));
        }

        function drawOrgChart(mlmTree) {
            google.charts.load('current', {
                packages: ['orgchart']
            });
            google.charts.setOnLoadCallback(() => {
                const chartData = new google.visualization.DataTable();
                chartData.addColumn('string', 'ID');
                chartData.addColumn('string', 'Parent');
                chartData.addColumn('string', 'Name');

                const orgChartData = convertToOrgChartData(mlmTree);
                chartData.addRows(orgChartData);
                const chart = new google.visualization.OrgChart(document.getElementById('orgchart_div'));
                chart.draw(chartData, {
                    allowHtml: true
                });
                google.visualization.events.addListener(chart, 'onmouseover', function(e) {
                    setTooltipContent(chartData, e.row);
                });
                function setTooltipContent(dataTable, row) {
                    if (row != null) {
                        var str = dataTable.getValue(row, 0);
                        var tooltip = document.getElementsByClassName("google-visualization-tooltip")[0];
                        if (str != '') {
                            $.ajax({
                                type: 'GET',
                                url: "{{ route('user.get.referrel.detail') }}",
                                data: 'user_name=' + str,
                                success: function(resp) {
                                    if (resp != '') {
                                        $("#my" + str).html(resp);
                                    }
                                }
                            });
                        }
                    }
                }
            });
        }

        function convertToOrgChartData(node) {
            const orgChartData = [];
            if (node) {
                orgChartData.push([{
                    'v': node.v.toString(),
                    'f': node.f
                }, node.p ? node.p.toString() : '', '']);
                if (node.c && node.c.length > 0) {
                    node.c.forEach((child) => {
                        orgChartData.push(...convertToOrgChartData(child));
                    });
                }
            }
            return orgChartData;
        }

        fetchMLMTree().then((mlmTree) => {
            drawOrgChart(mlmTree);
        });
    </script>
@endsection
