@extends('layouts.app')

@section('content')
    <div class="container">
        <x-card header="Operations">
            <div class="d-inline-flex float-start">
                <span class="h6 mt-2 me-3">Current Status: <span class="text-decoration-underline">{{ $order->status }}</span></span>
                @if($order->user_id !== Auth::id() && $order->status_num < 3)
                    <x-magic.button :route="route('order.update', [$order])" class="btn-success" method="put">Mark as &ldquo;{{ \App\Models\Order::getStatusTextOf($order->status_num + 1) }}&ldquo;</x-magic.button>
                @endif
            </div>
            <div class="d-inline-flex float-end">
                @if($order->user_id !== Auth::id())
                    <x-magic.button  route="mailto:{{$order->shipping->email}}" class="btn-primary me-2">Contact customer</x-magic.button>
                @endif
                <x-magic.button :route="route('order.destroy', [$order])" class="btn-danger" confirm="Are you sure?" method="delete">Delete Order</x-magic.button>
            </div>
        </x-card>
        <div class="row my-3">
            <div class="col-12 col-lg-5">
                <x-card header="Customer">
                    <table class="table">
                        <thead />
                        <tbody>
                        <tr>
                            <th scope="row">Name: </th>
                            <td>{{ $order->shipping->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Email: </th>
                            <td>{{ $order->shipping->email }} (@if(!$order->user)Not @endif Registered) </td>
                        </tr>
                        <tr>
                            <th scope="row">Phone: </th>
                            <td>{{ $order->shipping->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Address: </th>
                            <td>{{ $order->shipping->country->name }} {{ $order->shipping->country->id }}-{{ $order->shipping->postcode }} {{ $order->shipping->city }}, {{ $order->shipping->street }} {{ $order->shipping->house }}.</td>
                        </tr>
                        <tr>
                            <th scope="row">Additional notes: </th>
                            <td>{{ empty($order->shipping->note) ? ' -' : $order->shipping->note }}</td>
                        </tr>
                        </tbody>
                    </table>
                </x-card>
            </div>
            <div class="col-12 col-lg-7">
                <x-card header="Items">
                    @php $sum = 0 @endphp
                    <table class="table table-responsive table-hover table-striped">
                        <thead>
                        <th scope="col">Title</th>
                        <th scope="col">Per piece</th>
                        <th scope="col">Ordered</th>
                        <th scope="col">Sum</th>
                        </thead>
                        <tbody>
                    @foreach ($order->books as $item)
                        <tr>
                            <td><a href="{{ route('book.show', [$item]) }}">{{ Str::limit($item->title, 20) }}</a></td>
                            <td>{{ $item->price }} HUF</td>
                            <td>{{ $item->pivot->amount }}</td>
                            <td>{{ $item->pivot->amount * $item->price }} HUF</td>
                        </tr>
                        @php $sum += $item->price @endphp
                    @endforeach
                        <tr class="fw-bolder">
                            <td colspan="3">Total: </td>
                            <td>{{ $sum }} HUF</td>
                        </tr>
                        </tbody>
                    </table>
                </x-card>
            </div>
        </div>
    </div>
@endsection
