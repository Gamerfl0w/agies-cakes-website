<?php

namespace App\Http\Controllers;

use DB;
use App;
use Session;
use App\Cart;
use App\Image;
use App\Stock;
use App\Rating;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    public function index()
    {
        $products = Product::simplePaginate(9);
        // $genders = Product::select('gender')->groupBy('gender')->get();
        // $brands = Product::select('brand')->groupBy('brand')->get();
        // $categories = Product::select('category')->groupBy('category')->get();
        $maxPrice = Product::select('price')->max('price');
        $minPrice = Product::select('price')->min('price');
        $images = Image::all();
        
        return view('products.index',compact(['maxPrice', 'minPrice', 'products', 'images']));
        
    }

    public function getProducts(Request $request)
    {
        $data = Product::where('name', 'LIKE','%'.$request->keyword.'%')->get();
        return response()->json($data); 
    }

    public function show(Product $product, Request $request)
    {   
        $sizes = Stock::where('product_id','=',$product->id)
                     ->get([
                            'name',
                            'quantity',
                        ]);
            
        $reviewExists = false;
        if(auth()->check()){
            $reviewExists = Rating::where('name', auth()->user()->name)
            ->where('product_name', $product->name)
            ->exists();  
        }

        $ratings = [];
        $userRating = 0;              
        
        $ratings = Rating::where('product_name', '=', $product->name )->latest()->paginate(5);
        if(auth()->check()){
            $userRating = Rating::where('name', '=', auth()->user()->name)
            ->where('product_name', $product->name)->latest()->first();
        }
        
        $count = 0;
        $count = Rating::where('product_name', '=', $product->name )->count();

        //I dumb with logic, dont judge
        $allStars = Rating::where('product_name', '=', $product->name)->get('star')->count();

        $oneStar = Rating::where('product_name', '=', $product->name)->where('star', '=', 1)->count();         
        $twoStar = Rating::where('product_name', '=', $product->name)->where('star', '=', 2)->count(); 
        $threeStar = Rating::where('product_name', '=', $product->name)->where('star', '=', 3)->count(); 
        $fourStar = Rating::where('product_name', '=', $product->name)->where('star', '=', 4)->count(); 
        $fiveStar = Rating::where('product_name', '=', $product->name)->where('star', '=', 5)->count();

        if($ratings->isNotEmpty()){
            $productName = $ratings[0]->product_name;
            $userReview = $ratings[0]->detail;
        }else{
            $productName = "No data";
            $userReview = "";
        }

        return view('products.show', compact ('product', 'sizes', 'ratings', 'reviewExists', 'userRating', 
        'count', 'allStars', 'oneStar', 'twoStar', 'threeStar', 'fourStar', 'fiveStar', 'productName', 'userReview'));
    }

    public function form()
    {
        return view('admin.addproduct');
    }

    public function create(Request $request)
    {
        $this->validate(request(),[
            'image'=>'required|image',
            'name'=>'required|string',
            // 'brand'=>'required|in:Nike,Adidas,New Balance,Asics,Puma,Skechers,Fila,Bata,Burberry,Converse',
            'price'=>'required|integer',
            'description'=>'required|string',
            // 'gender'=>'required|in:Male,Female,Unisex',
            // 'category'=>'required|in:Shoes',
        ]);

        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->info = $request->input('description');

        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/products/', $filename);
            $product->image = "products/".$filename;
        }

         $product->save();
        // DB:: table('products')->insert($product);
        return redirect()->route('admin.product')->with('success','Successfully added the product!');
    }
    
    public function editform($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.editproduct',compact('product'));
    }

    public function edit(Request $request,$id)
    {
        $product = Product::find($request->id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->info  = $request->description;
       
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/products', $filename);
            $product->image = "products/".$filename;
        }

        $product->save();
        return redirect()->route('admin.product')->with('success','Successfully edited the product!');
    }
    
    public function remove($id)
    {
        Product::where('id',$id)->delete();
        Stock::where('product_id',$id)->delete();

        return redirect()->route('admin.product')->with('success','Successfully removed the product!');
    }

    public function list()
    {
        $products = Product::orderBy('id')->simplePaginate(10);
        //dd($products);
        return view('admin.product', compact ('products'));
    }


}