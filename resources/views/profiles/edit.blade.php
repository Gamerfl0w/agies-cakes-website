@extends('layouts.app')

@section('content')
<div class="container sixtyvh">
    <form method="POST" action="{{ route('profile.update', ['id' => Auth::id()])  }}" enctype="multipart/form-data">
        @csrf
        {{-- @method('PATCH') --}}

        <div class="row">
            <input type="hidden" name="id" value="{{$user['id']}}"> 
            
            <div class="col-8 mx-auto">
                <p class="text-4xl my-10 text-center" style="margin-top: 120px; margin-bottom: 50px;">Edit Profile</p>
                <hr class="my-3">

                @if ($message = Session::get('success'))
                <div class="p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                    <span class="font-medium">{{ $message }}</span> 
                  </div>
                  @endif
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name:') }}</label>
        
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus>
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="phonenumber" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number:') }}</label>
        
                    <div class="col-md-6">
                        <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') ?? $user->phonenumber  }}" required autocomplete="phonenumber" autofocus>
        
                        @error('phonenumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>Invalid format. Supported formats: 09 or +63</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                {{-- <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country:') }}</label>
        
                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') ?? $user->country  }}" required autocomplete="country" autofocus>
        
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> --}}
                
                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Municipality:') }}</label>
        
                    <div class="col-md-6">
                    <select id="city" type="text" class="form-control @error('city') is-invalid @enderror" 
                        name="city" value="{{ old('city') ?? $user->city }}" >
                        <option value="" disabled selected >{{ $user->city }}</option>
                        <option value="Torrijos">Torrijos</option>
                        <option value="Santa Cruz">Santa Cruz</option>
                    </select>
                        <!-- <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" 
                        name="city" value="{{ old('city') ?? $user->city }}" required autocomplete="city" autofocus> -->
        
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address:') }}</label>
        
                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $user->address }}" required autocomplete="address" autofocus>
        
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('Zipcode:') }}</label>
        
                    <div class="col-md-6">
                        <input readonly id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{ old('zipcode') ?? $user->zipcode }}" required autocomplete="zipcode" autofocus>
        
                        @error('zipcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="text-white bg-pink-500 p-3 hover:bg-pink-600 w-100">
                            {{ __('Done') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>

        
    </form>
</div>
@endsection
