@extends('layouts.admin_app');

@section('content');

<!-- /.header start -->
@extends('layouts.hori_sidebar');
<!--header end-->

<!--Admin dashboard-area start-->
<!--schedule-area start-->
<div class="schedule-area parallax pad90">
    <div class="container" style="margin-left: 150px">
        <div class="row">
            @extends('layouts.vertical_sidebar');
            <div class="col-md-12">
                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                    </div>
                    <h3>class schedule</h3>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        {{--Schdeule Timetable Start--}}
        <div class="container-fluid">
            <div class="row">
                {{--<div col-md-1>--}}
                {{--</div>--}}
                <div class="col-lg-2 offset-lg-1 offset-md-0">
                    <h3 class="text-uppercase text-center pad30">Monday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_monday)>0)
                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal1">
                                    <h5>1</h5>
                                    <h5>{{$schedule_monday[0]->type}}</h5>
                                    <p class="mb-0">{{$schedule_monday[0]->time_slot}}</p>
                                </div>

                                <div class="modal fade" id="myModal1">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: deeppink">Users List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($monday1_queue as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                                <!-- end of 1 -->

                                  </div>
                    </div>
                <div class="col-lg-4">
                </div>
            </div>
        </div>

        {{--Schdeule Timetable End--}}

    </div>
    <!-- /.container -->
</div>
<!--schedule-area end-->

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
