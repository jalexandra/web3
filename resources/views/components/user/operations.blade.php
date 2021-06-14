@php
    $modelName = Str::afterLast($model, '\\');
    $route = Str::snake($modelName)
@endphp

@if ( $user->id === Auth::id() || Auth::user()->canAny(['edit', 'destroy'], $model) )
    <tr>
        <th scope="row">Operations on {{ $modelName }}:</th>
        <td>
            <div class="my-4">
                @if ($user->id === Auth::id() || Auth::user()->can('edit', $model))
                    <a class="btn btn-primary"
                       href="{{ route("$route.edit", [$item ?? $user, 'user_id' => $user->id]) }}">Edit</a>
                @endif
                @if ($user->id === Auth::id() || Auth::user()->can('destroy', $model))
                    <x-magic.button
                            :route='route("$route.destroy", [$item ?? $user, "user_id" => $user->id])'
                            method="delete"
                            confirm="Are you sure you want to delete this {{ $modelName }}? This can not be undone!"
                            class="btn btn-danger"
                    >
                        Delete
                    </x-magic.button>
                @endif
            </div>
        </td>
    </tr>
@endif
