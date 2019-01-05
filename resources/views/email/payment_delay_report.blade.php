<html>
<head>
    <style>
        p{
            color : black;
        }
    </style>

</head>
<body>
    <p> List of customers who have not settled the  payment for the month of {{ now()->format('F') }}!</p>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @for($i=0;$i<count($name);$i++)
                <tr>
                    <td>{{ $name[$i] }}</td>
                    <td>{{ $amount[$i] }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</body>
</html>
