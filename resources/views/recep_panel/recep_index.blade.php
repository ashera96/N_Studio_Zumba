@extends('layouts.admin_app');

@section('content');


@extends('layouts.hori_sidebar');

<!--Admin dashboard-area start-->
<div class="about-area pad90">
    <div class="container-fluid">

        <div class="row">
            @extends('layouts.recep_vertical_sidebar');


            <div class="col-lg-10 col-md-9 mar30">

                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                    </div>
                    <h3>Update Profile</h3>
                    <p>Profile Settings</p>
                </div>



                @if (session('msgr2'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('msgr2') }}
                    </div>
            @endif





            <!-- Website Overview -->
                <div class="panel panel-default">
                    {{--<div class="panel-heading main-color-bg">--}}
                    {{--<h3 class="panel-title">Employees Overview</h3>--}}

                    {{--</div>--}}



                </div>


                <!-- Cart Main Area Start Here -->
                <div class="cart-main-area  pad90">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">

                                <div class="table-content table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product-thumbnail">Name</th>
                                            <th class="product-name">Email</th>
                                            <th class="product-price">NIC</th>
                                            <th class="product-quantity">DOB</th>
                                            <th class="product-subtotal">Address</th>
                                            <th class="product-remove">Phone</th>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receptionists as $receptionist)
                                            <tr>

                                                <td class="product-subtotal">{{ $receptionist->name }}</td>
                                                <td class="product-subtotal">{{ $receptionist->email }}</td>
                                                <td class="product-subtotal">{{ $receptionist->nic }}</td>
                                                <td class="product-subtotal">{{ $receptionist->dob }}</td>
                                                <td class="product-subtotal">{{ $receptionist->address }}</td>
                                                <td class="product-subtotal">{{ $receptionist->tpno }}</td>

                                                <!-- <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td> -->

                                                <td class="product-subtotal">

                                                    <a href="{{url('recep/profile/'.$receptionist->id.'/edit')}}"><button class="editbtn" >EDIT</button></a>

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
                <!-- Cart Main Area End Here -->




            </div>
        </div>
    </div>
    <!--Admin dashboard-area end-->
</div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection

