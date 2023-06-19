<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Agies Cakes</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="icon" href="{{ URL::asset('photo/agies-logo.jpg') }}" type="image/x-icon"/>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="{{ asset('external-css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ URL::asset('js/navbar.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;600;700&family=Playfair+Display:wght@400;500;600;700&family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet"> 
    
</head>

<body>
<nav class="hidden fixed inset-x-0 top-0 md:flex w-full h-[80px] bg-[#d10a43] text-white justify-between items-center px-10 z-50">
  <div class="flex gap-10 items-center text-lg">
    <img class="w-10 h-10 rounded-full" src="{{ asset('photo/agies-logo.jpg') }}" alt="" loading="lazy">
    <!-- For guests -->
      @guest
        <a class="hover:text-black" href="/">Home</a>
        <a class="hover:text-black" href="/product">Products</a>
        <a class="hover:text-black" href="/cart">Cart</a>
        <a class="hover:text-black" href="/contact-us">FAQs</a>
  </div>

        <div class="flex gap-5 text-lg">
          <a class="hover:text-black" href="{{ route('register') }}">Sign Up</a>
          <a class="hover:text-black" href="{{ route('login') }}">Log in</a>
        </div>
      @endif

      <!-- For customers -->
      @if (Auth::check() && Auth::user()->role != 'Admin')
        <a class="hover:text-black" href="/">Home</a>
        <a class="hover:text-black" href="/product">Products</a>
        <a class="hover:text-black" href="/cart">Cart {{ Cart::getTotalQuantity()}}</a>
        <a class="hover:text-black" href="{{ route('order.show',['user'=>Auth::user()->id]) }}">My Orders</a>
        <a class="hover:text-black" href="/contact-us">FAQs</a>
  </div>

        <div class="flex gap-5 text-lg items-center">
          <a class="hover:text-black" href="/user-info/{{Auth::user()->id}}/edit"><i class="fa fa-user-circle-o"></i> {{Auth::user()->name}}</a>
          <a href="{{ route('login') }}" class="hover:text-black"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                    </form>
                    </a>
        </div>
      @endif

      @if (Auth::check() && Auth::user()->role == 'Admin')
        <a class="hover:text-black" href="/">Home</a>
        <a href="/product">Products</a>
        <a class="hover:text-black" href="/dashboard">Dashboard</a>
  </div>

        <div class="flex gap-5 text-lg items-center">
          <a class="hover:text-black" href="/user-info/{{Auth::user()->id}}/edit"><i class="fa fa-user-circle-o"></i> {{Auth::user()->name}}</a>
          <a href="{{ route('login') }}" class="hover:text-black"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                    </form>
                    </a>
        </div>
      @endif
</nav>

<div class="absolute md:hidden">
      <input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
  	<label for="menu-icon"></label>
  	<nav class="nav"> 		
  		<ul class="pt-5">
            <li>@if (Auth::check() && Auth::user()->role != 'Admin')
                <a href="{{ route('order.show',['user'=>Auth::user()->id]) }}">My Orders</a>            
            @endif
            @guest
            
            @else
                @if (Auth::user()->role == 'Admin')
                   <li><a href="/dashboard">Dashboard</a></li>
                   <li><a href="/product">Products</a></li>
                @else
                <li><a href="/">Home</a></li>
                <li><a href="/product">Products</a></li>
                <li><a class="text-white" href="/cart">Cart {{ Cart::getTotalQuantity()}}</a></li>
                <li><a href="/contact-us">FAQs</a></li>
                    {{-- Do nothing --}}
                @endif
            @endif</li>
            <li>@if(Auth::guest())
                <li><a href="/">Home</a></li>
                <li><a href="/product">Products</a></li>
                <li><a href="/contact-us">FAQs</a></li>
              <li><a href="{{ route('register') }}">Sign Up</a></li>
              <li><a href="{{ route('login') }}">Log In</a></li>
              
                @else
                <li><a class="font-sans" href="/user-info/{{Auth::user()->id}}/edit"><i class="fa fa-user-circle-o"></i> {{Auth::user()->name}}</a></li>
                <li> <a href="{{ route('login') }}" class="overflow-hidden absolute"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    {{ csrf_field() }}
                    </form>
                    </a></li>
                @endif
            </li>
        </ul>
  	</nav>
