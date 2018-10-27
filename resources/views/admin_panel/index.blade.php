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
                            <a class="nav-link " href="/dashboard/class_packages">
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

                <!--  <div class="row"> -->

                <div class="navbar-header">




                    <div class=" col-md-2 ">
                        <nav class=" menu-sidebar d-none d-lg-block bg-dark  " >
                            <!-- col-md-4 d-none d-md-block bg-dark sidebar-->
                            <div   class="collapse navbar-collapse" id="navbarNavDropdown">

                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/admin/dashboard">
                                            <span data-feather="home"></span>
                                            DASHBOARD <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                    <li class="nav-item active">
                                        <a class="nav-link " href="/receptionist">
                                            <span data-feather="user"></span>
                                            RECEPTIONIST
                                        </a>
                                    </li>

                                    <li class="nav-item">
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
                                <div style="float: right">

                                    <a class=" btn  button-add " href="{{url('/admin/receptionist/create')}}"><i class="fa fa-plus-circle" style="font-size:48px;"></i></a>
                                </div>
                                <br>
                            <table class="table table-dark" width="80%" height="50%" >
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>NIC</th>
                                    <th>DOB</th>
                                    <th>Address</th>
                                    <th>TPno</th>
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
                                            <div class="row"><div class="col">
                                                    <a href="{{url('admin/receptionist/'.$receptionist->id.'/edit')}}"><button class="btn button-edit">Edit</button></a>
                                                </div>
                                                <div class="col">
                                                    <form method="POST" action="{{route('receptionist.destroy',$receptionist->id)}}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn button-delete">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!--<div class=" col-md-6 col-lg-8" style="background-color:#FF1493;"> -->
                        </div>
                    </div>

    </header>


    <!--  <div class="container">
          <div class="row">
              <div class="col-md-2">left side</div>
              <div class="col-md-8">middle</div>
              <div class="col-md-2">right side</div>
          </div>
      </div>  -->































    <!-- <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


         </div>

         <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>


     </main>
     </div>
     </div> -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>

    <!-- Icons
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

    Graphs
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script> -->
