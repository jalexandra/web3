@extends('layouts.app')

@section('content')
    @php $address = $address ?? null @endphp
    <div class="container">
        <x-form :method="$address ? 'put' : 'post'" :to="$address ? route('address.update', $address) : route('address.store')" :parameters="['user_id' => $user_id]">
            <input type="hidden" name="used_address" value="{{ $address?->id }}">
            <x-form.input class="mb-2 mb-lg-4" name="name" :value="$address?->name">Name</x-form.input>
            <x-form.input class="mb-2 mb-lg-4" name="email" :value="$address?->email">Email</x-form.input>
            <x-form.input class="mb-2 mb-lg-4" type="select" name="country" :value="$address?->country?->name" :options="$countries">Country</x-form.input>
            <x-form.input class="mb-2 mb-lg-4" name="postcode" :value="$address?->postcode">Postcode</x-form.input>
            <x-form.input class="mb-2 mb-lg-4" name="city" :value="$address?->city">City</x-form.input>
            <x-form.input class="mb-2 mb-lg-4" name="street" :value="$address?->street">Street</x-form.input>
            <x-form.input class="mb-2 mb-lg-4" name="house" :value="$address?->house">House</x-form.input>
            <x-form.input class="mb-2 mb-lg-4" name="phone" :value="$address?->phone">Phone</x-form.input>
            <x-form.input class="mb-2 mb-lg-4" type="textarea" name="note" :value="$address?->note">Note</x-form.input>
            <x-form.submit />
        </x-form>
    </div>
@endsection
