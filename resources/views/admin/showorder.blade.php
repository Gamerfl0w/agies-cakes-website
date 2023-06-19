@extends('layouts.admin')

@section ('content')

<div class="col-12 col-md-12 col-sm-12 col-lg-10 h-screen">
    @foreach ($ids as $id)
        @if ($id->status != 'Delivered')
            <div id="app">
                <delivery-btn :id="{{ $id->id }}" :user="{{ $id->user_id }}" order="{{ $id->status }}" />
            </div>  
        @else
            <button disabled class="bg-green-600 hover:bg-green-600 cursor-default text-white py-2 px-4 rounded-t-lg text-lg font-bold w-full">Delivered ✓</button>
        @endif
        <form action="{{ route('receipt') }}" method="POST">
            @csrf
            <input type="hidden" name="receipt" value="{{ $id->id }}">
            <button type="submit" class="bg-pink-800 hover:bg-pink-900
            text-white py-2 px-4 text-lg font-bold w-full">Download Receipt    
            </button>
        </form>

    @endforeach    
    <div class="card">
        <div class="card-header">
            <div class="row">
            @foreach ($ids as $id)
            <div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-2">
                <h5>ORDER DETAILS</h5>
                <hr>
                <div class="row">
                    <div class="col-5">
                        Order ID<br>
                        Buyer Name <br>
                        Payment Method <br>
                        Phone Number <br>
                        Payment Type <br>
                        Shipping <br>
                        @if ($id->payment_type == 'Half')
                        Subtotal <br>
                        @else
                        Total <br>    
                        @endif
                        @if ($id->payment_type == 'Half')
                        Grand Total <br>    
                        @else
                            
                        @endif
                        {{-- Status --}}
        
                    </div>
                    <div class="col-7">
                        : {{ $id->id }} <br>
                        : {{ $id->name }} <br>
                        : {{ $id->country }} <br>
                        : {{ $id->phonenumber }} <br>
                        <div class="font-bold">
                            : {{ $id->payment_type }} Payment <br>
                        </div>
                        : PHP {{ $id->shipping }} <br>
                        @if ($id->payment_type == 'Half')
                        : PHP {{ ($id->total + $id->shipping) / 2  }}<br>
                        @else
                        : PHP {{ $id->total }}<br>    
                        @endif
                        @if ($id->payment_type == 'Half')
                        <div class="font-bold">
                            : PHP {{ $id->total }}<br>        
                        </div>                      
                        @else
                            
                        @endif

                        {{-- : PAID --}}
                    </div>
                </div>
                
            </div>
            

            <div class="col-12 col-lg-6 col-md-6 col-sm-12 pt-2">
                <h5>SHIPPING ADDRESS</h5>
                <hr>
                <div class="row">
                    <div class="col-5">
                        {{-- Country <br> --}}
                        City <br>
                        Zipcode <br>
                        Address <br>
                        
                    </div>
                    <div class="col-7">
                        {{-- : {{ $id->country }} <br> --}}
                        : {{ $id->city }} <br>
                        : {{ $id->zipcode }} <br>
                        : {{ $id->address }} <br>
                        
                    </div>
                </div>
            </div>
           @endforeach
        </div>
        </div>
        <div class="card-body">
            @foreach($order as $order)
            <div class="col-sm-12 col-md-12 col-lg-12 d-flex order-history mx-auto">
                <div class="row">
                    @foreach (json_decode($order->cart) as $item)
                        <div class="col-12 d-flex justify-content-between ">
                            <div class="order-image w-20 h-20 mb-5">
                                <img src="{{ asset('/storage/'.$item->attributes->image) }}" alt="">
                            </div>

                            <div class="order-detail mr-auto d-flex flex-column justify-content-center">
                            @if($item->name != "Custom Cake")
                                <div class="detail-1">
                                    <h5>{{ $item->name }}</h5>
                                </div>
                                <div class="detail-3 my-1">
                                    <h6>Quantity: {{ $item->quantity }}</h6>
                                </div>
                                @foreach ($ids as $id)
                                @if ( $id->payment_type == 'Half')
                                <div class="detail-4 my-1">
                                    <h6>Price: PHP  {{ $item->price }}</h6>
                                </div>
                                @else
                                <div class="detail-4 my-1">
                                    <h6>Price: PHP  {{ $item->price }}</h6>
                                </div>    
                                @endif
                                @endforeach

                            @else                     
                            <div class="detail-1">
                                <h5>{{ $item->name }}</h5>
                            </div>
                            <div class="detail-2 my-1">
                                <h6>Size: {{ $item->attributes->size ?? '' }}</h6>
                            </div>
                            <div class="detail-2 my-1">
                                <h6>Flavor: {{ $item->attributes->flavor ?? '' }}</h6>
                            </div>
                            <div class="detail-2 my-1">
                                <h6>Filling: {{ $item->attributes->filling ?? '' }}</h6>
                            </div>
                            <div class="detail-2 my-1">
                                <h6>Icing: {{ $item->attributes->icing ?? '' }} Icing</h6>
                            </div>
                            <div class="detail-2 my-1">
                                <h6>Decoration: {{ $item->attributes->decoration ?? '' }}</h6>
                            </div>
                            <div class="detail-2 my-1">
                                <h6>Message: {{ $item->attributes->message ?? '' }}</h6>
                            </div>
                            <div class="detail-2 my-1">
                                <h6>Note: {{ $item->attributes->note ?? '' }}</h6>
                            </div>
                            <div class="detail-3 my-1">
                                <h6>Quantity: {{ $item->quantity }}</h6>
                            </div>
                            <div class="detail-4 my-1">
                                <h6>Price: PHP  {{ $item->price }}</h6>
                            </div>
                            <div class="detail-4 my-1">
                                <h6>Theme: {{ $item->attributes->theme == 'No theme' ? 'No Theme' : substr( $item->attributes->theme, 21) }}</h6>
                                @if ($item->attributes->theme != 'No theme')
                                    <img src="{{ asset('/storage/'.$item->attributes->theme) }}" width="300px" height="300px" alt="">
                                @endif
                            </div>
                             @endif
                            </div> 
                        </div>
                    @endforeach
                </div>                      
            </div>
            @endforeach
            @foreach($ids as $id)
                @if($id->status == 'Pending')
                    <div id="app">
                        <change-status :user="{{ $id->user_id }}" :order="{{ $id->id }}" />
                    </div>
                    
                    @else
                         
                @endif
            @endforeach
        </div>
    </div>
</div> 
    
@endsection