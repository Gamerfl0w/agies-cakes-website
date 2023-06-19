<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use App\Order;
use App\Pages;
use App\Product;
use App\Profile;
use App\Reminder;
use App\Mail\OrderMail;
use App\Mail\AcceptedMail;
use App\Mail\RejectedMail;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        $totalgross = 0;

        $users = User:: get();
        $totaluser = count($users);

        $orders = Order::get();
        $totalorder = count($orders);
        
        // $gross = Order::get();
        // $gross->transform(function($order,$key){
        //     $order->serialized_cart = unserialize($order->serialized_cart);
        //     return $order;
        // });

        $latest=Order::orderBy('created_at','DESC')->take(5)->get();

        $notifications = auth()->user('Admin')->unreadNotifications->take(8);
        $notifs = DB::table('notifications')->count();

        $dailySales = 0;
        $dailySales = Order::whereDate('created_at', Carbon::today())
        ->where('status', '=', 'Accepted')
        ->orWhere('status', '=', 'Delivered')
        ->get(['total','created_at'])->sum('total');

        $monthlySales = 0;
        $monthlySales = Order::where('status', '=', 'Accepted')
        ->orWhere('status', '==', 'Delivered')
        ->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))
        ->get(['total','created_at'])->sum('total');

        //Delete paymongo orders that are not paid after an hour  
        $past_date = Carbon::now()->subDays(7);
        $expiredDay = Order::where('country', '==', 'PayMaya')
            ->orWhere('country', '==', 'GCASH')
            ->where('status', '==', 'Pending')
            ->Where('created_at', '<', $past_date)
            ->delete();  

        $expiredHour = Order::where('country', '==', 'PayMaya')
            ->orWhere('country', '==', 'GCASH')
            ->where('status', '=', 'Pending')
            ->where('created_at', '>=', Carbon::now()->subMinutes(60)->toDateTimeString())
            ->delete();  

        //get popular products
        $products = Product::take(5)->where('popularity', '>', 1)->orderBy('popularity', 'desc')->get();
        return view('admin.index',compact('latest','totaluser','totalorder',
        'totalgross', 'notifications', 'notifs', 'dailySales', 'monthlySales', 'products'));
    }

    public function order()
    {
        $orders=Order::orderBy('created_at','DESC')->simplePaginate(10);
        $orderName = Order::all();

        return view('admin.order',compact('orders', 'orderName'));
    }

    public function show_order($id)
    {
        $ids=DB::table('orders')->where('id',$id)->get();
        $order = DB::table('orders')->where('id',$id)->get();
        // $order = json_decode($order[0]->cart);
        // dd($order);
        return view('admin.showorder',compact('order','ids'));
    }

    public function user()
    {
        $users=DB::table('users')->leftjoin('profiles','users.id','=','profiles.user_id')->get();
        $details = User::paginate(10);
        return view('admin.user',compact('users', 'details'));
    }

    public function acceptOrder(Request $request){
        $id = $request->get('id');
        $orderId = $request->get('order');
        $userEmail = User::where('id', $id)->get();
        $order = Order::where('id', $orderId)->first();
        $order->status = 'Accepted';
        $order->save();

        $orders = Order::where('id', $orderId)->first();
        $user = User::where('id', $id)->get('name');
        $order = json_decode($order->cart);
        $total = 0;
        foreach($order as $item){
            $total += $item->price;
            $data = $item->name;
        }  
        $subject = 'Your Order has been Accepted.';
        Mail::to($userEmail[0]->email)->send(new OrderMail($orders, $order, $total, $subject, $data));  
    }

    public function rejectOrder(Request $request){
        $id = $request->get('id');
        $orderId = $request->get('order');
        $userEmail = User::where('id', $id)->get();
        $order = Order::where('id', $orderId)->first();
        $order->status = 'Rejected';
        $order->reason = $request->get('reason');
        $order->save();

        $orders = Order::where('id', $orderId)->first();
        $user = User::where('id', $id)->get('name');
        $order = json_decode($order->cart);
        $total = 0;
        foreach($order as $item){
            $total += $item->price;
            $data = $item->name;
        }  
        $subject = 'Your Order has been Rejected.';
        $reason = $request->get('reason');
        Mail::to($userEmail[0]->email)->send(new OrderMail($orders, $order, $total, $subject, $data, $reason));  
    }

    public function getHomeData() {
        $pages = Pages::all()->toArray();
        return array_reverse($pages);
    }

    public function saveHomeData(Request $request) {
        $pages = Pages::find(1);

        $pages->update($request->all());
    }

    public function uploadImg(Request $request){
        $pages = Pages::find(1);

        if($request->file())
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/homepage', $filename);
            $pages->main_image = "storage/homepage/".$filename;
        }
        $pages->update($request->all());
    }

    public function dailySales(){
        if(auth()->user()->role == 'Admin'){
            $orders = Order::whereDate('created_at', Carbon::today())
            ->where('status', '=', 'Accepted')
            ->orWhere('status', '=', 'Delivered')
            ->get();
            $total = 0;
            $total = Order::whereDate('created_at', Carbon::today())
            ->where('status', '=', 'Accepted')
            ->orWhere('status', '=', 'Delivered')
            ->get()->sum('total');

            return view('admin.DailySales', compact('orders', 'total'));
        }else{
            return back();
        }
    }
    
    public function monthlySales(){       
        if(auth()->user()->role == 'Admin'){
            $data = DB::table('orders')
            ->where('status', '=', 'Accepted')
            ->orWhere('status', '=', 'Delivered')
            ->select(DB::raw('SUM(total) as total, MONTH(created_at) as month'))
            ->groupBy('month')
            ->get();

            $monthlySales = 0;
            $monthlySales = Order::where('status', '=', 'Accepted')
            ->orWhere('status', '=', 'Delivered')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('Y'))
            ->get(['total','created_at'])->sum('total');

            return view('admin.MonthlySales', compact('data', 'monthlySales'));
        }else{
            return back();
        }
    }

    public function changeStatus(Request $request){
        $id = $request->get('id');
        $status = $request->get('status');  

        $order = Order::find($id);
        $order->status = $status;
        if($status == "Delivered"){
            $order->isDelivered = "Yes";
        } 
        $order->save();
    }

    public function addCarouselImages(request $request) {
        $image = new Image;

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('storage/carousel', $filename);
        $image->name = $filename;
        $image->file_path = "storage/carousel/".$filename;
    
        $image->save();
        return redirect()->route('product.index');
    }

}