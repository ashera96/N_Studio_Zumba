@extends('layouts.admin_app');

@section('content')

    <!-- /.header start -->
    @extends('layouts.hori_sidebar');
    <!--header end-->


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                @extends('layouts.recep_vertical_sidebar');
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">
                    <!-- Website Overview -->

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Customers</h3>
                        <p>Manage Customers</p>
                    </div>


                    <!-- Latest Users -->

                    {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading main-color-bg">--}}
                    {{--<h3 class="panel-title">Customers Overview</h3><br>--}}
                    {{--</div>--}}
                    {{--</div>--}}

                    {{--<form method="get"  class ="form-inline" {{--action="{{route('customers.search')}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder ="Enter User id" name="search" id = "search">
                            <div class ="input-group-btn">
                                <a href="{{url('admin/customers')}}"><button class="btn btn-success" type="submit"><i class="fa fa-search"></i> </button></a>
                            </div>
                            {{--<a href="{{url('admin/weight_view')}}"><button class ="btn btn-success" type="submit">Search</button></a>
                    </div>

                    </form>--}}

                    <div class="row mb-0" style="padding-left: 50px">
                        <div class="card overview-block pad30 rounded" >
                            <div class="card-header rounded mr-1 ml-1"  style="background-color: deeppink">Customers Details</div>
                            <div class="row card-body">





                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th></th>
                                        <th>Active / Inactive</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td class="text-lowercase">{{ $user->email }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{url('recep/cusprofile/'.$user->id.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                    </div>
                                                </div>
                                            </td>
                                            {{--<td><button class="btn btn-success">Active Customer</button></td>
                                            <td><a  class="btn btn-warning">Mark as not active</a></td>--}}
                                            <td>
                                                @if($user->status)
                                                    {{--<strong>Active</strong>--}}
                                                    <button class="markactive">Active</button>
                                                @else
                                                    <button class="markinactive">Inactive</button>
                                                @endif
                                            </td>
                                            <td>
                                                @if(!$user->status)
                                                    <a href="markasactive/{{$user->id}}"><button class="activebtn">Activate</button></a>
                                                @else
                                                    <a href="markasnotactive/{{$user->id}}" ><button class="inactivebtn">Deactivate</button></a>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br><br>
                        {{$users->links()}}

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
    </div>
@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
