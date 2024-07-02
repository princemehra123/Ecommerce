@extends('layouts.app')
@section('content')


<div class="container border border-dark  p-3 " style="border:100px solid #8d1212; border-radius:5px; box-shadow:1px 2px 5px rgb(2, 65, 113);">
@if($gt=Session::get('grt'))

<div class="alert alert-success">

{{$gt}}
</div>
@endif







<div class="mb-3  text-center "   >
        <label for="pl"><h1 style="text-shadow: 1px 1px 2px red, 0 0 1em blue, 0 0 0.2em blue; ">All Products</h1><hr></label>
    </div>

<div class="mb-3 "><a href="/product/create"  class="btn btn-dark" >Add Product</a></div>




<table class="table border border-striped" >



<thead>
    <tr>

        <th>S.No.</th>
        <th>product Name</th>
        <th>Category</th>
        <th>Product Bio</th>
        <th>Price</th>
        <th>Discount</th>
        <th>After Discount</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    @foreach ($data as $info)
    {{-- @foreach ($imageshow as $images ) --}}



    <tr>

        <td>{{$loop->iteration}}</td>
        <td>{{$info['product_name']}}</td>



        <td>
            @foreach ($info['allcategory'] as $cid )
            {{$cid['categoryId']['name'].","}}
            @endforeach
        </td>
        <td>{{$info['product_bio']}}</td>
        <td>{{$info['price']}}</td>
        <td>{{$info['discount']?$info['discount']:'N/A'}}</td>
        <td>{{$info['price']-$info['discount']*$info['price']/100}}</td>

        <td>
            @if($info['tphotos'])

<div>
    @foreach($info->tphotos as $img)

    <div >
        <img src="\thumbnail\{{$img['thumbimage']}}" height="150" width="150">

    </div>
    @endforeach
</div>

@endif



        </td>

        <td><a href="/product/{{$info['id']}}/edit" class="btn btn-primary">Edit</a></td>

        <td>
            <form method="post" action="/product/{{$info['id']}}">

            @csrf
            @method('delete')

            <button class="btn btn-danger" onclick="return confirm('Do you really want to delete this record?')">Delete</button>

        </form>
        </td>

    </tr>

    @endforeach

</tbody>
</table>


</div>



<style>
.overlay {
	position: absolute;
	bottom: 0;
	left: 0;
	width: 100%;
	height: 30vh;
	z-index: 100;

	background: rgb(255, 255, 255);
	background: linear-gradient(
		0deg,
		rgba(255, 255, 255, 1) 75%,
		rgba(255, 255, 255, 0.9) 80%,
		rgba(255, 255, 255, 0.25) 95%,
		rgba(255, 255, 255, 0) 100%
	);
}

.text {
	font-family: "Yanone Kaffeesatz";
	font-size: 100px;
	display: flex;
	position: absolute;
	bottom: 20vh;
	left: 50%;
	transform: translateX(-50%);
	user-select: none;

	.wrapper {
		padding-left: 20px;
		padding-right: 20px;
		padding-top: 20px;
		.letter {
			transition: ease-out 1s;
			transform: translateY(40%);
		}
		.shadow {
			transform: scale(1, -1);
			color: #999;
			transition: ease-in 5s, ease-out 5s;
		}
		&:hover {
			.letter {
				transform: translateY(-200%);
			}
			.shadow {
				opacity: 0;
				transform: translateY(200%);
			}
		}
	}
}




</style>
@endsection
