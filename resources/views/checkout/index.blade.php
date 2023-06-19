@extends('layouts.app')
<link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
<script src="https://cdn.tailwindcss.com"></script>
@section ('content')
<script defer src="{{ mix('js/app.js') }}"></script>

                    
<div id="app">
    {{-- <form action="{{ route('checkout') }}" method="POST" id="checkout-form"> --}}
        @csrf
        <checkout user-name="{{ auth()->user()->name }}" 
            user-address="{{ $user->address }}" 
            user-phone="{{$user->phonenumber}}" 
            user-zip="{{$user->zipcode}}" user-city="{{$user->city}}"
            user-email="{{$user->email}}" 
            client-total="{{ Cart::getTotal() }}" date-today="<?php echo date("Y-m-d");?>" error-message="{{ $message ?? '' }}"/>
        {{-- </form> --}}
</div>

{{-- <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script> --}}

@endsection