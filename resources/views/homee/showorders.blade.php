


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

</style>

   </head>
   <body>
      <div class="hero_area">

         <!-- header section strats -->
        @include('homee.header')

        <div>
            <table  class="container border border-dark " id="table_design">
                <thead class="thead">
                <tr>
                    <th>S.No.</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Delivery Status</th>
                    <th>Payment Status</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>


                    @foreach($order as $ordershowtouser)
                    <tr class="tdcenter">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $ordershowtouser['product_name'] }}</td>
                        <td>{{ $ordershowtouser['price'] }}</td>
                        <td>{{ $ordershowtouser['quantity'] }}</td>
                        <td>{{ $ordershowtouser['delivery_status'] }}</td>
                        <td>{{ $ordershowtouser['payment_status'] }}</td>
                        <td>
                            <img src=" photos/{{$ordershowtouser['image']}}" alt="" height="130" width="130">

                        </td>
                        <td>
                            @if($ordershowtouser->delivery_status=='processing...')

                            <a  class="btn btn-danger"href="/cancelorder/{{ $ordershowtouser['id'] }}" onclick="return confirm('Do you really want to cancel the order?')">Cancel Order</a>
                            @elseif ($ordershowtouser->delivery_status=='Order Canceled')
                            <h6>Order Canceled</h6>
                            {{-- @elseif($ordershowtouser->delivery_status=='paid')
                            <h6>Paid</h6> --}}
                            @else
                            <h6>Delivered</h6>

                            @endif
                        </td>

                    </tr>
                @endforeach

            </table>

        </div>


      {{-- </div> --}}
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

