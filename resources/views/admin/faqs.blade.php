<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequently Asked Questions</title>
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
            <li class="mb-3"><a href="/admin-product">Products</a></li>
            <li class="mb-3"><a href="/order">Orders</a></li>
            <li class="mb-3"><a href="https://business.facebook.com/latest/inbox/all" target="_blank" rel="noopener noreferrer">Messages</a></li>
            <li class="mb-3"><a href="/admin/testimonials">Testimonials</a></li>
            <li class="mb-3 underline decoration-solid"><a href="{{ route('questions.index') }}">FAQs</a></li>
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
          <li class="mb-3"><a href="/admin-product">Products</a></li>
          <li class="mb-3"><a href="/order">Orders</a></li>
          <li class="mb-3"><a href="https://business.facebook.com/latest/inbox/all" target="_blank" rel="noopener noreferrer">Messages</a></li>
          <li class="mb-3"><a href="/admin/testimonials">Testimonials</a></li>
          <li class="mb-3 underline decoration-solid"><a href="{{ route('questions.index') }}">FAQs</a></li>
        </ul>
      </div>
    </nav>

    <main class="flex flex-1 flex-wrap justify-around content-start gap-5">
        <div class="container px-6 mx-auto grid">
          <h2 class="my-3 mt-6 text-center text-3xl font-semibold text-white">
            Frequently Asked Questions
          </h2>
          <h2 class="my-3 text-center text-xl text-white">
            Manage FAQs here....
          </h2>
          <div>
@foreach($questions as $question)  
    <div class='flex items-start justify-center my-6'>
        <div class="rounded-xl border p-5 shadow-md w-4/5 md:w-9/12 bg-white">
        <div class="flex w-full items-center justify-between border-b pb-3">
        <div class="flex items-center space-x-3">
            <div class="text-lg font-bold text-slate-700">{{ $question->question }}</div>
        </div>
        <div class="flex items-center space-x-8">
            <!-- <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">Category</button> -->
            <div class="text-xs text-neutral-500">{{ \Carbon\Carbon::parse($question->created_at)->format('F d, Y') }}</div>
        </div>
        </div>

        
            <div class="text-xl text-neutral-600 mt-3">{{ $question->answer }}</div>

            <div class="flex gap-3 mt-3">
                <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="mt-3 flex text-base cursor-pointer items-center transition hover:text-slate-600 p-2 px-5 bg-red-600 hover:bg-red-700 text-white rounded-xl">
                    Delete
                </button>
                </form>

                <a href="{{ route('questions.edit',$question->id) }}">
                    <button class="mt-3 flex text-base cursor-pointer items-center transition hover:text-slate-600 p-2 px-5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl" type="button">
                        Edit
                    </button>
                </a>
            </div>
        </div>
    </div>
  @endforeach
  
  {{-- what a fuckin retard  --}}
  <a href="{{ route('questions.create') }}" class="absolute shadow-lg right-2 bottom-4 flex justify-center items-center w-20 h-20 rounded-full bg-pink-500 cursor-pointer">
    <i class="fa-regular fa-plus text-4xl text-white"></i>
  </a>
        {{-- <div class="flex justify-center gap-6 mb-6 text-white">
          @if ($questions->onFirstPage())
        
          @else
            <a href="{{ $questions->previousPageUrl() }}">
              < Previous
            </a>
          @endif
          @if ($questions->hasMorePages())
            <a href="{{ $questions->nextPageUrl() }}">
              Next >
            </a>   
          @else
           
          @endif
        </div> --}}
      </main>
    </div>
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
