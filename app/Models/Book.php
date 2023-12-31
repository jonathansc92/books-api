<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'publisher',
        'edition',
        'publish_year',
    ];

    protected $casts = [
        'year' => 'integer',
    ];
}
