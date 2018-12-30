@extends('layouts.admin_app')

@section('content')


    <!-- /.header start -->
    @extends('layouts.hori_sidebar');
    <!--header end-->


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                @extends('layouts.vertical_sidebar');
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 mar30">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Dashboard</h3>
                        <p>Manage N Studio Zumba</p>
                    </div>

                    <!-- Website overview start -->
                    <div class="row">
                        <div class="card overview-block pad30 rounded">
                            <div class="card-header rounded mr-1 ml-1">Website Overview</div>
                            <div class="row card-body">
                                <div class="card-deck">
                                    <div class="card rounded">
                                        <div class="card-body">
                                            <h1 class="card-title mr-2 mb-0 text-dark text-center"><i class="fa fa-users fa-lg pad30"></i> 54</h1>
                                            <h4 class="card-text text-center text-dark">Active Users</h4>
                                        </div>
                                    </div>
                                    <div class="card rounded">
                                        <div class="card-body">
                                            <h1 class="card-title mr-2 mb-0 text-dark text-center"><i class="fa fa-eye-slash fa-lg pad30"></i> 12</h1>
                                            <h4 class="card-text text-center text-dark">Inactive Users</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Website overview end -->

                    <!-- Latest users start -->
                    <div class="row mb-0">
                        <div class="card overview-block pad30 rounded">
                            <div class="card-header rounded mr-1 ml-1">Latest Online Users</div>
                            <div class="row card-body">
                                <table class="table table-striped table-hover">
                                    <tr class="text-dark">
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Joined</th>
                                    </tr>
                                    <tr>
                                        <td>Anushka</td>
                                        <td>anu@gmail.com</td>
                                        <td>Jan 18, 2018</td>
                                    </tr>
                                    <tr>
                                        <td>Shreya</td>
                                        <td>shreya@gmail.com</td>
                                        <td>June 6, 2017</td>
                                    </tr>
                                    <tr>
                                        <td>Jyothika</td>
                                        <td>jo@gmail.com</td>
                                        <td>Dec 28, 2015</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Latest users end -->

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
