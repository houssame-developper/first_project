@extends('users.admin.app')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">List of Products</h1>
    <a href="{{ route('product.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add Product
    </a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>category</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><img src="storage/{{$product->image}}"  loading="lazy" width="100px"></td>
                    <td>{{Str::limit($product->name, 20)}}</td>
                    <td><span class="badge bg-primary">{{$product->category?->name}}</span></td>                   
                    <td>{{Str::limit($product->description, 30)}}</td>
                    <td>{{$product->quantity}}</td>
                    <td><span class="badge bg-primary">{{$product->prix}} DH</span></td>
                    <td>
                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    
                </tr>  
            @empty
                <tr>
                    <td colspan="7" align="center"><h2>No products found</h2></td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{$products->links()}}
@endsection