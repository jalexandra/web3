<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use File;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Str;

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

    public function store(BookRequest $request)
    {
        $book = Book::create($this->requestMutation($request));

        return redirect(route('book.show', [$book]));
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

    /** @noinspection PhpPossiblePolymorphicInvocationInspection */
    public function update(BookRequest $request, Book $book)
    {
        $book->update($this->requestMutation($request, $book));

        return redirect(route('book.show', [$book]));
    }

    public function destroy(Book $book): Redirector|Application|RedirectResponse
    {
        $book->delete();
        return redirect(route('book.admin'));
    }

    public function requestMutation(BookRequest $request, Book $book = null): array
    {
        $result = $request
            ->butSwitch('author')->to('author_id')
            ->byApplying(fn(string $author_name) => Author::where('name', $author_name)
                ->firstOrCreate(['name' => $author_name])->id
            )
            ->butSwitch('category')->to('category_id')
            ->byApplying(fn(string $category_name) => Category::where('name', $category_name)
                ->firstOrCreate(['name' => $category_name])->id
            )
            ->toSimpleArray();

        $uploadedFile = $request->file('image');
        if ($uploadedFile) {
            if ($book?->image) {
                $a = File::delete(public_path("img/thumbnails/$book->image"));
            }

            $result['image'] = $uploadedFile->move('img/thumbnails/', Str::random(8) . '.' . $uploadedFile->getClientOriginalExtension())->getFilename();
        }
        return $result;
    }
}
