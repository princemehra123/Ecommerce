@extends('layouts.app')
@section('content')



<div class="container border " style="box-shadow:1px 2px 5px black">
<form method="post" action="/category/{{$info['id']}}">
    @csrf
@method('patch')
<div class="mb-3">

<label for="name">Category Name:</label>
<input type="text" name="name" id="name" class="form-control" placeholder="Enter Category" value={{$info['name']}}>

</div>

<div class="mb-3">

<label for="description">Enter Description:</label>
<input type="text" name="description" class="form-control" id="description" placeholder="Enter Category" value={{$info['description']}}>

</div>
<div class="mb-3 text-center">

<button class="btn btn-success">Update</button>
</div>
</form>
</div>

@endsection
