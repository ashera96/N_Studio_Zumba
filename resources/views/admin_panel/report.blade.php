@extends('layouts.admin_app');

@section('content');


@extends('layouts.hori_sidebar');
<!--header end-->

<style>
    #chartdiv {
        width: 100%;
        max-height: 600px;
        height: 100vh;
    }
</style>

<!--Admin dashboard-area start-->
<div class="about-area pad90">
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-area start-->
            @extends('layouts.vertical_sidebar');
            <!--Sidebar-area end-->

            <div class="col-lg-10 col-md-9 mar30">

                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                    </div>
                    <h3>Income Report</h3>
                    <p>Income Report of N Studio Zumba</p>
                </div>

                <div class="row mb-5">
                    <div class="card overview-block pad30 rounded">
                        <div id="chartdiv">
                        </div>
                        <script src="{{asset('amcharts4/core.js')}}"></script>
                        <script src="{{asset('amcharts4/charts.js')}}"></script>
                        <script src="{{asset('amcharts4/themes/animated.js')}}"></script>
                    </div>
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>

<script>
    setTimeout(function () {chart()
    },10)

    function chart() {
        // Themes begin
        am4core.useTheme(am4themes_animated);
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

        lineSeries.stroke = am4core.color("#fc328a");
        lineSeries.strokeWidth = 3;
        lineSeries.propertyFields.strokeDasharray = "lineDash";
        lineSeries.tooltip.label.textAlign = "middle";

        var bullet = lineSeries.bullets.push(new am4charts.Bullet());
        bullet.fill = am4core.color("#fc328a"); // tooltips grab fill from parent by default
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
