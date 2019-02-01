@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');

<style>
    #chartdiv {
        width: 100%;
        max-height: 500px;
        height: 80vh;
    }
</style>
<html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['month', 'weight'],
                    {{--@foreach($details as $weight)--}}
                    {{--['{{$weight->month}}',{{$weight->weight}}],--}}
                    {{--@endforeach--}}

                    @if(count($details)>0)
                    @for($i=3;$i>=0;$i--)
                    ['{{$details[$i]->month}}',{{$details[$i]->weight}}],
                    @endfor
                    @endif


            ]);

            var options = {
                title: 'Customers Weight Graph',
                curveType: 'function',
                hAxis: {
                    title: 'Month'
                },
                vAxis: {
                    title: 'Weight'
                },

            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
    </script>
</head>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 col-md-3 sideFix">
            <div class="list-group shadow-sm">
                <a href="/admin/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                <a href="/admin/receptionist" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                <a href="/admin/dashboard/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                <a href="admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                <a href="/admin/payments" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                <a href="/admin/reports" class="list-group-item active side-bar active"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>

            </div>
        </div>
        <!--Sidebar-area end-->

        <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">
            <div class="col-lg-10 col-md-9 mar30" style="margin-left: 140px">

            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <br><br><br>
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>

                <h3>Show Weight</h3>
            </div>
            <div>
                <br>
                <div class="col-md-12" align="center">
                    <div class="row mb-0">
                        <div class="card overview-block pad30 rounded">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-12 text-center" style="min-height: 350px;">
                                        @if(isset($details))
                                            <h4 class="text-dark">Search Results</h4>
                                            <br>

                                            <table class="table table-striped table-hover" width="100%"  >
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Weight</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @for($i=3;$i>=0;$i--)
                                                    <tr>
                                                        <td>{{$details[$i]->id}}</td>
                                                        <td>{{$details[$i]->month}}</td>
                                                        <td>{{$details[$i]->year}}</td>
                                                        <td>{{$details[$i]->weight}}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="{{url('admin/reports/'.$details[$i] ->id .'/'.$details[$i] ->month.'/'. $details[$i] ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ Form::open(['route' => ['reports.destroy',$details[$i]->id,$details[$i]->month,$details[$i]->year], 'method' => 'delete']) }}
                                                            <button type="submit" class="delbtn">Delete</button>
                                                            {{ Form::close() }}
                                                        </td>
                                                    </tr>
                                                @endfor
                                                {{--@foreach($details as $weight)--}}
                                                    {{--<tr>--}}
                                                        {{--<td>{{$weight->id}}</td>--}}
                                                        {{--<td>{{$weight->month}}</td>--}}
                                                        {{--<td>{{$weight->year}}</td>--}}
                                                        {{--<td>{{$weight->weight}}</td>--}}
                                                        {{--<td>--}}
                                                            {{--<div class="row">--}}
                                                                {{--<div class="col">--}}
                                                                    {{--<a href="{{url('admin/reports/'.$weight ->id .'/'.$weight ->month.'/'. $weight ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</td>--}}
                                                        {{--<td>--}}
                                                            {{--{{ Form::open(['route' => ['reports.destroy',$weight->id,$weight->month,$weight->year], 'method' => 'delete']) }}--}}
                                                            {{--<button type="submit" class="delbtn">Delete</button>--}}
                                                            {{--{{ Form::close() }}--}}
                                                        {{--</td>--}}
                                                    {{--</tr>--}}
                                                {{--@endforeach--}}
                                                </tbody>
                                            </table>

                                        @endif

                                    </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                <div>
                    <div id="chartdiv">
                    </div>
                    <script src="{{asset('amcharts4/core.js')}}"></script>
                    <script src="{{asset('amcharts4/charts.js')}}"></script>
                    <script src="{{asset('amcharts4/themes/animated.js')}}"></script>
                    <script src="{{asset('amcharts4/themes/kelly.js')}}"></script>
                </div>
                {{--<body>--}}
                {{--<div id="curve_chart" style="width: 1000px; height: 500px"></div>--}}
                {{--</body>--}}




                </div>
            </div>
        </div>
    </div>
</div>
</html>

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
            "year": "{{$details[3]->month.' '.$details[3]->year}}",
            "income": '{{$details[3]->weight}}',
            "expenses": '{{$details[3]->weight}}'
        }, {
            "year": "{{$details[2]->month.' '.$details[2]->year}}",
            "income": '{{$details[2]->weight}}',
            "expenses": '{{$details[2]->weight}}'
        }, {
            "year": "{{$details[1]->month.' '.$details[1]->year}}",
            "income": '{{$details[1]->weight}}',
            "expenses": '{{$details[1]->weight}}'
        }, {
            "year": "{{$details[0]->month.' '.$details[0]->year}}",
            "income": '{{$details[0]->weight}}',
            "expenses": '{{$details[0]->weight}}',
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
