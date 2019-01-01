@extends('layouts.admin_app');

@section('content')

    @extends('layouts.hori_sidebar');

    <!--Admin dashboard-area start-->
    <div class="about-area pad90">

        <div class="container-fluid">
            <div class="row">
                @extends('layouts.vertical_sidebar');
                <div class="col-lg-10 col-md-9 pad30 mainFix ">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Gallery</h3>
                        <p>Manage Gallery Uploads</p>
                    </div>



                    <div class="gallery ml90">
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
