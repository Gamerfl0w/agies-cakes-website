<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Notifications\OrdersNotification;

class NotificationController extends Controller
{
    public function sendOrderNotification(){

        $user = User::first();
        $customer = Order::get('name')->first();
        
        $orderData = [
           'body' => 'New Order',
           'text' => $customer,
           'url' => url('/'),
        ];

        $user->notify(new OrdersNotification($orderData));
    }
}