</div>


        <main>
            @yield('content')
        </main>

    </div>
<!--FOOTER-->
{{-- <footer>
    <div class="inset-x-0 bottom-0 middle_section">
    <section>
    <span>
    <a href="https://web.facebook.com/agiescake" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
    <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
    </span>
    <span>
    <a href="#">Privacy Policy</a>
    <a href="https://web.facebook.com/agiescake">FAQ</a>
    <a href="https://web.facebook.com/agiescake">About Us</a>
    <a href="https://web.facebook.com/agiescake">Contact Us</a>
    </span>
    </section>
    </div>
    <div class="bottom_section">
    <span>Copyright © 2022. All rights reserved</span>
    </div>
    </footer> --}}
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

@yield('script')
<script>

    $(document).ready(function(){

        filter_data('');

        function filter_data(query='')
        {
            var search=JSON.stringify(query);
            var price =JSON.stringify($('#pricerange').val());
            var gender =JSON.stringify(get_filter('gender')); 
            var brand =JSON.stringify(get_filter('brand'));
            $.ajax({
                url:"{{ route('product.filter') }}",
                method:'GET',
                data:{
                    query:search,
                    price:price,
                    gender:gender,
                    brand:brand,
                    },
                dataType:'json',
                success:function(data)
                {
                    $('#products').html(data.table_data);
                }
            })
        }

        function get_filter(class_name)
        {
            var filter=[];
            $('.'+class_name+':checked').each(function(){
                filter.push($(this).val());
            });
            return filter;
        }

        $(document).on('keyup','#search',function(){
            var query = $(this).val();
            filter_data(query);
        });

        $('.selector').click(function(){
            var query = $('#search').val();
            filter_data(query);
        });

        $(document).on('input','#pricerange',function(){
            var range = $(this).val();
            $('#currentrange').html(range);
        });

        $(document).on('change','#size-dropdown',function(){
            var size = $(this).val();
            document.cookie="shoes_size="+size+";"+"path=/";
            $('#add-to-cart').removeClass('disabled');
        });

    });
    
</script>

</html>

<style scoped>
  /*CUSTOM SCROLL BAR*/
