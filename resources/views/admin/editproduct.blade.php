{{-- THIS IS UPDATE/EDIT --}}

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    <title>Edit Product</title>
</head>
<body class="flex flex-col justify-center items-center text-white overflow-auto" style="background-color: #460C68;">
    
  @if (count($errors) > 0)
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

<a href="/" class="logo">
  <img class="border-2" src="{{ asset('photo/agies-logo.jpg') }}" alt="">
</a>

  <input class="menu-icon" type="checkbox" id="menu-icon" name="menu-icon"/>
  <label for="menu-icon"></label>
  <nav class="nav"> 		
    <ul class="pt-5">
      <li><a href="/product">Products</a></li>
      <li><a class="text-white" href="/cart">Cart {{ Session::has('cart') ? '('.Session::get('cart')->totalQuantity.')' : '' }}</a></li>
          <li>@if (Auth::check())
              <a href="{{ route('order.show',['user'=>Auth::user()->id]) }}">My Orders</a>            
          @endif
          @guest
          
          @else
              @if (Auth::user()->role == 'Admin')
                 <li><a href="/dashboard">Dashboard</a></li>
              @else
                  {{-- Do nothing --}}
              @endif
          @endif</li>
          <li>@if(Auth::guest())
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

  <div class="container items-center px-5 py-12 lg:px-20">
        <form method="POST" action="{{ route('product.edit',['id'=>$product->id]) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
          <input type="hidden" name="id" value="{{ $product->id }}">
          <section class="flex flex-col p-1 overflow-auto">
            <label for="name" class="text-4xl pb-3 text-center leading-7 text-blueGray-500 mb-5">Edit Product</label>
            <header class="text-black flex flex-col items-center justify-center py-12 text-base text-blueGray-500 
            transition duration-500 ease-in-out transform bg-white border border-dashed rounded-lg 
            focus:border-pink-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current bg-cover bg-center bg-no-repeat
            ring-offset-2" style="background-image: url('https://img.freepik.com/free-photo/frame-food-ingredients-baking-gently-pink-pastel-background-cooking-flat-lay-with-copy-space-top-view-baking-concept-flat-lay_127032-2200.jpg')">
              <p class="flex flex-wrap justify-center mb-3 text-base leading-7 text-blueGray-500">
                <span>Upload Product Image</span>
              </p>
              <input type="file" id="image" name="image" class="text-black w-auto px-2 py-1 my-2 mr-2 text-blueGray-500 transition duration-500 ease-in-out transform border rounded-md hover:text-blueGray-600 text-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-gray-100" >
              @error('image')

              <div style="color:red; font-weight:bold; font-size:0.7rem;">{{ $message }}</div>

              @enderror
            </header>
          </section>           
          <div class="relative pt-4">
            <label for="name" class="text-base leading-7 text-blueGray-500">Product Name</label>
            <input type="text" id="name" name="name" placeholder="name" value="{{ $product->name }}" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" required="">
            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
            @enderror
        </div>
          <div class="relative pt-4">   
            <label for="price" class="text-base leading-7 text-blueGray-500">Product Price</label>
            <input type="number" id="price" name="price" placeholder="price" value="{{ $product->price }}" class="w-full px-4 py-2 mt-2 mr-4 text-base text-black transition duration-500 ease-in-out transform rounded-lg bg-gray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2" required="">
          </div>
          <div class="flex flex-wrap mt-4 mb-6 -mx-3">
            <div class="w-full px-3">
              <label class="text-base leading-7 text-blueGray-500" for="description">Product Details</label>
              <textarea name="description" class="w-full h-32 text-black px-4 py-2 mt-2 text-base text-blueGray-500 transition duration-500 ease-in-out transform bg-white border rounded-lg focus:border-pink-500 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 apearance-none autoexpand" id="details" type="text" name="details">{{ $product->info }}</textarea>
            </div>
          </div>
          <div class="flex items-center w-full pt-4 mb-4">
            <button type="submit" class="w-full py-3 text-base text-white transition duration-500 ease-in-out transform border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:opacity-70" style="background: #CB1C8D">
                 UPDATE PRODUCT
            </button>
          </div>
        </form>
      </div>
</body>
</html>

<style>
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
z-index: 9;
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
z-index: 6;
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
</style>
