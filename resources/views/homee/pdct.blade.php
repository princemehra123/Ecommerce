<?php
use App\Models\ProductMedia;
?>
    <style>
#margin_set{margin: 10px;

}
</style>
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
        {{-- {{$productimages}} --}}
        @foreach ($product as $productshow )




          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="/productdetails/{{$productshow->id}}" class="option1">
                    Product Details
                      </a>

                      <form action="/cart/{{$productshow->id}}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-4">

                              <input type="number" value="1" min="1" name="quantity" style="width:50;">

                           </div>

                          <div class="col-md-4">
                             <input type="submit" value="Add To Cart" >

                          </div>

                        </div>
                      </form>


                   </div>
                </div>


                <div>
                    <div class="img-box">
                    @foreach($productshow->photos as $img)



                    {{-- <img src="photos/{{$productimages}}" alt=""> --}}
                    <img src="photos/{{$img['image']}}" alt="">
                @endforeach
                </div>
             </div>





                <div class="detail-box">
                   <h5>
                      {{$productshow['product_name']}}
                   </h5>



                   @if($productshow->discount)

                   <h6 style="text-decoration: line-through " id="margin_set">

                    <span style="color:green">&#x20b9</span>{{$productshow ['price']}}

                   </h6>

                        <h6 style="color:red">

                            <span style="color:red">&#x20b9</span>{{$productshow['afterdiscount']}}

                        </h6>
                        @else
                        <h6>
                            <span style="color:green">&#x20b9</span>{{$productshow ['price']}}

                           </h6>

                           <h5>
                            {{-- {{$productshow['price']-$productshow['afterdiscount']*100/$productshow['price']}} --}}
                            {{-- (frm.fees.value-frm.finalprice.value)*100/frm.fees.value; --}}
                           </h5>


                    @endif



                </div>
             </div>
          </div>


          @endforeach
          <span style="padding-top:20px;">
            {!!$product->withQuerystring()->links('pagination::bootstrap-5')!!}
          </span>
    </div>
 </section>
