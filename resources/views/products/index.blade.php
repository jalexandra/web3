<?php
/**
 * @var \Illuminate\Pagination\LengthAwarePaginator $books
 * @var \App\Models\Book $book
 */
?>

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
        <div class="col-2">
            <x-products.filter :categories="$categories" />
        </div>
        <div class="col-10">
            @each('products.card', $books, 'book', 'products.empty')
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/form.js') }}"></script>
@endpush
