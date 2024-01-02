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

        self::saveSubjectsAuthors($request, $book->id);

        return success_response(
            data: new BookResource($book),
            message: __('messages.saved', ['model' => __('models/book.singular')]),
            httpStatus: Response::HTTP_CREATED,
        );
    }

    public function find($book)
    {
        return success_response(
            data: new BookResource($book->load(['subjects', 'authors'])),
            message: __('messages.retrieved', ['model' => __('models/book.singular')]),
        );
    }

    public static function update($request, $book)
    {
        $book->update($request->validated());

        self::saveSubjectsAuthors($request, $book->id);

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

    private static function saveSubjectsAuthors($request, $bookId)
    {
        if (isset($request->subjects)) {
            BookSubjectService::deleteByBookId($bookId);

            foreach ($request->subjects as $subject) {
                $bookSubject['book_id'] = $bookId;
                $bookSubject['subject_id'] = $subject;

                BookSubjectService::create($bookSubject);
            }
        }

        if (isset($request->authors)) {
            BookAuthorService::deleteByBookId($bookId);

            foreach ($request->authors as $author) {
                $bookAuthor['book_id'] = $bookId;
                $bookAuthor['author_id'] = $author;

                BookAuthorService::create($bookAuthor);
            }
        }
    }
}
