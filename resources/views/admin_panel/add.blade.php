<html>
<head>
    <title>Employees</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<a href="/admin/receptionist" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>
<div class="container">

    <div class = "card-panel grey lighten-2"><h3 style="text-align: center ;font-family:century gothic">Employees Add</h3></div>


    <div class = "card-panel center">
        <div class="row">


            <form class="col s12" method="POST" action="{{url('admin/dashboard/receptionist')}}">

                @csrf
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                      <!--  <input id="name" type="text" class="validate" name="name" value="{{Request::old('name')}}"-->
                        <input id="name" type="text"  placeholder="Enter name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        <label for="name">Name</label>
                        @if($errors->has('name'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('name')}}</span>
                        @endif

                    </div>
                    <div class="input-field col s6 ">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="email"  placeholder="Enter email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                      <!--  <input id="email" type="tel" class="validate" name="email" value="{{Request::old('email')}}"> -->
                        <label for="email">Email</label>
                        @if($errors->has('email'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('email')}}</span>
                        @endif

                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">contact_mail</i>
                        <!--<input id="nic" type="text" class="validate" name="nic" value="{{Request::old('nic')}}">-->
                        <input id="nic" type="text"  placeholder="Enter nic" class="form-control{{ $errors->has('nic') ? ' is-invalid' : '' }}" name="nic" value="{{ old('nic') }}" required autofocus>

                        <label for="nic">NIC</label>
                        @if($errors->has('nic'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('nic')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">cake</i>
                       <!--<input id="dob" type="date" class="validate" name="dob" value="{{Request::old('dob')}}">-->
                        <input id="dob" type="date"  placeholder="Enter DOB" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required autofocus>

                        <label for="dob">DOB</label>
                        @if($errors->has('dob'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('dob')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">home</i>
                       <!-- <input id="address" type="text" class="validate" name="address" value="{{Request::old('address')}}"> -->
                        <input id="address" type="text"  placeholder="Enter Address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                        <label for="address">Address</label>
                        @if($errors->has('address'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('address')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <!--<input id="tpno" type="tel" class="validate" name="tpno" value="{{Request::old('tpno')}}"> -->
                        <input id="tpno" type="tel"  placeholder="Enter TP no" class="form-control{{ $errors->has('tpno') ? ' is-invalid' : '' }}" name="tpno" value="{{ old('tpno') }}" required autofocus>

                        <label for="tpno">TPno</label>
                        @if($errors->has('tpno'))
                            <span class="form-text  invalid-feedback" style="color: red">{{$errors->first('tpno')}}</span>
                        @endif
                    </div>
                </div>
                <input type="submit" name="submit" class="btn blue right" value="Save">

            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</body>
</html>
