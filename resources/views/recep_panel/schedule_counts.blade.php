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
                                <div class="schdl-box1">
                                    <h5>1</h5>
                                    <h5>{{$schedule_monday[0]->type}}</h5>
                                    <p class="mb-0">{{$schedule_monday[0]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_monday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                                <div class="schdl-box1">
                                    <h5>2</h5>
                                    <h5>{{$schedule_monday[1]->type}}</h5>
                                    <p class="mb-0">{{$schedule_monday[1]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_monday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Tuesday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_tuesday)>0)
                                <div class="schdl-box1">
                                    <h5>3</h5>
                                    <h5>{{$schedule_tuesday[2]->type}}</h5>
                                    <p class="mb-0">{{$schedule_tuesday[2]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_tuesday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                                <div class="schdl-box1">
                                    <h5>4</h5>
                                    <h5>{{$schedule_tuesday[3]->type}}</h5>
                                    <p class="mb-0">{{$schedule_tuesday[3]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_tuesday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Wednesday</h3>
                    <div id="tabsJustifiedContent" class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_wednesday)>0)
                                <div class="schdl-box1">
                                    <h5>5</h5>
                                    <h5>{{$schedule_wednesday[4]->type}}</h5>
                                    <p class="mb-0">{{$schedule_wednesday[4]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_wednesday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                                <div class="schdl-box1">
                                    <h5>6</h5>
                                    <h5>{{$schedule_wednesday[5]->type}}</h5>
                                    <p class="mb-0">{{$schedule_wednesday[5]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_wednesday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Thursday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_thursday)>0)
                                <div class="schdl-box1">
                                    <h5>7</h5>
                                    <h5>{{$schedule_thursday[6]->type}}</h5>
                                    <p class="mb-0">{{$schedule_thursday[6]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_thursday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                                <div class="schdl-box1">
                                    <h5>8</h5>
                                    <h5>{{$schedule_thursday[7]->type}}</h5>
                                    <p class="mb-0">{{$schedule_thursday[7]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_thursday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Friday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_friday)>0)
                                <div class="schdl-box1">
                                    <h5>9</h5>
                                    <h5>{{$schedule_friday[8]->type}}</h5>
                                    <p class="mb-0">{{$schedule_friday[8]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_friday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                                <div class="schdl-box1">
                                    <h5>10</h5>
                                    <h5>{{$schedule_friday[9]->type}}</h5>
                                    <p class="mb-0">{{$schedule_friday[9]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_friday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{--<div col-md-1>--}}
                {{--</div>--}}
            </div>
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Saturday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_saturday)>0)
                                <div class="schdl-box1">
                                    <h5>11</h5>
                                    <h5>{{$schedule_saturday[10]->type}}</h5>
                                    <p class="mb-0">{{$schedule_saturday[10]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_saturday_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Sunday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_sunday)>0)
                                <div class="schdl-box1">
                                    <h5>12</h5>
                                    <h5>{{$schedule_sunday[11]->type}}</h5>
                                    <p class="mb-0">{{$schedule_sunday[11]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_sunday_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>
                            @endif
                        </div>
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
