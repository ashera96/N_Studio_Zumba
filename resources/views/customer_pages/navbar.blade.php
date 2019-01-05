<!-- /.header start -->
<header class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/home"><img src={{ URL::asset('images/logo/nav_logo.png') }}  alt="N_Studio_Zumba_Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{Request::is('home') ? "active" : ""}}">
                        <a class="nav-link " href="/home">
                            home<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('home/about') ? "active" : ""}}">
                        <a class="nav-link " href="/home/about">
                            about<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('home/gallery') ? "active" : ""}}">
                        <a class="nav-link " href="/home/gallery">
                            gallery<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('home/class_packages') ? "active" : ""}}">
                        <a class="nav-link " href="/home/class_packages">
                            classes<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('home/schedule') ? "active" : ""}}">
                        <a class="nav-link " href="/home/schedule">
                            schedule<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('home/testimonials') ? "active" : ""}}">
                        <a class="nav-link " href="/home/testimonials">
                            testimonials<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('home/contact') ? "active" : ""}}">
                        <a class="nav-link" href="/home/contact">contact</a>
                    </li>
                    {{--<li class="nav-item {{Request::is('home/payment') ? "active" : ""}}">--}}
                        {{--<a class="nav-link" href="/home/payment">payment</a>--}}
                    {{--</li>--}}
                    <li class="nav-item {{Request::is('home/reports') ? "active" : ""}}">
                        <a class="nav-link" href="/home/reports">reports</a>
                    </li>
                    {{--<li class="nav-item d-none d-lg-inline">--}}
                        {{--<div class="icon-menu">--}}
                            {{--<ul>--}}
                                {{--<li><a href="#" class="search-btn search-box-btn"><i class="fa fa-search"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</li>--}}
                    <li class="nav-item d-none d-lg-inline">
                        <div class="icon-menu">
                            <ul>
                                <li><a href="#" class="search-btn search-box-btn"><i class="fa fa-bell"></i></a></li>
                            </ul>
                        </div>
                    </li>

                    {{--User name and logout button start--}}
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
                    {{--User name and logout button end--}}

                </ul>
            </div>
        </div>
    </nav>
</header>
<!--header end-->
