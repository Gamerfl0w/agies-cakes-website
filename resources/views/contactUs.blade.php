@extends('layouts.app')

<script src="https://cdn.tailwindcss.com"></script>

@section ('content')

<body class="bg-slate-100 mt-24">
  <section class="bg-slate-100 mt-1">
    {{-- <div class="bg-pink-600 text-white w-fit p-3 rounded-r-3xl">
      Please see our FAQs section below before you contact us.
    </div> --}}

    <div class="bg-white mt-10 p-10">
      <h1 class="text-4xl font-bold">FAQs</h1>
      @foreach ($questions as $item)
        <div class="mt-5">
          <p class="font-bold text-2xl">{{ $item->question }}</p>
          <p class="text-xl">{{ $item->answer }}</p>
        </div>
      @endforeach
    </div>
  </section>

  <section class="p-10">
    <h1 class="text-4xl font-bold">Store Location</h1>
    <iframe class="w-full mt-5 h-[400px] sm:h-[500px]" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4919.261913978653!2d122.09798251641567!3d13.392678686205421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a31c0dea0451f1%3A0x14b4fcff4a5bd0b1!2sMatuyatuya%2C%20Torrijos%2C%20Marinduque!5e0!3m2!1sen!2sph!4v1683970315464!5m2!1sen!2sph" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </section>

  {{-- <main class="flex flex-col gap-3 h-screen justify-start items-center bg-slate-100">
  <h1 class="text-[54px] text-center text-[#02044a] mt-5">Contact Us</h1>
  <p class="text-center text-xl">Any questions or remarks? Just write us a message!</p>

  <div class="w-4/5 flex bg-white rounded-3xl p-2">
    <div class="flex flex-wrap lg:flex-nowrap">
      <div class="w-full xl:w-[35%] xl:h-full bg-[#3e2093] rounded-3xl text-white">
      <div class="p-10 flex flex-col h-full">
          <h1 class="text-2xl font-bold">Contact Information</h1>
          <p class="opacity-70 mt-2">Fill up the form and our team will get back to you within 24hrs.
          </p>
          <div class="flex flex-col grow mt-7 lg:mt-0 justify-center items-center lg:items-start">
            <div class="flex flex-col gap-7">
                <div class="flex gap-5 items-center">
                  <svg class="w-7 h-7" viewBox="0 0 24 24" fill="#ff248e" xmlns="http://www.w3.org/2000/svg" stroke="#ff2990"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.15" d="M20.9995 16.4767V19.1864C21.0037 20.2223 20.0723 21.0873 19.0265 20.9929C10.0001 21 3.00006 13.935 3.00713 4.96919C2.91294 3.92895 3.77364 3.00106 4.80817 3.00009H7.52331C7.96253 2.99577 8.38835 3.151 8.72138 3.43684C9.66819 4.24949 10.2772 7.00777 10.0429 8.10428C9.85994 8.96036 8.99696 9.55929 8.41026 10.1448C9.69864 12.4062 11.5747 14.2785 13.8405 15.5644C14.4272 14.9788 15.0274 14.1176 15.8851 13.935C16.9855 13.7008 19.7615 14.3106 20.5709 15.264C20.858 15.6021 21.0105 16.0337 20.9995 16.4767Z" fill="#ff248e"></path> <path d="M20.9995 19.1864V16.4767C21.0105 16.0337 20.858 15.6021 20.5709 15.264C19.7615 14.3106 16.9855 13.7008 15.8851 13.935C15.0274 14.1176 14.4272 14.9788 13.8405 15.5644C11.5747 14.2785 9.69864 12.4062 8.41026 10.1448C8.99696 9.55929 9.85994 8.96036 10.0429 8.10428C10.2772 7.00777 9.66819 4.24949 8.72138 3.43684C8.38835 3.151 7.96253 2.99577 7.52331 3.00009H4.80817C3.77364 3.00106 2.91294 3.92895 3.00713 4.96919C3.00006 13.935 10.0001 21 19.0265 20.9929C20.0723 21.0873 21.0037 20.2223 20.9995 19.1864Z" stroke="#ff248e" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    <p>09487039430</p>
                </div>
                <div class="flex gap-5 items-center">
                  <svg class="w-7 h-7" viewBox="0 -2.5 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#ff248e"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>email [#ff248e]</title> <desc>Created with Sketch.</desc> <defs> </defs> <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="Dribbble-Light-Preview" transform="translate(-340.000000, -922.000000)" fill="#ff248e"> <g id="icons" transform="translate(56.000000, 160.000000)"> <path d="M294,774.474 L284,765.649 L284,777 L304,777 L304,765.649 L294,774.474 Z M294.001,771.812 L284,762.981 L284,762 L304,762 L304,762.981 L294.001,771.812 Z" id="email-[#ff248e]"> </path> </g> </g> </g> </g></svg>
                    <p>agies.website@gmail.com</p>
                </div>
                <div class="flex gap-5 items-center">
                  <svg class="w-10 h-10" version="1.0" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 64 64" enable-background="new 0 0 64 64" xml:space="preserve" fill="#ff248e"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill="#ff248e" d="M32,0C18.746,0,8,10.746,8,24c0,5.219,1.711,10.008,4.555,13.93c0.051,0.094,0.059,0.199,0.117,0.289l16,24 C29.414,63.332,30.664,64,32,64s2.586-0.668,3.328-1.781l16-24c0.059-0.09,0.066-0.195,0.117-0.289C54.289,34.008,56,29.219,56,24 C56,10.746,45.254,0,32,0z M32,32c-4.418,0-8-3.582-8-8s3.582-8,8-8s8,3.582,8,8S36.418,32,32,32z"></path> </g></svg>
                    <p>Purok Marikina, Barangay Matuyatuya, Torrijos, Marinduque</p>
                </div>
            </div>
          </div>
      </div>
    </div>

    <form class="p-5 grow">
      <div class="flex flex-col justify-center gap-10">
        <div class="flex justify-center gap-5">
          <input class="border-b-2 border-gray-300 w-full lg:text-xl p-3" type="text" name="" id="" placeholder="First Name">
          <input class="border-b-2 border-gray-300 w-full lg:text-xl p-3" type="text" name="" id="" placeholder="Last Name">
        </div>

        <div class="flex justify-center gap-5">
          <input class="border-b-2 border-gray-300 w-full lg:text-xl p-3" type="text" name="" id="" placeholder="Email">
          <input class="border-b-2 border-gray-300 w-full lg:text-xl p-3" type="text" name="" id="" placeholder="Phone">
        </div>

        <textarea class="border-2 border-gray-300 lg:text-xl p-3" name="" id="" cols="10" rows="7" placeholder="Enter Message...."></textarea>
      </div>

      <button class="mt-3 w-full bg-pink-600 p-2 text-white rounded-3xl">Send</button>
    </form>
    </div>

  </div>
  </main> --}}
  </body>
@endsection