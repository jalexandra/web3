@extends('layouts.app')

@section('content')
    @php
        $book = $book ?? null; //This is necessary, because blade throws an error for undefined variables
    @endphp

    <div class="container">
        <div class="card m-1 m-lg-3">
            <div class="card-header">
                <h4>{{ $book ? 'Update' : 'Create' }} Book</h4>
            </div>
            <div class="card-body">
                <x-form
                    :to="$book ? route('book.update', [$book]) : route('book.create')"
                    :method="$book ? 'put' : 'post'"
                    :allowFile="true"
                    class="w-50 m-auto"
                >
                    <x-form.input name="title" class="my-3" :value="$book?->title">
                        Title
                    </x-form.input>
                    <x-form.input type="select" :options="$authors" name="author" class="my-3" :value="$book?->author->name">
                        Author
                    </x-form.input>
                    <x-form.input type="select" :options="$categories" name="category" class="my-3" :value="$book?->category->name">
                        Category
                    </x-form.input>
                    <x-form.input type="number" name="stock" class="my-3" :value="$book?->stock">In Stock</x-form.input>
                    <x-form.input type="number" name="price" class="my-3" :value="$book?->price">Price</x-form.input>
                    <x-form.input type="textarea" name="description" class="my-3" :value="$book?->description">
                        Description
                    </x-form.input>
                    Image:
                    @if ($book)
                        <div>
                            <img src="{{ asset("img/thumbnails/{$book->image->src}") }}" alt="" class="card-img-top w-25">
                        </div>
                    @endif
                    <x-form.input type="file" name="image" class="my-3" />
                    <x-form.submit />
                </x-form>
            </div>
        </div>
    </div>
@endsection
