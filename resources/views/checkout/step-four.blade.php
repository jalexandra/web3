@extends('layouts.app')

@section('content')
    @php
        /**
        * @var \App\Models\Address $address
        * @var array $cart
        */
    @endphp
    <div class="container">
        <div class="card">
            <div class="card-header">
                <x-checkout.steps :currently="4" />
            </div>
            <div class="card-body">
                <div class="row my-3">
                    <div class="col-12 col-lg-5">
                        <table class="table">
                            <thead/>
                            <tbody>
                            <tr>
                                <th scope="row">Name:</th>
                                <td>{{ $address->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email:</th>
                                <td>{{ $address->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Phone:</th>
                                <td>{{ $address->phone }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Address:</th>
                                <td>{{ $address->country->name }} {{ $address->country->id }}
                                    -{{ $address->postcode }} {{ $address->city }}, {{ $address->street }} {{ $address->house }}
                                    .
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Additional notes:</th>
                                <td>{{ empty($address->note) ? ' -' : $address->note }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-12 col-lg-7">
                        @php $sum = 0 @endphp
                        <table class="table table-responsive table-hover table-striped">
                            <thead>
                            <th scope="col">Title</th>
                            <th scope="col">Per piece</th>
                            <th scope="col">Ordered</th>
                            <th scope="col">Sum</th>
                            </thead>
                            <tbody>
                            @foreach ($cart as $pair)
                                @php
                                    $book = $pair['book'];
                                    $amount = $pair['amount'];
                                @endphp
                                <tr>
                                    <td><a href="{{ route('book.show', [$book]) }}">{{ Str::limit($book['title'], 20) }}</a>
                                    </td>
                                    <td>{{ $book['price'] }} HUF</td>
                                    <td>{{ $amount }}</td>
                                    <td>{{ $amount * $book['price'] }} HUF</td>
                                </tr>
                                @php $sum += $book['price'] @endphp
                            @endforeach
                            <tr class="fw-bolder">
                                <td colspan="3">Total:</td>
                                <td>{{ $sum }} HUF</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col">
                        <a href="{{ route('book.index') }}" class="btn btn-danger">Cancel</a>
                        <x-magic.button :route="route('checkout.5')" class="btn-success" method="post" :parameters="['address_id' => $address->id]">Submit</x-magic.button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
