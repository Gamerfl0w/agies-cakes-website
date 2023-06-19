@extends('layouts.app')

@section ('content')

    @if(!$cartItems->isEmpty())
    <div style="display: none">
        {{ $total = 0 }}
    </div>  
        <div class="container p-0 filled-cart">
            <div class="mr-2 ml-2">
                <p class="text-4xl text-center py-14 mt-20 md:py-10 ">Your Cart</p>
                <hr>
            </div>
           
            <div class="row mr-2 ml-2 mb-10">
                
                <div class="col-lg-8 col-sm-12 pt-2 pr-4 pl-4">
                    <div class="row">
                        @foreach ($cartItems as $item)
                            <div class="col-12 d-flex p-2 justify-content-between cart-item text-white mb-3" 
                            style="background: linear-gradient(rgba(1,1,1,.7), rgba(1,1,1,.7)), 
                            url({{ $item->attributes->theme == 'No theme' ?  asset('/storage/'.'products/11.jpg')
                            : asset('/storage/'.$item->attributes->theme) }}); background-size: cover;">
                                <div class="item-image">
                                    <img src="{{ asset('/storage/'.$item->attributes->image) }}" class="h-24 w-24" alt="">
                                </div>
                                <div class="item-detail mr-auto d-flex flex-column justify-content-center">
                                    @if ($item->name != "Custom Cake")
                                        <div class="info-2 ml-4"><h5>{{ $item->name }}</h5> </div> 
                                        <div class="info-4 ml-4"><h6>Quantity: {{ $item->quantity }}</h6></div>
                                        <div class="info-4 ml-4"><h6>Greeting: {{ $item->attributes->message ?? '' }}</h6></div>
                                    @else
                                        <div class="info-2 ml-4"><h5>{{ $item->name }}</h5> </div>  
                                        <div class="info-3 ml-4"><h6>Size: {{ $item->attributes->size ?? '' }}</h6></div>
                                        <div class="info-3 ml-4"><h6>Flavor: {{ $item->attributes->flavor ?? '' }}</h6></div>
                                        <div class="info-3 ml-4"><h6>Filling: {{ $item->attributes->filling ?? '' }}</h6></div>
                                        <div class="info-3 ml-4"><h6>Icing: {{ $item->attributes->icing ?? '' }} Icing</h6></div>
                                        <div class="info-3 ml-4"><h6>Decoration: {{ $item->attributes->decoration ?? '' }}</h6></div>
                                        <div class="info-3 ml-4"><h6>Cake Greeting: {{ $item->attributes->message ?? '' }}</h6></div>
                                        <div class="info-3 ml-4"><h6>Note to Bakery: {{ $item->attributes->note ?? '' }}</h6></div>
                                        <div class="info-4 ml-4"><h6>Quantity: {{ $item->quantity }}</h6></div>
                                        <div class="info-4 ml-4"><h6>Custom Theme: {{ $item->attributes->theme == 'No theme' ? 'None' : substr($item->attributes->theme, 21) }}</h6></div>
                                    @endif
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        <div class="info-5 ml-4 mt-4">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button type="submit" class="remove-cart">
                                                <i class="fa fa-trash text-white"> Delete</i> 
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <div class="h-full flex flex-col justify-between items-end">
                                        <div>PHP {{ $item->price }}</div>
                                        <input type="hidden" value="{{ $item->id }}" name="id">
                                        <div class="flex">
                                            <p class="mr-2">Quantity: </p>
                                            <input type="text" class="text-black px-2 w-12" name="quantity" id="quantity" value="{{$item->quantity}}">
                                        </div>
                                        <button type="submit" class="">Update Quantity</button>
                                </form>
                                    </div>
                                </div>

                        @php
                            $total += $item->price;
                        @endphp
                        @endforeach
                    </div>


                </div>

                <div class="col-lg-4 col-sm-12 p-2 mb-24">
                    <div class="card">
                        <div class="card-body">
                            <div class="cart-checkout">
                                <div class="info-1">
                                    SUMMARY
                                </div>
                                <hr>
                                <div class="info-2 font-bold">
    
                                    TOTAL: PHP {{ Cart::getTotal() }}
         
                                </div>
                                <div class="info-3 pt-3">
                                    <a href="{{ route('checkout.index') }}"><button class="text-white bg-pink-500 p-3 hover:bg-pink-600 w-100">CHECKOUT</button></a>
                                </div>
                                <div class="info-4 pt-3">
                                    <a href="{{ route('product.index') }}"><button class="text-white bg-indigo-500 p-3 hover:bg-indigo-600 w-100">CONTINUE SHOPPING</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @else
    <div class="flex absolute justify-center items-center h-full w-full">
        <div class="row">
            <div class="text-center empty-cart">
                <div><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 150px"></i></div>
                <div><h4 class="text-4xl"><b>Your cart is empty.</b></h4></div>
                <div><a class="text-black border-b-2" href="{{ route('product.index') }}">Get your order here</a></div>
            </div>
        </div>
    </div>

    @endif
@endsection