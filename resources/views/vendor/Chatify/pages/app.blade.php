@if (Auth::user()-> role == 'Admin')
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

<div class="flex flex-wrap" style="background-color: #460C68;">
    <nav class="hidden md:flex h-auto shrink-0 flex-col py-10 px-10 items-center gap-5 text-white text-2xl bg-pink-600"
     >
     <a href="/">
        <img src="{{ asset('photo/agies-logo.jpg') }}" class="rounded-full h-32 w-32" alt="">
      </a>
        <p class="mb-3 px-10 py-3 rounded-2xl" style="background-color: #702576;">Admin</p>
        <ul class="mt-5">
            <li class="mb-3"><a href="/">Homepage</a></li>
            <li class="mb-3"><a href="/dashboard">Dashboard</a></li>
            <li class="mb-3"><a href="/user">Users</a></li>
            <li class="mb-3"><a href="/admin-product">Products</a></li>
            <li class="mb-3"><a href="/order">Orders</a></li>
            <li class="mb-3 underline decoration-solid"><a href="/chatify">Messages</a></li>
        </ul>
    </nav>

    <div class="fixed z-50 right-5 top-2 flex md:hidden">
      <button class="mobile-menu-button">
        <svg
          class="w-6 h-6 text-black"
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
      <div class="flex justify-center items-center h-full">
        <ul class="mt-5">
          <li class="mb-3 underline decoration-solid"><a href="/dashboard">Dashboard</a></li>
          <li class="mb-3"><a href="/user">Users</a></li>
          <li class="mb-3"><a href="/admin-product">Products</a></li>
          <li class="mb-3"><a href="/order">Orders</a></li>
          <li class="mb-3"><a href="/chatify">Messages</a></li>
        </ul>
      </div>
    </nav>

    <main class="flex flex-1 flex-wrap justify-around content-start gap-5 p-10">
      <div class="flex flex-col flex-1 w-full h-full">
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-center text-3xl font-semibold text-white dark:text-gray-200"
            >
              Your Messages
            </h2>

            <div>
                @include('Chatify::layouts.headLinks')
<div class="inline-flex w-full h-2/3 font-sans">
{{-- ----------------------Users/Groups lists side---------------------- --}}
<div class="messenger-listView">
    {{-- Header and search bar --}}
    <div class="m-header">
        <nav>
            <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">Messenger</span> </a>
            {{-- header buttons --}}
            <nav class="m-header-right">
                {{-- <a href="#"><i class="fas fa-cog settings-btn"></i></a> --}}
                <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
            </nav>
        </nav>
        {{-- Search input --}}
        <input type="text" class="messenger-search" placeholder="Search" />
        {{-- Tabs --}}
        <div class="messenger-listView-tabs text-center">
            <a href="#" @if($type == 'user') class="active-tab" @endif data-view="users">
                <span class="far fa-user"></span> People</a>
        </div>
    </div>
    {{-- tabs and lists --}}
    <div class="m-body contacts-container">
       {{-- Lists [Users/Group] --}}
       {{-- ---------------- [ User Tab ] ---------------- --}}
       <div class="@if($type == 'user') show @endif messenger-tab users-tab app-scroll" data-view="users">

           {{-- Favorites --}}
           <div class="favorites-section">
            <p class="messenger-title">Favorites</p>
            <div class="messenger-favorites app-scroll-thin"></div>
           </div>

           {{-- Saved Messages --}}
           {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}

           {{-- Contact --}}
           <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

       </div>

       {{-- ---------------- [ Group Tab ] ---------------- --}}
       <div class="@if($type == 'group') show @endif messenger-tab groups-tab app-scroll" data-view="groups">
            {{-- items --}}
            <p style="text-align: center;color:grey;margin-top:30px">
                <a target="_blank" style="color:{{$messengerColor}};" href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
            </p>
         </div>

         {{-- ---------------- [ Search Tab ] ---------------- --}}
       <div class="messenger-tab search-tab app-scroll" data-view="search">
            {{-- items --}}
            <p class="messenger-title">Search</p>
            <div class="search-records">
                <p class="message-hint center-el"><span>Type to search..</span></p>
            </div>
         </div>
    </div>
</div>

{{-- ----------------------Messaging side---------------------- --}}
<div class="messenger-messagingView">
    {{-- header title [conversation name] amd buttons --}}
    <div class="m-header m-header-messaging">
        <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
            {{-- header back button, avatar and user name --}}
            <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                <a href="#" class="user-name">{{ config('chatify.name') }}</a>
            </div>
            {{-- header buttons --}}
            <nav class="m-header-right">
                <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                <a href="/"><i class="fas fa-home"></i></a>
                {{-- <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a> --}}
            </nav>
        </nav>
    </div>
    {{-- Internet connection --}}
    <div class="internet-connection">
        <span class="ic-connected">Connected</span>
        <span class="ic-connecting">Connecting...</span>
        <span class="ic-noInternet">No internet access</span>
    </div>
    {{-- Messaging area --}}
    <div class="m-body messages-container app-scroll">
        <div class="messages">
            <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
        </div>
        {{-- Typing indicator --}}
        <div class="typing-indicator">
            <div class="message-card typing">
                <p>
                    <span class="typing-dots">
                        <span class="dot dot-1"></span>
                        <span class="dot dot-2"></span>
                        <span class="dot dot-3"></span>
                    </span>
                </p>
            </div>
        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
