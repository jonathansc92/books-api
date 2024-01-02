<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function subjects(): HasMany
    {
        return $this->hasMany(BookSubject::class, 'book_id', 'id');
    }

    public function authors(): HasMany
    {
        return $this->hasMany(BookAuthor::class, 'book_id', 'id');
    }
}
