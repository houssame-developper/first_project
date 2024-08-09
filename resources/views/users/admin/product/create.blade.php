@extends('users.admin.app')
@section('content')
<h1>@yield('title')</h1>
<x-form Method="POST" Name="product.store" :data="null" :categories="$categories"/>
@endsection  