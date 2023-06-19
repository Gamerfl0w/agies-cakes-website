<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daily Sales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
    <script defer src="{{ mix('js/app.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body style="background: #460C68">
        <div class="flex justify-center items-center flex-col py-8 gap-10 flex-wrap text-white">
            <div class="flex gap-5 sm:gap-10">
                <p class="text-2xl sm:text-5xl">Daily Sales</p>
                <a href="/monthly-sales" class="hover:opacity-70 text-white font-bold py-2 px-4 rounded" style="background: #a01da0;">
                    Monthly Sales
                </a>
            </div>

            @if($orders->isEmpty())
                <h1 class="text-2xl">No Data</h1>
            @else
                @foreach ($orders as $order)
                    
                    <main class="w-4/5 md:w-3/5 h-auto  text-white">            
                        <div class="flex flex-row justify-between rounded-lg" style="background: #CB1C8D">
                            <div class="flex flex-col px-8 py-8 text-base sm:text-xl lg:text-2xl flex-wrap">
                                <p>Name: {{ $order->name }}</p>
                                Orders: 
                            @foreach (json_decode($order->cart) as $item)
                                    <p>{{ $item->name ?? '' }}<br></p>
                                    @endforeach         
                            </div>
                            <div class="w-20 sm:w-32 py-8 flex flex-col justify-center items-center flex-shrink-0 text-sm sm:text-xl lg:text-2xl bg-pink-700 rounded-r-lg">
                                <p>Total</p>
                                <p class="font-bold">P{{ $order->total }}</p>
                            </div>
                        </div>
                    </main>
                @endforeach
                <a href="/daily-sales/pdf/download" class="absolute shadow-lg right-2 bottom-4 flex justify-center items-center w-20 h-20 rounded-full bg-pink-500 cursor-pointer">
                    <i class="fa-regular fa-floppy-disk text-4xl"></i>
                </a>
            @endif
            <div class="text-2xl font-bold text-center">
                <p>Total sales today:</p>
                <p>P{{$total}}</p>
            </div>
        </div>
   
</body>
</html>