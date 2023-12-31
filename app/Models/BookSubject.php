<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookSubject extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'book_subjects';

    protected $fillable = [
        'book_id',
        'subject_id',
    ];
}
