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
                    @foreach($details as $weight)
                    ['{{$weight->month}}',{{$weight->weight}}],
                    @endforeach


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
        @extends('layouts.vertical_sidebar');
        <div class="col-lg-10 col-md-9 mar30">
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
                                    <div class="col-md-12 text-center">
                                        @if(isset($details))
                                            <br>
                                            <h3 class="myone">The Weight Search results</h3>
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
                                                @foreach($details as $weight)
                                                    <tr>
                                                        <td>{{$weight->id}}</td>
                                                        <td>{{$weight->month}}</td>
                                                        <td>{{$weight->year}}</td>
                                                        <td>{{$weight->weight}}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="{{url('admin/reports/'.$weight ->id .'/'.$weight ->month.'/'. $weight ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ Form::open(['route' => ['reports.destroy',$weight->id,$weight->month,$weight->year], 'method' => 'delete']) }}
                                                            <button type="submit" class="delbtn">Delete</button>
                                                            {{ Form::close() }}
                                                        </td>
                                                    </tr>
                                                @endforeach
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
