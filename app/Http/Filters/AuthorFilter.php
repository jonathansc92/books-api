<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class AuthorFilter extends Filter
{
    public function name(string $value = null): Builder
    {
        return $this->builder->where('name', 'LIKE', "%$value%");
    }

    public function sort(array $value = []): Builder
    {
        if (isset($value['by']) && ! Schema::hasColumn('authors', $value['by'])) {
            return $this->builder;
        }

        return $this->builder->orderBy(
            $value['by'] ?? 'created_at',
            $value['order'] ?? 'desc'
        );
    }

    public function limit(int $value = 15): Builder
    {
        $this->builder->getModel()->setPerPage($value);

        return $this->builder;
    }
}
