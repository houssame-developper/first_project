@extends('layouts.app')
@section('title', 'Products List')
@section('sidebar')
  <h1 class="ml-3"  align="center">Filters</h1>  
  <form  method="GET">
    <div class="form-group"  style="margin-left: 3%">
      <label for="name">Name or Description</label>
      <input type="text" name="name" id="name" value="{{Request::input('name')}}" class="form-control" placeholder="Name">
    </div>
    <div class="form-check my-2"  style="margin-left: 3%">
        <h3 align="center">Categories</h3>
        @foreach ($categories as $category)
        @php
       $categoryId = (Request::input("categories"))??[];
        @endphp
        <div>
            <input type="checkbox" @checked(in_array($category->id,$categoryId)) id="category" name="categories[]" value="{{$category->id}}">
        <p style="display: inline;margin-left:0.2vw">{{$category->name}}</p>
        </div> 
        @endforeach
      </div>
      <h3 align="center">Price</h3>
      <div class="form-group"  style="margin-left: 3%">
        <label for="Min">Min</label>
        <input type="number" min="{{$priceOptions['minPrice']}}" max="{{$priceOptions['maxPrice']}}" id="Min" value="{{Request::input('min')}} DH" class="form-control" placeholder="Name">
      </div>
      <div class="form-group"  style="margin-left: 3%">
        <label for="Max">Max</label>
        <input type="number" min="{{$priceOptions['minPrice']}}" max="{{$priceOptions['maxPrice']}}" name="max" id="Max" value="{{Request::input('max')}} DH" class="form-control" placeholder="Name">
      </div>
    <div class="form-group my-2"  style="margin-left: 3%">
        <input type="submit"  class="btn btn-info text-white w-100" value="search">
        <a type="reset" class="btn btn-danger text-white w-100 mt-1" href="{{route('home')}}" >reset</a>

      </div>
          
  </form>
@endsection
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4 ml-3">
    <h1>Last Products</h1>
</div>
<div class="bd-example">
	<hr>
</div>
<hr>
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse ($products as $product)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $product->image) }}" loading="lazy" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h6><span class="badge bg-primary">{{$product->category?->name}}</span></h6>
                    <p class="card-text flex-grow-1">{{ Str::limit($product->description, 50) }}</p>
                    <div class="mt-auto">
                        <h6 class="card-text">Quantity: {{ $product->quantity }}</h6>
                        <h6 class="card-title">Price: {{$product->prix}}DH</h6>
                        <p class="card-text">add in: {{ date('Y-m-d', strtotime($product->created_at)) }}</p>              
                          <a href="{{ route('product.show', $product) }}" class="btn btn-primary mt-2">Show</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center">
            <h2>No products found</h2>
        </div>
        @endforelse
    </div>
</div>
<hr>
@endsection