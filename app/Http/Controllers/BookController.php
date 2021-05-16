<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Utils\Preg;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /** @noinspection ProperNullCoalescingOperatorUsageInspection */
    public function index()
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

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Book $book)
    {
        //
    }

    public function edit(Book $book)
    {
        //
    }

    public function update(Request $request, Book $book)
    {
        //
    }

    public function destroy(Book $book)
    {
        //
    }
}
