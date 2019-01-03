@extends('layouts.admin_app');

@section('content');

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

                <div class="col-lg-10 col-md-9 mainFix col-lg-offset-2 col-md-offset-3">

                    @if (session('msg_created'))
                        <div class="alert alert-success ml90 fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_created') }}
                        </div>
                    @endif

                    @if (session('msg_updated'))
                        <div class="alert alert-success ml90 fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_updated') }}
                        </div>
                    @endif

                    @if (session('msg_deleted'))
                        <div class="alert alert-success ml90 fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_deleted') }}
                        </div>
                    @endif

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Packages</h3>
                        <p>Manage Packages and Pricing Plans</p>
                    </div>

                    <!--packages area start-->
                    <div class="row float-right pad30">
                        <a href="/index/class_packages/create" class="btn active btn-primary " style="font-size: large; height: 40px; width: 150px">Add</a>
                    </div>
                    <div class="pricing-area text-center pad30 col-md-10 px-4 ml-4">
                        <div class="container">

                            <div class="row">


                                @if(count($packages)>0)
                                    @foreach($packages as $package)
                                        <div class="col-md-6">
                                            <div class="price-box">
                                                <div class="price-empty">
                                                </div>
                                                <div class="price-quantity">
                                                    <div class="qnty-box">
                                                        <div class="box-element">
                                                            <div class="admin-package">
                                                                <h5>Rs. {{$package->price}}</h5>
                                                                <p>Monthly</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-dtl">
                                                        <ul>
                                                            <li class="first-child"><h3>{{$package->name}} Package</h3></li>
                                                            <li>{{$package->services}}</li>
                                                            <li><h3>Rs. {{$package->price}}</h3></li>
                                                        </ul>
                                                        <div class="price-btn bttn">
                                                            <a href="/index/class_packages/{{$package->id}}/edit" class="btn btn-primary">Edit</a>
                                                        </div>
                                                        <div class="price-btn bttn">
                                                            <form method="POST" action="{{route('class_packages.destroy',$package->id)}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn button-delete">Delete</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    @endforeach
                                @endif


                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container -->
                    </div>
                    <!--packages area end-->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    <!--Admin dashboard-area end-->
    </div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
