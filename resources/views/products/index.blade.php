@extends('layouts.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script defer src="{{ mix('js/app.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
@section ('content')

<body>
     <!-- Messenger Chat Plugin Code -->
  <div id="fb-root"></div>

  <!-- Your Chat Plugin code -->
  <div id="fb-customer-chat" class="fb-customerchat">
  </div>

  <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "107774918408783");
    chatbox.setAttribute("attribution", "biz_inbox");
  </script>

  <!-- Your SDK code -->
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v15.0'
      });
    };
    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>
  
      <div class="bg-white">
<div id="default-carousel" class="relative w-full sm:mt-22 z-30" data-carousel="slide">
  <!-- Carousel wrapper -->
  <div class="relative h-56 overflow-hidden rounded-lg md:h-[400px]">
       <!-- Item 1 -->
      @foreach ($images as $image)
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
          <img src="{{URL::asset($image->file_path)}}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-contain bg-center" alt="...">
        </div>  
      @endforeach

  </div>
  <!-- Slider indicators -->
  <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
      
    @foreach ($images as $image)
      <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="{{ $image->id }}"></button>
    @endforeach
    
  </div>
  <!-- Slider controls -->
  <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
      <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
          <span class="sr-only">Previous</span>
      </span>
  </button>
  <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
      <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
          <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
          <span class="sr-only">Next</span>
      </span>
  </button>
</div>

  @if(Auth::check() && Auth::user()->role == 'Admin')
    <form class="flex justify-center items-center border-2" enctype="multipart/form-data" method="POST" action="/carousel/store">
      @csrf
      <input class="w-1/2 p-2" required type="file" name="image" placeholder="Carousel Images">
      <button class="bg-black text-white rounded-sm p-2" type="submit">Submit</button>
    </form>
  @endif
    <button  class="my-8 bg-indigo-800 w-full h-auto p-3 sm:p-10">
      <div class="flex flex-col justify-center items-center text-white hover:text-gray-600 gap-3">
        <h1 class="text-lg sm:text-4xl">Want Your Own Customized Cake?</h1>
        <p class="text-base sm:text-xl">
          Design your cake. Choose from our many flavors & decorative options. 
        </p>
        <p class="text-base sm:text-xl">
          Agie's Cake will create the perfect custom cake for your special occasion.
        </p>
        <a href="/custom" class="font-bold bg-pink-600 hover:bg-pink-700 p-3 w-fit rounded-2xl">CLICK HERE</a>
      </div>
    </button>

          <main class="my-8">
              <div class="container mx-auto px-6 no-underline">
                  <h3 class="text-gray-700 text-2xl font-medium">Browse Cakes</h3>
                  <span class="mt-3 text-sm text-gray-500">50+ Products</span>
                  <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                      <!-- component -->
                      @if(isset($products)) 
                      @foreach ($products as $product)   
                      <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform transition duration-500 hover:scale-110 no-underline">
                          <a href={{ "/product/".$product->id }}>
                          <div class="flex items-end justify-end h-56 w-full bg-cover bg-center" style="background-image: url({{ URL::asset('/storage/'.$product->image) }})">
                              
                          </div>
                        </a>
                          <div class="px-5 py-3">
                              <p class="no-underline text-gray-700 uppercase">{{ $product->name }}</p>
                              <span class="text-gray-500 mt-2">P{{ $product->price }}</span>
                          </div>
                      
                      </div>
                      @endforeach
                   @endif
                  </div>
                  <div class="flex justify-center">
                      <div class="flex rounded-md mt-8">
                          {!! $products->links() !!}
                      </div>
                  </div>
                  
                  {{-- <h3 class="text-gray-700 text-2xl font-medium my-8">Others</h3>
                  <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                      <!-- component -->
                      @if(isset($others)) 
                      @foreach ($others as $item)   
                      <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden transform transition duration-500 hover:scale-110">
                          <a href={{ "/product-page/".$item->id }}>
                          <div class="flex items-end justify-end h-56 w-full bg-cover bg-center" style="background-image: url({{ URL::asset( 'images/cakes/'.$product->image_name ) }})">
                              <div>
                                  @if(@empty(Auth::user()->isAdmin))
                                  <add-to-cart-button product-id="{{ $item->id }}" user-id="{{ auth()->user()->id ?? 0 }}" />
                                  @elseif(Auth::user()->isAdmin ='1') --}}
                                  {{-- Do nothing --}}
                                  {{-- @else
                                  <add-to-cart-button product-id="{{ $item->id }}" user-id="{{ auth()->user()->id ?? 0 }}"></add-to-cart-button>
                                  @endif
                              </div>
                          </div>
                          <div class="px-5 py-3">
                              <h3 class="text-gray-700 uppercase">{{ $item->name }}</h3>
                              <span class="text-gray-500 mt-2">P{{ $item->price }}</span>
                          </div>
                      </a>
                      </div>
                      @endforeach
                   @endif
                  </div> --}}
              </div>
          </main>
          <div id="app">
            <search-products></search-products>
          </div>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
@endsection

<style>
    a:link{
    text-decoration: none!important;
  }
</style>