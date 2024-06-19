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
    <div class="mb-3  text-center "  >
        <label for="pl"><h1 style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue; ">Add Product With Category</h1><hr></label>
    </div>

 @foreach ($errors->all() as $e )
   <div class="alert alert-danger mb-3" >{{$e}}</div>

   @endforeach


<form method="post" action="/product/{{$info['id']}}" enctype="multipart/form-data">
    @csrf
    @method('patch')
    <div class="mb-3">
        <label for="name">Select Category:</label><span style="color:red"></span>
            <div class="dgrid">

            @foreach ($cdata as $cinfo)
            <div>
                <input type="checkbox" {{(in_array($cinfo['id'],$categories))?"checked":""}} id="c{{$cinfo['id']}}" name="category_id[]" value="{{$cinfo['id']}}">
                <label for="c{{$cinfo['id']}}">
            {{$cinfo['name']}}
        </label>
            </div>
            @endforeach
            </div>






    </div>





<div class="mb-3">

<label for="product_name">product Name:</label>
<input type="text" name="product_name" value="{{$info['product_name']}}" class="form-control" id="product_name" placeholder="Enter Product">

</div>

<div class="mb-3">

<label for="price">Enter Price:</label>
<input type="number" name="price" value="{{$info['price']}}" class="form-control"id="price" placeholder="Enter Price">

</div>

<div class="mb-3">

<label for="product_bio">Describe Product:</label>
<input type="text" name="product_bio" value="{{$info['product_bio']}}" class="form-control"id="product_bio" placeholder="Enter About Product">

</div>

<div class="mb-3">

<label for="discount">Enter Discount:</label>
<input type="number" name="discount" value="{{$info['discount']}}" class="form-control"id="discount" placeholder="Enter Discount">

</div>


@if($info['photos'])

<div>
    @foreach($info->photos as $img)
    <div title="To delete image click on X" id="photo_{{$img['id']}}">
        <img src="\photos\{{$img['image']}}" height="100">

        <span onclick="delme({{$img['id']}})" style="color:red; cursor:pointer; font-size:30px; ">&#10005;</span>

    </div>
    @endforeach
</div>

@endif

<div class="mb-3">

<label for="photo">Image:</label>
<input type="file" name="photo[]" multiple accept="image/*" class="form-control" id="photo" >

</div>

<div class="mb-3 text-center">
<button class="btn btn-success" >Save</button>
<!-- //<button class=".button-85">Save</button> -->
</div>


</form>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


<script>
    function delme(id)
    {
        if(confirm("Do you really want to delete this image")){
        $.ajax({
            url:"/deleteimg/"+id,
            type:"get",
            success:function(r){
               document.getElementById('photo_'+id).remove();
            }
        });
    }
    }
</script>
@endsection
