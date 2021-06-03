<?php
/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $books
 * @var \App\Models\Book $book
 */
?>

@push('css')
{{--    <link rel="stylesheet" href="{{ asset("css/products.css") }}">--}}
    <link rel="stylesheet" href="{{ mix('css/mix_products.css') }}">
@endpush

@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Shop</h2>
        </div>
        <div class="col">
            <x-breadcrumb :path="['home' => 'Home']">Shop</x-breadcrumb>
        </div>
    </div>
    <div class="row">
        <div class="d-none d-lg-block col-2">
            <x-products.filter :categories="$categories" />
        </div>
        <div class="col-lg-10 w-75 mx-auto">
            <div class="row">
                @each('products.card', $books, 'book', 'products.empty')
            </div>
            <div class="row">
                {{ $books->links() }}
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/form.js') }}"></script>
@endpush
