<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agies Cake Daily Sales PDF</title>
</head>
<body>
    <div class="container mt-5">
    <h2 class="text-center mb-3">Agies Cakes</h2>
        <h2 class="text-center mb-3">Monthly Sales {{ date('Y') }}</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Month</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
             
                @foreach ($sales as $sale)
                <tr>
                    <th scope="row">{{ date("F", mktime(0, 0, 0, $sale->month, 10)) }}</th>
                    <td>
                        P{{ $sale->total }}<br>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</body>
</html>