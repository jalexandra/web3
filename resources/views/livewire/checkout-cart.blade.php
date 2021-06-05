@php use App\Models\Book; /** @var Book $book **/ @endphp

@each('livewire.checkout.item', $items, 'pair')

<tr class="">
    <td colspan="2"></td>
    <td><span class="h5 p-3">Total: {{ $this->total }} HUF</span></td>
    <td>
        <x-magic.button class="btn btn-success" :route="route('checkout.2')" method="post">Continue</x-magic.button>
    </td>
</tr>
