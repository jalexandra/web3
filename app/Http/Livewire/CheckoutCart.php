<?php

namespace App\Http\Livewire;

use App\Utils\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class CheckoutCart extends Component
{
    protected $listeners = [
        'amountChanged' => 'changeAmountInItems'
    ];

    public array $items = [];
    public int $sum = 0;
    public bool $isShowing = false;

    public function mount(): void{

        $this->items = Cart::getContent();
        $this->refreshTotal();
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.checkout-cart', ['items' => $this->items]); //public props are bound by default
    }

    public function changeAmountInItems(int $id, int $amount)
    {
        $this->items[$id]['amount'] = $amount;
        $this->refreshTotal();
        return $this->redirect(route('checkout.1'));
    }

    public function refreshTotal()
    {
        $this->sum = 0;
        foreach ($this->items as $pair){
            $this->sum += $pair['book']['price'] * $pair['amount'];
        }
        $result = [];
        foreach ($this->items as $id => $item) {
            $result[$id] = $item['amount'];
        }
        session()->put('cart', $result);
    }

    public function getTotalProperty(): string
    {
        return number_format($this->sum, thousands_separator: ' ');
    }

    public function itemDeleted(int $id)
    {
        unset($this->items[$id]);
        $this->refreshTotal();
        $this->redirect(route('cart.remove_all', [$id, 'continue' => route('checkout.1')]));
    }
}
