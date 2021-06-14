<?php
use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
/**
 * @var array $items
 * @var array $pair
 * @var int $sum
 */
?>

<div class="btn-group dropdown">
    <a wire:click="dropdown" class=" btn btn-outline-primary rounded-circle @if($this->isShowing) show @endif" href="#" id="cartDropdown"
       aria-expanded="{{ $this->isShowing ? 'true' : 'false' }}"><i class="fas fa-shopping-cart"></i><span
            class="badge bg-danger rounded-circle position-absolute">{{ count($items) }}</span></a>
    <ul class="dropdown-menu dropdown-large overflow-auto @if($this->isShowing) show @endif" aria-labelledby="cartDropdown">

        @each('livewire.cart.item', $items, 'pair') {{-- So here is a little trick: livewire.cart.item is NOT a livewire component but a partial view. Keep it in mind! --}}

        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <div class="mx-3 mt-3 clearfix">
                <span class="h5 float-start">Total: {{ $this->total }} HUF</span>
                <a href="{{ route('checkout.1') }}" class="btn btn-success float-end">Checkout</a>
            </div>
        </li>
    </ul>
</div>
