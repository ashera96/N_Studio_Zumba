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

                    {{--Flash message for monthly table updatiion start--}}
                    @if (session('msg_updated'))
                        <div class="alert alert-success ml90 fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_updated') }}
                        </div>
                    @endif
                    {{--Flash message for monthly table updatiion end--}}


                    {{--Flash message for success in payment start--}}
                    @if (session('msg_success'))
                        <div class="alert alert-success ml90 fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_success') }}
                        </div>
                    @endif
                    {{--Flash message for success in payment end--}}

                    {{--Flash message for success in payment start--}}
                    @if (session('msg_paid'))
                        <div class="alert alert-success ml90 fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_paid') }}
                        </div>
                    @endif
                    {{--Flash message for success in payment end--}}


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

                            {{--Displaying current month and year start--}}
                            <div class="panel panel-default ml90">
                                <table class="table shadow-sm mb-5" width="50%" style="font-size: 25px;">
                                    <thead>
                                    <tr>
                                        <th class="text-center">{{ now()->format('F') }}</th> {{--Retrieving the current month--}}
                                        <th>{{ now()->year }}</th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>
                            {{--Displaying current month and year end--}}


                            {{--<div class="panel panel-default ml90">--}}
                                {{--<div class="panel-body">--}}
                                {{----}}
                                    {{--<div class="row text-center font-weight-bold mb-2" style="color: #4c5054">--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--Receptionist ID--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--Name--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-3">--}}
                                            {{--Phone--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                    {{--@foreach($eligible_receptionists as $receptionist)--}}
                                    {{--<div class="row text-center">--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<p>{{ $receptionist->receptionist_id }}</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<p>{{ $receptionist->name }}</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<p>{{ $receptionist->tpno }}</p>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--@if(in_array($receptionist->receptionist_id,$no_salary_array))--}}

                                                    {{--Code segment for the stripe payment start--}}
                                                    {{--<form action="/admin/charge" method="POST">--}}
                                                        {{--{{ csrf_field() }}--}}
                                                        {{--<input type="hidden" name="receptionist_id" value="{{$receptionist->receptionist_id}}">--}}
                                                        {{--<input type="hidden" name="amount" value="5000">--}}
                                                        {{--<script--}}
                                                                {{--src="https://checkout.stripe.com/checkout.js" class="stripe-button"--}}
                                                                {{--data-key="{{ env('STRIPE_PUB_KEY') }}"--}}
                                                                {{--data-amount="5000"--}}
                                                                {{--data-name="Salary Payment"--}}
                                                                {{--data-description="Monthly payment for the receptionist"--}}
                                                                {{--data-image="https://stripe.com/img/documentation/checkout/marketplace.png"--}}
                                                                {{--data-locale="auto"--}}
                                                                {{--data-currency="usd">--}}
                                                        {{--</script>--}}
                                                    {{--</form>--}}
                                                    {{--Code segment for the stripe payment end--}}

                                                {{--@else--}}
                                                    {{--<a href="#"><button class="btn btn-success disabled" >PAID</button></a>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}


                                    {{--</div>--}}
                                    {{--@endforeach--}}

                            <table class="table table-striped table-hover ml90" style="width: 93%;" >
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Receptionist ID</th>
                                    <th class="product-name">Name</th>
                                    <th class="product-remove">Phone</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($eligible_receptionists as $receptionist)
                                    <tr>

                                        <td class="product-subtotal">{{ $receptionist->receptionist_id }}</td>
                                        <td class="product-subtotal">{{ $receptionist->name }}</td>
                                        <td class="product-subtotal">{{ $receptionist->tpno }}</td>
                                        @if(in_array($receptionist->receptionist_id,$no_salary_array))
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#confirm-modal-{{$receptionist->receptionist_id}}">PAY</button>

                                                        <div class="modal fade" id="confirm-modal-{{$receptionist->receptionist_id}}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title" style="color: black">Confirm Payment</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                                                    </div>

                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to make the payment to {{ $receptionist->name }}?</p>
                                                                    </div>

                                                                    <!-- Modal footer -->

                                                                    <div class="modal-footer">
                                                                        <div class="row">

                                                                            <a href="{{url('admin/salary_payment/'.$receptionist->receptionist_id)}}"><button class="btn btn-danger mr-1 mr-2" style="height: 35px;">Confirm</button></a>
                                                                            <button type="button" class="btn btn-danger ml-1 mr-2" style="height: 35px;" data-dismiss="modal">Cancel</button>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </td>
                                        @else
                                            <td>
                                                <div class="row">
                                                    <div class="col">
                                                        <button class="btn btn-success disabled">PAID</button>
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
            </div>
            <!-- Displaying the list of employees end -->
        </div>
    </div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
