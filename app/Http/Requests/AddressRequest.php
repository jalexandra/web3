<?php

namespace App\Http\Requests;

use App\Rules\Phonenumber;
use Illuminate\Validation\Rule;

class AddressRequest extends ExtendedFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', Rule::exists('users', 'id')],
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'country' => ['required', Rule::exists('countries', 'name')],
            'postcode' => ['required', 'min:3'],
            'city' => ['required', 'min:3'],
            'street' => ['required', 'min:3'],
            'house' => ['required', 'min:1'],
            'note' => [''],
            'phone' => ['required', new Phonenumber()],
        ];
    }
}
