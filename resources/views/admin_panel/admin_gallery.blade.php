@extends('layouts.admin_app');

@section('content');

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

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Gallery</h3>
                        <p>Manage Gallery Uploads</p>
                    </div>


                        <div class="card mt15 shadow-lg fs-15" style="width: 700px;margin-left: 280px;">
                            <div class="card-body">
                                <div class="card-text ml-4 mr-4" style="color: #343a40">
                                    <div class="row mb-4">
                                        <div class="col-sm-6 offset-sm-3 text-center">
                                            <form action="{{URL::to('admin/dashboard/admin_gallery')}}" method="post" enctype="multipart/form-data">
                                                <label style="font-size: 16px;" class="mt-4"><h4>Select image to upload</h4></label>
                                                <input style="font-size: 16px;" class="mt-2 ml-5" type="file" name="file" id="file">
                                                <input class="btn btn-primary active mt-3" type="submit" value="Upload" name="submit">
                                                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
