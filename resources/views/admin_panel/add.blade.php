<html>
<head>
    <title>Employees</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="{{ asset('js/RealtimeValidation.js') }}" defer></script>
    <link href="{{ asset('css/RealtimeValid.css') }}" rel="stylesheet">
</head>
<body>

<a href="/receptionist" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>
<div class="container">

    <div class = "card-panel grey lighten-2"><h3 style="text-align: center ;font-family:century gothic">Employees Add</h3></div>


    <div class = "card-panel center">
        <div class="row">


            <form class="col s12" method="POST" action="{{url('/receptionist')}}">

                @csrf
                <div class="alert-danger">
                    @if(count($errors)>0)
                        @foreach($errors->all() as $error)
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    @endif
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" type="text" class="validate" name="name">
                        <!--<input id="name" type="text"  placeholder="Enter name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>  -->

                        <label for="name">Name</label>
                        @if($errors->has('name'))
                            <small class="form-text invalid-feedback">{{$errors->first('name')}}</small>
                        @endif

                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="tel" class="validate" name="email">
                        <label for="email">Email</label>

                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">contact_mail</i>
                        <input id="nic" type="text" class="validate" name="nic">
                        <label for="nic">NIC</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">cake</i>
                        <input id="dob" type="date" class="validate" name="dob">
                        <label for="dob">DOB</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">home</i>
                        <input id="address" type="text" class="validate" name="address">
                        <label for="address">Address</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input id="tpno" type="tel" class="validate" name="tpno">
                        <label for="tpno">TPno</label>
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