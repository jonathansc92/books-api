<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class BookFilter extends Filter
{
    public function title(string $value = null): Builder
    {
        return $this->builder->where('title', 'LIKE', "%$value%");
    }

    public function publisher(string $value = null): Builder
    {
        return $this->builder->where('publisher', 'LIKE', "%$value%");
    }

    public function edition(int $value = null): Builder
    {
        return $this->builder->where('edition', $value);
    }

    public function publish_year(int $value = null): Builder
    {
        return $this->builder->where('publish_year', $value);
    }

    public function sort(array $value = []): Builder
    {
        if (isset($value['by']) && ! Schema::hasColumn('books', $value['by'])) {
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
