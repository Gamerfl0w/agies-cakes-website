<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
<script src="https://cdn.tailwindcss.com"></script>
  {{-- Important for vue to work --}}
  <script defer src="{{ mix('js/app.js') }}"></script>
</head>

@extends('layouts.app')
@section ('content')
<div class="md:mt-20" id="app">
  <custom />
</div>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
@endsection