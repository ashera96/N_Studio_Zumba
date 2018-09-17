
@extends('layouts.dashboard_app')

@section('content')

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
                        <li class="nav-item ">
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
                        <li class="nav-item">
                            <a class="nav-link" href="/index/contact">contact</a>
                        </li>
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('login') }}">login</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>N-Studio Zumba</title>

        <!-- Bootstrap core CSS -->
        <!--<link href="css/app.css" rel="stylesheet"> -->
        <link href="css/dash-style.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Custom styles for this template -->
        <link href="dashboard.css" rel="stylesheet">
    </head>

    <body>

    <div class="cntn"></div>
    <header class="header">
        <nav class="navbar  navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <div class ="col-md-12">
                        <div class=" col-md-2 ">
                            <nav class=" menu-sidebar d-none d-lg-block bg-dark  " >
                                <!-- col-md-4 d-none d-md-block bg-dark sidebar-->
                                <div   class="collapse navbar-collapse" id="navbarNavDropdown">

                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item ">
                                            <a class="nav-link" href="/dashboard">
                                                <span data-feather="home"></span>
                                                DASHBOARD <span class="sr-only">(current)</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="/receptionist">
                                                <span data-feather="user"></span>
                                                RECEPTIONIST
                                            </a>
                                        </li>

                                        <li class="nav-item active">
                                            <a class="nav-link" href="/customers">
                                                <span data-feather="users"></span>
                                                CUSTOMERS
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="#">
                                                <span data-feather="bell"></span>
                                                NOTIFICATIONS
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="#">
                                                <span data-feather="dollar-sign"></span>
                                                PAYMENTS
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link disabled" href="#">
                                                <span data-feather="file-text"></span>
                                                REPORTS
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>


                        <div role="main" class="col-md-10 px-4" >
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom ">
                                <div class="tabledesign">
                                    <br>
                                    <table class="table table-dark" width="80%"  >
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        @foreach($users as $user)
                                        <tbody>
                                            <tr>
                                                <td>{{$user -> name}}</td>
                                                <td>{{$user -> username}}</td>
                                                <td>{{$user -> email}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <form method="POST" {{--action="{{route('user.destroy',$user->id)}}--}}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn button-editing" style="background: #4dc0b5">Active</button>
                                                                <button type="submit" class="btn button-editing" style="background: #4dc0b5">Inactive</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <form method="POST" {{--action="{{route('user.destroy',$user->id)}}"--}}>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn button-delete">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

    </header>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    </body>
@endsection
