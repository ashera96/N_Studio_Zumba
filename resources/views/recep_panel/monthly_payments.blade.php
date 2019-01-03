@extends('layouts.recep_app');

@section('content');


@extends('layouts.hori_sidebar');

<!--Receptionist monthly payment-area start-->
<div class="about-area pad90">
    <div class="container-fluid">

        <div class="row">
            @extends('layouts.recep_vertical_sidebar');


            <div class="col-lg-10 col-md-9 mar30">

                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                    </div>
                    <h3>Monthly Payment Area</h3>
                    <p>Monthly Cash Payments Management</p>
                </div>


                <div class="row mb-0">
                    <div class="card overview-block pad30 rounded">


                        <div class="panel panel-default ml90">
                            <div class="panel-body">
                                <table class="table table-striped table-hover" width="80%"  >
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{url('admin/customers/'.$user->id.'/edit')}}"><button class="editbtn" >PAY</button></a>
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
                    <!-- /.col -->
                </div>


            </div>
        </div>
    </div>
    <!--Receptionist monthly payment-area end-->
</div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection

