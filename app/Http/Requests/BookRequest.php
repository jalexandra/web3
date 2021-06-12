<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['string', 'required'],
            'author' => ['string', 'required', 'min:3'],
            'category' => ['string', 'required', 'min:3'],
            'stock' => ['numeric', 'required', 'min:0'],
            'price' => ['numeric', 'required', 'min:0'],
            'description' => ['string', 'required', 'min:10'],
            'image' => ['image', 'max:15360']
        ];
    }
}
