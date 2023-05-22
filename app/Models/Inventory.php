<?php

namespace App\Models;

use App\Filters\HasFilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Inventory extends Model
{
    use HasFactory, HasFilter;

    protected $table = 'inventories';

    protected $fillable = [
          'name'
        , 'alias'
        , 'category_id'
        , 'price'
        , 'register_number'
        , 'accounting_number'
        , 'inventory_date'
        , 'responsible_user_signature'
        , 'section_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class
            , 'category_id'
            , 'id'
        );
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(
            Section::class
            , 'section_id'
            , 'id'
        );
    }
}
