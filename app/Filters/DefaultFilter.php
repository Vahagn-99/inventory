<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

interface DefaultFilter
{
    public function filter(Builder $query, string $filter): void;
}
