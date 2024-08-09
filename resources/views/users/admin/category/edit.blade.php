@extends('users.admin.app')
@yield('titles','Edit Products')
@section('content')
<h1>@yield('title')</h1>
<form action="{{route('category.update',$category->id)}}" method="post">
    @csrf
    @method("PUT")
      <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input   type="text"  name="name" id="name"  class="form-control" placeholder="name" value="{{old('name',optional($category)->name)}}" />
      </div>
      <div class="mb-3">
          <input type="submit" class="btn btn-primary" value="Edit">
      </div>
  </form>
  @endsection  