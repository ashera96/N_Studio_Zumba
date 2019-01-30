@extends('layouts.recep_app');

@section('content');

<!-- /.header start -->
@extends('layouts.hori_sidebar');
<!--header end-->

<!--Admin dashboard-area start-->
<!--schedule-area start-->
<div class="schedule-area parallax pad90"  style="margin-left: 140px;">
    <div class="container" style="margin-left: 150px">
        <div class="row">
            @extends('layouts.recep_vertical_sidebar');
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
                                    <p class="mb-0">Count: {{$schedule_monday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal1">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a;">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users11 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users11)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of 1 -->

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal2">
                                    <h5>2</h5>
                                    <h5>{{$schedule_monday[1]->type}}</h5>
                                    <p class="mb-0">{{$schedule_monday[1]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_monday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal2">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users12 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users12)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of 2 -->

                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Tuesday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_tuesday)>0)
                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal3">
                                    <h5>3</h5>
                                    <h5>{{$schedule_tuesday[2]->type}}</h5>
                                    <p class="mb-0">{{$schedule_tuesday[2]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_tuesday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal3">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users21 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users21)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end of 3 -->

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal4">
                                    <h5>4</h5>
                                    <h5>{{$schedule_tuesday[3]->type}}</h5>
                                    <p class="mb-0">{{$schedule_tuesday[3]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_tuesday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal4">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a;">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users22 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users22)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end of 4 -->
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Wednesday</h3>
                    <div id="tabsJustifiedContent" class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_wednesday)>0)

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal5">
                                    <h5>5</h5>
                                    <h5>{{$schedule_wednesday[4]->type}}</h5>
                                    <p class="mb-0">{{$schedule_wednesday[4]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_wednesday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal5">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users31 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users31)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end of 5 -->

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal6">
                                    <h5>6</h5>
                                    <h5>{{$schedule_wednesday[5]->type}}</h5>
                                    <p class="mb-0">{{$schedule_wednesday[5]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_wednesday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal6">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users32 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users32)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end of 6 -->
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Thursday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_thursday)>0)
                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal7">
                                    <h5>7</h5>
                                    <h5>{{$schedule_thursday[6]->type}}</h5>
                                    <p class="mb-0">{{$schedule_thursday[6]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_thursday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal7">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users41 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users41)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of 7 -->

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal8">
                                    <h5>8</h5>
                                    <h5>{{$schedule_thursday[7]->type}}</h5>
                                    <p class="mb-0">{{$schedule_thursday[7]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_thursday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal8">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users42 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users42)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end of 8 -->
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <h3 class="text-uppercase text-center pad30">Friday</h3>
                    <div class="tab-content1">
                        <div class="tab-pane1 fade active show">
                            @if(count($schedule_friday)>0)

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal9">
                                    <h5>9</h5>
                                    <h5>{{$schedule_friday[8]->type}}</h5>
                                    <p class="mb-0">{{$schedule_friday[8]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_friday1_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal9">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users51 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users51)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of 9 -->

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal10">
                                    <h5>10</h5>
                                    <h5>{{$schedule_friday[9]->type}}</h5>
                                    <p class="mb-0">{{$schedule_friday[9]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_friday2_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal10">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users52 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users52)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end of 10 -->
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

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal11">
                                    <h5>11</h5>
                                    <h5>{{$schedule_saturday[10]->type}}</h5>
                                    <p class="mb-0">{{$schedule_saturday[10]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_saturday_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal11">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users61 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users61)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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

                                <div class="schdl-box1" data-toggle="modal" data-target="#myModal12">
                                    <h5>12</h5>
                                    <h5>{{$schedule_sunday[11]->type}}</h5>
                                    <p class="mb-0">{{$schedule_sunday[11]->time_slot}}</p>
                                    <p class="mb-0">Count: {{$schedule_sunday_count->counter}}/{{$schedule_limit->client_limit}}</p>
                                </div>

                                <div class="modal fade" id="myModal12">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">

                                            <div class="modal-header">
                                                <h4 class="modal-title" style="color: #fc328a">User List</h4>
                                                <button type="button" class="close" data-dismiss="modal">×</button>
                                            </div>

                                            <div class="modal-body" style="color: black">
                                                @foreach($users62 as $u)
                                                    <li>{{$u->username}}</li>
                                                @endforeach
                                                @if(count($users62)==0)
                                                    <p>No users</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
