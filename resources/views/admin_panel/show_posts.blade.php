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
    @if (session('msgupdt'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('msgupdt') }}
        </div>
    @endif
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

        {!! $posts->links(); !!}

    </div>
</div>
<br><br><br><br><br>
    @endsection
