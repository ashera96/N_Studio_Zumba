@extends('layouts.recep_app');

@section('content');


@extends('layouts.hori_sidebar');
<!--header end-->


<!--Admin dashboard-area start-->
<div class="about-area pad90">
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar-area start-->
            @extends('layouts.recep_vertical_sidebar');
            <!--Sidebar-area end-->

            <div class="col-lg-10 col-md-9 mar30">

                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                    </div>
                    <h3>Receptionist Dashboard</h3>
                    <p>Manage N Studio Zumba</p>
                </div>


                <!-- Latest users start -->
                <div class="row mb-0">
                    <div class="card overview-block pad30 rounded">
                        <div class="card-header rounded mr-1 ml-1" >Welcome Receptionist!</div>
                        <br><br>
                        <p style="height: 250px;width: 400px">  Let's manage the zumba centre</p>
                    </div>
                </div>
                <!-- Latest users end -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
