<?php

namespace App\Http\Livewire\Cart;

use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Price extends Component
{
    public int $amount = 1;
    public int $price = 0;
    public int $book = -1;

    public function render(): Factory|View|Application
    {
        return view('livewire.cart.price', ['amount' => $this->amount]); //https://stackoverflow.com/questions/63848826/livewire-encountered-corrupt-data-when-trying-to-hydrate-the-component
    }

    public function amountChanged(): void
    {
        $this->emit('amountChanged', $this->book, $this->amount);
    }

    public function getTotalProperty(): string
    {
        return number_format(($this->amount * $this->price), thousands_separator: ' ');
    }
}
