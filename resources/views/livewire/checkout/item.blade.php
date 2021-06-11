<?php
use App\Models\Book;

/**
 * @var array $pair
 * @var Book $book
 */
$book = $pair['book'];
$id = $book['id']; //Let's not access our array every time we need the id
$amount = $pair['amount']
?>

{{--<li>--}}
{{--    <div class="dropdown-item-non-hoverable d-flex row">--}}
{{--        <div class="col-3 align-items-center">--}}
{{--            <a href="{{ route('book.show', [$id]) }}">--}}
{{--                <img class="img-fluid cart-image" src="{{ asset("img/thumbnails/{$book['image']['src']}") }}" alt="">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="col-8">--}}
{{--            <div class="row">--}}
{{--                <a href="{{ route('book.show', [$id]) }}"--}}
{{--                   class="h5 col text-decoration-none text-wrap">{{ $book['title'] }}</a>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <livewire:cart.price :amount="$amount" :price="$book['price']" :book="$id" :wire:key="$id"/>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-1 my-auto">--}}
{{--            <button wire:click="itemDeleted({{ $id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</li>--}}

<tr>
    <td>
        <a href="{{ route('book.show', [$id]) }}">
            <img class="img-fluid checkout-img" src="{{ asset("img/thumbnails/{$book['image']['src']}") }}" alt="">
        </a>
    </td>
    <td>
        <a href="{{ route('book.show', [$id]) }}" class="h5 col text-decoration-none text-wrap">
            {{ $book['title'] }}
        </a>
    </td>
    <td>
        {{ $book['price'] }}
    </td>
    <td colspan="2">
        <livewire:cart.price :amount="$amount" :price="$book['price']" :book="$id" :wire:key="$id"/>
    </td>
    <td>
        <button wire:click="itemDeleted({{ $id }})" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
    </td>
</tr>
