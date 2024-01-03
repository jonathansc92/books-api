<?php

namespace App\Http\Services;

use App\Models\BookView;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BookViewService
{
    private function baseQuery($filter)
    {
        return BookView::filter($filter);
    }

    public function get($filter)
    {
        $books = $this->baseQuery($filter)->paginate();

        return success_response(
            data: new ResourceCollection($books),
            message: __('messages.retrieved', ['model' => __('models/book-report.plural')]),
        );
    }

    public function report($filter)
    {
        return $this->baseQuery($filter)->get();
    }
}
