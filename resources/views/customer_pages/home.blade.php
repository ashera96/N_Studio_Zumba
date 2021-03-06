@extends('layouts.customer_app')


@section('content')

    <!-- /.header start -->
    <style>
        .y{
            width:400px;
            display:inline-block;
            padding:3px 5px;
            text-align:left;
        }
        #chartdiv {
            width: 70%;
            max-height: 400px;
            height: 80vh;
        }
    </style>

    <style>
        .pagination > li > a,
        .pagination > li > span {
            background: none !important;
            border: none !important;
            color: deeppink !important;
        }
        .pagination > li > a:hover,
        .pagination > li > a:focus,
        .pagination > li > span:hover,
        .pagination > li > span:focus,
        .pagination > li.active > a,
        .pagination > li.active > span {
            color: #000 !important;
            border: solid 1px #707d82!important;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
        setInterval(function(){
            $('#x').load('/home #x')
        },15000);
        /*setInterval(function(){
            $('#posts').load('/home #posts')
        },15000);*/
    </script>

    <script>
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"/home/fetch_data?page="+page,
                    success:function(posts)
                    {
                        $('#posts').html(posts);
                    }
                });
            }

        });
    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['month','weight'],
                {{--@foreach($details as $weight)
                ['{{$weight->month." ".$weight->year}}',{{$weight->weight}}],
                @endforeach --}}

                    @if(count($details)>0)
                    @for($i=3;$i>=0;$i--)
                ['{{$details[$i]->month}}',{{$details[$i]->weight}}],
                @endfor
                    @endif


            ]);

            var options = {
                title: 'Your Weight Progress',
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

    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home"><img src={{ URL::asset('images/logo/nav_logo.png') }}  alt="N_Studio_Zumba_Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <ul class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{Request::is('home') ? "active" : ""}}">
                            <a class="nav-link " href="/home">
                                home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/about') ? "active" : ""}}">
                            <a class="nav-link " href="/home/about">
                                about<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/gallery') ? "active" : ""}}">
                            <a class="nav-link " href="/home/gallery">
                                gallery<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/class_packages') ? "active" : ""}}">
                            <a class="nav-link " href="/home/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/schedule') ? "active" : ""}}">
                            <a class="nav-link " href="/home/schedule">
                                schedule<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/testimonials') ? "active" : ""}}">
                            <a class="nav-link " href="/home/testimonials">
                                testimonials<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item {{Request::is('home/contact') ? "active" : ""}}">
                            <a class="nav-link" href="/home/contact">contact</a>
                        </li>
                        <li class="nav-item {{Request::is('home/payment') ? "active" : ""}}">
                            <a class="nav-link" href="/home/payment">payment</a>
                        </li>
                        {{--<li class="nav-item {{Request::is('home/reports') ? "active" : ""}}">--}}
                            {{--<a class="nav-link" href="/home/reports">reports</a>--}}
                        {{--</li>--}}
                        {{--<li class="nav-item d-none d-lg-inline">--}}
                            {{--<div class="icon-menu">--}}
                                {{--<ul>--}}
                                    {{--<li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>--}}
                                {{--</ul>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                       <!-- notification bell commented out
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-bell"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        -->

                        <!-- new notification dropdown for testing-->
                        @if(Auth::check())
                            <li id="x" class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i><span class="badge badge-danger" id="count-notification">
                                    {{auth()->user()->unreadNotifications->count()}}
                                </span><span class="caret"></span>
                                </a>
                                <ul id="notifications" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="max-width:1200px;max-height:400px;overflow-x:auto;overflow-y: auto;background-color: black" >
                                    <div class="y">
                            @if(auth()->user()->notifications->count())
                                        <li style="background-color: #000000"><a style="display: inline-block;color: #51ce45" href="{{route('markAsRead')}}">Mark All As Read</a></li>
                                @foreach(auth()->user()->unreadNotifications as $notification)
                                    <li style="background-color: #000000">
                                        <a style="display: inline-block" href="#">
                                            {{$notification->data['data']}}<br>
                                            <small>{{$notification->created_at->diffForHumans()}}</small>
                                        </a>
                                    </li>
                                @endforeach
                                @foreach(auth()->user()->readNotifications as $notification)
                                    <li style="background-color: #000000">
                                        <a style="display: inline-block;color: #b39d7e" href="#">
                                            {{$notification->data['data']}}<br>
                                            <small style="color: #b39d7e">{{$notification->created_at->diffForHumans()}}</small>
                                        </a>
                                    </li>
                                @endforeach
                                    @else
                                        <a class="dropdown-item" href="#" style="padding-left: 130px">
                                            No Notifications
                                        </a>
                                    @endif
                                    </div>
                                </ul>
                            </li>
                        @endif
                    <!--end of testing -->

                        {{--User name and logout button start--}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        {{--User name and logout button end--}}

                    </ul>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header end-->

    <br><br><br>

    <!--features-area start-->
    <div class="features-area pb30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-body">
                        <div class="features-box text-center">
                            <div class="features-elements">
                                <h4 class="mb20">zumba classes</h4>
                                <p class="mb20">Everybody and every body! Each zumba class is designed to bring people together to sweat it on.<br></p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/1.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                        <div class="features-box text-center">
                            <div class="features-elements">
                                <h4 class="mb20">workout sessions</h4>
                                <p class="mb20">A total workout combining cardio, muscle conditioning, boosted energy, balance and flexibility.</p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/2.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                        <div class="features-box text-center">
                            <div class="features-elements" style="margin-bottom: 18px">
                                <h4 class="mb20">cardio fitness</h4>
                                <p class="mb20">Effective cardiovascular program to optimize fat burning, improve mood and reduce stress.<br></p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/3.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!--features-area end-->

    {{--JS Files to calculate the BMI start--}}
    <script language="JavaScript">
        <!--
        function calculateBmi() {
            var weight = document.bmiForm.weight.value
            var height = document.bmiForm.height.value
            if(weight > 0 && height > 0){
                var finalBmi = weight/(height/100*height/100)
                document.bmiForm.bmi.value = finalBmi.toFixed(2)
                if(finalBmi < 18.5){
                    document.bmiForm.meaning.value = "Under Weight"
                }
                else if(finalBmi >= 18.5 && finalBmi < 25){
                    document.bmiForm.meaning.value = "Healthy"
                }
                else if(finalBmi >= 25 && finalBmi < 30){
                    document.bmiForm.meaning.value = "Over Weight"
                }
                else{
                    document.bmiForm.meaning.value = "Obese"
                }
            }
            else{
                alert("Please Fill in everything correctly")
            }
        }
        //-->
    </script>
    {{--JS Files to calculate the BMI end--}}

    <!--BMI calculating area start-->
    <div class="portfolio-area title-white bg1 parallax overlay pad90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Calculate your BMI</h3>
                        <p>Body mass index (BMI) is a measure of body fat based on height and weight.</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-6">
                                    <form name="bmiForm">
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Weight</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="weight" class="form-control"  placeholder="50kg" size="10" ><br />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Height</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="height" class="form-control"  placeholder="160cm" size="10" ><br />
                                            </div>
                                        </div>
                                        <input type="button" class="btn active btn-primary" id="bmi-button" value="Calculate BMI" onClick="calculateBmi()"><br /><br />

                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your BMI</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="bmi" class="form-control" disabled placeholder="BMI Value" size="10" ><br />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Status</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="meaning" class="form-control" disabled placeholder="BMI Status" size="25" ><br />
                                            </div>
                                        </div>
                                        <input type="reset" class="btn active btn-success" id="bmi-button" value="Reset" /><br />

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.port carousel -->
    </div>
    <!--BMI calculating area end-->

    @if(count($details)>0)
        <div class="about-area pad90">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center">
                            <div class="title-bar full-width mb20">
                                <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                            </div>
                            <h3>Weight Report</h3>
                            <div style="margin-left: 280px;margin-top: 50px;">
                                <div id="chartdiv">
                                </div>
                                <script src="{{asset('amcharts4/core.js')}}"></script>
                                <script src="{{asset('amcharts4/charts.js')}}"></script>
                                <script src="{{asset('amcharts4/themes/animated.js')}}"></script>
                                <script src="{{asset('amcharts4/themes/kelly.js')}}"></script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endif

    {{--Notifications area start--}}
    <div class="about-area pad90" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Notifications</h3>
                        <div id="posts" style="color: gray ;padding: 15px;background-clip: padding-box;font-size: medium">
                            @include('customer_pages.pagination_data')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Notifications area end--}}

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
            categoryAxis.renderer.minGridDistance = 20;

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
