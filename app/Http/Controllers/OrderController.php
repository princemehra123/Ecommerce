<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductMedia;
use App\Models\Thumbnail;
use App\Models\Cart;
use App\Models\Admin;
use App\Models\User;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }



    public function cash_orders()
    {
        $user=Auth::user();
        $userid=$user->id;

        $data=Cart::where('user_id',$userid)->get();

        foreach($data as $cartdata)
        {
            $order=new order;

            $order->name=$cartdata->user_name;

            $order->email=$cartdata->email;

            $order->phone=$cartdata->phone;

            $order->address=$cartdata->address;

            $order->user_id=$cartdata->user_id;


            $order->product_name=$cartdata->product_name;

            $order->price=$cartdata->price;

            $order->quantity=$cartdata->quantity;

            $order->image=$cartdata->image;

            $order->product_id=$cartdata->product_id;


            $order->payment_status='cash on delivery';

            $order->delivery_status='processing...';

            $order->save();


            $cart_id=$cartdata->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        };


        return redirect()->back()->with('ogrt','Order Placed Successfully');
        }


        public function cash_orders_one($id)
        {



            $data=Cart::where('product_id',$id)->get();


            foreach($data as $cartdata)
            {
                $order=new order;

                $order->name=$cartdata->user_name;

                $order->email=$cartdata->email;

                $order->phone=$cartdata->phone;

                $order->address=$cartdata->address;

                $order->user_id=$cartdata->user_id;


                $order->product_name=$cartdata->product_name;

                $order->price=$cartdata->price;

                $order->quantity=$cartdata->quantity;

                $order->image=$cartdata->image;

                $order->product_id=$cartdata->product_id;


                $order->payment_status='cash on delivery';

                $order->delivery_status='processing...';

                $order->save();


                $cart_id=$cartdata->id;
                $cart=Cart::find($cart_id);
                $cart->delete();
            };


            return redirect()->back()->with('ogrt','Order Placed Successfully');
            }







    public function stripe($totalprice)
    {
        return view('cart.stripe',compact('totalprice'));
    }


    public function stripePost(Request $request,$totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "inr",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
        ]);

        $user=Auth::user();
        $userid=$user->id;

        $data=Cart::where('user_id',$userid)->get();


        foreach($data as $cartdata)
        {
            $order=new order;

            $order->name=$cartdata->user_name;

            $order->email=$cartdata->email;

            $order->phone=$cartdata->phone;

            $order->address=$cartdata->address;

            $order->user_id=$cartdata->user_id;


            $order->product_name=$cartdata->product_name;

            $order->price=$cartdata->price;

            $order->quantity=$cartdata->quantity;

            $order->image=$cartdata->image;

            $order->product_id=$cartdata->product_id;


            $order->payment_status='paid';

            $order->delivery_status='processing...';

            $order->save();


            $cart_id=$cartdata->id;
            $cart=Cart::find($cart_id);
            $cart->delete();
        };


        Session::flash('success', 'Payment successful!');

        return back();
    }


    public function showorder()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;

            $order=Order::where('user_id',$userid)->get();

        return view('homee.showorders',compact('order'));
        }
        else
        {
            return redirect('login');
        }
    }


    public function cancelorder($id)
    {
        $order=Order::find($id);

        $order->delivery_status="Order Canceled";

        $order->save();

        return  redirect()->back();

    }


    }




?>
