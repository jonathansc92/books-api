<?php

namespace App\Http\Services;

use App\Models\BookView;

class BookViewService
{
    public function get($filter)
    {
        return BookView::filter($filter)->get();
    }
}
