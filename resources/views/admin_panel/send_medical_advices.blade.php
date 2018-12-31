@extends('layouts.admin_app')

@section('content')

    <!-- /.header start -->
    <style>
        .pagination > li > a,
        .pagination > li > span {
            background: none !important;
            border: none !important;
            color: deeppink !important;
        }
        .pagination > li > a:hover,
        .pagination > li > a:focus,
        .pagination > li > span:hover,
        .pagination > li > span:focus,
        .pagination > li.active > a,
        .pagination > li.active > span {
            color: #000 !important;
        }
    </style>

    <header class="header fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/home"><img src="{{ URL::asset('images/logo/nav_logo.png') }}"  alt="N_Studio_Zumba_Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link " href="/home">
                                home<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/index/about">
                                about<span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/admin/dashboard/admin_gallery">
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
    <br><br><br><br>
    @if (session('msg1'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('msg1') }}
        </div>
    @endif
    @if (session('msg2'))
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('msg2') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table thread-dark" width="100%" >
                <thead>
                <tr>
                    <th width="250">Username</th>
                    <th width="300">E-mail</th>
                    <th width="450">Medical Issue</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($medical_issues as $medical_issue)
                    <tr>
                        <td>{{ $medical_issue->username }}</td>
                        <td>{{ $medical_issue->email }}</td>
                        <td>{{ $medical_issue->medicissue }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" style="background-color: #5c9ccc;border: none;" data-toggle="modal" data-target="#myModal-{{ $medical_issue->id }}">
                                Send Medical Advice
                            </button>
                            <!--modal-->
                            <div class="modal fade" id="myModal-{{ $medical_issue->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content" style="height: 300px;background-color: lightyellow">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="color: deeppink">Send Medical Advice</h4>
                                            <button type="button" class="close" style="color: deeppink" data-dismiss="modal">×</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style="color: black">
                                            <form method="POST" action="{{ url('admin/create_medical_advice') }}"  aria-label="{{ __('Send_Health_Advice') }}">
                                                {{csrf_field()}}
                                                <div class="form-horizontal">
                                                    <div>
                                                        <!--take  hidden input-->
                                                        <input type="hidden" name="email_data" value={{$medical_issue->email}} >
                                                        <input type="hidden" name="id_data" value={{$medical_issue->id}} >
                                                        <!-- done -->
                                                        <textarea id="advice" type="text" style="height: 150px;background-color: lightyellow"  class="form-control{{ $errors->has('advice') ? ' is-invalid' : '' }}" placeholder="Medical Advice" name="advice" required autofocus>{{ old('advice') }}</textarea>
                                                        <br>
                                                        @if ($errors->has('advice'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>Medical Advice maximum length exceeded !</strong>
                                                             </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-horizontal">
                                                            <button type="submit" class="btn btn-primary" style="background-color: deeppink;border:none;margin-left: 200px" id="create1">
                                                                {{ __('Send') }}
                                                            </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $medical_issues->links(); !!}
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
