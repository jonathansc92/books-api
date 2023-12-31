<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class StoreBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['string', 'required', 'max:40'],
            'publisher' => ['string', 'required', 'max:40'],
            'edition' => ['integer', 'required', 'max:10'],
            'publish_year' => ['integer', 'required', 'date_format:Y', 'min:1901', 'max:2155'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
