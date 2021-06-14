{{-- https://github.com/dombidav/lara-demo/tree/master/resources/views/components/table --}}
<table class="{{ $class ?? '' }}" id="{{ $id ?? '' }}">
    <x-table.header :fields="$as" :operations="$operations ?? true" />
    <tbody>
    @forelse($for as $item)
        <tr>
            @foreach($as as $key => $prop)
                <x-table.property :item="$item" :key="$key" :prop="$prop" />
            @endforeach
            @if($operations ?? true)
                <x-table.operations :item="$item" :route="$route" :view="$view ?? false" :edit="$edit ?? false" :delete="$delete ?? false" />
            @endisset
        </tr>
    @empty
        <tr>
            <td colspan="{{ count($as) }}">Nothing here</td>
        </tr>
    @endforelse
    </tbody>
</table>

@isset($id)
    <script>
        $(document).ready( function () {
            $('#{{ $id ?? '' }}').DataTable();
        } );
    </script>
@endisset
