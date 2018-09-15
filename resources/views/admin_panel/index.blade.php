

<html>
<head>
    <title>Employees</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>N-Studio Zumba</title>

    <!-- Bootstrap core CSS -->
    <link href="css/app.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>






<div class="container">
    <div class = "card-panel grey lighten-2"><h3 style="text-align:center ;font-family:century gothic ">Employees Management</h3></div>


    <div class = "card-panel right">
        <div style="float: right">
            <a class="btn-floating btn-large waves-effect waves-light red" href="{{url('receptionist/create')}}"><i class="material-icons float-left green">add</i></a>
        </div>
        <br>
        <table class="striped" style="margin-top: 50px  ;font-family:century gothic">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>NIC</th>
                <th>DOB</th>
                <th>Address</th>
                <th>TPno</th>
                <th>Action</th>
            </tr>
            @foreach($receptionists as $receptionist)
                <tr>
                    <td>{{ $receptionist->name }}</td>
                    <td>{{ $receptionist->email }}</td>
                    <td>{{ $receptionist->nic }}</td>
                    <td>{{ $receptionist->dob }}</td>
                    <td>{{ $receptionist->address }}</td>
                    <td>{{ $receptionist->tpno }}</td>
                    <td>
                        <div class="row"><div class="col">
                                <a href="{{url('receptionist/'.$receptionist->id.'/edit')}}"><button class="btn btn-small blue">Edit</button></a>
                            </div>
                            <div class="col">
                                <form method="POST" action="{{route('receptionist.destroy',$receptionist->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-small red">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
</body>
</html>