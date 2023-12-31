<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class SubjectFilter extends Filter
{
    public function description(string $value = null): Builder
    {
        return $this->builder->where('description', 'LIKE', "%$value%");
    }

    public function sort(array $value = []): Builder
    {
        if (isset($value['by']) && ! Schema::hasColumn('subjects', $value['by'])) {
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
