<div class="container">
    <div class="col d-flex justify-content-center">
        <div class="card">
            <div class="card-header">Continue as:</div>
            <a href="{{ route('checkout.3') }}" class="card-body btn btn-outline-primary mx-5 mt-5">
                <span class=""><i class="fas fa-user rounded-circle"></i></span>
                {{ Auth::user()->name }} ({{ Auth::user()->email }})
            </a>
            <a href="{{ route('logout') }}" class="card-body btn btn-outline-primary m-5">
                <span class=""><i class="fas fa-sign-out-alt"></i></span>
                Logout
            </a>
        </div>
    </div>
</div>
