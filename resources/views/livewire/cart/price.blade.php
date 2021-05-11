<span class="h6 text-muted">
    Amount:
    <input type="number" wire:model.debounce.300ms="amount" wire:change="amountChanged" aria-label="amount" class="d-inline form-control w-25" value="{{ $amount }}"/>
    =
    <b>{{ $this->total }} HUF</b>
</span>
