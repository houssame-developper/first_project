@extends('users.admin.app')
@section('title', 'Category')
@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">List of Category</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add category
    </a>
</div>
    <table class="table">
        <thead>
            <tr>
               <th>Name </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{ route('category.show', $category) }}" class="btn btn-sm btn-primary">Show</a>
                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                    
                </tr>  
            @empty
                <tr>
                    <td colspan="7" align="center"><h2>No category found</h2></td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection