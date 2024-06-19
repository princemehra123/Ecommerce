


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

        #table_design{

            box-shadow:1px 2px 10px #000000 ;
            border-radius: 5;



        }
        .thead{
            text-align: center;
            text-shadow: 1px 1px 5px #b29bfe;
        }
        table,th,td{
             border:1px solid grey;#9898edc9
         }
         .tdcenter{
            margin: auto;
            text-align: center;

         }
        /* #center{
            margin: auto;
           width:50px;
           box-shadow: 1px,2px,10px;
           padding: 20px;
           text-align: center;
        }

        .th_des{
            font-size:25px;
            padding: 5px;


        }
.btn{
    margin: 5px;


} */

      </style>

   </head>
   <body>
      <div class="hero_area">

         <!-- header section strats -->
@include('homee.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->


         {{-- <div class="container border border-dark"  id="center"> --}}
            @if($gt=Session::get('grt'))

            <div class="alert alert-danger">

            {{$gt}}
            </div>
            @endif


          


            <table class="container border border-dark " id="table_design" >
                <thead class="thead">
                <tr >
                    <th>S.No.</th>
                    <th >Product Name</th>
                    <th >Quantity</th>
                    <th >Price</th>
                    <th >Image</th>
                    <th >Action</th>



                </tr>
            </thead>

                <?php $totalprice=0;?>
                @foreach ($cart as $cartdata )

                <tr class="tdcenter">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$cartdata['product_name']}}</td>
                    <td>{{$cartdata['quantity']}}</td>
                    <td><span style="color:green">&#x20b9</span>{{$cartdata['price']}}</td>



                    <td>
{{-- {{$cartdata->image}} --}}
                        {{-- @foreach($cartdata->image as $img) --}}



                    {{-- <img src="photos/{{$productimages}}" alt=""> --}}
                    {{-- <img src="photos/{{$img['image']}}" alt=""> --}}
                {{-- @endforeach --}}
                        <img src=" photos/{{$cartdata['image']}}" alt="" height="130" width="130">

                    </td>



                    <td>
                        <form method="post" action="/cart/{{$cartdata['id']}}">

                        @csrf
                        @method('delete')

                        <button class="btn btn-danger" onclick="return confirm('Do you really want to delete this record?')">Remove</button>

                    </form>
                    </td>
                </tr>

                <?php $totalprice=$totalprice + $cartdata->price?>
                @endforeach



            </table>

            <div>
                <h1 class="text-center">Total Price:<span style="color:green">&#x20b9</span>{{$totalprice}}</h1>
            </div>



         {{-- </div> --}}

      <!-- footer start -->
      {{-- @include('homee.footer') --}}
      <!-- footer end -->
      {{-- <div class="cpy_">
         <p class="mx-auto">© Developed By Prince Mehra <br>

            Under Axixa Technologies

         </p>
      </div> --}}
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


