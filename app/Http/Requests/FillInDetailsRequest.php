<?php

namespace App\Http\Requests;

use App\Rules\Phonenumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FillInDetailsRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'used_address' => [],
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'country' => ['required', Rule::exists('countries', 'name')],
            'postcode' => ['required', 'min:3'],
            'city' => ['required', 'min:3'],
            'street' => ['required', 'min:3'],
            'house' => ['required', 'min:1'],
            'phone' => ['required', new Phonenumber()],
            'tos' => ['accepted'] //https://laravel.com/docs/8.x/validation#rule-accepted
        ];
    }
}
