<!-- /.header start -->
<header class="header fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/index"><img height="80px" width="80px" src="{{ URL::asset('images/logo_nav.png') }}"  alt="N_Studio_Zumba_Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{Request::is('index') ? "active" : ""}}">
                        <a class="nav-link " href="/index">
                            home<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('index/about') ? "active" : ""}}">
                        <a class="nav-link " href="/index/about">
                            about<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('index/gallery') ? "active" : ""}}">
                        <a class="nav-link " href="/index/gallery">
                            gallery<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('index/class_packages') ? "active" : ""}}">
                        <a class="nav-link " href="/index/class_packages">
                            classes<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('index/schedule') ? "active" : ""}}">
                        <a class="nav-link " href="/index/schedule">
                            schedule<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('index/testimonials') ? "active" : ""}}">
                        <a class="nav-link " href="/index/testimonials">
                            testimonials<span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('index/contact') ? "active" : ""}}">
                        <a class="nav-link" href="/index/contact">contact</a>
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

