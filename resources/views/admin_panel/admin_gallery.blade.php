@extends('layouts.admin_app');

@section('content')

    @extends('layouts.hori_sidebar');

    <!--Admin dashboard-area start-->
    <div class="about-area pad90">

        <div class="container-fluid">
            <div class="row">
                @extends('layouts.vertical_sidebar');
                <div class="col-lg-10 col-md-9 mainFix col-lg-offset-2 col-md-offset-3 overview-block pad30 rounded" style="margin-left: 250px;">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Gallery</h3>
                        <p>Manage Gallery Uploads</p>
                    </div>



                    @if (session('msg10'))
                        <div class="alert alert-success fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg10') }}
                        </div>

                    @endif

                <!--    <div>
                        <img src="{{ URL::asset('uploads/1.png') }}">
                    </div>   -->



                    <div class="gallery">
                        <br><br>
                        <!--uploadss -->
                        <form class="uploadFormStyle" action="{{URL::to('uploadss')}}" method="post" enctype="multipart/form-data">
                            <label class="labelStyle">Select image to upload</label>
                            <input class="fileTypeStyle" type="file" name="file" id="file">
                            <input class="submitBtnStyle" type="submit" value="Upload" name="submit">
                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                        </form>
                    </div>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>

    </div>

@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
