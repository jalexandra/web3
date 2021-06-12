@php
    $bouncer = $bouncer ?? false;
@endphp
@if (!$bouncer || (Auth::check() && Auth::user()->can($to, $bouncer)))
    <li class="nav-item">
        <a class="nav-link @if(\Illuminate\Support\Facades\Route::is($is ?? $to)) active @endif" aria-current="page" href="{{ $directLink ?? route($to) }}">
            {{ $slot->isNotEmpty() ? $slot : \Illuminate\Support\Str::title($to) }}
        </a>
    </li>
@endif
