@extends('layouts.admin_app');

@section('content');

<style>
    .nav-tabs .nav-item li > a {
        text-transform: capitalize;
        color: #fc328a;
        transition: background-color .2s, color .2s;
    }

    .nav-tabs .nav-item li > a:hover {
        text-transform: capitalize;
        color: #fc328a;
        transition: background-color .2s, color .2s;
    }

    .nav-tabs .nav-item li > a:focus {
        text-transform: capitalize;
        color: #fc328a;
        transition: background-color .2s, color .2s;
        /*background-color: #333;*/
    }


    .nav-tabs .nav-item li.active > a {
        background-color: #fc328a;
        color: white;
    }

    #chartdiv {
        width: 100%;
        max-height: 500px;
        height: 80vh;
    }
</style>

@extends('layouts.hori_sidebar');


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                <div class="col-lg-2 col-md-3 sideFix" style="margin-top: -25px;">
                    <div class="list-group shadow-sm">
                        <a href="/admin/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                        <a href="/admin/receptionist" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                        <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                        <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                        <a href="/admin/dashboard/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                        <a href="/admin/schedules" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                        <a href="/admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                        <a href="/admin/payments" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                        <a href="/admin/reports" class="list-group-item active side-bar active"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>

                    </div>
                </div>
                <!--Sidebar-area end-->

                    <!-- Website Overview -->

                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">

                    <div class="col-lg-10 col-md-9 offset-lg-1 offset-md-1">
                        <div class="nav nav-tabs">
                            <div class="nav-item">
                                <li class="nav-link">
                                    <a class="nav-link " href="/admin/reports">
                                        Weight<span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            </div>
                            <div class="nav-item">
                                <li class="nav-link active">
                                    <a class="nav-link " href="/admin/income_report">
                                        Income<span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-10 col-md-9 pad30" style="margin-left: 140px" >

                        <div class="section-title text-center">
                            <div class="title-bar full-width mb20">
                                <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                            </div>
                            <h3>Income Report</h3>
                            <p>View Income Report of past 6 months</p>
                        </div>
                        <div>
                            <div id="chartdiv">
                            </div>
                            <script src="{{asset('amcharts4/core.js')}}"></script>
                            <script src="{{asset('amcharts4/charts.js')}}"></script>
                            <script src="{{asset('amcharts4/themes/animated.js')}}"></script>
                            <script src="{{asset('amcharts4/themes/kelly.js')}}"></script>


                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>

<script>
    setTimeout(function () {chart()
    },10)

    function chart() {
        // Themes begin
        am4core.useTheme(am4themes_animated);
        am4core.useTheme(am4themes_kelly);
// Themes end

// Create chart instance
        var chart = am4core.create("chartdiv", am4charts.XYChart);

// Export
        chart.exporting.menu = new am4core.ExportMenu();

// Data for both series
        var data = [ {
            "year": "{{$income[5]->month.' '.$income[5]->year}}",
            "income": '{{$income[5]->amount-$expenses[5]->amount}}',
            "expenses": '{{$income[5]->amount-$expenses[5]->amount}}'
        }, {
            "year": "{{$income[4]->month.' '.$income[4]->year}}",
            "income": '{{$income[4]->amount-$expenses[4]->amount}}',
            "expenses": '{{$income[4]->amount-$expenses[4]->amount}}'
        }, {
            "year": "{{$income[3]->month.' '.$income[3]->year}}",
            "income": '{{$income[3]->amount-$expenses[3]->amount}}',
            "expenses": '{{$income[3]->amount-$expenses[3]->amount}}'
        }, {
            "year": "{{$income[2]->month.' '.$income[2]->year}}",
            "income": '{{$income[2]->amount-$expenses[2]->amount}}',
            "expenses": '{{$income[2]->amount-$expenses[2]->amount}}'
        }, {
            "year": "{{$income[1]->month.' '.$income[1]->year}}",
            "income": '{{$income[1]->amount-$expenses[1]->amount}}',
            "expenses": '{{$income[1]->amount-$expenses[1]->amount}}'
        }, {
            "year": "{{$income[0]->month.' '.$income[0]->year}}",
            "income": '{{$income[0]->amount-$expenses[0]->amount}}',
            "expenses": '{{$income[0]->amount-$expenses[0]->amount}}',
            "lineDash": "5,5",
            // }, {
            //     "year": "2014",
            //     "income": 34.1,
            //     "expenses": 32.9,
            //     "strokeWidth": 1,
            //     "columnDash": "5,5",
            //     "fillOpacity": 0.2,
            //     "additional": "(projection)"
        } ];

        /* Create axes */
        var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
        categoryAxis.dataFields.category = "year";
        categoryAxis.renderer.minGridDistance = 30;

        /* Create value axis */
        var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

        /* Create series */
        var columnSeries = chart.series.push(new am4charts.ColumnSeries());
        columnSeries.name = "Income";
        columnSeries.dataFields.valueY = "income";
        columnSeries.dataFields.categoryX = "year";

        columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
        columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
        columnSeries.columns.template.propertyFields.stroke = "stroke";
        columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
        columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
        columnSeries.tooltip.label.textAlign = "middle";

        var lineSeries = chart.series.push(new am4charts.LineSeries());
        lineSeries.name = "Expenses";
        lineSeries.dataFields.valueY = "expenses";
        lineSeries.dataFields.categoryX = "year";

        lineSeries.stroke = am4core.color("rgba(0,0,0,0.66)");
        lineSeries.strokeWidth = 3;
        lineSeries.propertyFields.strokeDasharray = "lineDash";
        lineSeries.tooltip.label.textAlign = "middle";

        var bullet = lineSeries.bullets.push(new am4charts.Bullet());
        bullet.fill = am4core.color("rgba(0,0,0,0.66)"); // tooltips grab fill from parent by default
        // bullet.tooltipText = "[#fff font-size: 15px]{name} in {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
        var circle = bullet.createChild(am4core.Circle);
        circle.radius = 4;
        circle.fill = am4core.color("#fff");
        circle.strokeWidth = 3;

        chart.data = data;
    }
</script>
@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
