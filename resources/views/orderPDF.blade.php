<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agies Cake Orders PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <h2 class="text-center mb-3">Agies Cakes</h2>
        <h2 class="text-center mb-3">Orders</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Name</th>
                    <th scope="col">Order</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
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
                   
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->phonenumber }}</td> 
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</body>
</html>