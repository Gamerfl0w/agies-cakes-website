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
            <li class="mb-3"><a href="/dashboard">Dashboard</a></li>
            <li class="mb-3"><a href="/user">Users</a></li>
            <li class="mb-3 underline decoration-solid"><a href="/admin-product">Products</a></li>
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
          <li class="mb-3"><a href="/dashboard">Dashboard</a></li>
          <li class="mb-3"><a href="/user">Users</a></li>
          <li class="mb-3 underline decoration-solid"><a href="/admin-product">Products</a></li>
          <li class="mb-3"><a href="/order">Orders</a></li>
          <li class="mb-3"><a href="https://business.facebook.com/latest/inbox/all" target="_blank" rel="noopener noreferrer">Messages</a></li>
          <li class="mb-3"><a href="/admin/testimonials">Testimonials</a></li>
          <li class="mb-3"><a href="{{ route('questions.index') }}">FAQs</a></li>
        </ul>
      </div>
    </nav>

    <main class="flex flex-1 flex-wrap justify-around content-start gap-5 ">
      <div class="container px-6 mx-auto grid">
        <h2
          class="my-6 text-center text-3xl font-semibold text-white dark:text-gray-200"
        >
          Products Table
        </h2>
        <a href="{{ route('admin.addform') }}" class="text-center hover:opacity-70 text-white font-bold py-2 px-4 rounded-t-lg" style="background: #F56EB3;">Add Product</a>
        <a href="{{ URL::to('/products/pdf/download') }}" class="text-center text-white hover:opacity-70 font-bold py-2 px-4" style="background: #CB1C8D;">Export to PDF</a>
        <!-- New Table -->
        <div class="w-full overflow-hidden shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr
                  class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" style="background: #702576"
                >
                  <th class="px-4 py-3">Name</th>
                  <th class="px-4 py-3">Price</th>
                  <th class="px-8 py-3">Actions</th>
                </tr>
              </thead>
              @foreach ($products as $product)
              <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
              >
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-lg">
                      <!-- Avatar with inset shadow -->
                      <div
                        class="relative hidden w-20 h-20 mr-3 rounded md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded"
                          src="{{ asset('/storage/'.$product->image) }}"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded shadow-inner"
                          aria-hidden="true"
                        ></div>
                      </div>
                      <div>
                        <p class="font-semibold">{{ $product->name }}</p>
                      </div>
                    </div>
                  </td>
                  {{-- @foreach ($order->cart->items as $item)
                  <td class="px-4 font-semibold py-3 text-sm">
                    P {{ $item['price'] }}
                  </td>
                  @endforeach --}}
                  <td class="px-4 font-semibold py-3 text-lg">
                    P {{ $product->price }}
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <a href="{{ route('product.editform',['id'=>$product->id]) }}"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Edit"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                          ></path>
                        </svg>
                      </a>
                      <a href="{{ route('product.remove',['id'=>$product->id]) }}"
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                        aria-label="Delete"
                      >
                        <svg
                          class="w-5 h-5"
                          aria-hidden="true"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path
                            fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd"
                          ></path>
                        </svg>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <div class="flex justify-center gap-6 my-6 text-white">
            @if ($products->onFirstPage())
          
            @else
              <a href="{{ $products->previousPageUrl() }}">
                < Previous
              </a>
            @endif
            @if ($products->hasMorePages())
              <a href="{{ $products->nextPageUrl() }}">
                Next >
              </a>   
            @else
             
            @endif
          </div>
    </main>
    <a href="{{ route('export-products') }}" class="fixed shadow-lg right-2 bottom-4 flex justify-center items-center w-20 h-20 rounded-full bg-pink-500 cursor-pointer">
                    <i class="fa-regular fa-floppy-disk text-4xl text-white"></i>
          </a>
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
