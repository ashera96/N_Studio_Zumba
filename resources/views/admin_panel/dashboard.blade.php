@extends('layouts.admin_app');

@section('content');


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

                <!--  Counting the no.of active customers   -->
                <?php  $countActive=0;  ?>

                @if($custs)
                    @foreach($custs as $c)
                        <?php    $countActive=$countActive+1;   ?>



                    @endforeach
                    <tr class="text-dark">
                        <?php echo '<th>'.$countActive.'</th>';    ?>

                    </tr>

                @endif

            <!--  Counting the no.of inactive customers   -->
                <?php  $totUsers=0;  ?>

                @if($users)
                    @foreach($users as $u)
                        <?php    $totUsers=$totUsers+1;   ?>




                    @endforeach
                    <tr class="text-dark">
                        <?php echo '<th>'.$totUsers.'</th>';    ?>

                    </tr>
                @endif
                <?php  $countInactive=$totUsers-$countActive;  ?>

                <div class="row">
                    <div class="card overview-block pad30 rounded">
                        <div class="card-header rounded mr-1 ml-1" style="background-color: deeppink">Website Overview</div>
                        <div class="row card-body">
                            <div class="card-deck">
                                <div class="card rounded">
                                    <div class="card-body">
                                        <h1 class="card-title mr-2 mb-0 text-dark text-center"><i class="fa fa-users fa-lg pad30"></i> <?php echo' '.$countActive.' ';?></h1>
                                        <h4 class="card-text text-center text-dark">Active Users</h4>
                                    </div>
                                </div>
                                <div class="card rounded">
                                    <div class="card-body">
                                        <h1 class="card-title mr-2 mb-0 text-dark text-center"><i class="fa fa-eye-slash fa-lg pad30"></i><?php echo' '.$countInactive.' ';?></h1>
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
                        <div class="card-header rounded mr-1 ml-1"  style="background-color: deeppink">Latest Online Users</div>
                        <div class="row card-body">





                            <table class="table table-striped table-hover">



                                <tr class="text-dark">
                                    <th>Name</th>
                                    <th>Email</th>

                                </tr>



                                @if($users)
                                    @foreach($users as $user)

                                        @if($user->isOnline())

                                            <tr class="text-dark">
                                                <th>{{$user->username}}</th>
                                                <th>{{$user->email}}</th>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endif


                            </table>


                            {{--You are logged in as a kc  Customer!--}}




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

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
