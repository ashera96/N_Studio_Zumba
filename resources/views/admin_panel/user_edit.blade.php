<html>
<head>
    <title>Customers</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<a href="/admin/customers" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>
<div class="container">
    <div class = "card-panel grey lighten-2"><h3 style="text-align: center ;font-family:century gothic">Customers EDIT</h3></div>


    <div class = "card-panel center">
        <div class="row">
            <form class="col s12" method="POST" action="{{ route('customers.update',$user->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" type="text" class="validate" name="name" value="{{ $user->name }}">
                        <label for="name">NAME</label>
                        @if($errors->has('name'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('name')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">home</i>
                        <input id="address" type="text" class="validate" name="address" value="{{ $user->address }}">
                        <label for="address">ADDRESS</label>
                        @if($errors->has('adddress'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('address')}}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">contact_mail</i>
                        <input id="nic" type="text" class="validate" name="nic" value="{{ $user->nic }}">
                        <label for="nic">NIC</label>
                        @if($errors->has('nic'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('nic')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">cake</i>
                        <input id="dob" type="date" class="validate" name="dob" value="{{ $user->dob }}">
                        <label for="dob">DOB</label>
                        @if($errors->has('dob'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('dob')}}</span>
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
