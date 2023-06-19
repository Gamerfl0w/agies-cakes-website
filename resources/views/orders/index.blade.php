    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>My Orders</title>
    </head>

    @if(!$orders->isEmpty())
    <body style="background-color: #460C68;">
    @extends('layouts.app')
    @section ('content')

        <div class="flex flex-col items-center h-[110%] text-white">
            <div class="mt-36 mb-14 md:my-20">
                <p class="text-4xl md:mt-10">Purchase History</p>
            </div>
            
            @foreach($orders as $order)
              <p class="text-xl md:text-2xl flex justify-start md:w-3/5 md:flex-none md:ml-5 md:mb-3">
                Order #{{ $order->id }}, Shipping: ₱{{ $order->shipping }}
              </p>
            <div class="w-[95%] md:w-3/5 h-auto py-4 md:py-12 px-3 md:px-12 text-2xl rounded-2xl mb-10" style="background: #CB1C8D">
              @foreach (json_decode($order->cart) as $item)

              @if($order->status == 'Pending')
                <div class="w-full md:w-4/5 mx-auto mb-20 md:mb-14 bg-white rounded-full h-2.5 dark:bg-gray-700">
                  <div class="bg-[#2777DB] h-2.5 rounded-full w-[13%] md:w-[20%]"></div>
                  <div class="flex justify-between text-sm md:text-xl">
                    <p class="font-bold">Order Placed</p>
                    <p>Order Confirmed</p>
                    <p>On the Way</p>
                    <p>Delivered</p>
                  </div>
                </div>

              @elseif($order->status == 'Accepted')
                <div class="w-full md:w-4/5 mx-auto mb-20 md:mb-14 bg-white rounded-full h-2.5 dark:bg-gray-700">
                  <div class="bg-[#2777DB] h-2.5 rounded-full w-[50%] md:w-[53%]"></div>
                  <div class="flex justify-between text-sm md:text-xl">
                    <p>Order Placed</p>
                    <p class="font-bold">Order Confirmed</p>
                    <p>On the Way</p>
                    <p>Delivered</p>
                  </div>
                </div>
              
              @elseif($order->status == 'On the Way')
              <div class="w-full md:w-4/5 mx-auto mb-20 md:mb-14 bg-white rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-[#2777DB] h-2.5 rounded-full w-[65%] md:w-[70%]"></div>
                <div class="flex justify-between text-sm md:text-xl">
                  <p>Order Placed</p>
                  <p>Order Confirmed</p>
                  <p class="font-bold">On the Way</p>
                  <p>Delivered</p>
                </div>
              </div>

              @else
              <div class="w-full md:w-4/5 mx-auto mb-20 md:mb-14 bg-white rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-[#2777DB] h-2.5 rounded-full w-full"></div>
                <div class="flex justify-between text-sm md:text-xl">
                  <p>Order Placed</p>
                  <p>Order Confirmed</p>
                  <p>On the Way</p>
                  <p class="font-bold">Delivered</p>
                </div>
              </div>

              @endif

              <div class="flex w-full justify-center items-center mb-5 md:justify-around gap-5 md:gap-3 flex-wrap flex-shrink-0">
                  
                    <div class="flex-shrink-0">
                        <img class="flex-shrink-0 rounded-full h-32 w-32 md:h-36 md:w-36" 
                        src="{{ asset('/storage/'.$item->attributes->image ) }}"  alt="">
                    </div>
                    <div class="mx-10 text-center">
                        <p class="font-bold">{{ $item->name }}</p>
                        @if(@empty($item->attributes->size))
                            
                        @else
                            <p>Size: {{ $item->attributes->size ?? '' }}</p>
                        @endif                      
                        <p>Quantity: {{ $item->quantity ?? '' }}</p>
                        <p>Price: ₱ {{ $item->price ?? '' }}</p>
                        <p>{{ $order->country }}</p>
                    </div>
                </div>
                @endforeach
                <div class="flex flex-col justify-center items-center text-center w-full mt-5 md:w-auto rounded-2xl bg-[#1CCB5A] md:bg-transparent font-bold">
                  <p class="flex-shrink-0">Total Price</p>
                  <p>₱ {{ $order->total ?? ''}}</p>
              </div>
              <form action="{{ route('receipt') }}" method="POST">
                @csrf
                <div class="flex flex-col justify-center items-center text-center w-full mt-3 md:w-auto rounded-2xl bg-[#1C35CB] md:bg-transparent font-bold" >
                    <input type="hidden" name="receipt" value="{{ $order->id }}">
                    <div class="flex justify-center items-center cursor-pointer hover:opacity-80">
                      <i class="fa-solid fa-file-arrow-down mr-3"></i>
                      <button type="submit">Download Receipt</button>
                    </div>
                </div>
              </form>
              
            </div>
            @endforeach
            <div class="flex justify-center gap-6 mb-6 text-white">
            @if ($orders->onFirstPage())
          
            @else
              <a class="mb-3 text-xl" href="{{ $orders->previousPageUrl() }}">
                < Previous
              </a>
            @endif
            @if ($orders->hasMorePages())
              <a class="mb-3 text-xl" href="{{ $orders->nextPageUrl() }}">
                Next >
              </a>   
            @else
             
            @endif
          </div>
        </div>
        
    </body>
    @endsection

    @else
    <div class="flex absolute justify-center items-center h-full w-full">
      <div class="row">
          <div class="text-center empty-cart">
              <div><i class="fa fa-th-list" aria-hidden="true" style="font-size: 150px"></i></div>
              <div><h4 class="text-4xl"><b>Your purchase history is empty.</b></h4></div>
              <div><a class="text-black border-b-2" href="{{ route('product.index') }}">Order your first cake here.</a></div>
          </div>
      </div>
  </div>
  
        
    @endif


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