@extends('layouts.admin_app');

@section('content');

    <!-- /.header start -->
    @extends('layouts.hori_sidebar');
    <!--header end-->

    <!--Notification-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                @extends('layouts.vertical_sidebar');
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 mainFix col-lg-offset-2 col-md-offset-3">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Update Post</h3>
                    </div>

                    <!--update post area start-->
                    <div class="pricing-area text-center pad30 col-md-10 px-4 ml-4">
                        <div class="container">

                            <form method="POST" action="{{ route('post.edit',$post->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row" style="margin-left: 250px">
                                    <div class="col-md-12" >
                                        <input  type="text" id="title" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"  placeholder="Post Title" value="{{ $post->title }}"  required><br>
                                        @if ($errors->has('title'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span>
                                        @endif
                                        @if($post->image)
                                            <img src="{{asset('images/posts/' . $post->image)}}" />
                                            <br><br>
                                        @endif
                                        <label style="color: deeppink"> Upload Images: </label> <input style="color: red" type="file" name="upload_images"/>
                                        @if ($errors->has('upload_images'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('upload_images') }}</strong>
                                            </span>
                                        @endif
                                        <textarea id="post_body" type="text" style="height: 300px" class="form-control{{ $errors->has('post_body') ? ' is-invalid' : '' }}" placeholder="Post Body" name="post_body" required>{{ $post->post_body }}</textarea>
                                        <br>
                                        @if ($errors->has('post_body'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('post_body') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-3" style="margin-left: 250px">
                                            <button type="submit" class="btn active btn-primary" id="edit">
                                                {{ __('Update') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <!--update post area end-->

                </div>
            </div>
        </div>
    </div>
@endsection
