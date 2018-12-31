<html>
<head>
    <title>Reports</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<a href="/admin/reports" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>
<div class="container">

    <div class = "card-panel grey lighten-2"><h3 style="text-align: center ;font-family:century gothic">Weights Add</h3></div>


    <div class = "card-panel center">
        <div class="row">


            <form class="col s12" method="POST" action="{{url('admin/reports')}}">

                @csrf
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif



                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                    <!--  <input id="name" type="text" class="validate" name="name" value="{{Request::old('id')}}"-->
                        <input id="id" type="text"  placeholder="Enter id" class="form-control{{ $errors->has('id') ? ' is-invalid' : '' }}" name="id" value="{{ old('id') }}" required autofocus>

                        <label for="id">Id</label>
                        @if($errors->has('id'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('id')}}</span>
                        @endif

                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                    <!--  <input id="name" type="text" class="validate" name="name" value="{{Request::old('month')}}"-->
                        <input id="month" type="text"  placeholder="Enter month" class="form-control{{ $errors->has('month') ? ' is-invalid' : '' }}" name="month" value="{{ old('month') }}" required autofocus>

                        <label for="month">Month</label>
                        @if($errors->has('month'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('month')}}</span>
                        @endif

                    </div>
                    {{--<div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <select name="month" id="month" type="text"  placeholder="Enter month" class="form-control">
                            <option value="0">Select a Category</option>
                            <option value="1">Laravel</option>
                            <option value="2">Zend Framework</option>
                            <option value="3">CakePHP</option>
                            <option value="4">PHP</option>
                        </select>
                        <label for="month">Month</label>
                        @if($errors->has('month'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('month')}}</span>
                        @endif

                    </div>--}}

                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">contact_mail</i>
                    <!--<input id="nic" type="text" class="validate" name="nic" value="{{Request::old('year')}}">-->
                        <input id="year" type="text"  placeholder="Enter year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" required autofocus>

                        <label for="year">Year</label>
                        @if($errors->has('year'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('year')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">cake</i>
                    <!--<input id="dob" type="date" class="validate" name="dob" value="{{Request::old('weight')}}">-->
                        <input id="weight" type="text"  placeholder="Enter weight" class="form-control{{ $errors->has('weight') ? ' is-invalid' : '' }}" name="weight" value="{{ old('weight') }}" required autofocus>

                        <label for="weight">Weight</label>
                        @if($errors->has('weight'))
                            <span class="form-text invalid-feedback" style="color: red">{{$errors->first('weight')}}</span>
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
