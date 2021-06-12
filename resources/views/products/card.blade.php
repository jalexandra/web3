{{-- https://bbbootstrap.com/snippets/bootstrap-5-bootstrap-5-ecommerce-cards-70379369 --}}
@php
/** @var \App\Models\Book $book */
@endphp

<div class="col mb-3">
    <div class="card h-100 shadow-sm">
        <img src="{{ asset('img/thumbnails/' . $book->image) }}" class="card-img-top" alt="image of {{ $book->title }}">
        @if(\App\Utils\Cart::has($book))
            <a class="text-decoration-none text-white" href="{{ route('cart.remove', [$book, 'continue' => Request::fullUrl()]) }}">
                <div class="label-top danger shadow-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove from cart">
                    <i class="fas fa-minus-square" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Remove from cart"></i>
                </div>
            </a>
        @else
            <a class="text-decoration-none text-white" href="{{ route('cart.add', [$book, 'continue' => Request::fullUrl()]) }}">
                <div class="label-top success shadow-sm" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to cart">
                    <i class="fas fa-cart-plus" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Add to cart"></i>
                </div>
            </a>
        @endif
        <div class="card-body">
            <div class="clearfix mb-3">
                <span class="float-start price-hp">
                    {{ $book->author->name }}:
                </span>
                <span class="float-end">
{{--                    <a class="text-muted small" href="#">Reviews</a>--}}
                </span>
            </div>
            <h5 class="card-title">
                {{ $book->description }}
            </h5>
            <div class="text-center my-4">
                {{ $book->price }} HUF <br />
                <a href="{{ route('book.show', [$book]) }}" class="btn2 btn-primary">Details</a>
            </div>
            <div class="clearfix mb-1">
                <span class="float-start">
{{--                    <i class="far fa-question-circle"></i>--}}
                </span>
                <span class="float-end">
{{--                    <i class="fas fa-plus"></i>--}}
                </span>
            </div>
        </div>
    </div>
</div>
