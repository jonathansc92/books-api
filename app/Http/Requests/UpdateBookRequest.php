<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class UpdateBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['string', 'sometimes', 'max:40'],
            'publisher' => ['string', 'sometimes', 'max:40'],
            'edition' => ['integer', 'sometimes', 'max:10'],
            'publish_year' => ['integer', 'sometimes', 'date_format:Y', 'min:1901', 'max:2155'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
