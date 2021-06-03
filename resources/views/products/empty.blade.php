<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <div class="row m-auto">
            <div class="d-none d-lg-block col-1">
                {{-- Spacer --}}
            </div>
            <div class="col-7 pe-0">
                <h1 class="display-5 fw-bold">Oh no!</h1>
                <p class="col-md-8 fs-4">We couldn't find anything with the given parameters. </p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg">Let's try something else...</a>
            </div>
            <div class="col ps-0">
                <div class="text-center">
{{--                  Source:  https://css-tricks.com/fitting-text-to-a-container/#just-use-svg--}}
                    <svg viewBox="0 0 25 18">
                        <text x="0" y="15">:(</text>
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
