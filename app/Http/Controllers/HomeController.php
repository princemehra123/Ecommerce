<?php

namespace App\Http\Controllers;




use App\Models\ProductMedia;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Order;
use App\Models\Admin;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // return view('home');phle se

       $usertype=Auth::user()->usertype;

        //dd($usertype);phle se
       if($usertype=='1')
       {
       // $totalproducts=Product::all()->count();
        // return view('adminn.dashboard',compact('totalproducts'));
         // return view('adminn.index',compact('totalproducts'));phle se
       }
       else
       {
         //$product=Product::all();phle se
         $product=Product::paginate(9);
       // $productimages=ProductMedia::all(['image']);phle se


        return view('homee.userpage',compact('product'));
        // return view('/homee',compact('product','productimages'));phle se
       }
    }





    public function display()
    {
        $usertype=Auth::user()->usertype;


       if($usertype=='1')
       {
          // return view('adminn.index');
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

          // return view('adminn.index',compact('totalproducts'));

           return view('adminn.dashboard',compact('totalproducts','totalorders','totalcustomers','totalrevenue','totaldeliveries','totalprocessing'));
       }
       else
       {
         //$product=Product::all();
         $product=Product::paginate(9);
       // $productimages=ProductMedia::all(['image']);


        return view('homee.userpage',compact('product'));





        // return view('/homee');
        // $product=Product::paginate(9);

        // return view('homee.userpage',compact('product'));
    }
    }

    public function productdetails($id)
    {
        $product=product::find($id);
       $productimages= ProductMedia::all(['product_id']);
       //$categoryshow=Category::all(['id','name']);
        return view('homee.productdetails',compact('product','productimages'));

        // $cat=Category::all(['name']);
        // return view('homee.header',compact('cat'));

    }


    public function product_search(Request $request)

    {
        $searchproduct=$request->search;

        $product=Product::where('product_name','LIKE',"%$searchproduct%")->paginate(10);

        return view('homee.userpage',compact('product'));
    }
}
