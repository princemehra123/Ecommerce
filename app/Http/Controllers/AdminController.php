<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;
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
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class AdminController extends Controller
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function orderShow()
    {
        $order=Order::all();
        return view('adminn.order',compact('order'));
    }

    public function delivered($id)
    {
        $order=Order::find($id);

        $order->delivery_status="Delivered";

        if($order->payment_status=='paid')
        {
            $order->payment_status="paid";
        }else
        {
        $order->payment_status="Payment Received";
        }

        $order->save();

        return redirect()->back();

    }


    public function print_pdf($id)
    {
        $order=Order::find($id);
        $pdf=PDF::loadview('adminn.pdf',compact('order'));
        return $pdf->download('Order Details.pdf');
    }


    public function SearchProductInAdminPanel(Request $request)
    {

        $searchtext=$request->search;

        $order=Order::where('name','like',"%$searchtext%")->orWhere('email','like',"%$searchtext%")->orWhere('address','like',"%$searchtext%")->orWhere('phone','like',"%$searchtext%")->orWhere('product_name','like',"%$searchtext%")->orWhere('quantity','like',"%$searchtext%")->orWhere('payment_status','like',"%$searchtext%")->orWhere('delivery_status','like',"%$searchtext%")->get();

        return view('adminn.order',compact('order'));
    }


    public function dashboard()
    {
        $totalproducts=Product::all()->count();
        $totalorders=Order::all()->count();
        $totalcustomers=User::all()->count();

        $order=Order::all();

        $totalrevenue=0;

        foreach($order as $orderprice)
        {
            $totalrevenue=$totalrevenue + $orderprice->price;
        }

        $totaldeliveries=Order::where('delivery_status','delivered')->get()->count();

        $totalprocessing=Order::where('delivery_status','processing...')->get()->count();


        return view('adminn.dashboard',compact('totalproducts','totalorders','totalcustomers','totalrevenue','totaldeliveries','totalprocessing'));
    }
}
