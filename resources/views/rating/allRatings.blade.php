@extends('layouts.app')
<script defer src="{{ mix('js/app.js') }}"></script>

@section ('content')
    
    <main class="flex justify-center items-center flex-col p-10 gap-10">
        <h1 class="text-[34px] mt-24">{{ $getProduct }} Reviews</h1>
        
    @foreach($ratings as $rating)
        <div class="bg-pink-100 w-4/5 sm:w-1/2 min-h-[200px] p-5 flex flex-col gap-5 rounded-md">
          <div class="flex gap-4 items-center">
            <img class="w-14 h-14 rounded-full flex-shrink-0" src="{{ asset('photo/agies-logo.jpg') }}" alt="" loading="lazy">
            <div>
              <p class="font-bold">{{ $rating->name }}</p>
              <div class="flex gap-5" v-if="rating.rating == 'Great!'">
                <ul class="flex items-center gap-x-1">
                  @if ($rating->star == 5)
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
          
                  @elseif($rating->star == 4)
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
          
                  @elseif($rating->star == 3)
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                  
                  @elseif($rating->star == 2)
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                  
                  @elseif($rating->star == 1)
                    <li>
                      <i class="text-yellow-500 fas fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                    <li>
                      <i class="text-yellow-500 far fa-star"></i>
                    </li>
                  @endif
                </ul>
              </div>
            </div>
          </div>

          <p>{{ $rating->detail }}</p>
          <p class="font-medium w-full flex justify-end">{{ date('M d, Y', strtotime($rating->created_at)) }}</p>
        </div>
    @endforeach
    </main>

@endsection