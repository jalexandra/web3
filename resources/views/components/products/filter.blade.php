<form action="{{ route('products.index') }}" id="form_filter" onsubmit="handleEmptyInputs()">
    <x-card header="Filter">
        <div class="input-group my-2">
            <input type="text" class="form-control" id="search_filter" name="search" aria-label="Search"
                   placeholder="Search in name" value="{{ $searchTerm ?? '' }}"/>
        </div>
        <h6>Price:</h6>
        <div class="input-group my-2">
            <input type="number" class="form-control" name="price_from" aria-label="Price Minimum" placeholder="Min"
                   value="{{ $priceMin ?? '' }}"/> -
            <input type="number" class="form-control" name="price_to" aria-label="Price Maximum" placeholder="Max"
                   value="{{ $priceMax ?? '' }}"/>
        </div>

        <h6>In Category:</h6>
        @foreach($categories as $category)
            <x-form.checkbox name="chk_categories[]" :value="$category->id">{{ $category->name }}</x-form.checkbox>
        @endforeach
        <div class="input-group my-2">
            <button id="btn_filter" class="btn btn-outline-primary">Filter...</button>
        </div>
    </x-card>
</form>
