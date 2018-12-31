@extends('layouts.admin_app');

@section('content');


    @extends('layouts.hori_sidebar');

    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">

            <div class="row">
                @extends('layouts.vertical_sidebar');


                <div class="col-lg-10 col-md-9 mar30">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Receptionists</h3>
                        <p>Receptionist Management</p>
                    </div>



                    @if (session('msgr2'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgr2') }}
                        </div>
                    @endif


                    @if (session('msgr3'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgr3') }}
                        </div>
                    @endif



                <!-- Website Overview -->
                    <div class="panel panel-default">
                        {{--<div class="panel-heading main-color-bg">--}}
                            {{--<h3 class="panel-title">Employees Overview</h3>--}}

                        {{--</div>--}}


                        <div class="bttn ">
                            <a href="{{url('/admin/receptionist/create')}}"><button name="submit" type="submit" class="btn active btn-primary float-right " >Add</button></a>
                        </div>

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
                                                    <th class="product-remove">Edit</th>
                                                    <th class="product-remove">Delete</th>
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

                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="{{url('admin/receptionist/'.$receptionist->id.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>

                                                        <form method="POST" action="{{route('receptionist.destroy',$receptionist->id)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <br>
                                                            <button type="submit" class="delbtn">DELETE</button>
                                                        </form>


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



                    ////////////////////////////////////////
                    <!-- Latest Users -->

                    ///////////////////////////////////////
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

