@extends('layouts.app')

@push('pre-js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
@endpush

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endpush

@section('content')
    <div class="container">
        @php
            use App\Models\Book;
            /** @var Book $book */
        @endphp
        <x-table.datatable
            id="product_data"
            class="table-responsive"
            :for="$books"
            :as="[
                'ID',
                'Book' => fn($book) => $book->author->name . ': ' . $book->title,
                'Stock',
                'Created At'
            ]"
            :view="true"
            :delete="true"
            route="book"
        />
    </div>
@endsection
