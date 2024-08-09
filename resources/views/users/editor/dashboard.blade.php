@extends('layouts.app')
@section('title', 'Dashboard Editor')
@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
    <div align="center" class="py-5 mt-6 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in") }} as edtior
                </div>
            </div>
        </div>
    </div>
    @endsection