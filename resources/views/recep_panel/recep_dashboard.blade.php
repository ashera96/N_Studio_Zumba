@extends('layouts.recep_app');

@section('content');


@extends('layouts.hori_sidebar');


<div class="container-fluid">
    <div class="row">
        @extends('layouts.recep_vertical_sidebar');

        <div class="col-lg-10 col-md-9 mar30">


            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <br><br><br>
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>

                <h3>Users Overview</h3>
            </div>

            <!--  Counting the no.of active customers   -->
            <?php  $countActive=0;  ?>

            @if($custs)
                @foreach($custs as $c)
                    <?php    $countActive=$countActive+1;   ?>



                @endforeach
                <tr class="text-dark">
                    <?php echo '<th>'.$countActive.'</th>';    ?>

                </tr>

            @endif

        <!--  Counting the no.of inactive customers   -->
            <?php  $totUsers=0;  ?>

            @if($users)
                @foreach($users as $u)
                    <?php    $totUsers=$totUsers+1;   ?>




                @endforeach
                <tr class="text-dark">
                    <?php echo '<th>'.$totUsers.'</th>';    ?>

                </tr>
            @endif
            <?php  $countInactive=$totUsers-$countActive;

            $activeUsers=$countActive;
            $inactiveUsers=$countInactive;
            ?>




            <html>
            <head>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                        var data = google.visualization.arrayToDataTable([
                            ['User Types', 'Count of Users'],

                            ['Active Users',<?php echo $activeUsers ?> ],
                            ['Inactive Users', <?php echo $inactiveUsers ?>],

                        ]);

                        var options = {
                            title: ''
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                        chart.draw(data, options);
                    }
                </script>
            </head>
            <body>
            <div id="piechart" style="width: 1000px; height: 400px;"></div>
            </body>
            </html>



            <!-- Latest users start -->
            <div class="row mb-0">
                <div class="card overview-block pad30 rounded">
                    <div class="card-header rounded mr-1 ml-1"  style="background-color: deeppink">Latest Online Users</div>
                    <div class="row card-body">





                        <table class="table table-striped table-hover">



                            <tr class="text-dark">
                                <th>Name</th>
                                <th>Email</th>

                            </tr>



                            @if($users)
                                @foreach($users as $user)

                                    @if($user->isOnline())

                                        <tr class="text-dark">
                                            <th>{{$user->username}}</th>
                                            <th>{{$user->email}}</th>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif


                        </table>


                        {{--You are logged in as a kc  Customer!--}}




                    </div>
                </div>
            </div>
            <!-- Latest users end -->


        </div>
        <!-- /.col -->
    </div>

    @endsection

    @section('js_styling')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
