@extends('layouts.static_app')


@section('content')

    <!-- /.header start -->
    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/index"><img height="80px" width="80px" src="{{ URL::asset('images/logo_nav.png') }}"  alt="N_Studio_Zumba_Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link " href="/index">
                                home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/about">
                                about<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/gallery">
                                gallery<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/class_packages">
                                classes<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/schedule">
                                schedule<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/testimonials">
                                testimonials<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="/index/contact">contact</a>
                        </li>
                        <li class="nav-item d-none d-lg-inline">
                            <div class="icon-menu">
                                <ul>
                                    <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!--header end-->


    <!--main-container-->
    <div class="main-container">

    <!--main container --end-->

    <!-- page title & breadcrumbs start -->
    <div class="contact-bg page-head parallax overlay">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3>Contact Us</h3>
                    </div>
                </div>
                <!-- /.colour-service-1-->
                <div class="col-md-12">
                    <ol class="breadcrumb">
                        <li><a href="/index">home</a></li>
                        <li>।</li>
                        <li>contact</li>

                    </ol>
                </div>
                <!-- /.col -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.page-header -->
    <!-- page title & breadcrumbs end -->




    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row">

                <div class="col-lg-8"><br>
                    <div class="head-contact" align="left">
                        <h3><span>Contact Us</span></h3><br>
                    </div>

                    {!! Form::open(['url' => '/index/contact']) !!}
                    <div class="col-lg-8 form-group"><br>
                        {{Form::text('name', '',['class' => 'form-control co' , 'placeholder' => 'Enter name'])}}
                        <br>
                        {{Form::text('email', '',['class' => 'form-control', 'placeholder' => 'example@gmail.com'])}}
                        <br>
                        {{Form::text('contact', '',['class' => 'form-control' , 'placeholder' => 'Enter contact-no'])}}
                        <br>
                        {{Form::textarea('message', '', ['class' => 'form-control', 'placeholder' => 'Enter message', 'height ' => "10", 'cols' => "10", 'rows' => "5" ])}}<br>
                        {{Form::submit('Send Message',['class' => 'btn btn-primary active'])}}
                    </div>

                {!! Form::close() !!}
                </div>

                <div class="col-lg-4 d-flex flex-column address-wrap">
                     <div class="single-contact-address d-flex flex-row">
                        <div class="contact-details">
                            <div class="head-contact" align="left"><br>
                                <h3><span>Contact Info</span></h3><br>
                            </div>

                            <h5><span> 176D, Negombo Road, Rilaulla, Kandana</span></h5><br>

                            <h5>0778378162</h5>
                        </div>
                    </div>

                </div>
                @include('inc.messages')

                <br>

                <div class="col-lg-12 d-flex flex-column address-wrap">
                    <div class="head-contact" align="left"><br>
                        <h3><span>Location</span></h3><br>
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.6017395566364!2d79.89487731431873!3d7.055993994903764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2f74786e080f3%3A0xd9aad78356eed66e!2s170c+Negombo+Rd%2C+Kandana!5e0!3m2!1sen!2slk!4v1536772243066" width="1200" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <br><br>
                </div>


            </div>
        </div>
    </section>
    <!-- End contact-page Area -->

@endsection

