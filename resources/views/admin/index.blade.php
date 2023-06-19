<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

<body class="flex flex-wrap" style="background-color: #460C68;">
    <nav class="hidden md:flex h-auto shrink-0 flex-col py-10 px-10 items-center gap-5 text-white text-2xl bg-pink-600"
     >
     <a href="/">
      <img src="{{ asset('photo/agies-logo.jpg') }}" class="rounded-full h-32 w-32" alt="">
    </a>
        <p class="mb-3 px-10 py-3 rounded-2xl" style="background-color: #702576;">{{  Str::limit(auth()->user()->name, 7) }}</p>
        <ul class="mt-5">
            <li class="mb-3"><a href="/">Homepage</a></li>
            <li class="mb-3 underline decoration-solid"><a href="/dashboard">Dashboard</a></li>
            <li class="mb-3"><a href="/user">Users</a></li>
            <li class="mb-3"><a href="/admin-product">Products</a></li>
            <li class="mb-3"><a href="/order">Orders</a></li>
            <li class="mb-3"><a href="https://business.facebook.com/latest/inbox/all" target="_blank" rel="noopener noreferrer">Messages</a></li>
            <li class="mb-3"><a href="/admin/testimonials">Testimonials</a></li>   
             <li class="mb-3"><a href="{{ route('questions.index') }}">FAQs</a></li>     
        </ul>
    </nav>

    <div class="fixed z-50 right-5 top-5 flex md:hidden">
      <button class="mobile-menu-button">
        <svg
          class="w-6 h-6 text-white"
          x-show="!showMenu"
          fill="none"
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
        <path d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
    
    <nav class="mobile-menu fixed hidden w-full h-full text-white z-40 text-xl" style="background: #702576">
      <div class="flex justify-center items-center h-full text-center">
        <ul class="mt-5">
          <li class="mb-7 p-5 rounded-2xl hover:opacity-70" style="background: #CB1C8D"><a href="/">Go to Home Page</a></li>
          <li class="mb-3 underline decoration-solid"><a href="/dashboard">Dashboard</a></li>
          <li class="mb-3"><a href="/user">Users</a></li>
          <li class="mb-3"><a href="/admin-product">Products</a></li>
          <li class="mb-3"><a href="/order">Orders</a></li>
          <li class="mb-3"><a href="https://business.facebook.com/latest/inbox/all" target="_blank" rel="noopener noreferrer">Messages</a></li>
          <li class="mb-3"><a href="/admin/testimonials">Testimonials</a></li>
          <li class="mb-3"><a href="{{ route('questions.index') }}">FAQs</a></li>   
        </ul>
      </div>
    </nav>

    <main class="flex flex-1 flex-wrap justify-around content-start gap-5 p-10">
        <p class="text-white text-xl w-full font-bold mb-5">Dashboard</p>
        <a href="/user" class="flex flex-col justify-center items-center gap-1 px-16 py-3 rounded-md w-auto h-auto bg-pink-600 cursor-pointer">
            <i class="fa-solid fa-user text-white text-3xl"></i>
            <p class=" text-xl text-white">Total Users</p>
            <p class="font-bold text-2xl text-white">{{ $totaluser }}</p> 
        </a>

        <a href="/daily-sales" class="flex flex-col justify-center items-center gap-1 px-16 py-3 rounded-md w-auto h-auto bg-pink-600 cursor-pointer">
            <i class="fa-solid fa-money-check-dollar text-white text-3xl"></i>
            <p class="text-white text-xl">Sales Today</p>
            <p class="font-bold text-2xl text-white">₱ {{ $dailySales }}</p> 
        </a>

        <a href="/order" class="flex flex-col justify-center items-center gap-1 px-16 py-3 rounded-md w-auto h-auto bg-pink-600 cursor-pointer">
            <i class="fa-solid fa-cart-shopping text-white text-3xl"></i>
            <p class="text-white text-xl">Orders</p>
            <p class="font-bold text-2xl text-white">{{ $totalorder }}</p> 
        </a>

        <a href="/monthly-sales" class="flex flex-col justify-center items-center gap-1 px-16 py-3 rounded-md w-auto h-auto bg-pink-600 cursor-pointer">
            <i class="fa-solid fa-sack-dollar text-white text-3xl"></i>
            <p class="text-white text-xl">Monthly Sales</p>
            <p class="font-bold text-2xl text-white">₱ {{ $monthlySales }}</p> 
        </a>

        <div class="w-full h-auto p-5 text-white rounded-2xl mt-10" style="background-color: #CB1C8D;">
            <p class="text-xl mb-5 font-bold">Popular Products</p>
            <hr>
            @foreach ($products as $product)
            <div class="my-3">
                <p class="text-xl font-bold">{{ $product->name }}</p>
                <p class="text-xl">Bought {{ $product->popularity }} times</p>
            </div>
            <hr>
            @endforeach
        </div>

        <div class="w-full h-auto p-5 text-white rounded-2xl" style="background-color: #CB1C8D;">
            <p class="text-xl mb-5 font-bold">Notifications</p>
            <hr>
            @forelse($notifications as $notification)
            <div class="my-3">
                <p class="text-lg">[{{ \Carbon\Carbon::parse($notification->created_at)->format('F d, Y') }}]  You have a new order from <span class="font-bold">{{ $notification->data['name'] }}</span>.</p>
            </div>
            <hr>
            @empty
              <div class="my-3">
                <p class="text-lg font-bold">There are no new notifications</p>
              </div>
              <hr>
                
            @endforelse
        </div>
    </main>
</body>

<script>
	// Grab HTML Elements
	const btn = document.querySelector("button.mobile-menu-button");
	const menu = document.querySelector(".mobile-menu");

	// Add Event Listeners
	btn.addEventListener("click", () => {
	menu.classList.toggle("hidden");
	});
</script>
