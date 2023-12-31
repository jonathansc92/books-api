<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookAuthor extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'book_authors';

    protected $fillable = [
        'book_id',
        'author_id',
    ];

    public function book(): BelongsTo {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function author(): BelongsTo {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
