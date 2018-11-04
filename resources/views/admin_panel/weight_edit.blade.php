<html>
<head>
    <title>Reports</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<a href="/admin/reports" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Back</a>
<div class="container">
    <div class = "card-panel grey lighten-2"><h3 style="text-align: center ;font-family:century gothic">Weights EDIT</h3></div>


    <div class = "card-panel center">
        <div class="row">
            <form class="col s12" method="POST" {{--action="{{ route('reports.update',$user->id) }}"--}}>
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="id" type="text" class="validate" name="id" {{--value="{{ $weight->id }}"--}}>
                        <label for="id">ID</label>
                        @if($errors->has('id'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('id')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="month" type="text" class="validate" name="month" {{--value="{{ $weight->month }}"--}}>
                        <label for="month">MONTH</label>
                        @if($errors->has('month'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('month')}}</span>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s6">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="year" type="text" class="validate" name="year" {{--value="{{ $weight->year }}"--}}>
                        <label for="year">YEAR</label>
                        @if($errors->has('year'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('year')}}</span>
                        @endif
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix">cake</i>
                        <input id="user_weight" type="date" class="validate" name="user_weight" {{--value="{{ $weight-> user_weight }}"--}}>
                        <label for="user_weight">WEIGHT</label>
                        @if($errors->has('user_weight'))
                            <span class="form-text invalid-feedback"  style="color: red">{{$errors->first('user_weight')}}</span>
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
