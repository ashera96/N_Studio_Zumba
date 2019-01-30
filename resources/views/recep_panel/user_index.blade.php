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
                            <div class="row card-body">


                                <div class="form-group" style="margin-top: -50px;">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="background-color: #fc328a;color: white;height: 38px;border-radius:5px;padding: 8px;margin-right: -2px;">
                                            <i class="fa fa-search icon" style="color: white;"></i>
                                        </div>
                                        <input id="search" type="search" placeholder="Search By Name" class="form-control mb-3 fa-search" onkeyup="searchFunction()" style="max-width: 300px;">
                                    </div>
                                </div>


                                <table id="search-table" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th></th>
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

    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("search-table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
