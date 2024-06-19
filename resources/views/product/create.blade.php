@extends('layouts.app')
@section('content')

<style>
    .dgrid{
        border:1px solid #ddd;
        padding:5x;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr;
    }
</style>

<div class="container border " >
    <div class="mb-3  text-center " style="background-color:#fbe3e8" >
        <label for="pl"><h1 style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue; ">Add Product With Category</h1><hr></label>
    </div>

 @foreach ($errors->all() as $e )
   <div class="alert alert-danger mb-3" >{{$e}}</div>

   @endforeach


<form method="post" action="/product/" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name">Select Category:</label>
            <div class="dgrid">

            @foreach ($cdata as $cinfo)
            <div>
                <input type="checkbox" id="c{{$cinfo['id']}}" name="category_id[]" value="{{$cinfo['id']}}">
                <label for="c{{$cinfo['id']}}">
            {{$cinfo['name']}}
        </label>
            </div>
            @endforeach
            </div>






    </div>





<div class="mb-3">

<label for="product_name">product Name:</label>
<input type="text" name="product_name"  class="form-control" id="product_name" placeholder="Enter Product">

</div>

<div class="mb-3">

<label for="price">Enter Price:</label>
<input type="number" name="price" class="form-control"id="price" placeholder="Enter Price">

</div>

<div class="mb-3">

<label for="product_bio">Describe Product:</label>
<input type="text" name="product_bio" class="form-control"id="product_bio" placeholder="Enter About Product">

</div>

<div class="mb-3">

<label for="discount">Enter Discount:</label>
<input type="number" name="discount" class="form-control"id="discount" placeholder="Enter Discount">

</div>

<div class="mb-3">

<label for="photo">Image:</label>
<input type="file" name="photo[]" multiple accept="image/*" class="form-control" id="photo" >

</div>

<div class="mb-3 text-center">
<button class="button-85" role="button">Save</button>
<!-- //<button class=".button-85">Save</button> -->
</div>


</form>
</div>

<style>
.button-85 {
    padding: 0.6em 2em;
    border: none;
    outline: none;
    color: rgb(255, 255, 255);
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
    user-select: none;
    -webkit-user-select: none;
    touch-action: manipulation;
  }

  .button-85:before {
    content: "";
    background: linear-gradient(
      45deg,
      #ff0000,
      #ff7300,
      #fffb00,
      #48ff00,
      #00ffd5,
      #002bff,
      #7a00ff,
      #ff00c8,
      #ff0000
    );
    position: absolute;
    top: -2px;
    left: -2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    -webkit-filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing-button-85 20s linear infinite;
    transition: opacity 0.3s ease-in-out;
    border-radius: 10px;
  }

  @keyframes glowing-button-85 {
    0% {
      background-position: 0 0;
    }
    50% {
      background-position: 400% 0;
    }
    100% {
      background-position: 0 0;
    }
  }

  .button-85:after {
    z-index: -1;
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    background: #222;
    left: 0;
    top: 0;
    border-radius: 10px;
  }




</style>
@endsection
