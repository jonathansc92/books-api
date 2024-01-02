<?php

namespace App\Models;

use App\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'subjects';

    protected $fillable = [
        'description',
    ];
}
