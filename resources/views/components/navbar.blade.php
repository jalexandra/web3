<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" aria-label="Main navbar">
    <div class="container-xl">
        <x-nav.brand>Best Bookshop</x-nav.brand>
        <x-nav.toggler />

        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                <x-nav.link to="home" />
                <x-nav.link to="products.index">Shop</x-nav.link>
            </ul>
            <div class="d-inline-block me-auto">
                <x-nav.search />
            </div>
            <div class="d-none d-lg-inline btn-group">
                <livewire:cart.main />
                <x-nav.auth />
            </div>

        </div>
    </div>
</nav>
