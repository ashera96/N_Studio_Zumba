@extends('layouts.admin_app');

@section('content');
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
            border: solid 1px #707d82!important;
        }
    </style>

    <!-- /.header start -->
    @extends('layouts.hori_sidebar');
    <!--header end-->

    <!--Show posts area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row mb-0">
                <!--Sidebar-area start-->
                @extends('layouts.vertical_sidebar');
                <!--Sidebar-area end-->

                <div class="card col-lg-10 col-md-9 mainFix col-lg-offset-2 col-md-offset-3 overview-block pad30 rounded" style="margin-left: 250px;">

                    @if (session('msgupdt'))
                        <div class="alert alert-success fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgupdt') }}
                        </div>
                    @endif

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>View Posts</h3>
                    </div>

                    <!--show posts area start-->
                    <div class="pricing-area text-center pad30 col-md-10 px-4 ml-4">
                        <div class="container">
                            <div class="panel panel-default ml90">
                                <div class="panel-body">
                                    <table class="table table-striped table-hover" width="100%" >
                                        <thead>
                                            <tr>
                                                <th width="250">Title</th>
                                                <th width="600">Post</th>
                                                <th width="200">Created at</th>
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
                                                                <a href="{{url('admin/create_notifications/'.$post->id.'/update')}}"><button class="btn btn-success" >UPDATE</button></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{ $post->id }}">DELETE</button>
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
                                                                    <div class="modal-body">
                                                                        <p>Are you sure you want to delete this post?</p>
                                                                    </div>

                                                                    <!-- Modal footer -->

                                                                    <div class="modal-footer">
                                                                        <div class="row">
                                                                            <form method="POST" action="{{action('PostController@destroy',$post->id)}}">
                                                                                @csrf
                                                                                {{ method_field('DELETE') }}
                                                                                <button type="submit" class="btn btn-danger mr-1 mb-0" style="height: 35px;">Yes</button>
                                                                            </form>
                                                                            <button type="button" class="btn btn-danger ml-1 mr-2" style="height: 35px;" data-dismiss="modal">No</button>
                                                                        </div>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Show posts area end-->
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
