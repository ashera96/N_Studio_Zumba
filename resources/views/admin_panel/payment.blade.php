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

                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">
                    <!-- Website Overview -->

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Salary Payment</h3>
                        <p>Manage Salary Payment for Employees</p>
                    </div>


                    <!-- Displaying the list of employees start -->
                    <div class="row mb-5">
                        <div class="card overview-block pad30 rounded">

                            <div class="panel panel-default ml90">
                                <div class="panel-body">
                                    <table class="table table-striped table-hover" width="80%"  >
                                        <thead>
                                        <tr>
                                            <th class="product-thumbnail">Name</th>
                                            <th class="product-name">Email</th>
                                            <th class="product-remove">Phone</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($receptionists as $receptionist)
                                            <tr>

                                                <td class="product-subtotal">{{ $receptionist->name }}</td>
                                                <td class="product-subtotal">{{ $receptionist->email }}</td>
                                                <td class="product-subtotal">{{ $receptionist->tpno }}</td>

                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="{{url('admin/receptionist/'.$receptionist->id.'/edit')}}"><button class="editbtn" >PAY</button></a>
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
                    <!-- Displaying the list of employees end -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
