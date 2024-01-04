<?php

namespace App\Http\Services;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Models\BookAuthor;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class AuthorService
{
    public function get($filter)
    {
        $authors = Author::filter($filter)->paginate();

        return success_response(
            data: new ResourceCollection($authors),
            message: __('messages.retrieved', ['model' => __('models/author.plural')]),
        );
    }

    public static function create($request)
    {
        $author = Author::create($request->validated());

        return success_response(
            data: new AuthorResource($author),
            message: __('messages.saved', ['model' => __('models/author.singular')]),
            httpStatus: Response::HTTP_CREATED,
        );
    }

    public function find($author)
    {
        return success_response(
            data: new AuthorResource($author),
            message: __('messages.retrieved', ['model' => __('models/author.singular')]),
        );
    }

    public static function update($request, $author)
    {
        $author->update($request->validated());

        return success_response(
            data: new AuthorResource($author),
            message: __('messages.updated', ['model' => __('models/author.singular')]),
        );
    }

    public static function delete($author)
    {
        $bookHasAuthor = BookAuthor::where('author_id', $author->id)->count();

        if ($bookHasAuthor > 0) {
            return error_response(
                message: __('messages.not_parent_delete', ['model' => __('models/author.singular')]),
                httpStatus: Response::HTTP_CONFLICT
            );
        }

        Author::destroy($author->id);

        return success_response(
            message: __('messages.deleted', ['model' => __('models/author.singular')]),
        );
    }
}
