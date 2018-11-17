@extends('layouts.admin_app')

@section('content')

<!-- /.header start -->
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
@if (session('message'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('message') }}
    </div>
@endif

@if (session('msgupdt'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('msgupdt') }}
    </div>
@endif

@if (session('msght'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('msght') }}
    </div>
@endif

@if (session('msgn'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('msgn') }}
    </div>
@endif

@if (session('msgpst'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">×</button>
        {{ session('msgpst') }}
    </div>
@endif

<div class="container">
    <!-- form for health tips notification-->
    <form method="POST" action="{{ url('admin/create_health_tips') }}"  aria-label="{{ __('Create_Notifications') }}">
        {{csrf_field()}}
        <div class="section-title text-center">
            <div class="title-bar full-width mb20">
                <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
            </div>
            <h3 style="font-size: medium;color: #d9534f">Health Tip Notifications</h3>
        </div>
        <br>
        <div class="form-group row" style="margin-left: 250px">
            <div class="col-md-8">
                <textarea id="healthtips" type="text"  class="form-control{{ $errors->has('healthtips') ? ' is-invalid' : '' }}" placeholder="Health Tips" name="healthtips" required autofocus>{{ old('healthtips') }}</textarea>
                <br>
                @if ($errors->has('healthtips'))
                    <span class="invalid-feedback" role="alert">
                        <strong>HealthTip Notification maximum length exceeded !</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" style="background-color: deeppink;border:none" id="create1">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- forrm for general notifications -->
<div class="container">
    <form method="POST" action="{{ url('admin/create_general_notifications') }}"  aria-label="{{ __('Create_Notifications') }}">
        {{csrf_field()}}
        <div class="section-title text-center">
            <div class="title-bar full-width mb20">
                <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
            </div>
            <h3 style="font-size: medium;color: #d9534f">General Notifications</h3>
        </div>
        <br>
        <div class="form-group row" style="margin-left: 250px">
            <div class="col-md-8">
                <textarea id="general" type="text" class="form-control{{ $errors->has('general') ? ' is-invalid' : '' }}" placeholder="General Notifications" name="general" required>{{ old('general') }}</textarea>
                <br>
                @if ($errors->has('general'))
                    <span class="invalid-feedback" role="alert">
                        <strong>General Notification maximum length exceeded !</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" style="background-color: deeppink;border:none" id="create1">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- forrm for general notification post -->
<div class="container">
    <form method="POST" action="{{ url('admin/create_post') }}"  aria-label="{{ __('Create_Notifications') }}">
        {{csrf_field()}}
        <div class="section-title text-center">
            <div class="title-bar full-width mb20">
                <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
            </div>
            <h3 style="font-size: medium;color: #d9534f">General News Posts</h3>
        </div>
        <br>

        <div class="form-group row" style="margin-left: 250px">
            <div class="col-md-8">
                <input  type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"  placeholder="Post Title"  value="{{ old('title') }}" required><br>
                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
                <textarea id="post_body" style="height: 220px" type="text" class="form-control{{ $errors->has('post_body') ? ' is-invalid' : '' }}" placeholder="Post Body" name="post_body" required>{{ old('post_body') }}</textarea>
                <br>
                @if ($errors->has('post_body'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('post_body') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" style="background-color: deeppink;border:none" id="create1">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>

        </div>
    </form>
    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table thread-dark" width="100%" >
                <thead>
                <tr>
                    <th width="250">Title</th>
                    <th width="700">Post</th>
                    <th width="100">Created at</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->post_body }}</td>
                        <td>{{ $post->updated_at }}</td>
                        <td>
                            <div class="row">
                                <div class="col">
                                    <a href="{{url('admin/create_notifications/'.$post->id.'/update')}}"><button class="editbtn" >UPDATE</button></a>
                                </div>
                            </div>
                        </td>
                        <td>
                                    <button type="button" class="delbtn" data-toggle="modal" data-target="#myModal-{{ $post->id }}">
                                        DELETE
                                    </button>
                            <!--modal-->
                            <div class="modal fade" id="myModal-{{ $post->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="color: black">Delete Post</h4>
                                            <button type="button" class="close" data-dismiss="modal">×</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body" style="color: black">
                                            <b>Are you sure you want to delete this post?</b>
                                        </div>

                                        <!-- Modal footer -->

                                        <div class="modal-footer">
                                            <form method="POST" action="{{action('PostController@destroy',$post->id)}}">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="delbtn">Yes</button>
                                            </form>
                                            <button type="button" class="delbtn" data-dismiss="modal">No</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- forrm for medical issues notifications -->

<div class="container">
    <form method="POST" action="{{ url('admin/create_general_notifications') }}"  aria-label="{{ __('Create_Notifications') }}">
        {{csrf_field()}}
        <div class="section-title text-center">
            <div class="title-bar full-width mb20">
                <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
            </div>
            <h3 style="font-size: medium;color: #d9534f">Health Advices</h3>
        </div>
        <br>
        <div class="form-group row" style="margin-left: 250px">
            <div class="col-md-8" >
                <textarea id="advice" type="text" class="form-control{{ $errors->has('advice') ? ' is-invalid' : '' }}" placeholder="Health Advice" name="advice" required>{{ old('advice') }}</textarea>
                <br>
                @if ($errors->has('advice'))
                    <span class="invalid-feedback" role="alert">
                        <strong>Health Advice maximum length exceeded !</strong>
                    </span>
                @endif
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" style="background-color: deeppink;border:none" id="create1">
                        {{ __('Send') }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>



    @endsection
