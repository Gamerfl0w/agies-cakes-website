<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rejected</title>
</head>

<body style="text-align: center">

    <img src="{{ $message->embed(public_path().'/mail/remove.png') }}" width='100' height='100' alt="">           
    <h1 style="font-weight: bold">Order Rejected</h1>
    <h2>Reason: {{ $reason }}</h2>

</body>
</html>

