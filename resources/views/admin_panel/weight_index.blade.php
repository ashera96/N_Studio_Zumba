@extends('layouts.admin_app');

@section('content')

    @extends('layouts.hori_sidebar');


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                @extends('layouts.vertical_sidebar');

                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">
                    <!-- Website Overview -->

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Weight Reports</h3>
                        <p>Manage Weights Reports</p>
                    </div>


                    <div class="col-lg-10 col-md-9 pad30" style="margin-left: 140px">
                    <!-- Website Overview -->
                    <div class="new">
                    <div class="panel panel-default">
                        <nav class="navbar navbar-default ">
                            <div class="container">
                                <nav class="navbar navbar-expand-lg navbar-dark">
                                    <div class="container-fluid">
                                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                            <ul class="navbar-nav ml-auto">
                                                <li class="nav-item active">
                                                    <a class="nav-link " href="/admin/reports">
                                                        Weight<span class="sr-only">(current)</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link " href="/admin/reports_attendance">
                                                        Attendance<span class="sr-only">(current)</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </nav>
                    </div>
                    </div>
                    <div>
                        <br>
                        <div class="col-md-12" align="right" >
                        <div class="row mb-0">
                        <div class="card overview-block pad30 rounded">

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class = "col-md-8 text-right">

                                <form method="post" class ="form-inline" action="{{url('admin/reports/search')}}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder ="Enter data" name="search" id="search">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-search"></i> </button>
                                    </div>

                                </form>

                                <div class="row float-right pad30">
                                    <a href="{{url('/admin/reports/create')}}" class="btn active btn-primary " style="font-size: large; height: 40px; width: 150px">ADD WEIGHT</a>
                                </div>
                            </div>
                            <table class="table table-striped table-hover" width="80%"  >
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
                                                    <a href="{{url('admin/reports/'.$weight ->id .'/'.$weight ->month.'/'. $weight ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="row">
                                                <div class="col">
                                                    <a href="{{url('admin/reports/'.$weight ->id .'/'.$weight ->month.'/'. $weight ->year.'/see')}}"><button class="editbtn" >VIEW</button></a>
                                                </div>
                                            </div>
                                        </td>

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
    </div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
