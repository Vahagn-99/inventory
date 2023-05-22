<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

final class SectionFilter extends BaseFilter implements DefaultFilter
{
    public function filter(Builder $query, string $filter): void
    {
        $query->where(function (Builder $query) use ($filter) {
            $query->where('name', 'LIKE', "%$filter%");
        });
    }
}
