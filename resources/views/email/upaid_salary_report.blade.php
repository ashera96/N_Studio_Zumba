<html>
<head>
    <style>
        p{
            color : black;
        }
    </style>

</head>
<body>
<p> List of receptionists who did not receive the salary payment for the month of {{ now()->format('F') }}!</p>
<br>
<h4>Name</h4>
<ul>
    @for($i=0;$i<count($name);$i++)
        <li>{{ $name[$i] }}</li>
    @endfor
</ul>
</body>
</html>
