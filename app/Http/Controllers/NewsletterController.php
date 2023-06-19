<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {
        return view('mail.newsletter');
    }

    public function store(Request $request)
    {

        if ( ! Newsletter::isSubscribed(auth()->user()->email)) 
        {
            Newsletter::subscribePending(auth()->user()->email);
        }
        
            
    }
}