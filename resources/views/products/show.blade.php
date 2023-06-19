@extends('layouts.app')
<script defer src="{{ mix('js/app.js') }}"></script>

@section ('content')

<div class="bg-white mb-10 md:mt-20">
    <main>
      <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- Add these to custom cake --}}
            <input type="hidden" value="{{ $product->id }}" name="id">
            <input type="hidden" value="{{ $product->name }}" name="name">
            <input type="hidden" value="{{ $product->price }}" name="price">
            <input type="hidden" value="{{ $product->image }}"  name="image">
            <input type="hidden" value="1" name="quantity">
            <input type="hidden" name="popularity">
        <div class="container mx-auto px-6">
            <div class="md:flex md:items-center">
                <div class="w-full h-64 md:w-4/5 px-10 lg:h-96" style="margin-top: 120px; margin-bottom: 50px;">
                    <img class="h-full w-full rounded-md object-cover max-w-lg mx-auto bg-cover bg-center" style="background-image: url({{ URL::asset('/storage/'.$product->image) }})">
                </div>
                <div class="w-full max-w-lg mx-auto md:ml-8 md:mt-0 md:w-1/2">
                    <h2 class="mt-24 text-center text-gray-700 uppercase text-3xl">{{ $product->name }}</h2>
                    <span class="flex w-full justify-center text-center mt-3 text-xl font-bold">P{{ $product->price }}</span>
                    <hr class="my-3">
                    <div class="mt-2">
                      <label class="text-gray-900 text-2xl" for="description">{{ $product->info }}</label>
                    </div>
                    <div>
                        <p class="my-3 text-lg text-gray-900">Cake Greeting:</p>
                            <textarea name="message" id="message" rows="4" class="p-2.5 w-full text-base bg-white rounded-lg border border-indigo-500 focus:ring-blue-500 focus:border-blue-500" placeholder="Your message..."></textarea>
                    </div>
                    
                    {{-- <div class="mt-2 border-amber-800">
                        <select id="size-dropdown">
                            <option name="size" selected="true" value="nothing" disabled hidden>Choose cake size</option>
                            @foreach($sizes as $size)
                                @if($size->quantity > 0)
                                    <option value="{{ $size->name }}">{{ $size->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div> --}}
                    @if(Auth::check())
                    @if (Auth::user()->role == 'Customer' ?? '')
                        <div class="flex items-center mt-6">
                                <button type="submit" class="w-full px-8 py-3 bg-pink-700 text-white text-sm font-medium rounded hover:bg-pink-500 focus:outline-none focus:bg-pink-500">
                                    ADD TO CART
                                </button>   
                        </div>
                    @endif
                    @endif
                    
                    @guest
                    <button type="button" class="inline-block w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out" data-bs-toggle="modal" data-bs-target="#exampleModalCenteredScrollable">
                        Add To Cart
                      </button>
                      
                      <div class="text-black modal fade fixed top-0 left-0 w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="exampleModalCenteredScrollable" tabindex="-1" aria-labelledby="exampleModalCenteredScrollable" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable relative w-auto pointer-events-none">
                          <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
                            <div class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
                              <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalCenteredScrollableLabel">
                               Guests Can't Order
                              </h5>
                              <button type="button"
                                class="btn-close box-content w-4 h-4 p-1 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:no-underline"
                                data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body relative p-4">
                              <p>Log In or Register in order to add products to cart.</p>
                            </div>
                            <div
                              class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">
                              <a href="{{ route('login') }}"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-purple-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-purple-800 active:shadow-lg transition duration-150 ease-in-out">
                                Log In
                              </a>
                              <a href="{{ route('register') }}"
                                class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out ml-1">
                                Register
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endguest
                </div>
            </div>
        </div>
    </main>
</form>
</div>

<section class="p-10 bg-gray-100 rounded-md">
  <div class="flex items-center justify-between">
    <h1 class="text-3xl font-bold">{{ $count == 0 ? "No" : $count }} Reviews</h1>
      <div id="app">
        <add-rating user-name="{{ auth()->user()->name ?? 0 }}" guest="{{ !Auth::check() }}" product="{{ $product->name }}"
          review-exists="{{ $reviewExists }}" review="{{ $userReview == null ? "" : $userReview }}" />
      </div>
  </div>

  <hr class="my-5">

  <div class="flex flex-col gap-2 flex-wrap w-full">
    <div class="flex gap-5 items-center">
    <p class="font-bold">5</p>
    <div class="mt-1  h-4 relative w-full rounded-full overflow-hidden">
        <div class=" w-full h-full bg-gray-200 absolute "></div>
        @if($fiveStar == 0)
          <div class=" h-full bg-yellow-400 absolute" style="width: 0%"></div>
        @else
          <div class=" h-full bg-yellow-400 absolute" style="width: {{ $fiveStar == 0 ? 0 : ($fiveStar / $allStars) * 100 }}%"></div>
        @endif
    </div>
  </div>

  <div class="flex gap-5 items-center">
    <p class="font-bold">4</p>
    <div class="mt-1  h-4 relative w-full rounded-full overflow-hidden">
        <div class=" w-full h-full bg-gray-200 absolute "></div>
        @if($fourStar == 0)
          <div class=" h-full bg-yellow-400 absolute" style="width: 0%"></div>
        @else
          <div class=" h-full bg-yellow-400 absolute" style="width:{{ $fourStar == 0 ? 0 : ($fourStar / $allStars) * 100 }}%"></div>
        @endif
    </div>
  </div>

  <div class="flex gap-5 items-center">
    <p class="font-bold">3</p>
    <div class="mt-1  h-4 relative w-full rounded-full overflow-hidden">
        <div class=" w-full h-full bg-gray-200 absolute "></div>
        @if($threeStar == 0)
          <div class=" h-full bg-yellow-400 absolute" style="width: 0%"></div>
        @else
          <div class=" h-full bg-yellow-400 absolute" style="width:{{ $threeStar == 0 ? 0 : ($threeStar / $allStars) * 100 }}%"></div>
        @endif
    </div>
  </div>

  <div class="flex gap-5 items-center">
    <p class="font-bold">2</p>
    <div class="mt-1  h-4 relative w-full rounded-full overflow-hidden">
        <div class=" w-full h-full bg-gray-200 absolute "></div>
        @if($twoStar == 0)
          <div class=" h-full bg-yellow-400 absolute" style="width: 0%"></div>
        @else
          <div class=" h-full bg-yellow-400 absolute" style="width:{{ $twoStar == 0 ? 0 : ($twoStar / $allStars) * 100 }}%"></div>
        @endif
    </div>
  </div>

  <div class="flex gap-5 items-center">
    <p class="font-bold">1</p>
    <div class="mt-1  h-4 relative w-full rounded-full overflow-hidden">
        <div class=" w-full h-full bg-gray-200 absolute "></div>
        @if($oneStar == 0)
          <div class=" h-full bg-yellow-400 absolute" style="width: 0%"></div>
        @else
          <div class=" h-full bg-yellow-400 absolute" style="width:{{ $oneStar == 0 ? 0 : ($oneStar / $allStars) * 100 }}%"></div>
        @endif
    </div>
  </div>
  </div>
</section>

<main class="p-10 flex flex-col">
  {{-- <div class="flex gap-5">
    <button class="rounded-md p-3 bg-gray-100 w-36">Most Recent</button>
    <button class="rounded-md bg-gray-100 w-36">Popular</button>
    <button class="rounded-md bg-gray-100 w-36">Critical</button>
  </div> --}}

  @if($reviewExists)
  <div class="flex flex-col gap-5 md:items-start items-center bg-[#460C68] text-white rounded-2xl p-5 mb-5">
    <h1 class="text-2xl">Your Review</h1>
    <div class="flex items-center gap-5">
      <img class="rounded-full w-14 h-14" src="{{ asset('photo/agies-logo.jpg') }}" alt="">
      <p class="text-xl">{{ $userRating->name }}</p>
    </div>

    <div class="flex gap-5" v-if="rating.rating == 'Great!'">
      <ul class="flex items-center gap-x-1">
        @if ($userRating->star == 5)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>

        @elseif($userRating->star == 4)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>

        @elseif($userRating->star == 3)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
        
        @elseif($userRating->star == 2)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
        
        @elseif($userRating->star == 1)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
        @endif
      </ul>
      <p class="font-medium">{{ date('M d, Y', strtotime($userRating->updated_at)) }}</p>
    </div>

    <div class="w-4/5 mb-5">
      <p class="flex justify-center md:justify-start w-full">{{ $userRating->detail }}</p>
    </div>
  </div>
  @endif

  
  <div class="flex flex-col gap-5 md:items-start items-center ">
    @foreach($ratings as $rating)
    <div class="flex items-center gap-5">
      <img class="rounded-full w-14 h-14" src="{{ asset('photo/agies-logo.jpg') }}" alt="">
      <p class="text-xl">{{ $rating->name }}</p>
    </div>

    <div class="flex gap-5" v-if="rating.rating == 'Great!'">
      <ul class="flex items-center gap-x-1">
        @if ($rating->star == 5)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>

        @elseif($rating->star == 4)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>

        @elseif($rating->star == 3)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
        
        @elseif($rating->star == 2)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
        
        @elseif($rating->star == 1)
          <li>
            <i class="text-yellow-300 fas fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
          <li>
            <i class="text-yellow-300 far fa-star"></i>
          </li>
        @endif
      </ul>
      <p class="font-medium">{{ date('M d, Y', strtotime($rating->created_at)) }}</p>
    </div>

    <div class="w-4/5 mb-5">
      <p class="flex justify-center md:justify-start w-full mb-4">{{ $rating->detail }}</p>
      <hr>
    </div>
  @endforeach
  </div>

    @if($productName !== 'No data')
      <div class="text-center">
        <a href="{{ route('allRatings', ['productName'=> $productName == '' ? '' : $productName]) }}" class="p-3 bg-[#d10a43] hover:opacity-50 rounded-2xl text-white">View All Reviews</a>
      </div>
    @endif

</main>    

@endsection