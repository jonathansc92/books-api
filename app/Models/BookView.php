<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

class BookView extends Model
{
    use Filterable;

    protected $table = 'books_view';
}
