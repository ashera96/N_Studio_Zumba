@extends('layouts.admin_app');

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

                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">




                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Customers</h3>
                        <p>Manage Customers</p>
                    </div>


                    <!-- Customers table -->
                    <div class="panel panel-default">


                    </div>

                    <div class="panel panel-default" style="margin-left: 70px;">
                        <div class="panel-body">
                            <table class="table thread-dark" width="80%"  >
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
                                                    <a href="{{url('admin/customers/'.$user->id.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form method="POST" {{--action="{{route('user.destroy',$user->id)}}"--}}>
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
