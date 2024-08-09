@extends('users.admin.app')

@section('content')
<h1>@yield('title')</h1>
<x-form Method="POST" Name="product.update" :data="$product" :categories="$categories"/>
@endsection  