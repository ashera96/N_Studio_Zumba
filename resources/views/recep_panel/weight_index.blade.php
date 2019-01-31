@extends('layouts.recep_app');

@section('content')

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

    @extends('layouts.hori_sidebar');


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                @extends('layouts.recep_vertical_sidebar');
                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">
                    <!-- Website Overview -->

                    @if (session('msgb'))
                        <div class="alert alert-success fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgb') }}
                        </div>
                    @endif

                    @if (session('msgff'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgff') }}
                        </div>
                    @endif

                    @if (session('msgd'))
                        <div class="alert alert-success fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgd') }}
                        </div>
                    @endif

                    @if (session('msgf'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgf') }}
                        </div>
                    @endif

                    @if (session('message2'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('message2') }}
                        </div>
                    @endif

                    @if (session('msgy'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgy') }}
                        </div>
                    @endif

                    @if(session('message3'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type=" button" class="close" data-dismiss="alert">x</button>
                            {{session('message3')}}
                        </div>
                    @endif


                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Weight Report</h3>
                        <p>Manage Weight Reports</p>
                    </div>


                    <div class="col-lg-11 col-md-9 pad30 ml90">
                        <!-- Website Overview -->
                        <div>
                            <br>

                            <div class="col-md-12" align="right" >
                                <div class="row mb-0">
                                    <div class="card overview-block pad30 rounded">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class = "col-md-12 text-right">


                                                    <form method="post" class ="form-inline" action="{{url('recep/recep_reports/search1')}}">
                                                        @csrf
                                                        <div class="form-group" style="margin-top: -150px;">
                                                            <input type="text" class="form-control" placeholder ="Search" name="search1" id="search1">
                                                            <button class="btn" style="background-color: #fc328a;height: 37px;border-radius:5px;padding: 8px;" type="submit"><i class="fa fa-search" style="color: white;"></i> </button>
                                                        </div>

                                                    </form>

                                                    <a href="{{url('/recep/recep_reports/create')}}" class="btn active btn-primary float-right" style="margin-top: -100px;">ADD WEIGHT</a>

                                                    {{--<div class="row float-right">--}}
                                                        {{--<a href="{{url('/recep/recep_reports/create')}}" class="btn active btn-primary " style="font-size: large; height: 40px; width: 150px">ADD WEIGHT</a>--}}
                                                    {{--</div>--}}

                                                </div>

                                                <table class="table table-striped table-hover"  >
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

                                                    @foreach($weights as $weight)
                                                        <tr>
                                                            <td>{{$weight->id}}</td>
                                                            <td>{{$weight->month}}</td>
                                                            <td>{{$weight->year}}</td>
                                                            <td>{{$weight->weight}}</td>
                                                            <td>
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <a href="{{url('recep/recep_reports/'.$weight ->id .'/'.$weight ->month.'/'. $weight ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td>
                                                                {{ Form::open(['route' => ['recep_reports.destroy',$weight->id,$weight->month,$weight->year], 'method' => 'delete']) }}
                                                                <button type="submit" class="delbtn">Delete</button>
                                                                {{ Form::close() }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>

                                                {{$weights->links()}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