</div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
            
            </div>
           
          </div>
        </main>
      </div>
    </div>
  </div>
  </body>
</html>

        
    </main>
</div>

@else
@include('Chatify::layouts.headLinks')
<div class="messenger">
{{-- ----------------------Users/Groups lists side---------------------- --}}
<div class="messenger-listView">
    {{-- Header and search bar --}}
    <div class="m-header">
        <nav>
            <a href="#"><i class="fas fa-inbox"></i> <span class="messenger-headTitle">Messenger</span> </a>
            {{-- header buttons --}}
            <nav class="m-header-right">
                {{-- <a href="#"><i class="fas fa-cog settings-btn"></i></a> --}}
                <a href="#" class="listView-x"><i class="fas fa-times"></i></a>
            </nav>
        </nav>
        {{-- Search input --}}
        <input type="text" class="messenger-search" placeholder="Search" />
        {{-- Tabs --}}
        <div class="messenger-listView-tabs text-center">
            <a href="#" @if($type == 'user') class="active-tab" @endif data-view="users">
                <span class="far fa-user"></span> People</a>
        </div>
    </div>
    {{-- tabs and lists --}}
    <div class="m-body contacts-container">
       {{-- Lists [Users/Group] --}}
       {{-- ---------------- [ User Tab ] ---------------- --}}
       <div class="@if($type == 'user') show @endif messenger-tab users-tab app-scroll" data-view="users">

           {{-- Favorites --}}
           <div class="favorites-section">
            <p class="messenger-title">Favorites</p>
            <div class="messenger-favorites app-scroll-thin"></div>
           </div>

           {{-- Saved Messages --}}
           {!! view('Chatify::layouts.listItem', ['get' => 'saved']) !!}

           {{-- Contact --}}
           <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);position: relative;"></div>

       </div>

       {{-- ---------------- [ Group Tab ] ---------------- --}}
       <div class="@if($type == 'group') show @endif messenger-tab groups-tab app-scroll" data-view="groups">
            {{-- items --}}
            <p style="text-align: center;color:grey;margin-top:30px">
                <a target="_blank" style="color:{{$messengerColor}};" href="https://chatify.munafio.com/notes#groups-feature">Click here</a> for more info!
            </p>
         </div>

         {{-- ---------------- [ Search Tab ] ---------------- --}}
       <div class="messenger-tab search-tab app-scroll" data-view="search">
            {{-- items --}}
            <p class="messenger-title">Search</p>
            <div class="search-records">
                <p class="message-hint center-el"><span>Type to search..</span></p>
            </div>
         </div>
    </div>
</div>

{{-- ----------------------Messaging side---------------------- --}}
<div class="messenger-messagingView">
    {{-- header title [conversation name] amd buttons --}}
    <div class="m-header m-header-messaging">
        <nav class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
            {{-- header back button, avatar and user name --}}
            <div class="chatify-d-flex chatify-justify-content-between chatify-align-items-center">
                <a href="#" class="show-listView"><i class="fas fa-arrow-left"></i></a>
                <a href="#" class="user-name">{{ config('chatify.name') }}</a>
            </div>
            {{-- header buttons --}}
            <nav class="m-header-right">
                <a href="#" class="add-to-favorite"><i class="fas fa-star"></i></a>
                <a href="/"><i class="fas fa-home"></i></a>
                {{-- <a href="#" class="show-infoSide"><i class="fas fa-info-circle"></i></a> --}}
            </nav>
        </nav>
    </div>
    {{-- Internet connection --}}
    <div class="internet-connection">
        <span class="ic-connected">Connected</span>
        <span class="ic-connecting">Connecting...</span>
        <span class="ic-noInternet">No internet access</span>
    </div>
    {{-- Messaging area --}}
    <div class="m-body messages-container app-scroll">
        <div class="messages">
            <p class="message-hint center-el"><span>Please select a chat to start messaging</span></p>
        </div>
        {{-- Typing indicator --}}
        <div class="typing-indicator">
            <div class="message-card typing">
                <p>
                    <span class="typing-dots">
                        <span class="dot dot-1"></span>
                        <span class="dot dot-2"></span>
                        <span class="dot dot-3"></span>
                    </span>
                </p>
            </div>
        </div>
        {{-- Send Message Form --}}
        @include('Chatify::layouts.sendForm')
    </div>
</div>
</div>

@include('Chatify::layouts.modals')
@include('Chatify::layouts.footerLinks')
@endif

<script>
	// Grab HTML Elements
	const btn = document.querySelector("button.mobile-menu-button");
	const menu = document.querySelector(".mobile-menu");

	// Add Event Listeners
	btn.addEventListener("click", () => {
	menu.classList.toggle("hidden");
	});
</script>
