@extends('layouts.recep_app');

@section('content');

{{--Horizontal Sidebar start--}}
@extends('layouts.hori_sidebar');
{{--Horizontal Sidebar end--}}

<script>
    // Javascript function to refresh the page daily
    function timeRefresh(timeoutPeriod){
        setTimeout("location.reload(true);",timeoutPeriod);
    }

    // Calling the function
    window.onload = timeRefresh(86400000);//Day in milliseconds
</script>

<!--Receptionist monthly payment-area start-->
<div class="about-area pad90">
    <div class="container-fluid">

        <div class="row">

            {{--Vertical Sidebar start--}}
            @extends('layouts.recep_vertical_sidebar');
            {{--Vertical Sidebar end--}}

            <div class="col-lg-10 col-md-9 mar30 mb-5">

                {{--Flash message for success in payment start--}}
                @if (session('msg_paid'))
                    <div class="alert alert-success ml90 fs-15" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('msg_paid') }}
                    </div>
                @endif
                {{--Flash message for success in payment end--}}

                {{--Flash message for success in data refresh start--}}
                @if (session('msg_abt_refresh'))
                    <div class="alert alert-success ml90 fs-15" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('msg_abt_refresh') }}
                    </div>
                @endif
                {{--Flash message for success in data refresh end--}}

                {{--Flash message for success in payment delay list sending--}}
                @if (session('msg_to_admin'))
                    <div class="alert alert-success ml90 fs-15" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('msg_to_admin') }}
                    </div>
                @endif
                {{--Flash message for success in payment delay list sending--}}

                {{--Flash message for success in alert sending--}}
                @if (session('alert_to_delay'))
                    <div class="alert alert-success ml90 fs-15" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('alert_to_delay') }}
                    </div>
                @endif
                {{--Flash message for success in alert sending--}}


                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                    </div>
                    <h3>Monthly Payment Area</h3>
                    <p>Monthly Cash Payments Management</p>
                </div>


                <div class="row mb-0">
                    <div class="card overview-block pad30 rounded">

                        {{--Displaying current month and year start--}}
                        <div class="panel panel-default ml-5">
                            <table class="table shadow-sm mb-5" style="font-size: 25px;">
                                <thead>
                                    <tr>
                                        <th class="text-center">{{ now()->format('F') }}</th> {{--Retrieving the current month--}}
                                        <th>{{ now()->year }}</th>{{--Retrieving the current year--}}
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        {{--Displaying current month and year end--}}

                        <div class="panel panel-default ml-5">
                            <div class="panel-body">
                                <table class="table table-striped table-hover" width="80%"  >
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Amount</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->user_id }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->amount}}</td>
                                            @if(in_array($user->user_id,$not_paid_stack))
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="{{url('recep/monthly_payment/'.$user->user_id)}}"><button class="btn btn-danger" >PAY</button></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            @else
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="#"><button class="btn btn-success disabled" >PAID</button></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            @endif
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

