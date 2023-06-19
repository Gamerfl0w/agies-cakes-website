<?php

namespace App\Http\Controllers;
use App;
use App\Product;
use App\Cart;
use Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        $product->popularity += 1;
        $product->save();

        $randomId = mt_rand();
        while(Product::where('id', $randomId)->count() > 0) {
                $randomId = mt_rand();
        }

        \Cart::add([
            'id' => $randomId,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1,
            'attributes' => array(
                'image' => $request->image,
                'message' => $request->message
            )
        ]);

        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.index');
    }

    public function addCustom(Request $request){
        $randomId = mt_rand();
        while(Product::where('id', $randomId)->count() > 0) {
                $randomId = mt_rand();
        }

        $size = $request->get('size');
        $flavor = $request->get('flavor');
        $filling = $request->get('fillingInfo');
        $icing = $request->get('icingInfo');
        $message = $request->get('message');
        $theme = $request->get('imageTheme');
        $note = $theme;
        $decoration = $request->get('decoration');
        $price = $request->get('price');

        if($request->file())
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('storage/custom-theme', $filename);
            $theme = "custom-theme/".$filename;
        }


        \Cart::add([
            'id' => $randomId,
            'name' => 'Custom Cake',
            'price' => $price,
            'quantity' => 1,
            'attributes' => array(
                'size' => $size,
                'flavor' => $flavor,
                'filling' => $filling,
                'icing' => $icing,
                'message' => $message,
                'theme' => $theme,
                'note' => $note,
                'decoration' => $decoration,
                'image' => 'products/11.jpg'
            )
        ]);

 
    }

    public function updateCart(Request $request)
    {

        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.index');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.index');
    }

    public function clearAllCart()
    {
        \Cart::clear(); 

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.index');
    }


}