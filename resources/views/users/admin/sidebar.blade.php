@php
$currentAdmin=\Illuminate\Support\Facades\Route::is("admin_dashboard");
$currentProduct=\Illuminate\Support\Facades\Route::is("product.*");
$currentCategory=\Illuminate\Support\Facades\Route::is("category.*");
$default_class="list-group-item list-group-item-action";
@endphp
<div class="list-group">
    <span  class="list-group-item list-group-item-action text-light bg-secondary">Dashboard</span>
    <a href="{{route('admin_dashboard')}}" @class([$default_class, 'active'=> $currentAdmin])>Home</a>
    <a href="{{route('product.index')}}"@class([$default_class, 'active'=> $currentProduct])>Products</a>
    <a href="{{route('category.index')}}" @class([$default_class, 'active'=> $currentCategory])>category</a>
</div>
    