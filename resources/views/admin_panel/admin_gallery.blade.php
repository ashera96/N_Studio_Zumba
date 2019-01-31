@extends('layouts.admin_app');

@section('content');

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

    @extends('layouts.hori_sidebar');

    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                @extends('layouts.vertical_sidebar');
                <div class="col-lg-10 col-md-9 mainFix col-lg-offset-2 col-md-offset-3 mb60" style="margin-left: 250px;">

                    @if (session('msg_upload_success'))
                        <div class="alert alert-success fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_upload_success') }}
                        </div>

                    @endif
                    @if (session('msg_upload_fail'))
                        <div class="alert alert-danger fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_upload_fail') }}
                        </div>

                    @endif
                    @if (session('msg_upload_no'))
                        <div class="alert alert-danger fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg_upload_no') }}
                        </div>

                    @endif

                        @if (session('msgim'))
                            <div class="alert alert-success fs-15" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('msgim') }}
                            </div>

                        @endif
                        @if (session('msgdel'))
                            <div class="alert alert-success fs-15" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('msgdel') }}
                            </div>

                        @endif



                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Gallery</h3>
                        <p>Manage Gallery Uploads</p>
                    </div>


                        <div class="card mt15 shadow-lg fs-15" style="width: 700px;margin-left: 270px;">
                            <div class="card-body">
                                <div class="card-text ml-4 mr-4" style="color: #343a40">
                                    <div class="row mb-4">
                                        <div class="col-sm-6 offset-sm-3 text-center">
                                            <form action="{{ url('admin/uploading_images') }}" method="post" enctype="multipart/form-data">
                                                <label style="font-size: 16px;" class="mt-4"><h4>Select image to upload</h4></label>
                                                <input style="font-size: 16px;" class="mt-2 ml-5" type="file" name="image" id="image">
                                                @if ($errors->has('image'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('image') }}</strong>
                                                    </span>
                                                @endif
                                                <input class="btn btn-primary active mt-3" type="submit" value="Upload" name="submit">
                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <div class="col-md-6 offset-md-3">
                        <table  class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th width="250" style="color: gray">Image</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($images as $image)
                                <tr>
                                    @if($image->image)
                                        <td><img src="{{asset('uploads/' . $image->image)}}" style="height: 150px;width: 150px"/></td>
                                    @endif
                                    <td class="text-center ">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{ $image->id }}">DELETE</button>
                                        <!--modal-->
                                        <div class="modal fade" id="myModal-{{ $image->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" style="color: black">Delete Image</h4>
                                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                                    </div>

                                                    <!-- Modal body -->
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this image?</p>
                                                    </div>

                                                    <!-- Modal footer -->

                                                    <div class="modal-footer">
                                                        <div class="row">
                                                            <form method="POST" action="{{action('GalleryUploadController@destroy',$image->id)}}">
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
                        </div>
                        <div style="margin-left: 150px;">
                            {!! $images->links(); !!}
                        </div>
                        {{--<h3 style="margin-right: 200px">{!! $images->links(); !!}</h3>--}}
                    {{--<div class="gallery" style="width: 850px;margin-left: 200px">--}}
                        {{--<br><br>--}}
                        {{--<form class="uploadFormStyle" action="{{URL::to('admin/dashboard/admin_gallery')}}" method="post" enctype="multipart/form-data">--}}
                            {{--<label class="labelStyle">Select image to upload</label>--}}
                            {{--<input class="fileTypeStyle" type="file" name="file" id="file">--}}
                            {{--<input class="submitBtnStyle" type="submit" value="Upload" name="submit">--}}
                            {{--<input type="hidden" value="{{ csrf_token() }}" name="_token">--}}
                        {{--</form>--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>

@endsection


@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
