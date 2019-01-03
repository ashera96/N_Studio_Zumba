@extends('layouts.recep_app');

@section('content');


@extends('layouts.hori_sidebar');

<!--Receptionist monthly payment-area start-->
<div class="about-area pad90">
    <div class="container-fluid">

        <div class="row">
            @extends('layouts.recep_vertical_sidebar');


            <div class="col-lg-10 col-md-9 mar30">

                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                    </div>
                    <h3>Monthly Payment Area</h3>
                    <p>Monthly Cash Payments Management</p>
                </div>



                @if (session('msgr2'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('msgr2') }}
                    </div>
            @endif





            <!-- Website Overview -->
                <div class="panel panel-default">
                    {{--<div class="panel-heading main-color-bg">--}}
                    {{--<h3 class="panel-title">Employees Overview</h3>--}}

                    {{--</div>--}}



                </div>





            </div>
        </div>
    </div>
    <!--Receptionist monthly payment-area end-->
</div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection

