<?php

namespace App\Http\Services;

use App\Models\BookAuthor;

class BookAuthorService
{
    public static function create($request)
    {
        BookAuthor::create($request);
    }

    public static function deleteByBookId($bookId)
    {
        BookAuthor::where('book_id', $bookId)->delete();
    }
}
