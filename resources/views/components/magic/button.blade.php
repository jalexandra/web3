{{-- https://github.com/dombidav/lara-demo/blob/master/resources/views/components/button/magic.blade.php --}}

<form class="d-inline" action="{{ $route }}" method="post" @isset($confirm) onsubmit="return confirm('{{ $confirm }}')" @endisset>
    @csrf
    @method($method)
    @isset($parameters)
        @foreach($parameters as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach
    @endisset
    <input type="submit" class="{{ $class ?? '' }}" value="{{ $slot ?? '' }}">
</form>
