<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     //Check Product Controller for Index("show" Function)
    public function index()
    {
        $ratings = Rating::latest()->paginate(5);
  
        return view('ratings.index',compact('ratings'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ratings.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'rating' => 'required',
        ]);
  
        Rating::create($request->all());
   
        return redirect()->route('ratings.index')
                        ->with('success','Rating created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        return view('ratings.show',compact('rating'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        return view('ratings.edit',compact('rating'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $product = $request->get("product");
        $user = $request->get("name");

        $review = Rating::where('name', $user)
        ->where('product_name', $product);

        $review->update([
                'name' => $user,
                'detail' => $request->get("detail"),
                'star' => $request->get("rating"),
                'product_name' => $product,
            ]);
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $review)
    {
        $review->delete();
        return response()->json([
            'message'=>'Review Deleted Successfully!!'
        ]);

    }

    public function addReview(Request $request){
        $product = $request->get("product");
        $user = $request->get("name");

        //So this shit was working the whole time!?
        $reviewExists = Rating::where('name', $user)
        ->where('product_name', $product)
        ->exists();

        if ($reviewExists) {
            error_log('Exists');
        }else{
            Rating::create([
                'name' => $request->get("name"),
                'detail' => $request->get("detail"),
                'star' => $request->get("rating"),
                'product_name' => $request->get("product"),
            ]);
        }
    }

    public function allRatings($productName){
        $getProduct = $productName;
        $ratings = Rating::where('product_name', $getProduct)->get();

        return view('rating.allRatings',compact('ratings', 'getProduct'));
    }
}
