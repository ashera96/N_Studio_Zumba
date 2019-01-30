@extends('layouts.recep_app');

@section('content')

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


    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">
            <div class="row">
                <!--Sidebar-area start-->
                @extends('layouts.recep_vertical_sidebar');
                <!--Sidebar-area end-->

                <div class="col-lg-10 col-md-9 pad30 col-lg-offset-2 col-md-offset-3 mainFix">
                    <!-- Website Overview -->

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Payment Management</h3>
                        <p>Manage Registration Fees</p>
                    </div>


                    <!-- Latest Users -->
                    <div class="row mb-0">
                        <div class="card overview-block pad30 rounded">

                            <div class="panel panel-default ml90">
                                <div class="panel-body">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon" style="background-color: #fc328a;color: white;height: 38px;border-radius:5px;padding: 8px;margin-right: -2px;">
                                                <i class="fa fa-search icon" style="color: white;"></i>
                                            </div>
                                            <input id="search" type="search" placeholder="Search By Name" class="form-control mb-3 fa-search" onkeyup="searchFunction()" style="max-width: 300px;">
                                        </div>
                                    </div>
                                    
                                    <table id="search-table" class="table table-striped table-hover" width="80%" >
                                        <thead>
                                        <tr>
                                            <th>Name</th>

                                            <th>Email</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>

                                                <td class="text-lowercase">{{ $user->email }}</td>


                                                <td>
                                                    @if($user->regstatus)
                                                        <button class="markactive">Paid</button>
                                                    @else
                                                        <button class="markinactive">Not Paid</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(!$user->regstatus)
                                                        <a href="markpay/{{$user->id}}"><button class="activebtn">Pay</button></a>
                                                    @else
                                                        <a href="markrefund/{{$user->id}}" ><button class="inactivebtn">Undo</button></a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                <br><br>
                                   {{$users->links()}}
                                </div>
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.getElementById("search-table");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endsection

@section('js_styling')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ URL::asset('js/dashboard-js/bootstrap.min.js') }}"></script>
@endsection
