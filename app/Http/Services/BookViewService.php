<?php

namespace App\Http\Services;

use App\Http\Resources\BookResource;
use App\Models\BookView;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class BookViewService
{
    public function get($filter)
    {
        $books = BookView::filter($filter)->paginate();

        return success_response(
            data: new ResourceCollection($books),
            message: __('messages.retrieved', ['model' => __('models/book.plural')]),
        );
    }
}
