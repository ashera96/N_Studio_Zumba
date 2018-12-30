@extends('layouts.static_app')


@section('content')

    @extends('layouts.hori_sidebar');


    <!-- page title & breadcrumbs start -->
    <div class="gallery-bg page-head parallax overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Gallery</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/index">home</a></li>
                        <li>।</li>
                        <li>Gallery</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.page-header -->
    <!-- page title & breadcrumbs end -->

    <!--gallery-area start-->
    <div class="about-area pad90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Welcome to N Studio Zumba</h3>
                        <p>Let Zumba Fitness be your Stress Reliever </p>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->




            <div class="gallery">

            <?php
            $c=count(scandir('uploads/')) - 2;
            // echo "<h1>value is $c</h1>";

            for ($x = 1; $x <= $c; $x++) {
                echo ' <a href="/uploads/'.$x.'.png">';
                echo '<img src="/uploads/'.$x.'.png"/>';

            }

            ?>





            </div>




        </div>
    </div>
    <!--gallery-area end-->

@endsection