*,html{
    scroll-behavior: smooth;
    }
    *, *:after, *:before {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    }
    :root{
    scrollbar-color: rgb(210,210,210) rgb(46,54,69) !important;
    scrollbar-width: thin !important;
    --white:#fff;
    --black:#1e1e1e;
    --pink:#e30846;
    --secondary:#202124;
    --gray:#b8bca7;
    --blue:#061221;
    }
    ::-webkit-scrollbar {
    height: 12px;
    width: 8px;
    background: #000;
    }
    ::-webkit-scrollbar-thumb {
    background: gray;
    -webkit-box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.75);
    }
    ::-webkit-scrollbar-corner {
    background: #000;
    }
    
    /*DEFAULT*/
    body{
    margin:0;
    overflow-x:hidden !important;
    }
    
    a{
    text-decoration:none;
    color:var(--white);
    }
    
    a,button{
    transition:0.5s;
    }
    
    p{
    line-height:1.8em;
    letter-spacing:0.06em;
    }
    
    fieldset{
    border:0;
    }
    
    a, button, input, textarea, select{
    outline:none !important;
    }
    
    img{
    width:99%;
    }
    
    .title{
    font-family: 'Playfair Display', serif;
    }
    
    #cursive{
    font-family: 'Dancing Script', cursive;
    }
    
    em{
    font-style:normal;
    color:var(--pink);
    }
    
    p{
    line-height:1.6em;
    letter-spacing:0.06em;
    }
    
    .title{
    font-family: 'Playfair Display', serif;
    }
    
    .title_header{
    width:60%;
    text-align:center;
    margin:auto;
    }
    
    .title_header h1{
    font-size:2em;
    }
    
    .title_header h3{
    font-size:1.2em;
    font-weight:400;
    color:rgba(1,1,1,0.7);
    }
    
    .btn1{
    padding:20px;
    text-align:center;
    display:inline-block;
    width:200px;
    background-color:var(--pink);
    border-radius:40px;
    font-weight:600;
    }
    
    .btn1:hover{
    background-color:var(--secondary);
    }
    
    .btn2{
    padding:20px;
    text-align:center;
    display:inline-block;
    width:250px;
    border-radius:40px;
    font-weight:600;
    }
    
    .btn1:hover{
    background-color:var(--secondary);
    }
    
    .border-shape {
    background: var(--secondary) none repeat scroll 0 0;
    color: #fff;
    display: block;
    height: 3px;
    left: 0;
    margin: 20px auto;
    position: relative;
    right: 0;
    text-align: center;
    top: 0;
    width: 80px;
    }
    
    .border-shape::before {
    background: var(--pink) none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 1px;
    left: 80px;
    margin: 0 auto;
    position: absolute;
    text-align: center;
    top: 1px;
    width: 100%;
    }
    
    .border-shape::after {
    background: var(--pink) none repeat scroll 0 0;
    bottom: 0;
    content: "";
    height: 1px;
    margin: 0 auto;
    position: absolute;
    right: 80px;
    text-align: center;
    top: 1px;
    width: 100%;
    }
    
    @media (max-width:820px){
    .btn1,.btn2{
    padding:10px 15px;
    width:150px;
    }
    .title_header{
    width:100%;
    }
    .title_header h1{
    font-size:1.5em;
    }
    
    .title_header h3{
    font-size:1em;
    }
    }
    
    /*ANIMATION*/
    @keyframes arrows {
    0%,
    100% {
    color: black;
    transform: translateY(0);
    }
    50% {
    color: #3AB493;
    transform: translateY(20px);
    }
    }
    
    .animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
    }
    
    @-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
    }
    
    @keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
    }
    
    
    
    /*HEADER*/
    .header{
    width:100%;
    position:relative;
    display:flex;
    align-items:center;
    background-color:var(--blue);
    padding:1rem 0;
    padding-bottom:3rem;
    }
    
    .header section{
    width:100%;
    text-align:center;
    padding:1rem 2rem;
    display:flex;
    align-items:center;
    justify-content:center;
    }
    
    .header section span{
    margin:0 20px;
    }
    
    .header section span a{
    color:var(--white);
    white-space:nowrap;
    }
    
    
    @media (max-width:820px){
    .header section:nth-child(1){
    display:none;
    }
    } 
    
    /*TOP NAVIGATION*/
    .section-center{
  position: absolute;
  top: 50%;
  left: 0;
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
  z-index: 6;
  text-align: center;
  transform: translateY(-50%);
}

[type="checkbox"]:checked,
[type="checkbox"]:not(:checked){
  position: absolute;
  left: -9999px;
}
.menu-icon:checked + label,
.menu-icon:not(:checked) + label{
  position: fixed;
  top: 63px;
  right: 75px;
  display: block;
  width: 30px;
  height: 30px;
  padding: 0;
  margin: 0;
  cursor: pointer;
  z-index: 99;
}
.menu-icon:checked + label:before,
.menu-icon:not(:checked) + label:before{
  position: absolute;
  content: '';
  display: block;
  width: 30px;
  height: 20px;
  z-index: 99;
  top: 0;
  left: 0;
  border-top: 2px solid white;
  border-bottom: 2px solid white;
  transition: border-width 100ms 1500ms ease, 
              top 100ms 1600ms cubic-bezier(0.23, 1, 0.32, 1),
              height 100ms 1600ms cubic-bezier(0.23, 1, 0.32, 1), 
              background-color 200ms ease,
              transform 200ms cubic-bezier(0.23, 1, 0.32, 1);
}
.menu-icon:checked + label:after,
.menu-icon:not(:checked) + label:after{
  position: absolute;
  content: '';
  display: block;
  width: 22px;
  height: 2px;
  z-index: 99;
  top: 10px;
  right: 4px;
  background-color: white;
  margin-top: -1px;
  transition: width 100ms 100ms ease, 
              right 100ms 100ms ease,
              margin-top 100ms ease, 
              transform 100ms cubic-bezier(0.23, 1, 0.32, 1);
}
.menu-icon:checked + label:before{
  top: 10px;
  transform: rotate(45deg);
  height: 2px;
  background-color: white;
  border-width: 0;
  transition: border-width 100ms 340ms ease, 
              top 100ms 300ms cubic-bezier(0.23, 1, 0.32, 1),
              height 100ms 300ms cubic-bezier(0.23, 1, 0.32, 1), 
              background-color 200ms 500ms ease,
              transform 200ms 1700ms cubic-bezier(0.23, 1, 0.32, 1);
}
.menu-icon:checked + label:after{
  width: 30px;
  margin-top: 0;
  right: 0;
  transform: rotate(-45deg);
  transition: width 100ms ease,
              right 100ms ease,  
              margin-top 100ms 500ms ease, 
              transform 200ms 1700ms cubic-bezier(0.23, 1, 0.32, 1);
}

