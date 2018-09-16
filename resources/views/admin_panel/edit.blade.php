<html>
<head>
    <title>Employees</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<a href="/receptionist" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>
<div class="container">
    <div class = "card-panel grey lighten-2"><h3 style="text-align: center ;font-family:century gothic">Employees Edit</h3></div>


    <div class = "card-panel center">
        <div class="row">
            <form class="col s12" method="POST" action="{{ route('receptionist.update',$receptionist->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" type="text" class="validate" name="name" value="{{ $receptionist->name }}">
                        <label for="name" >Name</label>
                        @if($errors->has('name'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="tel" class="validate" name="email" value="{{ $receptionist->email }}">
                        <label for="email">Email</label>
                        @if($errors->has('email'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">contact_mail</i>
                        <input id="nic" type="text" class="validate" name="nic" value="{{ $receptionist->nic }}">
                        <label for="nic">NIC</label>
                        @if($errors->has('nic'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('nic')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">cake</i>
                        <input id="dob" type="date" class="validate" name="dob" value="{{ $receptionist->dob }}">
                        <label for="dob">DOB</label>
                        @if($errors->has('dob'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('dob')}}</span>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">home</i>
                        <input id="address" type="text" class="validate" name="address" value="{{ $receptionist->address }}">
                        <label for="address">Address</label>
                        @if($errors->has('address'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('address')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">phone</i>
                        <input id="tpno" type="tel" class="validate" name="tpno" value="{{ $receptionist->tpno }}">
                        <label for="tpno">TPNO</label>
                        @if($errors->has('tpno'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('tpno')}}</span>
                        @endif
                    </div>
                </div>
                <input type="submit" name="submit" class="btn blue right" value="Update">
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</body>
</html>
