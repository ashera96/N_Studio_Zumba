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
        }
    </style>

    <!-- /.header start -->
    @extends('layouts.hori_sidebar');
    <!--header end-->

    <!--Medical advice area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row mb-0">
                <!--Sidebar-area start-->
                @extends('layouts.vertical_sidebar');
                <!--Sidebar-area end-->

                <div class="card col-lg-10 col-md-9 mainFix col-lg-offset-2 col-md-offset-3 overview-block pad30 rounded fs-15" style="margin-left: 250px;">

                    @if (session('msg1'))
                        <div class="alert alert-success fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg1') }}
                        </div>
                    @endif
                    @if (session('msg2'))
                        <div class="alert alert-danger fs-15" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msg2') }}
                        </div>
                    @endif

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Send Medical Advices</h3>
                    </div>

                    <!--update post area start-->
                    <div class="pricing-area text-center pad30 col-md-10 px-4 ml-4">
                        <div class="container">
                            <div class="panel panel-default ml90">
                                <div class="panel-body">
                                    <table class="table table-striped table-hover" width="100%" >
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
                                                <td class="text-lowercase">{{ $medical_issue->email }}</td>
                                                <td>{{ $medical_issue->medicissue }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" style="background-color: #5c9ccc;border: none;" data-toggle="modal" data-target="#myModal-{{ $medical_issue->id }}">
                                                        Send Medical Advice
                                                    </button>
                                                    <!--modal-->
                                                    <div class="modal fade" id="myModal-{{ $medical_issue->id }}">
                                                        <div class="modal-dialog bg-white">
                                                            <div class="modal-content" style="height: 300px;background-color: lightyellow">
                                                                <!-- Modal Header -->
                                                                <div class="modal-header bg-white">
                                                                    <h4 class="modal-title bg-white" style="color: deeppink">Send Medical Advice</h4>
                                                                    <button type="button" class="close" style="color: deeppink" data-dismiss="modal">×</button>
                                                                </div>

                                                                <!-- Modal body -->
                                                                <div class="modal-body bg-white" style="color: black">
                                                                    <form method="POST" action="{{ url('admin/create_medical_advice') }}"  aria-label="{{ __('Send_Health_Advice') }}">
                                                                        {{csrf_field()}}
                                                                        <div class="form-horizontal">
                                                                            <div>
                                                                                <!--take  hidden input-->
                                                                                <input type="hidden" name="email_data" value={{$medical_issue->email}} >
                                                                                <input type="hidden" name="id_data" value={{$medical_issue->id}} >
                                                                                <!-- done -->
                                                                                <textarea id="advice" type="text" style="height: 150px;background-color: lightyellow"  class="bg-white form-control{{ $errors->has('advice') ? ' is-invalid' : '' }}" placeholder="Medical Advice" name="advice" required autofocus>{{ old('advice') }}</textarea>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Medical advice area end-->


    <br><br><br><br><br><br><br><br><br><br>
@endsection
