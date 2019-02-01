@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');
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




                <body>
                <div id="curve_chart" style="width: 1000px; height: 500px"></div>
                </body>




                </div>
            </div>
        </div>
    </div>
</div>
</html>
@endsection