.nav{
  position: fixed;
  top: 33px;
  right: 50px;
  display: block;
  width: 80px;
  height: 80px;
  padding: 0;
  margin: 0;
  z-index: 98;
  overflow: hidden;
  box-shadow: 0 8px 30px 0 rgba(0,0,0,0.3);
  background-color: #e30846;
  animation: border-transform 7s linear infinite;
  /* transition: top 350ms 1100ms cubic-bezier(0.23, 1, 0.32, 1),  
              right 350ms 1100ms cubic-bezier(0.23, 1, 0.32, 1),
              transform 250ms 1100ms ease,
              width 650ms 400ms cubic-bezier(0.23, 1, 0.32, 1),
              height 650ms 400ms cubic-bezier(0.23, 1, 0.32, 1); */
}
@keyframes border-transform{
    0%,100% { border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%; } 
  14% { border-radius: 40% 60% 54% 46% / 49% 60% 40% 51%; } 
  28% { border-radius: 54% 46% 38% 62% / 49% 70% 30% 51%; } 
  42% { border-radius: 61% 39% 55% 45% / 61% 38% 62% 39%; } 
  56% { border-radius: 61% 39% 67% 33% / 70% 50% 50% 30%; } 
  70% { border-radius: 50% 50% 34% 66% / 56% 68% 32% 44%; } 
  84% { border-radius: 46% 54% 50% 50% / 35% 61% 39% 65%; } 
}

.menu-icon:checked ~ .nav {
  animation-play-state: paused;
  top: 50%;
  right: 50%;
  transform: translate(50%, -50%);
  width: 200%;
  height: 200%;
  /* transition: top 350ms 700ms cubic-bezier(0.23, 1, 0.32, 1),  
              right 350ms 700ms cubic-bezier(0.23, 1, 0.32, 1),
              transform 250ms 700ms ease,
              width 750ms 1000ms cubic-bezier(0.23, 1, 0.32, 1),
              height 750ms 1000ms cubic-bezier(0.23, 1, 0.32, 1); */
}

.nav ul{
  position: absolute;
  top: 50%;
  left: 0;
  display: block;
  width: 100%;
  padding: 0;
  margin: 0;
  z-index: 98;
  text-align: center;
  transform: translateY(-50%);
  list-style: none;
}
.nav ul li{
  position: relative;
  display: block;
  width: 100%;
  padding: 0;
  margin: 10px 0;
  text-align: center;
  list-style: none;
  pointer-events: none;
  opacity: 0;
  visibility: hidden;
  transform: translateY(30px);
  transition: all 10ms linear;
}
.nav ul li:nth-child(1){
  transition-delay: 100ms;
}
.nav ul li:nth-child(2){
  transition-delay: 50ms;
}
.nav ul li:nth-child(3){
  transition-delay: 20ms;
}
.nav ul li:nth-child(4){
  transition-delay: 10ms;
}
.nav ul li a{
  font-family: 'Montserrat', sans-serif;
  font-size: 7vh;
  text-transform: uppercase;
  line-height: 1.2;
  font-weight: 800;
  display: inline-block;
  position: relative;
  color: white;
  transition: all 10ms linear;
}
.nav ul li a:hover{
  text-decoration: none;
}

