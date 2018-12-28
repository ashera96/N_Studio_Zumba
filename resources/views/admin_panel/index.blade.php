@extends('layouts.admin_app');

@section('content')


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

                    <!-- Website Overview -->
                    <div class="panel panel-default">
                        {{--<div class="panel-heading main-color-bg">--}}
                            {{--<h3 class="panel-title">Employees Overview</h3>--}}

                        {{--</div>--}}
                        <div style="float: right; padding-right: 50px; padding-bottom: 20px;">
                            <a href="{{url('/admin/receptionist/create')}}"><button class="addbtn btn btn-primary">ADD</button></a>
                        </div>
                    </div>
                    <!-- Latest Users -->
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
    <!--Admin dashboard-area end-->
    </div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection

