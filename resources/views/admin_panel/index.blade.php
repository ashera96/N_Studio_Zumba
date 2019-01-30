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

    <!--Admin dashboard-area start-->
    <div class="about-area pad90">
        <div class="container-fluid">

            <div class="row">
                @extends('layouts.vertical_sidebar');


                <div class="col-lg-10 col-md-9 mar30">

                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Receptionists</h3>
                        <p>Receptionist Management</p>
                    </div>



                    @if (session('msgr2'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgr2') }}
                        </div>
                    @endif


                    @if (session('msgr3'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            {{ session('msgr3') }}
                        </div>
                    @endif



                <!-- Website Overview -->

                        {{--<div class="panel-heading main-color-bg">--}}
                            {{--<h3 class="panel-title">Employees Overview</h3>--}}

                        {{--</div>--}}


                        <div class="bttn ">
                            <a href="{{url('/admin/receptionist/create')}}"><button name="submit" type="submit" class="btn active btn-primary float-right " >Add</button></a>
                        </div>



                    <br><br><br><br>

                    <!-- Cart Main Area Start Here
                    <div class="cart-main-area  pad90">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="table-content table-responsive">  -->
                    <div class="row mb-0">
                        <div class="card overview-block pad30 rounded" >
                            <div class="row card-body">



                                <div class="form-group" style="margin-top: -40px;">
                                    <div class="input-group">
                                        <div class="input-group-addon" style="background-color: #fc328a;color: white;height: 37px;border-radius:5px;padding: 8px;margin-right: -2px;">
                                            <i class="fa fa-search icon" style="color: white;"></i>
                                        </div>
                                        <input id="search" type="search" placeholder="Search By Name" class="form-control mb-3 fa-search" onkeyup="searchFunction()" style="max-width: 300px;">
                                    </div>
                                </div>

                                <table id="search-table" class="table table-striped table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="product-thumbnail">Name</th>
                                                    <th class="product-name">Email</th>
                                                    <th class="product-price">NIC</th>
                                                    <th class="product-quantity">DOB</th>
                                                    <th class="product-subtotal">Address</th>
                                                    <th class="product-remove">Phone</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($receptionists as $receptionist)
                                                <tr>

                                                    <td class="product-subtotal">{{ $receptionist->name }}</td>
                                                    <td class="product-subtotal text-lowercase">{{ $receptionist->email }}</td>
                                                    <td class="product-subtotal">{{ $receptionist->nic }}</td>
                                                    <td class="product-subtotal">{{ $receptionist->dob }}</td>
                                                    <td class="product-subtotal">{{ $receptionist->address }}</td>
                                                    <td class="product-subtotal">{{ $receptionist->tpno }}</td>

                                                   <!-- <td class="product-remove"><a href="#"><i class="fa fa-times"></i></a></td> -->

                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <a href="{{url('admin/receptionist/'.$receptionist->id.'/edit')}}"><button class="editbtn" >EDIT</button></a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td>
                                                        @if($receptionist->status)
                                                            <button class="markactive" style="width: 50px">Active </button>
                                                        @else
                                                            <button class="markinactive" style="width: 50px">Inactive </button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if(!$receptionist->status)
                                                            <a href="markasactive/{{$receptionist->id}}"><button class="activebtn" style="width: 60px">Activate</button></a>
                                                        @else
                                                            <a href="markasnotactive/{{$receptionist->id}}" ><button class="inactivebtn" style="width: 65px">Deactivate</button></a>
                                                        @endif

                                                    </td>

                                                  <!--  <td>

                                                        <form method="POST" action=" {{--  {{route('receptionist.destroy',$receptionist->id)}}  --}}">
                                                          {{--  @csrf
                                                            @method('DELETE') --}}
                                                            <br>
                                                            <button type="submit" class="delbtn">DELETE</button>
                                                        </form>


                                                    </td>   -->


                                                </tr>

                                                @endforeach


                                                </tbody>
                                            </table>
                                {!! $receptionists->links(); !!}
                                        </div>




                                </div>

                                <br><br>

                            </div>

                        </div>
                    </div>
                    <!-- Cart Main Area End Here -->



                    ////////////////////////////////////////
                    <!-- Latest Users -->

                    ///////////////////////////////////////
                </div>
            </div>

    <!--Admin dashboard-area end-->
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

