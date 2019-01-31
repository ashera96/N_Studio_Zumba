@extends('layouts.admin_app');

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

        .nav-tabs .nav-item li > a {
            text-transform: capitalize;
            color: #fc328a;
            transition: background-color .2s, color .2s;
        }

        .nav-tabs .nav-item li > a:hover {
            text-transform: capitalize;
            color: #fc328a;
            transition: background-color .2s, color .2s;
        }

        .nav-tabs .nav-item li > a:focus {
            text-transform: capitalize;
            color: #fc328a;
            transition: background-color .2s, color .2s;
            /*background-color: #333;*/
        }


        .nav-tabs .nav-item li.active > a {
            background-color: #fc328a;
            color: white;
        }
    </style>

    @extends('layouts.hori_sidebar');


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                @extends('layouts.vertical_sidebar');

                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">
                    <!-- Website Overview -->


                    @if (session('msga'))
                        <div class="alert alert-success fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msga') }}
                        </div>
                    @endif

                    @if (session('msgf'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgf') }}
                        </div>
                    @endif

                    @if (session('msgc'))
                        <div class="alert alert-success fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgc') }}
                        </div>
                    @endif

                    @if (session('msge'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msge') }}
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session('msgx'))
                        <div class="alert alert-danger fs-15 ml90" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgx') }}
                        </div>
                    @endif

                    {{--@if(session('message'))--}}
                        {{--<div class="alert alert-danger fs-15 ml90" role="alert">--}}
                            {{--<button type=" button" class="close" data-dismiss="alert">x</button>--}}
                            {{--{{session('message')}}--}}
                        {{--</div>--}}
                    {{--@endif--}}


                    <div class="col-lg-10 col-md-9 offset-lg-1 offset-md-1">
                        <div class="nav nav-tabs">
                            <div class="nav-item">
                                <li class="nav-link active">
                                    <a class="nav-link " href="/admin/reports">
                                        Weight<span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            </div>
                            <div class="nav-item">
                                <li class="nav-link">
                                    <a class="nav-link " href="/admin/income_report">
                                        Income<span class="sr-only">(current)</span>
                                    </a>
                                </li>
                            </div>
                        </div>
                    </div>

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20 mt20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Weight Report</h3>
                        <p>Manage Weight Reports</p>
                    </div>


                    <div>
                        <div class="col-md-11"  style="margin-left: 100px;">
                            <div class="row mb-0">
                                <div class="card overview-block pad30 rounded">

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class = "col-md-12 text-right">

                                                <form method="post" class ="form-inline" action="{{url('admin/reports/search')}}">
                                                    @csrf

                                                    <div class="form-group" style="margin-top: -50px;">
                                                        <input type="text" class="form-control" placeholder ="Search By User Id" name="search" id="search">
                                                        <button class="btn" style="background-color: #fc328a;height: 37px;border-radius:5px;padding: 8px;" type="submit"><i class="fa fa-search" style="color: white;"></i> </button>
                                                    </div>
                                                    {{--<div class="form-group">--}}
                                                        {{--<input type="text" class="form-control" placeholder ="Search By User Id" name="search" id="search">--}}
                                                        {{--<button class="btn btn-success" type="submit"><i class="fa fa-search"></i> </button>--}}
                                                    {{--</div>--}}

                                                </form>

                                                <a href="{{url('/admin/reports/create')}}" class="btn active btn-primary float-right" style="margin-top: -60px;">ADD WEIGHT</a>
                                                {{----}}
                                {{--<div class="row float-right pad30">--}}
                                    {{--<a href="{{url('/admin/reports/create')}}" class="btn active btn-primary " style="font-size: large; height: 40px; width: 150px">ADD WEIGHT</a>--}}
                                {{--</div>--}}
                                            </div>
                                            <table class="table table-striped table-hover" width="80%"  >
                                                <thead>
                                                <tr>
                                                    <th>User Id</th>
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
                                                                    <a href="{{url('admin/reports/'.$weight ->id .'/'.$weight ->month.'/'. $weight ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                                </div>
                                                            </div>
                                                        </td>

                                                        {{--<td>--}}
                                                            {{--<div class="row">--}}
                                                                {{--<div class="col">--}}
                                                                    {{--<a href="{{url('admin/reports/'.$weight ->id .'/'.$weight ->month.'/'. $weight ->year.'/see')}}"><button class="editbtn" >VIEW</button></a>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</td>--}}

                                                        <td>
                                                            {{ Form::open(['route' => ['reports.destroy',$weight->id,$weight->month,$weight->year], 'method' => 'delete']) }}
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

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
