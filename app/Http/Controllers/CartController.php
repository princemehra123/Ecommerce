<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\product;
use App\Models\ProductMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(Auth::id())
        {

            $userid=Auth::user()->id;
            $cart=cart::where('user_id',$userid)->get();
            return view('cart.show',compact('cart'));
        }
        else
        {
            return redirect('login');
            
        }

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
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //



    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //

        $cart->delete();
        return redirect()->back()->with('grt','Product Removed Sucessfully');

    }


    public function add_cart(Request $request,$id)
    {
        if(Auth::id())
        {




          //  $productmedia=ProductMedia::where('image');

            // foreach($productmedia as $productmediaa)
            // {
            //     $image=[
            //         'image'=>$productmediaa
            //     ];
            // }


            $user=Auth::user();
            $userid=$user->id;
            $product=Product::find($id);
            $productid_exists=Cart::where('product_id',$id)->where('user_id',$userid)->get('id')->first();
            if($productid_exists)
            {
                $cart=Cart::find($productid_exists)->first();

                $quantity=$cart->quantity;

                $cart->quantity=$quantity + $request->quantity;

                if($product->afterdiscount)
                {
                $cart->price= $product->afterdiscount * $cart->quantity;

                }
                else
                {

                    $cart->price= $product->price * $cart->quantity;
                }


                $cart->save();
                Alert::success('Item Addes To Cart','Keep Shop With Us');

                return redirect()->back();

            }

            else
            {
                $cart= new cart;

                $cart->user_name= $user->name;

                $cart->email= $user->email;

                $cart->phone= $user->phone;

                $cart->address= $user->address;


                $cart->user_id= $user->id;

                $cart->product_name= $product->product_name;

                $cart->product_bio= $product->product_bio;

                if($product->afterdiscount)
                {
                $cart->price= $product->afterdiscount * $request->quantity;

                }
                else
                {

                    $cart->price= $product->price * $request->quantity;
                }


                $cart->product_id= $product->id;

                $cart->quantity=$request->quantity;

                foreach($product->photos as $img)
                {

                $cart->image=$img->image;
                }
               // $cart->image=$productmediaa->image;

                $cart->save();
Alert::success('Item Addes To Cart','Keep Shop With Us');
                return redirect()->back();

            }

     }
        else
        {
            return redirect('login');
        }
    }


    // public function show_cart()
    // {
    //     //return view('cart.show');
    // }
}
