<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rating.rate');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $review = new Testimonial([
            'name' => auth()->user()->name,
            'message' => $request->get('message'),
            'rating' => $request->get('rating'),
            'isApproved' => 'No'
        ]);

        $review->save();
        return redirect('/rate-us')->with('success','Thank you for your feedback!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $ratings = Testimonial::all()->toArray();
        return array_reverse($ratings);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request){
        Testimonial::remove($request->id);
        return redirect()->route('admin.testimonials')
                        ->with('success','Review deleted successfully');
    }

    public function getRatings(){
        $ratings = Testimonial::inRandomOrder()->where('isApproved', 'Yes')->limit(3)->get();
        $ratings = $ratings->toArray();
        return array_reverse($ratings);
    }

    public function adminRatings(){
        if(auth()->user()->role != 'Customer'){
            $reviews = Testimonial::where('isApproved', 'No')->paginate(5);
            return view('admin.testimonials', compact('reviews'));
        }else{
            return back();
        }
    }

    public function deleteReview(Request $request){
        $id = $request->input('id');
        Testimonial::destroy($id);
        return redirect('/admin/testimonials')->with('delete','Review deleted successfully');
    }

    public function approveReview(Request $request){
        $id = $request->input('id');
        $review = Testimonial::where('id', $id)->first();
        $review->isApproved = 'Yes';
        $review->save();
        return redirect('/admin/testimonials')->with('success','Review approves successfully');
    }
}
