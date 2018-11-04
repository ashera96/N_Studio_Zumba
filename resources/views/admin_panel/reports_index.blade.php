<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin area | Dashboard</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('favicon/logo144x144.png') }}">
    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('css/dashboard-css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/dashboard-css/style.css') }}" rel="stylesheet">
    <!-- Materil icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>
</head>

<body>
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">N Studio Zumba</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/index">Home</a></li>
                <li><a href="/index/about">About</a></li>
                <li><a href="/index/gallery">Gallery</a></li>
                <li><a href="/admin/dashboard/class_packages">Classes</a></li>
                <li><a href="/admin/dashboard/schedule">Schedules</a></li>
                <li><a href="/index/testimonials">Testimonials</a></li>
                <li><a href="/index/contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Welcome, Admin</a></li>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1><i class="material-icons prefix">settings</i> Dashboard <small>Manage your site</small></h1>
            </div>




        </div>
    </div>
</header>

<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Reports</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="/admin/dashboard" class="list-group-item  ">

                        <i class="material-icons prefix ">settings</i> Dashboard
                    </a>

                    <a href="/admin/receptionist" class="list-group-item  "><i class="material-icons prefix">perm_identity</i> Receptionist<span class="badge">1</span></a>
                    <a href="/admin/customers" class="list-group-item "><i class="material-icons prefix">person</i> Customers<span class="badge">66</span></a>
                    <a href="users.html" class="list-group-item"><i class="material-icons prefix">notifications</i> Notifications<span class="badge">5</span></a>
                    <a href="posts.html" class="list-group-item"><i class="material-icons prefix">attach_money</i> Payments<span class="badge">56</span></a>
                    <a href="/admin/reports" class="list-group-item active main-color-bg"><i class="material-icons prefix">file_copy</i> Reports<span class="badge">10</span></a>

                </div>
                <div class="well">
                    <h4>Disk Space Used</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                            60%
                        </div>
                    </div>
                    <h4>Bandwidth Used</h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                            40%
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <!-- Website Overview -->
                <div class="panel panel-default">
                        <nav class="navbar navbar-default ">
                            <div class="container">
                                <div id="navbar" class="collapse navbar-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="/admin/reports">Weight</a></li>
                                        <li><a href="/admin/reports_attendance">Attendance</a></li>

                                    </ul>

                                </div><!--/.nav-collapse -->
                            </div>
                        </nav>
                </div>
                <div>
                    <div class="col-md-4">
                        <div style="float: right;" >
                            <a href="{{url('/admin/reports/create')}}"><button class="addbtnnew">ADD WEIGHT</button></a>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h2>Hoii</h2>
                    </div>

                </div>

            </div>

        </div>
    </div>
</section>

<footer id="footer">
    <p>Copyright © <span>N Studio Zumba.</span> All Rights Reserved</p>
</footer>

<!-- Modals -->

<!-- Add Page -->
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Page</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Page Title</label>
                        <input type="text" class="form-control" placeholder="Page Title">
                    </div>
                    <div class="form-group">
                        <label>Page Body</label>
                        <textarea name="editor1" class="form-control" placeholder="Page Body"></textarea>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Published
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Meta Tags</label>
                        <input type="text" class="form-control" placeholder="Add some Tags....">
                    </div>
                    <div class="form-group">
                        <label>Meta Description</label>
                        <input type="text" class="form-control" placeholder="Add some Description....">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    CKEDITOR.replace( 'editor1' );
</script>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>


</body>
</html>

