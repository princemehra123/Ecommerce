<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductMedia;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$imageshow=ProductMedia::all(['image']);

        $data=Product::all();
        return view("product.index",compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cdata=Category::all(['id','name']);
        return view("product.create",compact('cdata'));
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

        $request->validate([
            'product_name'=>"required|min:2",
            'product_bio'=>"required|min:10",
            'price'=>"required|numeric|min:10",




        ]);

        // if($request->photo){
        //     $filename=time() . '_' . $request->photo->getClientOriginalName();

        //    Image::make($request->photo)->save(public_path('photos/'.$filename));

        //    Image::make($request->photo)->resize(150,150)->save(public_path('thumbnail/'.$filename));

        // }


        $info=[
            'product_name'=>$request->product_name,
            'product_bio'=>$request->product_bio,
            'price'=>$request->price,
            'discount'=>$request->discount,
            'afterdiscount'=>$request->discount?$request->price-$request->price*$request->discount/100:$request->price


        ];
       $obj= Product::create($info);


       if(count($request->category_id)>0)

       {
          foreach($request->category_id as $cid)
          {
                $cpinfo=[
                    'category_id'=>$cid,
                    'product_id'=>$obj->id

                ];
            CategoryProduct::create($cpinfo);





        }

    }


    foreach($request->photo as $imagee)

    {
        $filename=[];
        $imagename= $imagee->getClientOriginalName();

        $imagee->move(public_path('photos'),$imagename);

        // $filename[]= $imagename;
        // $images= json_encode($filename);


        $isave=
        [
         'product_id'=>$obj->id,
         'image'=>$imagename,
        ];
        ProductMedia::create($isave);

    }





    return redirect('/product')->with('grt','Data Saved Sucessfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $categories=array_column($product->allcategory->toArray(),'category_id');

        return view('product.edit',['info'=>$product,'cdata'=>category::all(['id','name']),'categories'=>$categories]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        if($request->photo){
        foreach($request->photo as $imagee)

        {
            $filename=[];
            $imagename= $imagee->getClientOriginalName();

            $imagee->move(public_path('photos'),$imagename);
            // $filename[]= $imagename;
            // $images= json_encode($filename);


            $isave=
            [
             'product_id'=>$product->id,
             'image'=>$imagename,
            ];
            ProductMedia::create($isave);

        }
    }



        $product->product_name=$request->product_name;
        $product->product_bio=$request->product_bio;
        $product->price=$request->price;
        $product->discount=$request->discount;
       $product->afterdiscount=$request->discount?$request->price-$request->price*$request->discount/100:$request->price;

        $product->save();


        if(count($request->category_id)>0)
        {
            $pid=$product->id;
            CategoryProduct::where('product_id',$pid)->delete();


            foreach($request->category_id as $cid)
            {
              $cpinfo=[
                    'category_id'=>$cid,
                    'product_id'=>$product->id
                    ];

                CategoryProduct::create($cpinfo);

            }
        }


    return redirect('/product')->with('grt','Data Updated Sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
    return redirect('/product')->with('grt','Data Deleted Sucessfully');


    }

    public function imageDelete($id)
    {

        $img=ProductMedia::find($id);
        unlink('photos/'.$img['image']);
        $img->delete();
    }
}
