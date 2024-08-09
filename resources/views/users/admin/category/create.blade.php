@extends('users.admin.app')
@yield('titles','Create Category')
@section('content')
<h1>@yield('title')</h1>
<form action="{{route('category.store')}}" method="post">
  @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input   type="text"  name="name" id="name"  class="form-control" placeholder="name" value="{{old('name')}}" />
    </div>
    <div class="mb-3">
        <input type="submit" class="btn btn-primary" value="Add">
    </div>
</form>
@endsection 
