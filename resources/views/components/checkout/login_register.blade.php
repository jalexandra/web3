<div class="container login-container">
    <div class="row">
        <div class="col-12">
            <h3>Wait! Maybe you want to purchase as a registered user... because... idk....</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 login-form-1">
            <h3>Login to your existing account:</h3>
                <x-checkout.login-form />
            <a href="{{ route('checkout.3') }}" class="card-body btn btn-outline-primary mt-3 align-content-center">
                <span class=""><i class="fas fa-sign-out-alt"></i></span>
                Or continue purchase as Guest >>
            </a>
        </div>
        <div class="col-md-6 login-form-2">
            <h3>Or create a brand new one:</h3>
            <x-checkout.register-form />
        </div>
    </div>
</div>
