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
        <x-table.datatable
            id="user_data"
            class="table-responsive"
            :for="$users"
            :as="['ID', 'Name', 'Email', 'Created At']"
            :view="true"
            :delete="true"
            route="user"
        />
    </div>
@endsection
