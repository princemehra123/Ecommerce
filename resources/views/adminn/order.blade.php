<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('adminn.css')

   <style>
*{
    font-family: Arial, Helvetica, sans-serif;
}

#title{
    text-align: center;
    position: sticky;
    top: 0px;
}


table{
    border: 2px solid red;
    min-width: max-content;
}

#th{

    padding: 5px;
    text-align: center;
    background-color: red;
    color:black;
}

/* th{
    position: sticky;
    top: 0px;
} */

th,td{
    border: 2px solid white;

}

#td{
    text-align: center;
}

.content-wrapper{
    max-height: auto;
    overflow-x: scroll;
}



   </style>


  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('adminn.sidebar')
      <!-- partial -->
      @include('adminn.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

            <h1 id="title">All Orders</h1>

            <div style="padding-left:300px; padding-bottom:30px;">

                <form action="/search/" method="get">
                    @csrf

                    <label for="search"></label>

                    <input type="text" style="text-align: center" name="search" id="search" placeholder="Search Here...">

                    <input type="submit" value="search" class="btn btn-primary">
                </form>
            </div>

                <table >
                        <tr id="th">
                            <th>S.No.</th>
                            <th>Customer Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product Name</th>
                            <th>price</th>
                            <th>Quantity</th>
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            <th>Image</th>
                            <th>Action</th>
                            <th>Print</th>
                        </tr>


                        @forelse($order as $ordershow )

                        <tr id="td">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $ordershow['name'] }}</td>
                            <td>{{ $ordershow['email'] }}</td>
                            <td>{{ $ordershow['phone'] }}</td>
                            <td>{{ $ordershow['address'] }}</td>
                            <td>{{ $ordershow['product_name'] }}</td>
                            <td>{{ $ordershow['price'] }}</td>
                            <td>{{ $ordershow['quantity'] }}</td>
                            <td>{{ $ordershow['payment_status'] }}</td>
                            <td>{{ $ordershow['delivery_status'] }}</td>
                            <td>
                                <img src="/photos/{{ $ordershow['image'] }}" alt="" height="100px" width="100px">
                            </td>
                            <td>
                                @if($ordershow->delivery_status=='processing...')
                                <a href="/delivered/{{$ordershow['id']}}" class="btn btn-info" onclick="return confirm('Do you really want to update the delivery and payment status?')">Update Status</a>
                                @else
                                <p style="color:green">Delivered</p>
                                @endif
                            </td>

                            <td>
                                <a href="/print_pdf/{{ $ordershow['id'] }}" class="btn btn-danger">Print</a>
                            </td>
                        </tr>

                        @empty
                        <tr >
                            <td>No Match Found For This Search</td>
                        </tr>

                        @endforelse


                </table>

            </div>

        </div>



    <!-- plugins:js -->
    @include('adminn.js')
    <!-- End custom js for this page -->
  </body>
</html>
