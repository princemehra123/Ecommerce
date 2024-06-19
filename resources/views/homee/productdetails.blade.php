


<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Enhance Your Fashion Style With Us</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="/homepage/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="/homepage/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="/homepage/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="/homepage/css/responsive.css" rel="stylesheet" />

      <style>
        .card {
          width: 300px;
          border: 1px solid #ccc;
          border-radius: 8px;
          overflow: hidden;
          margin: 20px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-image img {
          width: 100%;
          height: auto;
          display: block;
        }

        .card-content {
          padding: 15px;
        }

        .card-title {
          font-size: 1.2rem;
          font-weight: bold;
          margin-bottom: 10px;
        }

        .card-description {
          font-size: 0.9rem;
          color: #555;
          line-height: 1.4;
        }

        .card-price {
          font-size: 1.1rem;
          font-weight: bold;
          color: #009688;
          margin-top: 10px;
        }
      </style>


   </head>
   <body>
      <div class="hero_area">

         <!-- header section strats -->
@include('homee.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->


      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:20px">


        <body>

            <div class="card">
              <div class="card-image">

                @foreach($product->photos as $img)



            <img src="photos/{{$img['image']}}" alt="">
        @endforeach
              </div>
              <div class="card-content">
                <div class="card-title">{{ $product['product_name'] }}</div>
                <div class="card-description">
                  {{ $product['product_bio'] }}
                </div>
                <div class="card-price">
                    @if($product->discount!=null)

                    <h6  id="margin_set">

                     Price:<span style="color:green">&#x20b9</span> <span style="text-decoration: line-through ">{{$product ['price']}}</span>

                    </h6>

                         <h6 style="color:red">

                          Discounted Price:<span style="color:red">&#x20b9</span>{{$product['afterdiscount']}}

                         </h6>

                         @else

                         <h6>
                         <span style="color:green">&#x20b9</span>{{$product['price']}}
                          </h6>







                     @endif



                </div>
              </div>
            </div>

            </body>

        {{-- <div class="box"> --}}
           {{-- <div class="option_container">
              <div class="options">
                 <a href="/productdetails/{{$product->id}}" class="option1">
               Product Details
                 </a>
                 <a href="" class="option2">
                 Buy Now
                 </a>
              </div>
           </div> --}}

           {{-- <div class="container border border-dark" style="box-shadow: 1px 2px 10px;">
            <div class="img-box" >
            @foreach($product->photos as $img)



            <img src="photos/{{$img['image']}}" alt="">
        @endforeach
        </div>
     </div> --}}

 {{-- {{$productshow['price']-$productshow['afterdiscount']*100/$productshow['price']}} --}}
                       {{-- (frm.fees.value-frm.finalprice.value)*100/frm.fees.value; --}}

 {{-- @foreach($product->AllCat as $cat) --}}
              {{-- {{$cat['category_id']}} --}}
              {{-- <h6>Category:{{$cat['id']}}</h6> --}}
              {{-- @endforeach --}}
{{-- {{$categoryshow}} --}}

           {{-- <div class="detail-box">
              <h5>
                 Product Name:{{$product['product_name']}}
              </h5>




              @if($product->discount!=null)

              <h6  id="margin_set">

               Price:<span style="color:green">&#x20b9</span> <span style="text-decoration: line-through ">{{$product ['price']}}</span>

              </h6>

                   <h6 style="color:red">

                    Discounted Price:<span style="color:red">&#x20b9</span>{{$product['afterdiscount']}}

                   </h6>

                   @else

                   <h6>
                   <span style="color:green">&#x20b9</span>{{$product['price']}}
                    </h6>







               @endif

            <h6>About Product:{{$product['product_bio']}}</h6>

            <form action="/cart/{{$product->id}}" method="post">
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




           </div> --}}
        {{-- </div> --}}
     </div>

      <!-- why section -->

      <!-- end why section -->

      <!-- arrival section -->


      <!-- end arrival section -->

      <!-- product section -->


      <!-- end product section -->

      <!-- subscribe section -->


      <!-- end subscribe section -->

      <!-- client section -->

      <!-- end client section -->

      <!-- footer start -->
      {{-- @include('homee.footer') --}}
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© Developed By Prince Mehra <br>

            Under Axixa Technologies

         </p>
      </div>
      <!-- jQery -->
      <script src="/homepage/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="/homepage/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="/homepage/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="/homepage/js/custom.js"></script>
   </body>
</html>

