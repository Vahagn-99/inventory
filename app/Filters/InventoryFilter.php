<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

final class InventoryFilter extends BaseFilter implements DefaultFilter
{
    public function filter(Builder $query, string $filter): void
    {
        $query->where(function (Builder $query) use ($filter) {
            $query->where('name', 'LIKE', "%$filter%");
            $query->orWhere('responsible_user_signature', 'LIKE', "%$filter%");
            $query->orWhere('register_number', 'LIKE', "%$filter%");
            $query->orWhere('accounting_number', 'LIKE', "%$filter%");
            $query->orWhere('alias', 'LIKE', "%$filter%");
        });
    }
}
