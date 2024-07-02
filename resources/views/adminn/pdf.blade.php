<h1 class="text-center">Order Details</h1>
<h3>Customer Name:{{ $order['name'] }}</h3>
<h3>Email:{{ $order['email'] }}</h3>
<h3>Address:{{ $order['address'] }}</h3>
<h3>Mobile:{{ $order['phone'] }}</h3>
<h3>Item:{{ $order['product_name'] }}</h3>
<h3>Amount:<span>Rs.</span>{{ $order['price'] }}</h3>
<h3>Units:{{ $order['quantity'] }}</h3>
<h3>Payment:{{ $order['payment_status'] }}</h3>
