<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subject extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'subjects';

    protected $fillable = [
        'description',
    ];
}
