<?php

namespace App\Http\Controllers;




use App\Models\ProductMedia;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryProduct;

use Illuminate\Support\Facades\Auth;


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
       // return view('home');

       $usertype=Auth::user()->usertype;

        //dd($usertype);
       if($usertype=='1')
       {
           return view('adminn.index');
       }
       else
       {
         //$product=Product::all();
         $product=Product::paginate(9);
       // $productimages=ProductMedia::all(['image']);


        return view('homee.userpage',compact('product'));
        // return view('/homee',compact('product','productimages'));
       }
    }





    public function display()
    {
        // return view('/homee');
        $product=Product::paginate(9);

        return view('homee.userpage',compact('product'));
    }


    public function productdetails($id)
    {
        $product=product::find($id);
       $productimages= ProductMedia::all(['product_id']);
       $categoryshow=Category::all(['id','name']);
        return view('homee.productdetails',compact('product','productimages','categoryshow'));

        // $cat=Category::all(['name']);
        // return view('homee.header',compact('cat'));

    }
}
