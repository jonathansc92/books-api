<?php

namespace App\Http\Services;

use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class BookService
{
    public function get($filter)
    {
        $books = Book::filter($filter)->with(['authors', 'subjects'])->paginate();

        return success_response(
            data: new ResourceCollection($books),
            message: __('messages.retrieved', ['model' => __('models/book.plural')]),
        );
    }

    public static function create($request)
    {
        $book = Book::create($request->validated());

        return success_response(
            data: new BookResource($book),
            message: __('messages.saved', ['model' => __('models/book.singular')]),
            httpStatus: Response::HTTP_CREATED,
        );
    }

    public function find($book)
    {
        return success_response(
            data: new BookResource($book),
            message: __('messages.retrieved', ['model' => __('models/book.singular')]),
        );
    }

    public static function update($request, $book)
    {
        $book->update($request->validated());

        return success_response(
            data: new BookResource($book),
            message: __('messages.updated', ['model' => __('models/book.singular')]),
        );
    }

    public static function delete($book)
    {
        Book::destroy($book->id);

        return success_response(
            message: __('messages.deleted', ['model' => __('models/book.singular')]),
        );
    }
}
