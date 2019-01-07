@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');

<!--<a href="/admin/receptionist" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Back</a> -->

<div class="container-fluid">
    <div class="row">
        <!--Sidebar-area start-->
        <div class="col-lg-2 col-md-3 ">
            <div class="list-group shadow-sm">
                <a href="/admin/dashboard" class="list-group-item  side-bar"><i class="fa fa-cog fa-lg mr-1"></i> Dashboard</a>
                <a href="/admin/receptionist" class="list-group-item side-bar"><i class="fa fa-user fa-lg mr-1"></i> Receptionist</a>
                <a href="/admin/customers" class="list-group-item side-bar"><i class="fa fa-users fa-lg mr-1"></i> Customers</a>
                <a href="/admin/dashboard/admin_gallery" class="list-group-item side-bar"><i class="fa fa-image fa-lg mr-1"></i> Gallery</a>
                <a href="/admin/dashboard/class_packages" class="list-group-item side-bar"><i class="fa fa-clipboard fa-lg mr-1"></i> Classes</a>
                <a href="/admin/dashboard" class="list-group-item side-bar"><i class="fa fa-calendar fa-lg mr-1"></i> Schedules</a>
                <a href="admin/create_notifications" class="list-group-item side-bar"><i class="fa fa-bell fa-lg mr-1"></i> Notifications</a>
                <a href="/admin/payments" class="list-group-item side-bar"><i class="fa fa-dollar fa-lg mr-1"></i> Payments</a>
                <a href="/admin/reports" class="list-group-item active side-bar active"><i class="fa fa-file fa-lg mr-1"></i> Reports</a>

            </div>
        </div>
        <!--Sidebar-area end-->

        <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 ">
            <div class="col-lg-10 col-md-9 mar30" style="margin-left: 140px">



                <div class="section-title text-center">
                    <div class="title-bar full-width mb20">
                        <br><br><br>
                        <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                    </div>

                    <h3>View Weight Report</h3>
                </div>




                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div class="contact-form mt20">
                            <div class="col-lg-10">
                                <div class="about-opening">
                                    <div class="opening-hours text-center">
                                        <div class="table-content table-responsive">
                                            <table>
                                                <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Category</th>
                                                    <th class="product-name">Details</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="product-subtotal">Id</td>
                                                        <td class="product-subtotal">{{$weights->id}}</td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                    <tr>
                                                        <td class="product-subtotal">Month</td>
                                                        <td class="product-subtotal">{{$weights->month}}</td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                    <tr>
                                                        <td class="product-subtotal">Year</td>
                                                        <td class="product-subtotal">{{$weights->year}}</td>
                                                    </tr>
                                                    <tr><td></td></tr>
                                                    <tr>
                                                        <td class="product-subtotal">Weight</td>
                                                        <td class="product-subtotal">{{$weights->weight }}</td>
                                                    </tr>

                                                    <tr><td></td></tr>
                                                    <tr>
                                                        <td class="product-subtotal" colspan="2">

                                                            <a href="{{url('admin/reports/'.$weights ->id .'/'.$weights ->month.'/'. $weights ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>

                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>


                                        </div>
                                    </div>

                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.col -->
</div>
@endsection
