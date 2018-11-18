@extends('layouts.admin_app')

@section('content')

    <!-- /.header start -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home"><img src="{{ URL::asset('images/logo/nav_logo.png') }}"  alt="N_Studio_Zumba_Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link " href="/index">
                                home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/about">
                                about<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/admin/dashboard/admin_gallery">
                                gallery<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/schedule">
                                schedule<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/testimonials">
                                testimonials<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/index/contact">contact</a>
                        </li>

                        {{--User name and logout button start--}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        {{--User name and logout button end--}}

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header end-->


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                <div class="col-lg-2 col-md-3 sideFix" >
                    <div class="list-group shadow-sm">
                        <a href="/admin/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                        <a href="/admin/receptionist" class="list-group-item active side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                        <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                        <a href="admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                        <a href="/admin/reports" class="list-group-item side-bar"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>
                        <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                        <a href="/admin/dashboard/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                        <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                    </div>
                </div>
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 pad30 mainFix ">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Receptionist</h3>
                        <p>Manage Receptionist</p>
                    </div>


                    <div class="panel panel-default">

                        <div style="float: right;" >
                            <a href="{{url('/admin/receptionist/create')}}"><button class="addbtn  ">ADD</button></a><br><br>
                        </div>


                    </div>
                    <!-- Receptionist table-->
                    <div class="panel panel-default">

                        <div class="panel-body">



                            <table class="table thread-dark" width="80%" height="50%" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>NIC</th>
                                    <th>DOB</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($receptionists as $receptionist)
                                    <tr>
                                        <td>{{ $receptionist->name }}</td>
                                        <td>{{ $receptionist->email }}</td>
                                        <td>{{ $receptionist->nic }}</td>
                                        <td>{{ $receptionist->dob }}</td>
                                        <td>{{ $receptionist->address }}</td>
                                        <td>{{ $receptionist->tpno }}</td>
                                        <td>
                                            <div class="row"><div class="col">
                                                    <a href="{{url('admin/receptionist/'.$receptionist->id.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                </div>

                                        </td>  <td>
                                            <form method="POST" action="{{route('receptionist.destroy',$receptionist->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="delbtn">DELETE</button>
                                            </form>
                        </div>
                    </div>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>


                    ///////////////////////////

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
