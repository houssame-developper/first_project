@extends('users.admin.app')
@section('title', 'Category')
@section('content')
<div class="container">
    <h1 align="center">Category name: {{$category->name}}</h1>
    <hr>
    <h2 align="center">Productes</h2>
    <hr>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse ($category->products as $product)
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
@endsection