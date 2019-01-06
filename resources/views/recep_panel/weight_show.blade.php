@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');

<script src ="js/canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>


<div class="container-fluid">
    <div class="row">
        @extends('layouts.recep_vertical_sidebar');
        <div class="col-lg-10 col-md-9 mar30">
            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <br><br><br>
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>

                <h3>Show Weight</h3>
            </div>

            <div>
                <br>
                <div class="col-md-12" align="center">
                    <div class="row mb-0">
                        <div class="card overview-block pad30 rounded">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="col-md-12 text-center">
                                        @if(isset($details))
                                            <br>
                                            <h3 class="myone">The Weight Search results</h3>
                                            <br>

                                            <table class="table table-striped table-hover" width="100%"  >
                                                <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Month</th>
                                                    <th>Year</th>
                                                    <th>Weight</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($details as $weight)
                                                    <tr>
                                                        <td>{{$weight->id}}</td>
                                                        <td>{{$weight->month}}</td>
                                                        <td>{{$weight->year}}</td>
                                                        <td>{{$weight->weight}}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col">
                                                                    <a href="{{url('recep/recep_reports/'.$weight ->id .'/'.$weight ->month.'/'. $weight ->year.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ Form::open(['route' => ['recep_reports.destroy',$weight->id,$weight->month,$weight->year], 'method' => 'delete']) }}
                                                            <button type="submit" class="delbtn">Delete</button>
                                                            {{ Form::close() }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
