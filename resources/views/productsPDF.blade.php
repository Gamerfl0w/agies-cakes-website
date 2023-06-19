<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agies Cake Products PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
    <h2 class="text-center mb-3">Agies Cakes</h2>
        <h2 class="text-center mb-3">Products</h2>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-danger">
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
             
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->name }}</th>
                    <td>{{ $product->price }}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</body>
</html>