<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'authors';

    protected $fillable = [
        'name',
    ];
}
