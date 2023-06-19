<?php

namespace App\Http\Controllers;

use App\Pages;
use App\Product;
use App\Question;
use App\Mail\AcceptedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }
    
    public function index()
    {
        $products = Product::take(4)->get();
        $pages = Pages::all();
        return view('home.index',compact(['products','pages']));   
    }

    public function contactUs()
    {
        $questions = Question::latest()->get();

        return view('contactUs', compact('questions')); 
    }

    public function AuthRouteAPI(Request $request){
        return $request->user();
     }
}