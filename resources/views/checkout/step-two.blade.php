@extends('layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ mix('css/mix_checkout-user-form.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <x-checkout.steps :currently="2" />
            </div>
            <div class="card-body">
                <div class="col-auto">
                    @auth
                        <x-checkout.continue_as />
                    @else
                        <x-checkout.login_register />
                    @endguest

                </div>
            </div>
        </div>
    </div>
@endsection
