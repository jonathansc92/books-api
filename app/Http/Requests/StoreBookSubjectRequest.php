<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class StoreBookSubjectRequest extends FormRequest
{
    public function rules()
    {
        return [
            'book_id' => ['integer', 'required', 'exists:books,id'],
            'subject_id' => ['integer', 'required', 'exists:subjects,id'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
