@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>{{ $user->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <img src="{{ asset('img/user_placeholder.png') }}"
                             class="img-thumbnail float-lg-end rounded-circle" alt="user_profile"/>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="row">
                            <div class="col-auto">
                                <table class="table-responsive">
                                    <thead>
                                    <th class="w-25"/>
                                    <th/>
                                    </thead>
                                    <tbody>

                                    <x-user.property :property="$user->email">Email:</x-user.property>
                                    <x-user.property :property="$user->email_verified_at ?? 'Never'">Email verified at:</x-user.property>
                                    <x-user.property :property="$user->created_at">Registered:</x-user.property>

                                    <x-user.operations :model="\App\Models\User::class" :user="$user"></x-user.operations>
                                    <tr class="border-top">
                                        <th scope="row">Shipping address:</th>
                                        <td>
                                            @if($user->shipping)
                                                <x-user.address-table :address="$user->shipping" />
                                            @else
                                                <span class="fw-bold">Not Set</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <x-user.operations :model="\App\Models\Address::class" :user="$user" :item="$user->shipping"></x-user.operations>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="dropdown-divider"/>
                        @if(Auth::user()?->roles?->count() > 0)
                            <div class="row mt-4">
                                <div class="col">
                                    <h5>Roles & Abilities:</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <x-user.roles-table :roles="$user->roles" />
                                </div>
                            </div>
                        @else
                            <span class="fw-bold">Nothing</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
