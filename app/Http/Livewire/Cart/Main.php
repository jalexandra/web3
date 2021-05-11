<?php

namespace App\Http\Livewire\Cart;

use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Main extends Component
{
    protected $listeners = [
      'amountChanged' => 'changeAmountInItems'
    ];

    public array $items = [];
    public int $sum = 0;
    public bool $isShowing = false;

    public function mount(): void{
        for ($i = 0; $i < 5; $i++) {
            $book = Book::random();
            $this->items[$book->id] = ['book' => $book, 'amount' => random_int(1, 10)];
        }

        $this->refreshTotal();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.cart.main', ['items' => $this->items]); //public props are bound by default
    }

    public function changeAmountInItems(int $id, int $amount): void
    {
        $this->items[$id]['amount'] = $amount;
        $this->refreshTotal();
    }

    public function refreshTotal(): void
    {
        $this->sum = 0;
        foreach ($this->items as $pair){
            $this->sum += $pair['book']['price'] * $pair['amount'];
        }
    }

    public function dropdown(): void
    {
        $this->isShowing = !$this->isShowing;
    }

    public function getTotalProperty(): string
    {
        return number_format($this->sum, thousands_separator: ' ');
    }

    public function itemDeleted(int $id): void
    {
        unset($this->items[$id]);
    }
}
