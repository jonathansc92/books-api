<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'price',
    ];

    protected $casts = [
        'year' => 'integer',
    ];
}
