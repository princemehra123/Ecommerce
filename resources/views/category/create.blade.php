@extends('layouts.app')
@section('content')


<div class="container border ">

@foreach ($errors->all() as $e )
   <div class="alert alert-danger mb-3" >{{$e}}</div>

   @endforeach


<form method="post" action="/category/">
    @csrf

<div class="mb-3">

<label for="name">Category Name:</label>
<input type="text" name="name"  class="form-control" id="name" placeholder="Enter Category">

</div>

<div class="mb-3">

<label for="description">Enter Description:</label>
<input type="text" name="description" class="form-control"id="description" placeholder="Enter Category">

</div>
<div class="mb-3 text-center">

<button class="btn btn-success">Save</button>
</div>


</form>
</div>
@endsection
