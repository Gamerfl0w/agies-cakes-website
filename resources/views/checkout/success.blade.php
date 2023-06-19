<script defer src="{{ mix('js/app.js') }}"></script>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
<div class="bg-white flex justify-center items-center h-full flex-col">
    <div class="bg-white p-6 md:mx-auto">
      <svg viewBox="0 0 24 24" class="text-green-600 w-32 h-32 mx-auto my-6">
          <path fill="currentColor"
              d="M12,0A12,12,0,1,0,24,12,12.014,12.014,0,0,0,12,0Zm6.927,8.2-6.845,9.289a1.011,1.011,0,0,1-1.43.188L5.764,13.769a1,1,0,1,1,1.25-1.562l4.076,3.261,6.227-8.451A1,1,0,1,1,18.927,8.2Z">
          </path>
      </svg>
      <div class="text-center">
          <h3 class="text-[50px] lg:text-4xl text-gray-900 font-semibold text-center">Payment Done!</h3>
          @if($checkOrder->payment_type == 'Half')
          <p class="text-[40px] lg:text-2xl text-gray-600 my-2 font-bold">Your remaining balance is PHP {{$checkOrder->total / 2}}, please pay upon delivery.</p>
          @endif
          <p class="text-[40px] lg:text-2xl text-gray-600 my-2">Thank you for completing your secure online payment.</p>
          <p class="text-[40px] lg:text-2xl text-gray-600 my-2">Please wait within the day for the confirmation of your order.</p>
          <p class="text-[40px] lg:text-2xl text-gray-600 my-2">We also sent you an email for your order.</p>
          <p class="text-[40px] lg:text-xl mt-5"> Have a great day!</p>
          <div class="py-10 text-center">
              <a href="/" class="px-12 text-[30px] lg:text-xl rounded-l bg-pink-700 hover:bg-pink-800 text-white font-semibold py-3">
                  GO HOME
             </a>
             <a href="/product" class="px-8 text-[30px] lg:text-xl rounded-r bg-indigo-700 hover:bg-indigo-800 text-white font-semibold py-3">
                CONTINUE ORDERING
           </a>
          </div>

          <a href="/rate-us" class="underline mt-12 text-[30px] lg:text-xl text-gray-900 font-semibold text-center">Rate Us Here</a>
      </div>
  </div>

  <div id="app">
    <cake-modal />
  </div>
</div>