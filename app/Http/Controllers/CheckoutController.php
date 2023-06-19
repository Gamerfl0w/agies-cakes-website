<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use App\Cart;
use App\User;
use App\Order;
use App\Stock;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Notifications\OrdersNotification;

class CheckoutController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function index()
    {
        $cartItems = \Cart::getContent();
        $total = 0;
        foreach($cartItems as $item){
            $total += $item->price;
        }
        $user = Auth::user();
        return view('checkout.index',compact('total','user'));
    }

    public function checkout(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phonenumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'address' => 'required',
            'zipcode' => 'required|digits:4',
            'date' => 'required|after:yesterday',
        ]);

        // if ($this->fails()) {    
        //     return response()->json($this->messages(), 400);
        // }

        $cartItems = \Cart::getContent();
        
        if($cartItems->isEmpty()){
            return view('cart.index');
        }
        // $oldCart = Session::get('cart');
        // $cart = new Cart($oldCart);

        // foreach ($cart->items as $order) {
        //     Stock::where('product_id',$order['product_id'])
        //             // ->where('name',$order['size'])
        //             ->decrement('quantity');
        // }

        $order = new Order();
        $order->paymongo_id = $request->get('id');
        $order->cart = json_encode($cartItems); 
        $order->serialized_cart = serialize($cartItems);
        $order->address = $request->get('address');
        $order->name = $request->get('name');
        $order->phonenumber = $request->get('phonenumber');
        $order->city = $request->get('city');
        $order->country = $request->input('country');
        $order->zipcode = $request->get('zipcode');
        $order->date = $request->get('date');
        $order->shipping = $request->get('shipping');
        $order->total = $request->get('total');
        $order->payment_type = $request->get('type');
        $order->status = "Pending";

        Auth::user()->orders()->save($order);

        \Cart::clear();

        $orders = Auth::user()->orders;

        $user = User::first();
        $customer = Order::get('name')->first();
        
        $orderData = [
            'body' => 'New Order',
            'text' => $customer,
            'url' => url('/'),
        ];

      $user->notify(new OrdersNotification($orderData));

    }

    public function checkInfo(Request $request){
        $this->validate($request, [
            'name' => [
                'required',
                'regex:/^[A-Za-z ]+$/'
            ],
            'phonenumber' => ['required', 'regex:/^(09|\+639)\d{9}$/'],
            'address' => 'required',
            'zipcode' => 'required|digits:4',
            'date' => 'required|after:yesterday',
        ]);
    }

}