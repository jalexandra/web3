@extends('layouts.app')

@section('content')
    @php
      use App\Models\Book;
      use \Silber\Bouncer\BouncerFacade;
        /** @var Book $book */
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-auto">
                <img src="{{ asset('img/thumbnails/' . $book->image) }}" alt="">
            </div>
            <div class="col-12 col-lg">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h4>
                                <span class="text-muted">{{ $book->author->name }}:</span>
                            </h4>
                            <h3>
                                {{ $book->title }}
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">Category: {{ $book->category->name }}</div>
                        <div class="col"> In stock: {{ $book->stock }}pcs </div>
                    </div>
                    <div class="row-cols-1">
                        <div class="col-auto">
                            {{ $book->description }}
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-auto">
                            <h4>{{ $book->price }} HUF</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md mb-3 mb-md-0">
                            <div class="btn-group">
                                @if(\App\Utils\Cart::has($book))
                                    <a class="btn btn-danger text-decoration-none text-white" href="{{ route('cart.remove', [$book, 'continue' => Request::fullUrl()]) }}">
                                        <div class=" shadow-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove from cart">
                                            <i class="fas fa-minus-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove from cart"></i> Remove from Cart
                                        </div>
                                    </a>
                                @else
                                    <a class="btn btn-success text-decoration-none text-white" href="{{ route('cart.add', [$book, 'continue' => Request::fullUrl()]) }}">
                                        <div class=" shadow-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to cart">
                                            <i class="fas fa-cart-plus" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to cart"></i> Add to Cart
                                        </div>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col">
                            <div class="float-md-end">
                                @if(Bouncer::can('edit', Book::class))
                                    <a href="{{ route('book.edit', [$book]) }}" class="btn btn-warning text-white">Edit</a>
                                @endcan
                                @if(Bouncer::can('delete', Book::class))
                                    <x-magic.button
                                        class="btn btn-danger text-white"
                                        :route="route('book.destroy', [$book])"
                                        method="delete">
                                        Delete
                                    </x-magic.button>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
