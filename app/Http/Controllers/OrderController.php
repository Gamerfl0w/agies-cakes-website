<?php

namespace App\Http\Controllers;
use PDF;
use Auth;
use App\User;
use App\Order;
use App\Product;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Notifications\OrdersNotification;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class OrderController extends Controller
{

  // public function __construct()
  //   {
  //       $this->middleware(['auth', 'verified']);
  //   }
    
    public function show(){
      $orders = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->simplePaginate(5);
      // dd($orders);
      return view('orders.index',compact(['orders']));
    }

    public function sendEmail(){
      $orders = Order::where('user_id', auth()->user()->id)->latest()->first();
      $order = json_decode($orders->cart);
      $total = $orders->total;
      $order = $order;
      $subject = 'Agies Cakes Order';
      $orderName = '';
      
      Mail::to(auth()->user()->email)->send(new OrderMail($orders, $order, $total, $subject, $orderName)); 

      $user = User::first();
      $customer = Order::get('name')->first();
      
      $orderData = [
        'body' => 'New Order',
        'text' => $customer,
        'url' => url('/'),
      ];

      $checkOrder = Order::where('user_id', auth()->user()->id)->latest()->first();

      return view('checkout.success', compact('checkOrder')); 
      
    }

    public function cod(){
      $cartItems = \Cart::getContent();
        $total = 0;
        foreach($cartItems as $item){
            $total += $item->price;
      }
      $orders = Order::where('user_id', auth()->user()->id)->latest()->first();
      $order = json_decode($orders->cart);
      // Get item name
      // dd($order->items[0]->item->name);
      $total = $total;
      $order = $order;
      $subject = 'Agies Cakes Order';
      $orderName = '';
      $reason = '';
      
      Mail::to(auth()->user()->email)->send(new OrderMail($orders, $order, $total, $subject, $orderName, $reason)); 

      $user = User::first();
      $customer = Order::get('name')->first();
      
      $orderData = [
        'body' => 'New Order',
        'text' => $customer,
        'url' => url('/'),
      ];

      $checkOrder = Order::where('user_id', auth()->user()->id)->latest()->first();

      return view('checkout.cod', compact('checkOrder')); 
      
    }

    public function pickup(){
      $cartItems = \Cart::getContent();
        $total = 0;
        foreach($cartItems as $item){
            $total += $item->price;
      }
      $orders = Order::where('user_id', auth()->user()->id)->latest()->first();
      $order = json_decode($orders->cart);
      // Get item name
      // dd($order->items[0]->item->name);
      $total = $total;
      $order = $order;
      $subject = 'Agies Cakes Order';
      $orderName = '';
      
      Mail::to(auth()->user()->email)->send(new OrderMail($orders, $order, $total, $subject, $orderName)); 

      $user = User::first();
      $customer = Order::get('name')->first();
      
      $orderData = [
        'body' => 'New Order',
        'text' => $customer,
        'url' => url('/'),
      ];

      $checkOrder = Order::where('user_id', auth()->user()->id)->latest()->first();

      return view('checkout.pickup', compact('checkOrder')); 
      
    }

    public function generateReceipt(Request $request){
      $id = $request->receipt;
      $order = Order::where('id', $id)->get();
      view()->share('order', $order);
      $pdf = PDF::loadView('receipt', compact($order));
      return $pdf->download("receipt.pdf");
    }

    public function orderPDF(){ 
        $orders = Order::all();
        view()->share('orders', $orders);
        $pdf = PDF::loadView('orderPDF', compact($orders));
      // download PDF file with download method
      return $pdf->download('orders.pdf');
    }

    public function productsPDF(){
        $products = Product::all();
        view()->share('products', $products);
        $pdf = PDF::loadView('productsPDF', compact($products));
      // download PDF file with download method
      return $pdf->download('products.pdf');
    }

    public function dailyPDF(){ 
      $orders = Order::whereDate('created_at', Carbon::today())->get();
      $total = 0;
      $total = Order::whereDate('created_at', Carbon::today())->get()->sum('total');
      view()->share('orders', $orders, 'total', $total);
      $pdf = PDF::loadView('dailyPDF', compact($orders, 'total'));
      // download PDF file with download method
      return $pdf->download('daily-sales.pdf');
    }

  public function monthlyPDF(){ 
    //If u want to get monthly sales this month
    // $startOfMonth = Carbon::now()->startOfMonth();
    // $endOfMonth = Carbon::now()->endOfMonth();
    // $sales = Order::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();

    $sales = DB::table('orders')
    ->select(DB::raw('SUM(total) as total, MONTH(created_at) as month'))
    ->groupBy('month')
    ->get();

    $total = 0;
    $total = Order::whereMonth('created_at', date('m'))
    ->whereYear('created_at', date('Y'))
    ->get(['total','created_at'])->sum('total');

    view()->share('sales', $sales, 'total', $total);
    $pdf = PDF::loadView('monthlyPDF', compact($sales, 'total'));
  // download PDF file with download method
  return $pdf->download('monthly-sales.pdf');
  }

  public function handlePaymentStatus(Request $request){
    $data = $request->all();
    $data = json_encode($data);
    $data = json_decode($data, true);
    
    foreach ($data as $data) {
      if($data['attributes']['data']['attributes']['source']['type'] == 'gcash'){
        $id = $data['attributes']['data']['attributes']['source']['id'];
      }
      else if($data['attributes']['data']['attributes']['source']['type'] == 'paymaya'){
        $id = $data['attributes']['data']['attributes']['payment_intent_id'];
      }else{

      }
      
    }

    $order = Order::where('paymongo_id', $id)->first();
    $order->status = "Paid";
    $order->save();

  }

}