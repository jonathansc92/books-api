<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class BookViewFilter extends Filter
{
    public function authorName(string $value = null): Builder
    {
        return $this->builder->where('author_name', 'like', "%$value%");
    }

    public function booksByAuthor(string $value = null): Builder
    {
        return $this->builder->where('books_by_author', 'like', "%$value%");
    }

    public function subjectsByAuthor(string $value = null): Builder
    {
        return $this->builder->where('subjects_by_author', 'like', "%$value%");
    }

    public function sort(array $value = []): Builder
    {
        if (isset($value['by']) && ! Schema::hasColumn('books_view', $value['by'])) {
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
