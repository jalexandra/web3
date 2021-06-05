<?php
use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

/**
 * @var Collection $countries
 * @var Address $shipping
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <x-checkout.steps :currently="3" />
            </div>
            <div class="card-body container">
                <div id="shipping" class="m-lg-5">
                    <h3>Shipping information:</h3>
                    <x-form method="post" :to="route('checkout.4')">
                        <input type="hidden" name="used_address" value="{{ $shipping?->id }}">
                        <x-form.input class="mb-2 mb-lg-4" name="name" :value="$shipping?->name">Name</x-form.input>
                        <x-form.input class="mb-2 mb-lg-4" name="email" :value="$shipping?->email">Email</x-form.input>
                        <x-form.input class="mb-2 mb-lg-4" type="select" name="country" :value="$shipping?->country?->name" :options="$countries">Country</x-form.input>
                        <x-form.input class="mb-2 mb-lg-4" name="postcode" :value="$shipping?->postcode">Postcode</x-form.input>
                        <x-form.input class="mb-2 mb-lg-4" name="city" :value="$shipping?->city">City</x-form.input>
                        <x-form.input class="mb-2 mb-lg-4" name="street" :value="$shipping?->street">Street</x-form.input>
                        <x-form.input class="mb-2 mb-lg-4" name="house" :value="$shipping?->house">House</x-form.input>
                        <x-form.input class="mb-2 mb-lg-4" name="phone" :value="$shipping?->phone">Phone</x-form.input>
                        <x-form.input class="mb-2 mb-lg-4" type="textarea" name="note" :value="$shipping?->note">Note</x-form.input>
                        <x-form.checkbox name="tos" value="1">By using this form you agree with the storage and handling of your data by this website in accordance with our
                            <a href="#">Privacy Policy</a>
                        </x-form.checkbox>
                        <x-form.submit />
                    </x-form>
                </div>
            </div>
        </div>
    </div>
    @dump($errors)
@endsection
