@extends('layouts.app')
@section('content')


<div class="container border border-dark p-3 " style="box-shadow:1px 2px 10px">
@if($gt=Session::get('grt'))

<div class="alert alert-success">

{{$gt}}
</div>
@endif
<div class="mb-3 "><a href="/category/create"  class="btn btn-primary" >Create Category</a></div>
<table class="table border border-striped">
<thead>
    <tr>
        <th>S.No.</th>
        <th>Category Name</th>
        <th>Description</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    @foreach ($data as $info)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$info['name']}}</td>
        <td>{{$info['description']}}</td>
        <td><a href="/category/{{$info['id']}}/edit" class="btn btn-primary">Edit</a></td>

        <td>
            <form method="post" action="/category/{{$info['id']}}">
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

@endsection
