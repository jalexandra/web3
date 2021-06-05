@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <x-checkout.steps :currently="1" />
            </div>
            <div class="card-body">
                <div class="col-auto">
                    <table class="table-responsive table-primary">
                        <thead>
                        <tr>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col">Piece Price</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <livewire:checkout-cart />
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
