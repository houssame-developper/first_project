@extends('users.admin.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        </div>

        <div class="col-md-6">
            <h1 class="mb-3">{{ $product->name }}</h1>
            <h4 class="text-muted mb-4"><span class="badge bg-primary">{{$product->category?->name}}</span></h4>
            <h4 class="text-muted mb-4">{{ $product->prix }} DH</h4>

            <div class="mb-4">
                <h5>Products:</h5>
                <p>{{ $product->description }}</p>
            </div>

            <div class="mb-4">
                <h5>الكمية المتوفرة:</h5>
                <p>{{ $product->quantity }}</p>
            </div>

            <div class="d-grid gap-2">
                <button class="btn btn-primary btn-lg">Add product</button>
                <a href="{{ route('category.index') }}" class="btn btn-outline-secondary">back</a>
         </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h3>معلومات إضافية</h3>
            <hr>
        </div>
    </div>
</div>
@endsection