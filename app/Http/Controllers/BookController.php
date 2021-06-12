<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(BouncerCheck::class)->except('index', 'show');
    }

    /** @noinspection ProperNullCoalescingOperatorUsageInspection */
    public function index(): Factory|View|Application
    {
        $searchTerm = \request('search') ?? '';
        $priceMin = \request('price_from') ?? 0;
        $priceMax = \request('price_to') ?? 99_999;
        $selectedCategories = \request('chk_categories') ?? [];

        $books = Book::query()
            ->where('title', 'like', '%' . $searchTerm . '%')
            ->where('price', '>', $priceMin)
            ->where('price', '<', $priceMax);

        if(count($selectedCategories) > 0){
            $books->where(function ($query) use ($selectedCategories) {
                /** @var Builder $query */
                foreach ($selectedCategories as $selectedCategory) {
                    $query->orWhere('category_id', '=', $selectedCategory);
                }
            });
        }

        return view('products.index', [
            'books' => $books->paginate(15),
            'categories' => Category::all(),
            'searchTerm' => $searchTerm,
            'priceMin' => $priceMin,
            'priceMax' => $priceMax,
            'selected_categories' => $selectedCategories
        ]);
    }

    public function admin(): Factory|View|Application
    {
        return view('products.admin')->with('books', Book::all());
    }

    public function create(): Factory|View|Application
    {
        return view('products.form')
            ->with('authors', Author::all()
                ->map(fn($item) => $item->name ))
            ->with('categories', Category::all()
                ->map(fn($item) => $item->name ));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Book $book): Factory|View|Application
    {
        return view('products.show', ['book' => $book]);
    }

    public function edit(Book $book): Factory|View|Application
    {
        return view('products.form')
            ->with('book', $book)
            ->with('authors', Author::all()
                ->map(fn($item) => $item->name ))
            ->with('categories', Category::all()
                ->map(fn($item) => $item->name ));
    }

    public function update(Request $request, Book $book)
    {
        dd($request);
    }

    public function destroy(Book $book): Redirector|Application|RedirectResponse
    {
        $book->delete();
        return redirect(route('book.admin'));
    }
}
