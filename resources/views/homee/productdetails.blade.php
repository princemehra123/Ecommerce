


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
          width: 300px;
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

        .about{
            font-size: 1.2em;
        }


        .card-description {
          font-size: 1em;
          color: black;
          line-height: 1.4;
        }

        .card-price {
          font-size: 1.2rem;
          font-weight: bold;
          color: #009688;
          margin-top: 10px;
        }

        .discountprice{
            font-size: 1.2em;
        }

              </style>


   </head>
   <body>
      <div class="hero_area">

         <!-- header section strats -->
@include('homee.header')
         <!-- end header section-->
         @if($gt=Session::get('grt'))

         <div class="alert alert-primary" style="box-shadow: 1px 2px 10px;" >

       <h3 class="text-center">{{$gt}}</h3>
         </div>
         @endif


      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width:50%; padding:20px">
















           {{-- <div class="container border border-dark" style="box-shadow: 1px 2px 10px; width:auto; height:auto; " >
               <div class="img-box" > --}}
                @if($product->photos)
           @foreach($product->photos as $img)
           <img src="photos/{{$img['image']}}" alt="" style="border-radius: 5px;  height:300px; width:250px;"  >
            @endforeach
            @endif
        {{-- </div>
        </div> --}}

           <div class="detail-box">
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
                   Price:<span style="color:green">&#x20b9</span>{{$product['price']}}
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




           </div>
        {{-- </div> --}}
     </div>


      <!-- footer start -->
      @include('homee.footer')
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


{{-- <script>
let chk = document.getElementById('fout');
fadeOut(chk, 1000);

function fadeOut(chk, 2000) {
    element.style.transition = `opacity ${2000 / 1000}s ease`;
    element.style.opacity = 0;

    setTimeout(() => {
        element.style.display = 'none';
    }, 2);
} --}}
</script>
