<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="{{ mix('js/app.js') }}"></script>
  </head>

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
        <li class="mb-3 underline decoration-solid"><a href="/user">Users</a></li>
        <li class="mb-3"><a href="/admin-product">Products</a></li>
        <li class="mb-3"><a href="/order">Orders</a></li>
        <li class="mb-3"><a href="https://business.facebook.com/latest/inbox/all" target="_blank" rel="noopener noreferrer">Messages</a></li>
        <li class="mb-3"><a href="/admin/testimonials">Testimonials</a></li>
        <li class="mb-3"><a href="{{ route('questions.index') }}">FAQs</a></li>      
      </ul>
    </div>
  </nav>

<div class="flex flex-wrap h-full" style="background-color: #460C68;" id="app">
    <nav class="hidden md:flex h-auto shrink-0 flex-col py-10 px-10 items-center gap-5 text-white text-2xl bg-pink-600"
     >
     {{-- {{ asset('photo/agies-logo.jpg') }} --}}
        <a href="/">
          <img src="{{ asset('photo/agies-logo.jpg') }}" class="rounded-full h-32 w-32" alt="">
        </a>
        <p class="mb-3 px-10 py-3 rounded-2xl" style="background-color: #702576;">{{  Str::limit(auth()->user()->name, 7) }}</p>
        <ul class="mt-5">
            <li class="mb-3"><a href="/">Homepage</a></li>
            <li class="mb-3"><a href="/dashboard">Dashboard</a></li>
            <li class="mb-3 underline decoration-solid"><a href="/user">Users</a></li>
            <li class="mb-3"><a href="/admin-product">Products</a></li>
            <li class="mb-3"><a href="/order">Orders</a></li>
            <li class="mb-3"><a href="https://business.facebook.com/latest/inbox/all" target="_blank" rel="noopener noreferrer">Messages</a></li>
            <li class="mb-3"><a href="/admin/testimonials">Testimonials</a></li>
            <li class="mb-3"><a href="{{ route('questions.index') }}">FAQs</a></li>
        </ul>
    </nav>

   

    <main class="flex flex-1 flex-wrap justify-around content-start gap-5 p-10">
      <div class="container px-6 mx-auto grid">
        <h2
          class="my-6 text-center text-3xl font-semibold text-white dark:text-gray-200"
        >
          Users Table
        </h2>
        {{-- <a href="{{ route('export-users') }}" class="text-center bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-t-lg">Export to Excel</a> --}}
        <!-- New Table -->
        <div class="w-full overflow-hidden shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
              <thead>
                <tr
                  class="text-xs font-semibold tracking-wide text-left text-white uppercase border-b dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800" style="background: #CB1C8D;"
                >
                  <th class="px-4 py-3">Name</th>
                  <th class="px-4 py-3">Email</th>
                  <th class="px-4 py-3">Phone Number</th>
                  <th class="px-4 py-3">City</th>
                  <th class="px-4 py-3">Address</th>
                  <th class="px-4 py-3">Zip Code</th>
                  <th class="px-4 py-3">Role</th>
                  <th class="px-4 py-3">Change</th>
                  <th class="px-4 py-3">Change</th>
                  
                </tr>
              </thead>
              @foreach($details as $detail)
              <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
              >
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      {{-- <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                      >
                        <img
                          class="object-cover w-full h-full rounded-full"
                          src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                          alt=""
                          loading="lazy"
                        />
                        <div
                          class="absolute inset-0 rounded-full shadow-inner"
                          aria-hidden="true"
                        ></div> --}}
                      </div>
                      <div>
                       
                       
                       
                        <p class="font-semibold">{{ $detail->name }}</p>
                      </div>
                    </div>
                  </td>
                  {{-- @foreach ($order->cart->items as $item)
                  <td class="px-4 font-semibold py-3 text-sm">
                    P {{ $item['price'] }}
                  </td>
                  @endforeach --}}
                  <td class="px-4 font-semibold py-3 text-sm">
                    {{ $detail->email }}
                  </td>
                  <td class="px-4 font-semibold py-3 text-sm">
                    {{ $detail->phonenumber }}
                  </td>
                  <td class="px-4 font-semibold py-3 text-sm">
                    {{ $detail->city }}
                  </td>
                  <td class="px-4 font-semibold py-3 text-sm">
                    {{ $detail->address }}
                  </td>
                  <td class="px-4 font-semibold py-3 text-sm">
                    {{ $detail->zipcode }}
                  </td>
                  <td class="px-4 font-semibold py-3 text-sm">
                    {{ $detail->role }}
                  </td>
                  
                  
                  <div id="app">
                    <td>
                      <change-role user-id="{{ $detail->id }}" user-role="{{ $detail->role }}" />  
                      
                    </td>

                    <td>
                      <change-to-user user-id="{{ $detail->id }}" user-role="{{ $detail->role }}" />      
                    </td>
                  </div>                                      
                </tr>
                @endforeach
                
              </tbody>
            </table>
          </div>
          <div class="flex justify-center items-center w-full text-white">
            <div class="w-[50%] mt-10 flex justify-center items-center">
              {{ $details->links('pagination::tailwind') }}
            </div>
          </div>
          <a href="{{ route('export-users') }}" class="fixed shadow-lg right-2 bottom-4 flex justify-center items-center w-20 h-20 rounded-full bg-pink-500 cursor-pointer">
                    <i class="fa-regular fa-floppy-disk text-4xl text-white"></i>
          </a>
    </main>
  </div>


<script>
	// Grab HTML Elements
	const btn = document.querySelector("button.mobile-menu-button");
	const menu = document.querySelector(".mobile-menu");

	// Add Event Listeners
	btn.addEventListener("click", () => {
	menu.classList.toggle("hidden");
	});
</script>
