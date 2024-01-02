<?php

namespace App\Http\Services;

use App\Models\BookSubject;

class BookSubjectService
{
    public static function create($request)
    {
        BookSubject::create($request);
    }

    public static function deleteByBookId($bookId)
    {
        BookSubject::where('book_id', $bookId)->delete();
    }
}
