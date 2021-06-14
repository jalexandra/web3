<div class="btn-group ms-3 dropdown">
    <a class="dropdown-toggle btn btn-outline-primary" href="#" id="profileDropdown" data-bs-toggle="dropdown"
       aria-expanded="false">{{ Auth::user()->name ?? 'Guest' }} <i class="fas fa-user-circle"></i></a>
    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
        @auth
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="{{ route('my-orders') }}">My Orders</a></li>
            <li><x-magic.button method="post" class="dropdown-item" :route="route('logout')">Logout</x-magic.button></li>
        @else
            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
        @endauth
    </ul>
</div>
