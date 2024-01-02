<?php

namespace App\Http\Services;

use App\Models\BookView;

class BookViewService
{
    public function get()
    {
        return BookView::get();
    }
}
