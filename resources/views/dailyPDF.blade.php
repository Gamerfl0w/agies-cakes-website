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
        <h2 class="text-center mb-3">Sales Today ({{ date('F d, Y') }})</h2>
        <h3 class="text-center mb-3">P{{ $total }}</h3>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Name</th>
                    <th scope="col">Order</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
             
                @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->name }}</th>
                    
                    <td>
                        @foreach (json_decode($order->cart) as $item)
                        {{ $item->name }}<br>
                        @endforeach
                    </td>
                   
                    <td>P{{ $order->total }}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</body>
</html>