.nav ul li a:after{
  display: block;
  position: absolute;
  top: 70px;
  content: '';
  height: 2vh;
  margin-top: -1vh;
  width: 0;
  left: 0;
  background-color: #102770;
  opacity: 0.8;
  transition: width 200ms linear;
}
.nav ul li a:hover:after{
  width: 100%;
}


.menu-icon:checked ~ .nav  ul li {
  pointer-events: auto;
  visibility: visible;
  opacity: 1;
  transform: translateY(0);
  transition: opacity 350ms ease,
              transform 100ms ease;
}
.menu-icon:checked ~ .nav ul li:nth-child(1){
  transition-delay: 400ms;
}
.menu-icon:checked ~ .nav ul li:nth-child(2){
  transition-delay: 480ms;
}
.menu-icon:checked ~ .nav ul li:nth-child(3){
  transition-delay: 560ms;
}
.menu-icon:checked ~ .nav ul li:nth-child(4){
  transition-delay: 640ms;
}

.logo {
	position: absolute;
	top: 30px;
	left: 50px;
	display: block;
	z-index: 11;
	transition: all 250ms linear;
}

.logo img {
    border-radius: 50%;
	height: 80px;
	width: auto;
	display: block;
}



@media screen and (max-width: 991px) {
  .menu-icon:checked + label,
  .menu-icon:not(:checked) + label{
    right: 55px;
  }
  .logo {
    left: 30px;
  }
  .nav{
    right: 30px;
  }
  .nav ul li a{
    font-size: 5vh;
  }
  .nav ul li a:after{
  top: 50px;
  height: 1vh;
  background-color: #102770;
}
}
    
    
    
    
    
    
    
    
    /*BANNER*/
    /* .banner{
    width:100%;
    height:85vh;
    background: linear-gradient(rgba(1,1,1,.7), rgba(1,1,1,.7)), url("https://www.teahub.io/photos/full/335-3350221_birthday-cake-wallpaper-for-desktop-happy-birthday-image.jpg");
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--white);
    position:relative;
    } */
    
    .banner:after{
    content:"";
    background-image:url("https://i.ibb.co/8zB1N3z/wave.png");
    background-size:cover;
    width:100%;
    height:100px;
    position:absolute;
    bottom:-20px;
    }
    
    .banner section{
    width:55%;
    text-align:center;
    }
    
    .banner section .cursive{
    font-size:5em;
    line-height:0;
    }
    
    .banner section h2{
    font-weight:200;
    line-height:1.6em;
    }
    
    .banner .btn1{
    display:inline-block;
    margin:2vh 20px;
    }
    
    @media (max-width:820px){
    .banner section{
    width:95%;
    }
    .banner section h2{
    font-size:1.3em;
    }
    .banner section .cursive{
    font-size:2.3em;
    }
    .banner .btn1{
    margin:2vh 10px;
    }
    }
    
    
    
    
    
    
    
    
    
    /*SECTION1*/
    .section1{
    display:flex;
    align-items:center;
    }
    
    .section1 section{
    padding:2rem;
    width:100%;
    font-size:18px;
    color:rgba(1,1,1,0.7);
    position:relative;
    }
    
    .section1 section em{
    position:relative;
    }
    
    .section1 section em:before{
    content:"";
    position:absolute;
    left:-3%;
    top:-10%;
    width:20px;
    height:20px;
    border-radius:50%;
    background-image: linear-gradient(#cebfb6,#ddd);
    z-index:-1;
    }
    
    .section1 section .title{
    font-size:2.5em;
    line-height:0;
    color:var(--black);
    }
    
    .section1 section ol li{
    padding:15px 0;
    list-style:none;
    }
    
    .section1 section ol li:before{
    content:"\f00c";
    font-family:"FontAwesome";
    background-color:#cebfb6;
    border-radius:50%;
    padding:8px;
    margin:0 10px;
    color:var(--secondary);
    }
    
    .section1 .dots{
    width:auto;
    position:absolute;
    right:10%;
    pointer-events:none;
    --delay: 0s;
    animation: arrows 4s var(--delay) infinite ease-in;
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*ABOUT MR*/
    .about_mr{
    display:flex;
    align-items:center;
    margin:2rem 0;
    }
    
    .about_mr section{
    position:relative;
    width:100%;
    padding:4rem;
    }
    
    .about_mr section:nth-child(2){
    padding:4rem 2rem;
    }
    
    .about_mr section:nth-child(1){
    background-image:url("https://i.ibb.co/1v2CTjz/shape.png");
    background-repeat:no-repeat;
    background-position:center;
    background-size:50% 99%;
    }
    
    .about_mr section img:nth-child(1){
    width:70%;
    border:5px solid var(--white);
    border-radius:5px;
    }
    
    .about_mr section img:nth-child(2){
    position:absolute;
    right:15%;
    bottom:5%;
    width:40%;
    border:5px solid var(--white);
    }
    
    .about_mr .title{
    font-size:3em;
    line-height:0em;
    }
    
    .about_mr h3{
    font-weight:400;
    }
    
    .about_mr p{
    font-size:20px;
    color:rgba(1,1,1,0.7);
    }
    
    .about_mr .btn1{
    display:block;
    }
    
    @media (max-width:820px){
    .about_mr{
    display:block;
    }
    
    .about_mr section{
    padding:1rem;
    }
    
    .about_mr section:nth-child(2){
    padding:4rem 1rem;
    }
    
    .about_mr .title{
    font-size:1.8em;
    }
    
    .about_mr p{
    font-size:18px;
    }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /*SECTION2*/
    .section2{
    padding:3rem;
    background-color:#f4f8f7;
    }
    
    .section2 .cards section{
    display:flex;
    align-items:center;
    }
    
    .section2 .cards section .card{
    margin:10px;
    background-color:var(--white);
    border-radius:30px;
    width:100%;
    padding:2rem;
    box-shadow: 0 0 20px 0 #dddddd8c;
    position:relative;
    }
    
    .section2 .cards section .card h3{
    font-weight:600;
    color:rgba(1,1,1,0.8);
    }
    
    .section2 .cards section .card p{
    color:rgba(1,1,1,0.7);
    }
    
    .section2 .cards section .card .mark{
    padding:5px;
    background-color:#cebfb6;
    border-radius:50%;
    float:right;
    }
    
    @media (max-width:820px){
    .section2{
    padding:1rem;
    }
    .section2 .cards section{
    display:block;
    }
    .section2 .cards section .card{
    margin:10px 0;
    }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    /*SECTION3*/
    .section3{
    width:100%;
    height:70vh;
    background-image:url("https://i.ibb.co/mcbSLxz/section3.jpg");
    background-repeat:no-repeat;
    background-size:60% 100%;
    background-position:left center;
    display:flex;
    align-items:center;
    justify-content:right;
    position:relative;
    }
    
    .section3 section{
    width:50%;
    position:absolute;
    right:5%;
    padding:1rem;
    background-color:var(--secondary);
    color:var(--white);
    }
    
    .section3 section .card{
    padding:0.5rem 1rem;
    border:1px solid rgba(255,255,255,0.1);
    margin:10px 0;
    display:flex;
    align-items:center;
    }
    
    .section3 section .card span{
    padding:0 1rem;
    }
    
    @media (max-width:820px){
    .section3{
    display:block;
    background-image:none;
    }
    .section3 section{
    width:100%;
    position:static;
    padding:1rem;
    }
    }
    
    
    
    
    
    
    
    
    
    
    /*SECTION4*/
    .section4{
    align-items:top;
    margin-top: 50px;
    background-color:#f3f7f6;
    background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url(".https://i.ibb.co/1v2CTjz/shape.png");
    background-repeat:no-repeat;
    }
    
    .section4 .title_header{
    width:60%;
    }
    
    .section4 section{
    width:100%;
    }
    
    
    .section4 .cards {
    width: calc(100% - 2em);
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-template-rows: 1fr 1fr;
    grid-gap: 1em;
    grid-template-areas: "a a b c" "a a d d";
    width: 100%;
    }
    
    .section4 .card {
    width: 100%;
    position: relative;
    transition: all 0.25s ease;
    cursor: pointer;
    font-family: "Roboto", sans-serif;
    font-weight: 300;
    }
    .section4 .card:last-child {
    margin-bottom: 0;
    }
    .section4 .card:before {
    height: 0;
    content: "";
    display: block;
    padding-bottom: 47.36%;
    }
    .section4 .card.content:after {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    content: "";
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0), black);
    }
    .section4 .card:nth-child(1) {
    grid-area: a;
    }
    .section4 .card:nth-child(2) {
    grid-area: b;
    }
    .section4 .card:nth-child(3) {
    grid-area: c;
    }
    .section4 .card:nth-child(4) {
    grid-area: d;
    }
    .section4 .card-content {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }
    .section4 .card-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    }
    .section4 .card-img img {
    width: 100%;
    height: 100%;
    -o-object-fit: cover;
    object-fit: cover;
    }
    .section4 .card-label {
    position: absolute;
    top: 0.45rem;
    left: 0.45rem;
    background: #000000;
    text-transform: uppercase;
    font-weight: 300;
    font-size: 0.7em;
    color: white;
    padding: 0.5em;
    }
    .section4 .card-title {
    position: absolute;
    left: 1em;
    bottom: 1em;
    color: #d6dbeb;
    z-index: 5;
    font-size: 0.8em;
    }
    .section4 .card.form {
    position: relative;
    }
    .section4 .card.form:before {
    background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
    }
    .section4 .card.form:after {
    position: absolute;
    top: 0.5em;
    left: 0.5em;
    width: calc(100% - 1em);
    height: calc(100% - 1em);
    content: "";
    background: #252833;
    }
    .section4 .card.form .form-title {
    position: absolute;
    top: 3rem;
    left: 3rem;
    font-size: 7vw;
    font-weight: 900;
    z-index: 5;
    text-transform: uppercase;
    background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    }
    .section4 .card.form .form-title:before {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    height: 100%;
    content: "More";
    opacity: 0.5;
    filter: blur(10px);
    transition: all 0.25s ease;
    z-index: 2;
    background: linear-gradient(60deg, #f79533, #f37055, #ef4e7b, #a166ab, #5073b8, #1098ad, #07b39b, #6fba82);
    -webkit-text-fill-color: transparent;
    -webkit-background-clip: text;
    transform: translateX(-50%) translateY(-50%);
    }
    .section4 .card:nth-child(2) .card-label {
    background: #ef4e7b;
    }
    .section4 .card:nth-child(3) .card-label {
    background: #1098ad;
    }
    .section4 .card:hover {
    transform: scale(1.05);
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.35);
    }
    .section4 .card:hover .form-title:before {
    filter: blur(3px);
    opacity: 0.7;
    }
    
    @media (max-width:820px){
    .section4{
    padding:1rem;
    }
    .section4 .title_header{
    padding:1rem;
    width:100%;
    }
    .section4 .cards {
    width: calc(100% - 2em);
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 1fr 1fr 1fr;
    grid-gap: 1em 0em;
    grid-template-areas: "a" "a" "b" "c" "d";
    width: 100%;
    }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    /*CONTACT FORM*/
    .contact{
    padding:3rem;
    background-color:#f3f7f6;
    background-size:cover;
    display:flex;
    position:relative;
    }
    
    .contact section{
    width:100%;
    margin:auto;
    position:relative;
    }
    
    .contact section form{
    width:80%;
    background-color:var(--white);
    padding:2rem 1rem;
    box-shadow: 0 0 20px 0 #dddddd8c;
    border-radius:30px;
    
    }
    
    .contact section input{
    width:100%;
    padding:1rem;
    background-color:#f3f7f6;
    border:0;
    }
    
    .contact section textarea{
    width:100%;
    padding:1rem;
    resize:none;
    background-color:#f3f7f6;
    border:0;
    }
    
    .contact section button{
    margin:auto;
    border:0;
    display:block;
    color:var(--white);
    }
    
    .contact_info ul{
    display:flex;
    align-items:center;
    width:90%;
    margin:auto;
    }
    
    .contact_info ul li{
    padding:1rem;
    list-style:none;
    line-height:1.8em;
    } 
    
    .contact_info ul li .fa{
    color:var(--secondary);
    padding:15px;
    background-color:var(--white);
    border-radius:10px;
    font-size:2em;
    box-shadow: 0 0 20px 0 #dddddd8c;
    width:60px;
    text-align:Center;
    }
    
    @media (max-width:820px){
    .contact{
    display:block;
    padding:1rem;
    }
    .contact section form{
    width:100%;
    }
    .contact_info ul{
    width:100%;
    }
    }
    
    
    
    
    
    
    
    
    
    /*FOOTER*/
    footer{
    width:100%;
    background: linear-gradient(rgba(1,1,1,.8), rgba(1,1,1,.8)), url("https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80");
    background-size:cover;
    background-repeat:no-repeat;
    /* background-position: center top; */
    background-attachment:local;
    color:var(--white);
    padding:3rem 0;
    }
    
    footer a{
    color:var(--white);
    }
    
    /* footer a:hover{
    color:var(--primary);
    } */
    
    footer .top_section{
    padding:1rem;
    display:flex;
    align-items:center;
    }
    
    footer .top_section section{
    width:33%;
    display:flex;
    align-items:center;
    justify-content:center;
    }
    
    footer .top_section section span{
    padding:1rem;
    }
    
    footer .top_section section span .fa{
    font-size:2em;
    color:var(--primary);
    }
    
    footer .middle_section{
    padding:1rem;
    display:flex;
    align-items:center;
    justify-content:center;
    }
    
    footer .middle_section span{
    display:block;
    padding:1rem 0;
    text-align:center;
    }
    
    footer .middle_section span a{
    margin:0 20px;
    }
    
    footer .middle_section span a .fa{
    font-size:1.5em;
    }
    
    footer .bottom_section{
    
    text-align:center;
    font-size:13px;
    padding:1rem 0;
    }
    
    @media (max-width:820px){
    footer{
    background-attachment:local;
    }
    
    footer .middle_section{
    display:block;
    }
    footer .middle_section span a{
    white-space:nowrap;
    margin:10px ;
    }
    }   
    
    /*ADDITIONAL*/
    #roll_back{
    position:fixed;
    bottom:2rem;
    right:2rem;
    background-color:var(--blue);
    border-radius:5px;
    border:2px solid var(--white);
    padding:5px 10px;
    display:none;
    align-items:center;
    justify-content:center;
    z-index:999999;
    box-shadow:0px 6px 16px -6px rgba(1,1,1,0.5);
    color:var(--white);
    font-weight:900;
    }

a:link {
    text-decoration: none!important;
  }
     /*FOOTER*/
     footer{
    width:100%;
    background: linear-gradient(rgba(1,1,1,.8), rgba(1,1,1,.8)), url("https://images.unsplash.com/photo-1588195538326-c5b1e9f80a1b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1050&q=80");
    background-size:cover;
    background-repeat:no-repeat;
    background-position: center top;
    background-attachment:local;
    color:var(--white);
    padding:3rem 0;
    /* margin-top: 100px; */
    }
    
    footer a{
    color:var(--white);
    }
    
    /* footer a:hover{
    color:var(--primary);
    } */
    
    footer .top_section{
    padding:1rem;
    display:flex;
    align-items:center;
    }
    
    footer .top_section section{
    width:33%;
    display:flex;
    align-items:center;
    justify-content:center;
    }
    
    footer .top_section section span{
    padding:1rem;
    }
    
    footer .top_section section span .fa{
    font-size:2em;
    color:var(--primary);
    }
    
    footer .middle_section{
    padding:1rem;
    display:flex;
    align-items:center;
    justify-content:center;
    }
    
    footer .middle_section span{
    display:block;
    padding:1rem 0;
    text-align:center;
    }
    
    footer .middle_section span a{
    margin:0 20px;
    }
    
    footer .middle_section span a .fa{
    font-size:1.5em;
    }
    
    footer .bottom_section{
    
    text-align:center;
    font-size:13px;
    padding:1rem 0;
    }
    
    @media (max-width:820px){
    footer{
    background-attachment:local;
    }
    
    footer .middle_section{
    display:block;
    }
    footer .middle_section span a{
    white-space:nowrap;
    margin:10px ;
    }
    }
    
    
</style>

