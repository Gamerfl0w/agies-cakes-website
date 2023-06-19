@extends('layouts.app')
<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'><link rel="stylesheet" href="./style.css">
<script defer src="{{ mix('js/app.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdn.tailwindcss.com"></script>
@section ('content')

<body class="font-sans">
  @if (@empty(Auth::user()->role) || Auth::user()->role == 'Customer')
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
  @else
     
  @endif

  {{-- <!--HEADER-->
  <header>
  <div class="header">
  <section>
  <span><p class="text-white">Welcome to Agies Cakes!</p></span>
  <span><a href="tel:"><i class="fa fa-phone"></i> (+63) 00 000 00000</a></span>
  </section> 
  <section>
  <span><a href="#"><i class="fa fa-facebook"></i></a></span>
  <span><a href="#"><i class="fa fa-instagram"></i></a></span>
  <span><a href="#"><i class="fa fa-youtube"></i></a></span>
  <span><a href="#"><i class="fa fa-twitter"></i></a></span>
  </section>
  </div>
  </header> --}}
  
  <div id="app">
      @if(Auth::check())
        @foreach ($pages as $page)
          <home user-role="{{ auth()->user()->role ?? ''}}" guest="{{ !Auth::check() }}" main-img="{{asset($page->main_image)}}"
          not-verified="{{ auth()->user()->email_verified_at == null }}" logout="{{ route('verification.resend') }}" mail="{{ url('newsletter/store')}}"  />
            {{-- {{asset('photo/agies-logo.jpg')}} --}} {{-- about-img="{{ $page->main_image }}" --}}
        @endforeach
        @else
        @foreach ($pages as $page)
          <home user-role="{{ auth()->user()->role ?? ''}}" guest="{{ !Auth::check() }}" main-img="{{asset($page->main_image)}}"
          not-verified="{{ '' }}" logout="{{ route('logout') }}" mail="{{ url('newsletter/store')}}" />
            {{-- {{asset('photo/agies-logo.jpg')}} --}} {{-- about-img="{{ $page->main_image }}" --}}
        @endforeach 
      @endif
  </div>
</body>
  

@endsection